<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Package;
use App\Models\ProjectBrief;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class PortalController extends Controller
{
    /**
     * Show client portal dashboard.
     */
    public function dashboard(): View
    {
        $user = Auth::user();
        $orders = Order::where('user_id', $user->id)
            ->with(['package', 'brief', 'latestPayment'])
            ->latest()
            ->get();

        $availablePackages = Package::where('is_active', true)->orderBy('sort_order')->get();

        return view('portal.dashboard', compact('user', 'orders', 'availablePackages'));
    }

    /**
     * Store or update project brief for an order.
     */
    public function storeBrief(Request $request, Order $order): RedirectResponse
    {
        // Authorize that order belongs to current user
        if ($order->user_id !== Auth::id()) {
            abort(403, 'Akses pesanan tidak diizinkan.');
        }

        $validated = $request->validate([
            'business_name' => 'required|string|max:150',
            'brief_description' => 'required|string|max:4000',
            'reference_links' => 'nullable|string|max:1000',
            'assets_drive_link' => 'nullable|url|max:500',
        ]);

        ProjectBrief::updateOrCreate(
            ['order_id' => $order->id],
            [
                'business_name' => $validated['business_name'],
                'brief_description' => $validated['brief_description'],
                'reference_links' => $validated['reference_links'] ?? null,
                'assets_drive_link' => $validated['assets_drive_link'] ?? null,
                'status' => 'submitted',
            ]
        );

        if ($order->status === 'unpaid' || $order->status === 'paid') {
            $order->update(['status' => 'in_progress']);
        }

        return back()->with('success', 'Brief proyek berhasil disimpan! Tim Webkita akan segera memproses desain Anda.');
    }
}
