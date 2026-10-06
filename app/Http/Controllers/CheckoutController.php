<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Package;
use App\Models\User;
use App\Services\PaymentService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\View\View;

class CheckoutController extends Controller
{
    protected PaymentService $paymentService;

    public function __construct(PaymentService $paymentService)
    {
        $this->paymentService = $paymentService;
    }

    /**
     * Show package checkout page.
     */
    public function show(Package $package): View
    {
        $allPackages = Package::where('is_active', true)->orderBy('sort_order')->get();
        $user = Auth::user();

        return view('checkout.show', compact('package', 'allPackages', 'user'));
    }

    /**
     * Process checkout form submission.
     */
    public function process(Request $request, Package $package): RedirectResponse
    {
        $validated = $request->validate([
            'customer_name' => 'required|string|max:150',
            'customer_email' => 'required|email|max:150',
            'customer_whatsapp' => 'required|string|max:25',
            'domain_request' => 'nullable|string|max:100',
            'notes' => 'nullable|string|max:1000',
            'password' => 'nullable|string|min:6',
        ]);

        // Resolve or create user account
        if (Auth::check()) {
            $user = Auth::user();
        } else {
            $user = User::where('email', $validated['customer_email'])->first();

            if (! $user) {
                $password = ! empty($validated['password']) ? $validated['password'] : Str::random(10);
                $user = User::create([
                    'name' => $validated['customer_name'],
                    'email' => $validated['customer_email'],
                    'password' => Hash::make($password),
                    'whatsapp' => $validated['customer_whatsapp'],
                    'role' => 'client',
                    'referral_code' => 'WK-' . strtoupper(Str::random(6)),
                ]);
            }

            Auth::login($user);
        }

        // Generate unique order code: WK-202610-XXXX
        $orderCode = 'WK-' . date('Ym') . '-' . strtoupper(Str::random(4));

        $order = Order::create([
            'order_code' => $orderCode,
            'user_id' => $user->id,
            'package_id' => $package->id,
            'customer_name' => $validated['customer_name'],
            'customer_email' => $validated['customer_email'],
            'customer_whatsapp' => $validated['customer_whatsapp'],
            'domain_request' => $validated['domain_request'] ?? null,
            'total_price' => $package->price,
            'status' => 'unpaid',
            'notes' => $validated['notes'] ?? null,
        ]);

        return redirect()->route('checkout.payment', $order->order_code);
    }

    /**
     * Show payment confirmation and Gateway Screen.
     */
    public function payment(string $orderCode): View
    {
        $order = Order::with(['package', 'user', 'latestPayment'])
            ->where('order_code', $orderCode)
            ->firstOrFail();

        // Check ownership if logged in
        if (Auth::check() && ! Auth::user()->isAdmin() && Auth::id() !== $order->user_id) {
            abort(403, 'Anda tidak memiliki akses ke pesanan ini.');
        }

        $snapData = $this->paymentService->createSnapTransaction($order);

        return view('checkout.payment', compact('order', 'snapData'));
    }

    /**
     * Instant test/simulation pay for client demo.
     */
    public function simulatePayment(string $orderCode): RedirectResponse
    {
        $order = Order::where('order_code', $orderCode)->firstOrFail();

        $this->paymentService->markAsPaid($order, 'simulation');

        return redirect()->route('portal.dashboard')
            ->with('success', 'Pembayaran pesanan ' . $order->order_code . ' berhasil diverifikasi! Silakan lengkapi brief proyek Anda sekarang.');
    }

    /**
     * Midtrans asynchronous webhook callback.
     */
    public function webhookNotification(Request $request): JsonResponse
    {
        $payload = $request->all();
        $orderId = $payload['order_id'] ?? null;
        $transactionStatus = $payload['transaction_status'] ?? null;

        if (! $orderId) {
            return response()->json(['message' => 'Invalid payload'], 400);
        }

        // Midtrans order_id may have timestamp suffix (e.g., WK-202610-XXXX-17912345)
        $cleanOrderCode = explode('-', $orderId);
        if (count($cleanOrderCode) >= 3) {
            $code = $cleanOrderCode[0] . '-' . $cleanOrderCode[1] . '-' . $cleanOrderCode[2];
        } else {
            $code = $orderId;
        }

        $order = Order::where('order_code', $code)->first();

        if ($order && in_array($transactionStatus, ['capture', 'settlement'])) {
            $this->paymentService->markAsPaid($order, 'midtrans', $payload['transaction_id'] ?? null);
        }

        return response()->json(['message' => 'Notification processed successfully']);
    }
}
