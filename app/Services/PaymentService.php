<?php

namespace App\Services;

use App\Models\Order;
use App\Models\Payment;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class PaymentService
{
    /**
     * Get or create a Snap token for Midtrans.
     * If Midtrans Server Key is not set or in test mode, returns a mock token.
     */
    public function createSnapTransaction(Order $order): array
    {
        $serverKey = config('services.midtrans.server_key', env('MIDTRANS_SERVER_KEY'));
        $isProduction = config('services.midtrans.is_production', env('MIDTRANS_IS_PRODUCTION', false));

        // Fallback / simulation mode if Midtrans key is not set
        if (empty($serverKey)) {
            $mockToken = 'MOCK-SNAP-' . strtoupper(substr(md5($order->order_code . time()), 0, 16));
            
            // Record payment mutation
            $payment = Payment::updateOrCreate(
                ['order_id' => $order->id],
                [
                    'transaction_id' => 'TRX-' . strtoupper(uniqid()),
                    'gateway' => 'simulation',
                    'payment_type' => 'qris_va_simulated',
                    'amount' => $order->total_price,
                    'status' => 'pending',
                    'snap_token' => $mockToken,
                ]
            );

            return [
                'token' => $mockToken,
                'redirect_url' => null,
                'is_simulation' => true,
                'payment' => $payment,
            ];
        }

        $endpoint = $isProduction 
            ? 'https://app.midtrans.com/snap/v1/transactions' 
            : 'https://app.sandbox.midtrans.com/snap/v1/transactions';

        $payload = [
            'transaction_details' => [
                'order_id' => $order->order_code . '-' . time(),
                'gross_amount' => (int) $order->total_price,
            ],
            'customer_details' => [
                'first_name' => $order->customer_name,
                'email' => $order->customer_email,
                'phone' => $order->customer_whatsapp,
            ],
            'item_details' => [
                [
                    'id' => $order->package ? $order->package->slug : 'custom-package',
                    'price' => (int) $order->total_price,
                    'quantity' => 1,
                    'name' => $order->package ? $order->package->name : 'Layanan Web Development',
                ],
            ],
        ];

        try {
            $response = Http::withBasicAuth($serverKey, '')
                ->post($endpoint, $payload);

            if ($response->successful()) {
                $data = $response->json();
                $payment = Payment::updateOrCreate(
                    ['order_id' => $order->id],
                    [
                        'transaction_id' => $data['token'] ?? ('TRX-' . uniqid()),
                        'gateway' => 'midtrans',
                        'payment_type' => 'snap',
                        'amount' => $order->total_price,
                        'status' => 'pending',
                        'snap_token' => $data['token'] ?? null,
                        'raw_payload' => $data,
                    ]
                );

                return [
                    'token' => $data['token'] ?? null,
                    'redirect_url' => $data['redirect_url'] ?? null,
                    'is_simulation' => false,
                    'payment' => $payment,
                ];
            }

            Log::error('Midtrans Snap Error: ' . $response->body());
        } catch (\Throwable $e) {
            Log::error('Midtrans Exception: ' . $e->getMessage());
        }

        // Graceful fallback to simulation
        $mockToken = 'MOCK-SNAP-' . strtoupper(substr(md5($order->order_code . time()), 0, 16));
        $payment = Payment::updateOrCreate(
            ['order_id' => $order->id],
            [
                'transaction_id' => 'TRX-' . strtoupper(uniqid()),
                'gateway' => 'simulation',
                'payment_type' => 'qris_va_simulated',
                'amount' => $order->total_price,
                'status' => 'pending',
                'snap_token' => $mockToken,
            ]
        );

        return [
            'token' => $mockToken,
            'redirect_url' => null,
            'is_simulation' => true,
            'payment' => $payment,
        ];
    }

    /**
     * Mark an order as paid (via simulation or webhook settlement).
     */
    public function markAsPaid(Order $order, string $gateway = 'midtrans', ?string $transactionId = null): void
    {
        $order->update(['status' => 'paid']);

        Payment::updateOrCreate(
            ['order_id' => $order->id],
            [
                'transaction_id' => $transactionId ?? ('SETTLED-' . strtoupper(uniqid())),
                'gateway' => $gateway,
                'status' => 'settlement',
                'amount' => $order->total_price,
                'paid_at' => Carbon::now(),
            ]
        );

        // Send In-App Client Notification
        if ($order->user) {
            $order->user->notifications()->create([
                'type' => 'payment_success',
                'title' => 'Pembayaran Terverifikasi: ' . $order->order_code,
                'message' => 'Pembayaran senilai Rp ' . number_format($order->total_price, 0, ',', '.') . ' telah lunas & terverifikasi. Silakan lengkapi brief proyek Anda sekarang.',
                'action_url' => route('portal.dashboard'),
                'is_read' => false,
            ]);
        }

        // Send Transactional Email
        try {
            \Illuminate\Support\Facades\Mail::to($order->customer_email)->send(new \App\Mail\PaymentSuccessMail($order));
        } catch (\Throwable $e) {
            Log::warning('Gagal kirim email pembayaran: ' . $e->getMessage());
        }
    }
}
