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
        $recentPosts = BlogPost::with('category')->latest()->take(10)->get();
        $legalPages = \App\Models\PageLegal::all();
        $allPackages = Package::with('service')->orderBy('sort_order')->get();

        return view('admin.dashboard', compact('stats', 'recentOrders', 'recentLeads', 'recentPosts', 'legalPages', 'allPackages'));
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

    /**
     * Show form to create a new blog article.
     */
    public function createBlog(): View
    {
        $categories = \App\Models\BlogCategory::all();
        return view('admin.blog.create', compact('categories'));
    }

    /**
     * Store a newly created blog article.
     */
    public function storeBlog(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'required|exists:blog_categories,id',
            'excerpt' => 'required|string|max:500',
            'content' => 'required|string',
            'author' => 'required|string|max:100',
            'reading_time_minutes' => 'required|integer|min:1|max:60',
            'is_published' => 'nullable|boolean',
        ]);

        $slug = \Illuminate\Support\Str::slug($validated['title']);
        $originalSlug = $slug;
        $counter = 1;
        while (BlogPost::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $counter;
            $counter++;
        }

        BlogPost::create([
            'title' => $validated['title'],
            'slug' => $slug,
            'category_id' => $validated['category_id'],
            'excerpt' => $validated['excerpt'],
            'content' => $validated['content'],
            'author' => $validated['author'],
            'reading_time_minutes' => $validated['reading_time_minutes'],
            'is_published' => $request->has('is_published'),
            'views_count' => 0,
            'published_at' => now(),
        ]);

        return redirect()->route('admin.dashboard')->with('success', 'Artikel blog berhasil diterbitkan.');
    }

    /**
     * Show form to edit a blog article.
     */
    public function editBlog(BlogPost $post): View
    {
        $categories = \App\Models\BlogCategory::all();
        return view('admin.blog.edit', compact('post', 'categories'));
    }

    /**
     * Update an existing blog article.
     */
    public function updateBlog(Request $request, BlogPost $post): RedirectResponse
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'required|exists:blog_categories,id',
            'excerpt' => 'required|string|max:500',
            'content' => 'required|string',
            'author' => 'required|string|max:100',
            'reading_time_minutes' => 'required|integer|min:1|max:60',
            'is_published' => 'nullable|boolean',
        ]);

        $post->update([
            'title' => $validated['title'],
            'category_id' => $validated['category_id'],
            'excerpt' => $validated['excerpt'],
            'content' => $validated['content'],
            'author' => $validated['author'],
            'reading_time_minutes' => $validated['reading_time_minutes'],
            'is_published' => $request->has('is_published'),
        ]);

        return redirect()->route('admin.dashboard')->with('success', 'Artikel blog berhasil diperbarui.');
    }

    /**
     * Delete a blog article.
     */
    public function destroyBlog(BlogPost $post): RedirectResponse
    {
        $post->delete();
        return redirect()->route('admin.dashboard')->with('success', 'Artikel blog berhasil dihapus.');
    }

    /**
     * Show form to edit legal page content.
     */
    public function editLegal(\App\Models\PageLegal $pageLegal): View
    {
        return view('admin.legal.edit', compact('pageLegal'));
    }

    /**
     * Update legal page content.
     */
    public function updateLegal(Request $request, \App\Models\PageLegal $pageLegal): RedirectResponse
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $pageLegal->update($validated);

        return redirect()->route('admin.dashboard')->with('success', 'Halaman legal ' . $pageLegal->title . ' berhasil diperbarui.');
    }

    /**
     * Toggle package active status.
     */
    public function togglePackage(Package $package): RedirectResponse
    {
        $package->update(['is_active' => !$package->is_active]);

        return back()->with('success', 'Status paket ' . $package->name . ' diperbarui.');
    }

    /**
     * Send direct project/milestone notification to a client.
     */
    public function sendNotification(Request $request, User $user): RedirectResponse
    {
        $validated = $request->validate([
            'title' => 'required|string|max:150',
            'message' => 'required|string|max:2000',
            'action_url' => 'nullable|string|max:500',
            'type' => 'nullable|string|in:order_update,payment_success,brief_received,general',
        ]);

        $user->notifications()->create([
            'title' => $validated['title'],
            'message' => $validated['message'],
            'action_url' => $validated['action_url'] ?? null,
            'type' => $validated['type'] ?? 'order_update',
            'is_read' => false,
        ]);

        return back()->with('success', 'Notifikasi berhasil dikirimkan ke klien ' . $user->name . '.');
    }
}

