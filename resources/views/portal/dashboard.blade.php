@extends('layouts.app')

@section('title', 'Client Portal — Dashboard Proyek Webkita')
@section('meta_description', 'Portal klien resmi Webkita untuk memantau pengerjaan proyek website dan unggah materi brief.')

@section('content')
<div class="min-h-screen bg-[#381867] text-white pt-28 pb-24 px-4 sm:px-6 lg:px-8" x-data="{ briefModal: false, selectedOrder: null }">
    <!-- Ambient Glow -->
    <div class="absolute top-20 right-10 w-96 h-96 bg-[#C8F169]/10 rounded-full blur-3xl pointer-events-none"></div>

    <div class="max-w-7xl mx-auto relative z-10 space-y-8">
        
        <!-- Top Welcome Bar -->
        <div class="studio-card-dark p-6 sm:p-8 rounded-3xl border border-purple-400/20 flex flex-col md:flex-row items-start md:items-center justify-between gap-6 shadow-2xl">
            <div>
                <span class="text-xs font-mono font-bold tracking-widest text-[#C8F169] uppercase">CLIENT PORTAL</span>
                <h1 class="text-2xl sm:text-3xl font-black text-white mt-1">
                    Selamat Datang, {{ $user->name }}
                </h1>
                <p class="text-xs text-purple-200/80 mt-1">
                    {{ $user->email }} • WhatsApp: {{ $user->whatsapp }}
                </p>
            </div>

            <div class="flex items-center gap-3">
                <a href="{{ url('/#paket') }}" class="glass-pill px-4 py-2.5 rounded-full text-xs font-semibold hover:text-[#C8F169] transition-all">
                    Lihat Paket Lain
                </a>
                
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="px-4 py-2.5 rounded-full bg-white/10 hover:bg-white/20 text-xs font-semibold text-purple-200 transition-all border border-white/15">
                        Keluar
                    </button>
                </form>
            </div>
        </div>

        <!-- Alert Notification -->
        @if (session('success'))
            <div class="p-4 rounded-2xl bg-[#C8F169]/20 border border-[#C8F169]/40 text-xs text-[#C8F169] font-bold">
                {{ session('success') }}
            </div>
        @endif

        <!-- Visual Milestone Progress Flow (5 Steps) -->
        <div class="studio-card-dark p-6 sm:p-8 rounded-3xl border border-purple-400/20 shadow-xl">
            <span class="text-xs font-mono font-bold tracking-widest text-purple-300 uppercase mb-4 block">ALUR PENGERJAAN PROYEK</span>
            
            <div class="grid grid-cols-1 sm:grid-cols-5 gap-3">
                <div class="p-4 rounded-2xl bg-[#1A0630] border border-purple-500/20">
                    <span class="text-xs font-mono font-bold text-[#C8F169]">01</span>
                    <h4 class="text-xs font-bold text-white mt-1">Submit Brief</h4>
                    <p class="text-[11px] text-purple-300 mt-0.5">Pengumpulan materi</p>
                </div>
                <div class="p-4 rounded-2xl bg-[#1A0630] border border-purple-500/20">
                    <span class="text-xs font-mono font-bold text-purple-300">02</span>
                    <h4 class="text-xs font-bold text-white mt-1">Desain UI/UX</h4>
                    <p class="text-[11px] text-purple-300 mt-0.5">Konsep & wireframe</p>
                </div>
                <div class="p-4 rounded-2xl bg-[#1A0630] border border-purple-500/20">
                    <span class="text-xs font-mono font-bold text-purple-300">03</span>
                    <h4 class="text-xs font-bold text-white mt-1">Development</h4>
                    <p class="text-[11px] text-purple-300 mt-0.5">Koding Laravel & responsif</p>
                </div>
                <div class="p-4 rounded-2xl bg-[#1A0630] border border-purple-500/20">
                    <span class="text-xs font-mono font-bold text-purple-300">04</span>
                    <h4 class="text-xs font-bold text-white mt-1">Review & QA</h4>
                    <p class="text-[11px] text-purple-300 mt-0.5">Revisi klien & uji beban</p>
                </div>
                <div class="p-4 rounded-2xl bg-[#1A0630] border border-purple-500/20">
                    <span class="text-xs font-mono font-bold text-[#C8F169]">05</span>
                    <h4 class="text-xs font-bold text-white mt-1">Go-Live</h4>
                    <p class="text-[11px] text-purple-300 mt-0.5">Website online resmi</p>
                </div>
            </div>
        </div>

        <!-- Notifications & Project Updates Center -->
        @if ($notifications->isNotEmpty())
            <div class="studio-card-dark p-6 sm:p-8 rounded-3xl border border-purple-400/20 shadow-xl space-y-4">
                <div class="flex items-center justify-between pb-3 border-b border-purple-500/20">
                    <div>
                        <span class="text-xs font-mono font-bold tracking-widest text-[#C8F169] uppercase">PUSAT NOTIFIKASI</span>
                        <h3 class="text-lg font-bold text-white mt-0.5">Pembaruan Proyek &amp; Status Transaksi</h3>
                    </div>
                    <span class="px-3 py-1 rounded-full text-[10px] font-mono font-bold bg-[#C8F169]/20 text-[#C8F169] border border-[#C8F169]/30">
                        {{ $notifications->where('is_read', false)->count() }} Notifikasi Belum Dibaca
                    </span>
                </div>

                <div class="space-y-3">
                    @foreach ($notifications as $notif)
                        <div class="p-4 rounded-2xl {{ $notif->is_read ? 'bg-[#1A0630]/50 border-purple-500/10' : 'bg-[#1A0630] border-purple-500/30 ring-1 ring-[#C8F169]/30' }} border flex flex-col sm:flex-row sm:items-center justify-between gap-3">
                            <div class="space-y-1">
                                <div class="flex items-center gap-2">
                                    @if (!$notif->is_read)
                                        <span class="w-2 h-2 rounded-full bg-[#C8F169] animate-pulse"></span>
                                        <span class="text-[10px] font-mono font-bold text-[#C8F169] uppercase">BARU</span>
                                    @endif
                                    <h4 class="text-xs font-bold text-white">{{ $notif->title }}</h4>
                                    <span class="text-[10px] text-purple-400 font-mono">{{ $notif->created_at->diffForHumans() }}</span>
                                </div>
                                <p class="text-xs text-purple-200/80 leading-relaxed">{{ $notif->message }}</p>
                            </div>

                            <div class="flex items-center gap-2 shrink-0 self-end sm:self-center">
                                @if ($notif->action_url)
                                    <a href="{{ $notif->action_url }}" class="lime-pill px-3 py-1 rounded-lg text-[10px] font-bold">
                                        Buka Tautan
                                    </a>
                                @endif

                                @if (!$notif->is_read)
                                    <form action="{{ route('portal.notifications.read', $notif) }}" method="POST" class="inline">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="px-3 py-1 rounded-lg text-[10px] text-purple-300 hover:text-white border border-white/10 hover:bg-white/10">
                                            Tandai Dibaca
                                        </button>
                                    </form>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

        <!-- Orders Section -->
        <div class="space-y-4">
            <div class="flex items-center justify-between">
                <h3 class="text-xl font-bold text-white">Daftar Proyek &amp; Pesanan Anda</h3>
                <span class="text-xs text-purple-300">{{ $orders->count() }} Proyek Terdaftar</span>
            </div>

            @if ($orders->isEmpty())
                <!-- Empty State -->
                <div class="studio-card-dark p-12 rounded-3xl border border-purple-400/20 text-center space-y-4">
                    <span class="text-xs font-mono font-bold text-[#C8F169] tracking-widest uppercase">BELUM ADA PROYEK AKTIF</span>
                    <h4 class="text-xl font-bold text-white">Mulai Pesan Website Bisnis Anda Hari Ini</h4>
                    <p class="text-xs text-purple-200/80 max-w-md mx-auto">
                        Pilih paket website yang sesuai dengan kebutuhan bisnis Anda. Konsultasikan langsung dan tim teknis kami siap memulai.
                    </p>
                    <div class="pt-2">
                        <a href="{{ url('/#paket') }}" class="lime-pill inline-flex items-center gap-2 px-6 py-3 rounded-xl text-xs font-black shadow-lg">
                            <span>Pilih Paket Sekarang</span>
                            <span>→</span>
                        </a>
                    </div>
                </div>
            @else
                <!-- Orders Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    @foreach ($orders as $order)
                        <div class="studio-card-dark p-6 rounded-3xl border border-purple-400/20 flex flex-col justify-between space-y-6">
                            <div>
                                <div class="flex items-center justify-between pb-3 border-b border-purple-500/20">
                                    <span class="text-xs font-mono font-bold text-[#C8F169]">{{ $order->order_code }}</span>
                                    <span class="text-[10px] uppercase font-bold tracking-wider px-2.5 py-1 rounded-full 
                                        @if($order->status === 'completed') bg-emerald-500/20 text-emerald-300
                                        @elseif($order->status === 'in_progress') bg-cyan-500/20 text-cyan-300
                                        @elseif($order->status === 'paid') bg-purple-500/20 text-purple-300
                                        @else bg-amber-500/20 text-amber-300 @endif">
                                        Status: {{ $order->status }}
                                    </span>
                                </div>

                                <div class="mt-4">
                                    <h4 class="text-lg font-bold text-white">{{ $order->package ? $order->package->name : 'Paket Kustom' }}</h4>
                                    <p class="text-xs text-purple-300 mt-0.5">Total Investasi: <strong class="text-[#C8F169]">Rp {{ number_format($order->total_price, 0, ',', '.') }}</strong></p>
                                </div>

                                <!-- Brief Status -->
                                <div class="mt-4 p-3.5 rounded-2xl bg-[#1A0630] border border-purple-500/20 text-xs">
                                    @if ($order->brief)
                                        <div class="text-[#C8F169] font-bold">Brief Tersimpan: {{ $order->brief->business_name }}</div>
                                        <p class="text-purple-300/80 text-[11px] mt-1 line-clamp-2">{{ $order->brief->brief_description }}</p>
                                    @else
                                        <div class="text-amber-300 font-semibold">Brief belum diisi</div>
                                        <p class="text-[11px] text-purple-400 mt-0.5">Unggah deskripsi bisnis agar pengerjaan segera dimulai.</p>
                                    @endif
                                </div>
                            </div>

                            <div class="pt-4 border-t border-purple-500/20 flex items-center justify-between gap-3">
                                @if ($order->status === 'unpaid')
                                    <a href="{{ route('checkout.payment', $order->order_code) }}" 
                                       class="lime-pill px-4 py-2.5 rounded-xl text-xs font-bold flex-1 text-center shadow-md">
                                        Bayar Sekarang (Rp {{ number_format($order->total_price, 0, ',', '.') }}) →
                                    </a>
                                @else
                                    <button type="button" 
                                            @click="selectedOrder = {{ $order->id }}; briefModal = true"
                                            class="lime-pill px-4 py-2.5 rounded-xl text-xs font-bold flex-1 text-center">
                                        {{ $order->brief ? 'Perbarui Brief Proyek' : 'Isi Brief Proyek' }}
                                    </button>
                                @endif

                                <div class="flex items-center gap-2">
                                    <a href="{{ route('portal.orders.invoice', $order) }}" 
                                       target="_blank"
                                       class="glass-pill px-3 py-2.5 rounded-xl text-xs font-semibold text-purple-200 hover:text-white">
                                        Invoice
                                    </a>

                                    <a href="https://wa.me/6281288990536?text=Halo%20Webkita,%20saya%20ingin%20cek%20update%20pesanan%20nomor%20{{ $order->order_code }}." 
                                       target="_blank" 
                                       class="glass-pill px-3 py-2.5 rounded-xl text-xs font-bold text-purple-200 hover:text-white">
                                        Tanya WA
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>

        <!-- Available Packages Reference -->
        <div class="pt-6">
            <h3 class="text-base font-bold text-white mb-4">Pilihan Paket Web Development Webkita</h3>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @foreach ($availablePackages as $pkg)
                    <div class="p-6 rounded-3xl bg-[#200A40] border border-purple-500/20 flex flex-col justify-between">
                        <div>
                            <span class="text-xs font-mono font-bold text-[#C8F169] uppercase">PAKET RESMI</span>
                            <h4 class="text-lg font-bold text-white mt-1">{{ $pkg->name }}</h4>
                            <p class="text-xs text-purple-300 font-bold mt-1">Rp {{ number_format($pkg->price, 0, ',', '.') }}</p>
                            <p class="text-xs text-purple-200/80 mt-2">{{ $pkg->tagline }}</p>
                        </div>
                        <div class="pt-4 mt-4 border-t border-purple-500/20">
                            <a href="{{ route('checkout.show', $pkg->slug) }}" 
                               class="lime-pill block w-full text-center py-2.5 rounded-xl text-xs font-bold">
                                Pesan Paket Ini Sekarang →
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Referral Program Affiliate Section -->
        <div class="studio-card-dark p-6 sm:p-8 rounded-3xl border border-purple-400/20 shadow-xl" 
             x-data="{ copied: false, refLink: '{{ url('/?ref=' . ($user->referral_code ?? 'WK-PARTNER')) }}' }">
            <div class="flex flex-col md:flex-row items-start md:items-center justify-between gap-6">
                <div class="space-y-2 max-w-xl">
                    <span class="text-xs font-mono font-bold tracking-widest text-[#C8F169] uppercase">PROGRAM REFERRAL & AFILIASI</span>
                    <h3 class="text-xl font-bold text-white">Bagikan & Dapatkan Komisi Rp 100.000</h3>
                    <p class="text-xs text-purple-200/90 leading-relaxed">
                        Ajak rekan bisnis, klien, atau kenalan Anda membuat website di Webkita. Dapatkan saldo komisi tunai Rp 100.000 untuk setiap pesanan website yang berhasil lunas menggunakan tautan atau kode referral Anda.
                    </p>
                </div>

                <div class="bg-[#1A0630] border border-purple-500/30 rounded-2xl p-5 w-full md:w-auto text-left md:text-right shrink-0 space-y-2">
                    <span class="text-xs text-purple-300 block">Kode Referral Anda</span>
                    <span class="font-mono text-xl font-black text-[#C8F169] block tracking-wider">
                        {{ $user->referral_code ?? 'WK-PARTNER' }}
                    </span>
                    <div class="flex items-center gap-2 pt-1">
                        <button type="button" 
                                @click="navigator.clipboard.writeText(refLink); copied = true; setTimeout(() => copied = false, 2500)"
                                class="lime-pill px-4 py-2 rounded-xl text-xs font-bold flex-1 text-center">
                            <span x-show="!copied">Salin Tautan Referral</span>
                            <span x-show="copied" x-cloak>Tersalin ke Clipboard!</span>
                        </button>
                        <a :href="'https://wa.me/?text=' + encodeURIComponent('Halo, buat website bisnis resmi bergaransi di Webkita melalui tautan ini: ' + refLink)" 
                           target="_blank" 
                           class="glass-pill px-3 py-2 rounded-xl text-xs text-purple-200 hover:text-white shrink-0">
                            Bagikan WA
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Brief Submission Modal -->
    <div x-show="briefModal" 
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-150"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         x-cloak
         class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/75 backdrop-blur-md">
        
        <div @click.away="briefModal = false" class="max-w-lg w-full bg-[#240B4D] border border-purple-400/30 rounded-3xl p-6 sm:p-8 shadow-2xl space-y-6">
            <div class="flex items-center justify-between pb-3 border-b border-purple-500/20">
                <div>
                    <span class="text-xs font-mono font-bold text-[#C8F169]">PROJECT BRIEF</span>
                    <h3 class="text-lg font-bold text-white mt-0.5">Unggah Brief Website Anda</h3>
                </div>
                <button @click="briefModal = false" class="text-purple-300 hover:text-white p-1">✕</button>
            </div>

            <form :action="'/portal/orders/' + selectedOrder + '/brief'" method="POST" class="space-y-4">
                @csrf

                <div>
                    <label class="block text-xs font-semibold text-purple-200 mb-1">Nama Bisnis / Brand *</label>
                    <input type="text" name="business_name" required placeholder="Contoh: KopiKita Roastery"
                           class="w-full px-3.5 py-2.5 rounded-xl bg-[#1A0630] border border-purple-500/30 text-xs text-white focus:outline-none focus:border-[#C8F169]">
                </div>

                <div>
                    <label class="block text-xs font-semibold text-purple-200 mb-1">Deskripsi & Tujuan Website *</label>
                    <textarea name="brief_description" rows="4" required placeholder="Jelaskan produk, target audiens, dan pesan utama yang ingin disampaikan..."
                              class="w-full px-3.5 py-2.5 rounded-xl bg-[#1A0630] border border-purple-500/30 text-xs text-white focus:outline-none focus:border-[#C8F169]"></textarea>
                </div>

                <div>
                    <label class="block text-xs font-semibold text-purple-200 mb-1">Link Referensi Desain / Website Contoh (Opsional)</label>
                    <input type="text" name="reference_links" placeholder="https://contoh-website.com"
                           class="w-full px-3.5 py-2.5 rounded-xl bg-[#1A0630] border border-purple-500/30 text-xs text-white focus:outline-none focus:border-[#C8F169]">
                </div>

                <div>
                    <label class="block text-xs font-semibold text-purple-200 mb-1">Link Google Drive Logo & Foto Produk (Opsional)</label>
                    <input type="url" name="assets_drive_link" placeholder="https://drive.google.com/..."
                           class="w-full px-3.5 py-2.5 rounded-xl bg-[#1A0630] border border-purple-500/30 text-xs text-white focus:outline-none focus:border-[#C8F169]">
                </div>

                <div class="pt-2 flex items-center justify-end gap-3">
                    <button type="button" @click="briefModal = false" class="px-4 py-2.5 rounded-xl text-xs text-purple-300 hover:text-white">
                        Batal
                    </button>
                    <button type="submit" class="lime-pill px-6 py-2.5 rounded-xl text-xs font-bold">
                        Simpan Brief
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
