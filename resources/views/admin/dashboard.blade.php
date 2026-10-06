@extends('layouts.app')

@section('title', 'Admin Dashboard — Webkita Studio')
@section('meta_description', 'Panel manajemen pesanan, prospek leads, dan metrik pendapatan Webkita.')

@section('content')
<div class="min-h-screen bg-[#381867] text-white pt-28 pb-24 px-4 sm:px-6 lg:px-8" x-data="{ viewBrief: null, notifyUser: null }">
    <!-- Ambient Glow -->
    <div class="absolute top-20 left-10 w-96 h-96 bg-[#C8F169]/10 rounded-full blur-3xl pointer-events-none"></div>

    <div class="max-w-7xl mx-auto relative z-10 space-y-8">
        
        <!-- Header Bar -->
        <div class="studio-card-dark p-6 sm:p-8 rounded-3xl border border-purple-400/20 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 shadow-2xl">
            <div>
                <span class="text-xs font-mono font-bold tracking-widest text-[#C8F169] uppercase">ADMINISTRASI SISTEM</span>
                <h1 class="text-2xl sm:text-3xl font-black text-white mt-1">
                    Panel Manajemen Webkita
                </h1>
                <p class="text-xs text-purple-200/80 mt-1">
                    Kelola pesanan klien, pantau prospek WhatsApp, dan perbarui alur pengerjaan.
                </p>
            </div>

            <div class="flex items-center gap-3">
                <a href="{{ url('/') }}" class="glass-pill px-4 py-2.5 rounded-full text-xs font-semibold hover:text-[#C8F169]">
                    Lihat Situs Publik
                </a>
                
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="px-4 py-2.5 rounded-full bg-white/10 hover:bg-white/20 text-xs font-semibold text-purple-200 transition-all border border-white/15">
                        Keluar
                    </button>
                </form>
            </div>
        </div>

        <!-- Success Notifications -->
        @if (session('success'))
            <div class="p-4 rounded-2xl bg-[#C8F169]/20 border border-[#C8F169]/40 text-xs text-[#C8F169] font-bold">
                {{ session('success') }}
            </div>
        @endif

        <!-- 5 Key Statistics Cards -->
        <div class="grid grid-cols-2 lg:grid-cols-5 gap-4">
            <div class="studio-card-dark p-5 rounded-3xl border border-purple-400/20">
                <span class="text-[11px] font-mono text-purple-300 uppercase tracking-wider">TOTAL PROSPEK</span>
                <div class="text-2xl sm:text-3xl font-black text-white mt-2">{{ $stats['total_leads'] }}</div>
                <div class="text-[11px] text-[#C8F169] mt-1">{{ $stats['new_leads'] }} prospek baru</div>
            </div>

            <div class="studio-card-dark p-5 rounded-3xl border border-purple-400/20">
                <span class="text-[11px] font-mono text-purple-300 uppercase tracking-wider">TOTAL PESANAN</span>
                <div class="text-2xl sm:text-3xl font-black text-white mt-2">{{ $stats['total_orders'] }}</div>
                <div class="text-[11px] text-[#C8F169] mt-1">{{ $stats['active_orders'] }} pesanan aktif</div>
            </div>

            <div class="studio-card-dark p-5 rounded-3xl border border-purple-400/20">
                <span class="text-[11px] font-mono text-purple-300 uppercase tracking-wider">ESTIMASI OMSET</span>
                <div class="text-xl sm:text-2xl font-black text-[#C8F169] mt-2">
                    Rp {{ number_format($stats['total_revenue'], 0, ',', '.') }}
                </div>
                <div class="text-[11px] text-purple-300 mt-1">Nilai transaksi</div>
            </div>

            <div class="studio-card-dark p-5 rounded-3xl border border-purple-400/20">
                <span class="text-[11px] font-mono text-purple-300 uppercase tracking-wider">KLIEN TERDAFTAR</span>
                <div class="text-2xl sm:text-3xl font-black text-white mt-2">{{ $stats['total_clients'] }}</div>
                <div class="text-[11px] text-purple-300 mt-1">Akun portal</div>
            </div>

            <div class="studio-card-dark p-5 rounded-3xl border border-purple-400/20 col-span-2 lg:col-span-1">
                <span class="text-[11px] font-mono text-purple-300 uppercase tracking-wider">ARTIKEL BLOG</span>
                <div class="text-2xl sm:text-3xl font-black text-white mt-2">{{ $stats['total_posts'] }}</div>
                <div class="text-[11px] text-[#C8F169] mt-1">Terbit di website</div>
            </div>
        </div>

        <!-- Section 1: Recent Orders Table -->
        <div class="studio-card-dark p-6 sm:p-8 rounded-3xl border border-purple-400/20 shadow-xl space-y-4">
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 pb-3 border-b border-purple-500/20">
                <div>
                    <span class="text-xs font-mono font-bold text-[#C8F169] uppercase">DAFTAR PESANAN MASUK</span>
                    <h3 class="text-lg font-bold text-white mt-0.5">Kelola Status Proyek, Brief Klien & Pembayaran</h3>
                </div>
                <a href="{{ route('admin.payments.export') }}" class="lime-pill px-4 py-2 rounded-full text-xs font-bold text-center self-start sm:self-auto">
                    Export Laporan CSV →
                </a>
            </div>

            @if ($recentOrders->isEmpty())
                <div class="py-8 text-center text-xs text-purple-300/80">
                    Belum ada data pesanan di sistem.
                </div>
            @else
                <div class="overflow-x-auto">
                    <table class="w-full text-left text-xs text-purple-100">
                        <thead>
                            <tr class="border-b border-purple-500/20 text-purple-300 font-mono text-[11px]">
                                <th class="pb-3 pr-4">Kode Order</th>
                                <th class="pb-3 pr-4">Klien & WA</th>
                                <th class="pb-3 pr-4">Paket & Domain</th>
                                <th class="pb-3 pr-4">Total</th>
                                <th class="pb-3 pr-4">Brief & Invoice</th>
                                <th class="pb-3 pr-4">Status</th>
                                <th class="pb-3 text-right">Ubah Status</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-purple-500/10">
                            @foreach ($recentOrders as $order)
                                <tr>
                                    <td class="py-3.5 pr-4 font-mono font-bold text-[#C8F169]">{{ $order->order_code }}</td>
                                    <td class="py-3.5 pr-4">
                                        <div class="font-bold text-white">{{ $order->customer_name }}</div>
                                        <div class="text-[11px] text-purple-300 font-mono">{{ $order->customer_whatsapp }}</div>
                                    </td>
                                    <td class="py-3.5 pr-4">
                                        <div>{{ $order->package ? $order->package->name : 'Kustom' }}</div>
                                        @if ($order->domain_request)
                                            <div class="text-[10px] text-[#C8F169] font-mono">{{ $order->domain_request }}</div>
                                        @endif
                                    </td>
                                    <td class="py-3.5 pr-4 font-mono">Rp {{ number_format($order->total_price, 0, ',', '.') }}</td>
                                    <td class="py-3.5 pr-4">
                                        <div class="flex items-center gap-1.5 flex-wrap">
                                            @if($order->brief)
                                                <button type="button" 
                                                        @click="viewBrief = {{ json_encode($order->brief) }}"
                                                        class="px-2 py-0.5 rounded bg-[#C8F169]/20 text-[#C8F169] font-bold text-[10px] hover:bg-[#C8F169]/30 transition-colors">
                                                    Brief →
                                                </button>
                                            @else
                                                <span class="text-purple-400 text-[10px]">No brief</span>
                                            @endif
                                            <a href="{{ route('portal.orders.invoice', $order) }}" target="_blank" 
                                               class="px-2 py-0.5 rounded bg-white/10 text-purple-200 hover:text-white font-mono text-[10px]">
                                                Inv ↗
                                            </a>
                                        </div>
                                    </td>
                                    <td class="py-3.5 pr-4">
                                        <span class="px-2.5 py-1 rounded-full text-[10px] font-bold uppercase
                                            @if($order->status === 'completed') bg-emerald-500/20 text-emerald-300
                                            @elseif($order->status === 'in_progress') bg-cyan-500/20 text-cyan-300
                                            @elseif($order->status === 'paid') bg-purple-500/20 text-purple-300
                                            @else bg-amber-500/20 text-amber-300 @endif">
                                            {{ $order->status }}
                                        </span>
                                    </td>
                                    <td class="py-3.5 text-right">
                                        <form action="{{ route('admin.orders.status', $order) }}" method="POST" class="inline-flex items-center gap-1.5">
                                            @csrf
                                            @method('PATCH')
                                            <select name="status" class="bg-[#1A0630] border border-purple-500/30 text-[11px] text-white rounded-lg px-2 py-1 focus:outline-none focus:border-[#C8F169]">
                                                <option value="unpaid" {{ $order->status === 'unpaid' ? 'selected' : '' }}>unpaid</option>
                                                <option value="paid" {{ $order->status === 'paid' ? 'selected' : '' }}>paid</option>
                                                <option value="in_progress" {{ $order->status === 'in_progress' ? 'selected' : '' }}>in_progress</option>
                                                <option value="review" {{ $order->status === 'review' ? 'selected' : '' }}>review</option>
                                                <option value="completed" {{ $order->status === 'completed' ? 'selected' : '' }}>completed</option>
                                                <option value="cancelled" {{ $order->status === 'cancelled' ? 'selected' : '' }}>cancelled</option>
                                            </select>
                                            <button type="submit" class="lime-pill px-2.5 py-1 rounded-lg text-[10px] font-bold">
                                                Update
                                            </button>
                                        </form>
                                        @if ($order->user)
                                            <button type="button" 
                                                    @click="notifyUser = { id: {{ $order->user->id }}, name: '{{ addslashes($order->customer_name) }}', order_code: '{{ $order->order_code }}' }"
                                                    class="inline-block mt-1 px-2.5 py-1 rounded-lg text-[10px] text-[#C8F169] border border-[#C8F169]/40 hover:bg-[#C8F169]/10 font-bold">
                                                + Notifikasi Klien
                                            </button>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>

        <!-- Section 2: Recent Leads Pipeline Table -->
        <div class="studio-card-dark p-6 sm:p-8 rounded-3xl border border-purple-400/20 shadow-xl space-y-4">
            <div class="flex items-center justify-between pb-3 border-b border-purple-500/20">
                <div>
                    <span class="text-xs font-mono font-bold text-[#C8F169] uppercase">PIPELINE PROSPEK LEADS</span>
                    <h3 class="text-lg font-bold text-white mt-0.5">Calon Klien dari Form Brief & WhatsApp</h3>
                </div>
            </div>

            @if ($recentLeads->isEmpty())
                <div class="py-8 text-center text-xs text-purple-300/80">
                    Belum ada prospek leads masuk.
                </div>
            @else
                <div class="overflow-x-auto">
                    <table class="w-full text-left text-xs text-purple-100">
                        <thead>
                            <tr class="border-b border-purple-500/20 text-purple-300 font-mono text-[11px]">
                                <th class="pb-3 pr-4">Nama Prospek</th>
                                <th class="pb-3 pr-4">No. WhatsApp</th>
                                <th class="pb-3 pr-4">Paket Diminati</th>
                                <th class="pb-3 pr-4">Catatan Singkat</th>
                                <th class="pb-3 pr-4">Tanggal Masuk</th>
                                <th class="pb-3 pr-4">Status</th>
                                <th class="pb-3 text-right">Tindakan</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-purple-500/10">
                            @foreach ($recentLeads as $lead)
                                <tr>
                                    <td class="py-3.5 pr-4 font-bold text-white">{{ $lead->name }}</td>
                                    <td class="py-3.5 pr-4">
                                        <a href="https://wa.me/{{ $lead->whatsapp }}" target="_blank" class="text-[#C8F169] hover:underline font-mono">
                                            {{ $lead->whatsapp }} ↗
                                        </a>
                                    </td>
                                    <td class="py-3.5 pr-4">{{ $lead->interested_package }}</td>
                                    <td class="py-3.5 pr-4 text-purple-300/80 max-w-xs truncate">{{ $lead->notes ?: '-' }}</td>
                                    <td class="py-3.5 pr-4 text-purple-300">{{ $lead->created_at->format('d/m/Y H:i') }}</td>
                                    <td class="py-3.5 pr-4">
                                        <span class="px-2.5 py-1 rounded-full text-[10px] font-bold uppercase
                                            @if($lead->status === 'converted') bg-emerald-500/20 text-emerald-300
                                            @elseif($lead->status === 'contacted') bg-cyan-500/20 text-cyan-300
                                            @elseif($lead->status === 'negotiating') bg-purple-500/20 text-purple-300
                                            @elseif($lead->status === 'lost') bg-red-500/20 text-red-300
                                            @else bg-amber-500/20 text-amber-300 @endif">
                                            {{ $lead->status }}
                                        </span>
                                    </td>
                                    <td class="py-3.5 text-right">
                                        <form action="{{ route('admin.leads.status', $lead) }}" method="POST" class="inline-flex items-center gap-1.5">
                                            @csrf
                                            @method('PATCH')
                                            <select name="status" class="bg-[#1A0630] border border-purple-500/30 text-[11px] text-white rounded-lg px-2 py-1 focus:outline-none focus:border-[#C8F169]">
                                                <option value="new" {{ $lead->status === 'new' ? 'selected' : '' }}>new</option>
                                                <option value="contacted" {{ $lead->status === 'contacted' ? 'selected' : '' }}>contacted</option>
                                                <option value="negotiating" {{ $lead->status === 'negotiating' ? 'selected' : '' }}>negotiating</option>
                                                <option value="converted" {{ $lead->status === 'converted' ? 'selected' : '' }}>converted</option>
                                                <option value="lost" {{ $lead->status === 'lost' ? 'selected' : '' }}>lost</option>
                                            </select>
                                            <button type="submit" class="lime-pill px-2.5 py-1 rounded-lg text-[10px] font-bold">
                                                Simpan
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>

        <!-- Section 3: Blog Posts & Content Management -->
        <div class="studio-card-dark p-6 sm:p-8 rounded-3xl border border-purple-400/20 shadow-xl space-y-4">
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 pb-3 border-b border-purple-500/20">
                <div>
                    <span class="text-xs font-mono font-bold text-[#C8F169] uppercase">EDUKASI &amp; ARTIKEL SEO</span>
                    <h3 class="text-lg font-bold text-white mt-0.5">Daftar Artikel Pengetahuan Digital Webkita</h3>
                </div>
                <div class="flex items-center gap-2">
                    <a href="{{ route('admin.blog.create') }}" class="lime-pill px-4 py-2 rounded-full text-xs font-bold">
                        + Tulis Artikel Baru
                    </a>
                    <a href="{{ route('blog.index') }}" class="glass-pill px-4 py-2 rounded-full text-xs font-semibold hover:text-[#C8F169]">
                        Lihat Blog Publik &rarr;
                    </a>
                </div>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left text-xs text-purple-100">
                    <thead>
                        <tr class="border-b border-purple-500/20 text-purple-300 font-mono text-[11px]">
                            <th class="pb-3 pr-4">Judul Artikel</th>
                            <th class="pb-3 pr-4">Kategori</th>
                            <th class="pb-3 pr-4">Penulis</th>
                            <th class="pb-3 pr-4">Waktu Baca</th>
                            <th class="pb-3 pr-4">Dibaca</th>
                            <th class="pb-3 text-right">Tindakan</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-purple-500/10">
                        @foreach ($recentPosts as $post)
                            <tr>
                                <td class="py-3.5 pr-4 font-bold text-white max-w-sm">
                                    {{ $post->title }}
                                    @if (!$post->is_published)
                                        <span class="ml-2 px-2 py-0.5 rounded text-[9px] font-mono bg-amber-500/20 text-amber-300 uppercase">Draft</span>
                                    @endif
                                </td>
                                <td class="py-3.5 pr-4 font-mono text-[11px] text-[#C8F169]">{{ $post->category ? $post->category->name : '-' }}</td>
                                <td class="py-3.5 pr-4 text-purple-300">{{ $post->author }}</td>
                                <td class="py-3.5 pr-4">{{ $post->reading_time_minutes }} Menit</td>
                                <td class="py-3.5 pr-4 font-mono">{{ $post->views_count }} views</td>
                                <td class="py-3.5 text-right space-x-2">
                                    <a href="{{ route('blog.show', $post->slug) }}" target="_blank" class="text-purple-300 hover:text-white font-bold text-[11px]">
                                        Lihat
                                    </a>
                                    <a href="{{ route('admin.blog.edit', $post) }}" class="text-[#C8F169] hover:underline font-bold text-[11px]">
                                        Edit
                                    </a>
                                    <form action="{{ route('admin.blog.destroy', $post) }}" method="POST" class="inline" onsubmit="return confirm('Hapus artikel ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-400 hover:text-red-300 font-bold text-[11px]">
                                            Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Section 4: Legal Compliance Pages Management -->
        <div class="studio-card-dark p-6 sm:p-8 rounded-3xl border border-purple-400/20 shadow-xl space-y-4">
            <div class="flex items-center justify-between pb-3 border-b border-purple-500/20">
                <div>
                    <span class="text-xs font-mono font-bold text-[#C8F169] uppercase">KEPATUHAN REGULASI &amp; HUKUM</span>
                    <h3 class="text-lg font-bold text-white mt-0.5">Kelola Halaman Legal (UU PDP &amp; SLA Layanan)</h3>
                </div>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left text-xs text-purple-100">
                    <thead>
                        <tr class="border-b border-purple-500/20 text-purple-300 font-mono text-[11px]">
                            <th class="pb-3 pr-4">Nama Dokumen</th>
                            <th class="pb-3 pr-4">URL Publik</th>
                            <th class="pb-3 pr-4">Terakhir Diperbarui</th>
                            <th class="pb-3 text-right">Tindakan</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-purple-500/10">
                        @foreach ($legalPages as $page)
                            <tr>
                                <td class="py-3.5 pr-4 font-bold text-white">{{ $page->title }}</td>
                                <td class="py-3.5 pr-4 font-mono text-[11px] text-purple-300">
                                    /{{ $page->slug === 'privacy-policy' ? 'kebijakan-privasi' : 'syarat-ketentuan' }}
                                </td>
                                <td class="py-3.5 pr-4 text-purple-300">{{ $page->updated_at ? $page->updated_at->format('d/m/Y H:i') : '-' }}</td>
                                <td class="py-3.5 text-right space-x-2">
                                    <a href="{{ $page->slug === 'privacy-policy' ? route('legal.privacy') : route('legal.terms') }}" target="_blank" class="text-purple-300 hover:text-white font-bold text-[11px]">
                                        Buka Publik
                                    </a>
                                    <a href="{{ route('admin.legal.edit', $page) }}" class="lime-pill px-3 py-1 rounded-lg text-[10px] font-bold">
                                        Edit Isi Dokumen
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Section 5: Packages Catalog & Status Management -->
        <div class="studio-card-dark p-6 sm:p-8 rounded-3xl border border-purple-400/20 shadow-xl space-y-4">
            <div class="flex items-center justify-between pb-3 border-b border-purple-500/20">
                <div>
                    <span class="text-xs font-mono font-bold text-[#C8F169] uppercase">ETALASE &amp; PRICING</span>
                    <h3 class="text-lg font-bold text-white mt-0.5">Status Paket Layanan Webkita</h3>
                </div>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left text-xs text-purple-100">
                    <thead>
                        <tr class="border-b border-purple-500/20 text-purple-300 font-mono text-[11px]">
                            <th class="pb-3 pr-4">Nama Paket</th>
                            <th class="pb-3 pr-4">Layanan Induk</th>
                            <th class="pb-3 pr-4">Harga Investasi</th>
                            <th class="pb-3 pr-4">Pengerjaan</th>
                            <th class="pb-3 pr-4">Status</th>
                            <th class="pb-3 text-right">Tindakan</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-purple-500/10">
                        @foreach ($allPackages as $pkg)
                            <tr>
                                <td class="py-3.5 pr-4 font-bold text-white">
                                    {{ $pkg->name }}
                                    @if ($pkg->is_popular)
                                        <span class="ml-1.5 px-2 py-0.5 rounded text-[9px] font-mono bg-[#C8F169]/20 text-[#C8F169] uppercase font-bold">Terpopuler</span>
                                    @endif
                                </td>
                                <td class="py-3.5 pr-4 text-purple-300">{{ $pkg->service ? $pkg->service->name : '-' }}</td>
                                <td class="py-3.5 pr-4 font-mono font-bold text-[#C8F169]">
                                    Rp {{ number_format($pkg->price, 0, ',', '.') }}
                                </td>
                                <td class="py-3.5 pr-4 text-purple-300">{{ $pkg->duration_days }} Hari</td>
                                <td class="py-3.5 pr-4">
                                    <span class="px-2.5 py-1 rounded-full text-[10px] font-bold uppercase {{ $pkg->is_active ? 'bg-emerald-500/20 text-emerald-300' : 'bg-red-500/20 text-red-300' }}">
                                        {{ $pkg->is_active ? 'Aktif' : 'Nonaktif' }}
                                    </span>
                                </td>
                                <td class="py-3.5 text-right">
                                    <form action="{{ route('admin.packages.toggle', $pkg) }}" method="POST" class="inline">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="px-3 py-1 rounded-lg text-[10px] font-bold border border-white/20 hover:bg-white/10 text-white">
                                            {{ $pkg->is_active ? 'Nonaktifkan' : 'Aktifkan' }}
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>

    <!-- Brief Inspector Modal for Admin -->
    <div x-show="viewBrief !== null" 
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-150"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         x-cloak
         class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/80 backdrop-blur-md">
        
        <div @click.away="viewBrief = null" class="max-w-xl w-full bg-[#240B4D] border border-purple-400/30 rounded-3xl p-6 sm:p-8 shadow-2xl space-y-5">
            <div class="flex items-center justify-between pb-3 border-b border-purple-500/20">
                <div>
                    <span class="text-xs font-mono font-bold text-[#C8F169]">DETAIL BRIEF KLIEN</span>
                    <h3 class="text-lg font-bold text-white mt-0.5" x-text="viewBrief?.business_name"></h3>
                </div>
                <button @click="viewBrief = null" class="text-purple-300 hover:text-white p-1 text-sm font-bold">✕</button>
            </div>

            <div class="space-y-4 text-xs">
                <div>
                    <span class="text-purple-400 font-semibold block mb-1">Deskripsi & Tujuan Proyek:</span>
                    <div class="p-3.5 rounded-xl bg-[#1A0630] border border-purple-500/20 text-purple-100 leading-relaxed whitespace-pre-line" x-text="viewBrief?.brief_description"></div>
                </div>

                <div x-show="viewBrief?.reference_links">
                    <span class="text-purple-400 font-semibold block mb-1">Referensi Desain:</span>
                    <div class="p-3 rounded-xl bg-[#1A0630] border border-purple-500/20">
                        <a :href="viewBrief?.reference_links" target="_blank" class="text-[#C8F169] hover:underline break-all" x-text="viewBrief?.reference_links"></a>
                    </div>
                </div>

                <div x-show="viewBrief?.assets_drive_link">
                    <span class="text-purple-400 font-semibold block mb-1">Tautan Aset Google Drive / Cloud:</span>
                    <div class="p-3 rounded-xl bg-[#1A0630] border border-purple-500/20">
                        <a :href="viewBrief?.assets_drive_link" target="_blank" class="text-[#C8F169] hover:underline break-all" x-text="viewBrief?.assets_drive_link"></a>
                    </div>
                </div>
            </div>

            <div class="pt-3 border-t border-purple-500/20 flex justify-end">
                <button type="button" @click="viewBrief = null" class="lime-pill px-5 py-2 rounded-xl text-xs font-bold">
                    Tutup
                </button>
            </div>
        </div>
    </div>

    <!-- Direct Client Notification Modal for Admin -->
    <div x-show="notifyUser !== null" 
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-150"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         x-cloak
         class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/80 backdrop-blur-md">
        
        <div @click.away="notifyUser = null" class="max-w-md w-full bg-[#240B4D] border border-purple-400/30 rounded-3xl p-6 sm:p-8 shadow-2xl space-y-5">
            <div class="flex items-center justify-between pb-3 border-b border-purple-500/20">
                <div>
                    <span class="text-xs font-mono font-bold text-[#C8F169]">KIRIM NOTIFIKASI KLIEN</span>
                    <h3 class="text-base font-bold text-white mt-0.5" x-text="'Klien: ' + notifyUser?.name"></h3>
                </div>
                <button @click="notifyUser = null" class="text-purple-300 hover:text-white p-1 text-sm font-bold">✕</button>
            </div>

            <form :action="'/admin/users/' + notifyUser?.id + '/notifications'" method="POST" class="space-y-4">
                @csrf

                <div>
                    <label class="block text-xs font-mono text-purple-200 uppercase font-bold mb-1">Judul Notifikasi *</label>
                    <input type="text" name="title" required 
                           :value="'Update Proyek ' + (notifyUser?.order_code || '')"
                           placeholder="Contoh: Desain Wireframe Selesai & Siap Direview" 
                           class="w-full px-3.5 py-2.5 rounded-xl bg-[#1A0630] border border-purple-500/30 text-xs text-white focus:outline-none focus:border-[#C8F169]">
                </div>

                <div>
                    <label class="block text-xs font-mono text-purple-200 uppercase font-bold mb-1">Isi Pesan Update *</label>
                    <textarea name="message" rows="4" required 
                              placeholder="Tuliskan perkembangan proyek, instruksi review, atau status go-live website..." 
                              class="w-full px-3.5 py-2.5 rounded-xl bg-[#1A0630] border border-purple-500/30 text-xs text-white focus:outline-none focus:border-[#C8F169] leading-relaxed"></textarea>
                </div>

                <div>
                    <label class="block text-xs font-mono text-purple-200 uppercase font-bold mb-1">Tautan Aksi (Opsional)</label>
                    <input type="text" name="action_url" value="/portal/dashboard" 
                           placeholder="https://... atau /portal/dashboard" 
                           class="w-full px-3.5 py-2.5 rounded-xl bg-[#1A0630] border border-purple-500/30 text-xs text-white focus:outline-none focus:border-[#C8F169]">
                </div>

                <div class="pt-3 border-t border-purple-500/20 flex items-center justify-between">
                    <button type="button" @click="notifyUser = null" class="text-xs text-purple-300 hover:text-white">
                        Batal
                    </button>
                    <button type="submit" class="lime-pill px-5 py-2 rounded-xl text-xs font-bold">
                        Kirim Notifikasi Sekarang
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
