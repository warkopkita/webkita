<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use App\Models\Lead;
use App\Models\Order;
use App\Models\Package;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminController extends Controller
{
    /**
     * Show admin dashboard overview.
     */
    public function dashboard(): View
    {
        $stats = [
            'total_leads' => Lead::count(),
            'new_leads' => Lead::where('status', 'new')->count(),
            'total_orders' => Order::count(),
            'active_orders' => Order::whereIn('status', ['paid', 'in_progress', 'review'])->count(),
            'total_revenue' => Order::whereIn('status', ['paid', 'in_progress', 'completed'])->sum('total_price'),
            'total_clients' => User::where('role', 'client')->count(),
            'total_posts' => BlogPost::count(),
        ];

        $recentOrders = Order::with(['package', 'user', 'brief'])->latest()->take(10)->get();
        $recentLeads = Lead::latest()->take(10)->get();
        $recentPosts = BlogPost::with('category')->latest()->take(5)->get();

        return view('admin.dashboard', compact('stats', 'recentOrders', 'recentLeads', 'recentPosts'));
    }

    /**
     * Update order status.
     */
    public function updateOrderStatus(Request $request, Order $order): RedirectResponse
    {
        $validated = $request->validate([
            'status' => 'required|in:unpaid,paid,in_progress,review,completed,cancelled',
        ]);

        $order->update(['status' => $validated['status']]);

        return back()->with('success', 'Status pesanan ' . $order->order_code . ' berhasil diperbarui.');
    }

    /**
     * Update lead pipeline status.
     */
    public function updateLeadStatus(Request $request, Lead $lead): RedirectResponse
    {
        $validated = $request->validate([
            'status' => 'required|in:new,contacted,negotiating,converted,lost',
        ]);

        $lead->update(['status' => $validated['status']]);

        return back()->with('success', 'Status prospek ' . $lead->name . ' berhasil diperbarui.');
    }

    /**
     * Export all order payments to CSV.
     */
    public function exportPaymentsCsv()
    {
        $orders = Order::with(['package', 'user', 'latestPayment'])->latest()->get();

        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="webkita-laporan-transaksi-' . date('Ymd') . '.csv"',
        ];

        $callback = function () use ($orders) {
            $handle = fopen('php://output', 'w');
            fputcsv($handle, ['Kode Pesanan', 'Nama Klien', 'Email', 'WhatsApp', 'Paket', 'Total Investasi', 'Status Pesanan', 'ID Transaksi', 'Waktu Transaksi']);

            foreach ($orders as $order) {
                fputcsv($handle, [
                    $order->order_code,
                    $order->customer_name,
                    $order->customer_email,
                    $order->customer_whatsapp,
                    $order->package ? $order->package->name : 'Kustom',
                    $order->total_price,
                    $order->status,
                    $order->latestPayment ? $order->latestPayment->transaction_id : '-',
                    $order->created_at->format('Y-m-d H:i:s'),
                ]);
            }

            fclose($handle);
        };

        return response()->stream($callback, 200, $headers);
    }
}
