@extends('layouts.app')

@section('title', 'Form Pemesanan Paket ' . $package->name . ' — Webkita')
@section('meta_description', 'Pemesanan resmi paket web development profesional Webkita dengan garansi pengerjaan dan SLA terjamin.')

@section('content')
<div class="relative overflow-hidden bg-[#381867] text-white pt-28 pb-24 px-4 sm:px-6 lg:px-8">
    <!-- Ambient Glow -->
    <div class="absolute -top-24 -left-24 w-96 h-96 bg-[#C8F169]/10 rounded-full blur-3xl pointer-events-none"></div>
    <div class="absolute bottom-10 right-10 w-96 h-96 bg-purple-500/15 rounded-full blur-3xl pointer-events-none"></div>

    <div class="max-w-5xl mx-auto relative z-10 space-y-10">
        
        <!-- Breadcrumb & Header Frame -->
        <div class="relative rounded-3xl bg-gradient-to-br from-[#451C7E] via-[#351563] to-[#240B4D] border border-white/15 p-8 sm:p-12 shadow-2xl overflow-hidden">
            <div class="frame-corner frame-corner-tl"></div>
            <div class="frame-corner frame-corner-tr"></div>
            <div class="frame-corner frame-corner-bl"></div>
            <div class="frame-corner frame-corner-br"></div>

            <div class="flex flex-col md:flex-row md:items-center justify-between gap-6">
                <div class="space-y-2">
                    <span class="text-xs font-mono font-bold tracking-widest text-[#C8F169] uppercase">CHECKOUT PESANAN RESMI</span>
                    <h1 class="text-2xl sm:text-4xl font-black text-white">
                        Pemesanan Paket: <span class="text-[#C8F169]">{{ $package->name }}</span>
                    </h1>
                    <p class="text-xs sm:text-sm text-purple-200/90 max-w-xl">
                        {{ $package->tagline }}. Isi formulir di bawah ini untuk memulai perancangan website bisnis Anda.
                    </p>
                </div>

                <div class="bg-[#1A0630] border border-purple-500/30 rounded-2xl p-5 text-right shrink-0">
                    <span class="text-xs text-purple-300 block">Total Investasi</span>
                    <span class="text-2xl sm:text-3xl font-black text-[#C8F169]">
                        Rp {{ number_format($package->price, 0, ',', '.') }}
                    </span>
                    <span class="text-[11px] text-purple-400 block mt-0.5">Sudah termasuk domain & cloud hosting</span>
                </div>
            </div>
        </div>

        <!-- Checkout Grid: Form (Left) & Package Summary (Right) -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
            
            <!-- Left Column: Form -->
            <div class="lg:col-span-7">
                <div class="studio-card-dark p-8 rounded-3xl border border-purple-400/20 shadow-2xl">
                    <div class="pb-6 mb-6 border-b border-purple-500/20">
                        <span class="text-xs font-mono font-bold text-[#C8F169] uppercase tracking-wider">LANGKAH 01 DARI 02</span>
                        <h2 class="text-lg font-bold text-white mt-1">Data Pemesan & Spesifikasi Domain</h2>
                    </div>

                    @if ($errors->any())
                        <div class="mb-6 p-4 rounded-xl bg-red-500/20 border border-red-500/30 text-xs text-red-200 space-y-1">
                            @foreach ($errors->all() as $err)
                                <div>• {{ $err }}</div>
                            @endforeach
                        </div>
                    @endif

                    <form action="{{ route('checkout.process', $package->slug) }}" method="POST" class="space-y-5">
                        @csrf

                        <div>
                            <label class="block text-xs font-semibold text-purple-200 mb-1.5">
                                Nama Lengkap / Nama Penanggung Jawab *
                            </label>
                            <input type="text" 
                                   name="customer_name" 
                                   required 
                                   value="{{ old('customer_name', $user?->name) }}"
                                   placeholder="Contoh: Budi Santoso"
                                   class="w-full px-4 py-3 rounded-xl bg-[#1A0630] border border-purple-500/30 text-xs text-white placeholder-purple-400/50 focus:outline-none focus:border-[#C8F169] transition-all">
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-xs font-semibold text-purple-200 mb-1.5">
                                    Alamat Email Aktif *
                                </label>
                                <input type="email" 
                                       name="customer_email" 
                                       required 
                                       value="{{ old('customer_email', $user?->email) }}"
                                       placeholder="nama@perusahaan.com"
                                       class="w-full px-4 py-3 rounded-xl bg-[#1A0630] border border-purple-500/30 text-xs text-white placeholder-purple-400/50 focus:outline-none focus:border-[#C8F169] transition-all">
                            </div>

                            <div>
                                <label class="block text-xs font-semibold text-purple-200 mb-1.5">
                                    Nomor WhatsApp Aktif *
                                </label>
                                <input type="text" 
                                       name="customer_whatsapp" 
                                       required 
                                       value="{{ old('customer_whatsapp', $user?->whatsapp) }}"
                                       placeholder="081234567890"
                                       class="w-full px-4 py-3 rounded-xl bg-[#1A0630] border border-purple-500/30 text-xs text-white placeholder-purple-400/50 focus:outline-none focus:border-[#C8F169] transition-all">
                            </div>
                        </div>

                        <div>
                            <label class="block text-xs font-semibold text-purple-200 mb-1.5">
                                Usulan Nama Domain yang Diinginkan (Opsional)
                            </label>
                            <input type="text" 
                                   name="domain_request" 
                                   value="{{ old('domain_request') }}"
                                   placeholder="Contoh: tokobunga.id atau cafekita.com"
                                   class="w-full px-4 py-3 rounded-xl bg-[#1A0630] border border-purple-500/30 text-xs text-white placeholder-purple-400/50 focus:outline-none focus:border-[#C8F169] transition-all">
                            <span class="text-[11px] text-purple-300 mt-1 block">Tim kami akan mengecek ketersediaan nama domain ini secara cuma-cuma.</span>
                        </div>

                        @guest
                            <div>
                                <label class="block text-xs font-semibold text-purple-200 mb-1.5">
                                    Password Akun Client Portal (Opsional)
                                </label>
                                <input type="password" 
                                       name="password" 
                                       placeholder="Minimal 6 karakter untuk akses dashboard klien"
                                       class="w-full px-4 py-3 rounded-xl bg-[#1A0630] border border-purple-500/30 text-xs text-white placeholder-purple-400/50 focus:outline-none focus:border-[#C8F169] transition-all">
                                <span class="text-[11px] text-purple-300 mt-1 block">Jika dikosongkan, sistem akan membuatkan akun otomatis dan mengirimkan akses via email/WhatsApp.</span>
                            </div>
                        @endguest

                        <div>
                            <label class="block text-xs font-semibold text-purple-200 mb-1.5">
                                Catatan / Permintaan Khusus Proyek (Opsional)
                            </label>
                            <textarea name="notes" 
                                      rows="3" 
                                      placeholder="Tuliskan jika ada referensi desain atau tenggat waktu khusus..."
                                      class="w-full px-4 py-3 rounded-xl bg-[#1A0630] border border-purple-500/30 text-xs text-white placeholder-purple-400/50 focus:outline-none focus:border-[#C8F169] transition-all">{{ old('notes') }}</textarea>
                        </div>

                        <div class="pt-4 border-t border-purple-500/20">
                            <button type="submit" 
                                    class="lime-pill w-full py-4 rounded-xl text-center text-xs font-extrabold shadow-lg shadow-[#C8F169]/30 flex items-center justify-center gap-2 group">
                                <span>Lanjut ke Konfirmasi Pembayaran</span>
                                <span class="w-5 h-5 rounded-full bg-[#1E0A38] text-[#C8F169] flex items-center justify-center text-xs group-hover:translate-x-1 transition-transform">→</span>
                            </button>
                            <p class="text-[11px] text-purple-300/80 text-center mt-3">
                                Dengan melanjutkan, Anda menyetujui Syarat & Ketentuan serta Kebijakan Privasi Webkita Studio.
                            </p>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Right Column: Package Details & SLA -->
            <div class="lg:col-span-5 space-y-6">
                <!-- Package Summary Card -->
                <div class="studio-card-dark p-8 rounded-3xl border border-purple-400/20 shadow-2xl space-y-6">
                    <div>
                        <span class="text-xs font-mono font-bold text-[#C8F169] uppercase tracking-wider">RINGKASAN PAKET</span>
                        <h3 class="text-xl font-bold text-white mt-1">{{ $package->name }}</h3>
                        <p class="text-xs text-purple-200 mt-1">{{ $package->tagline }}</p>
                    </div>

                    <div class="p-4 rounded-2xl bg-[#1A0630] border border-purple-500/30 space-y-2 text-xs">
                        <div class="flex justify-between text-purple-200">
                            <span>Estimasi Pengerjaan:</span>
                            <span class="font-bold text-white">{{ $package->duration_days }} Hari Kerja</span>
                        </div>
                        <div class="flex justify-between text-purple-200">
                            <span>Batas Revisi Desain:</span>
                            <span class="font-bold text-white">{{ $package->revision_count }} Kali Revisi</span>
                        </div>
                        <div class="flex justify-between text-purple-200">
                            <span>Garansi Pemeliharaan:</span>
                            <span class="font-bold text-[#C8F169]">14-30 Hari Pasca Rilis</span>
                        </div>
                    </div>

                    <!-- Included Features -->
                    <div>
                        <span class="text-xs font-bold text-white uppercase tracking-wider mb-3 block">Fitur yang Didapatkan:</span>
                        <ul class="space-y-2.5 text-xs text-purple-100">
                            @if (!empty($package->features))
                                @foreach ($package->features as $feature)
                                    <li class="flex items-center gap-2.5">
                                        <span class="w-1.5 h-1.5 rounded-full bg-[#C8F169] shrink-0"></span>
                                        <span>{{ $feature }}</span>
                                    </li>
                                @endforeach
                            @endif
                        </ul>
                    </div>

                    <!-- Price Calculation -->
                    <div class="pt-6 border-t border-purple-500/20 space-y-2 text-xs">
                        <div class="flex justify-between text-purple-300">
                            <span>Biaya Pengembangan Web:</span>
                            <span class="text-white">Rp {{ number_format($package->price, 0, ',', '.') }}</span>
                        </div>
                        <div class="flex justify-between text-purple-300">
                            <span>Registrasi Domain (.com / .id):</span>
                            <span class="text-[#C8F169] font-semibold">Gratis (1 Tahun)</span>
                        </div>
                        <div class="flex justify-between text-purple-300">
                            <span>Cloud Hosting SSD NVMe:</span>
                            <span class="text-[#C8F169] font-semibold">Gratis (1 Tahun)</span>
                        </div>
                        <div class="pt-3 border-t border-purple-500/20 flex justify-between items-center text-sm">
                            <span class="font-bold text-white">Total Tagihan:</span>
                            <span class="text-xl font-black text-[#C8F169]">Rp {{ number_format($package->price, 0, ',', '.') }}</span>
                        </div>
                    </div>
                </div>

                <!-- Trust Badges (No Icons, Clean Typographic Box) -->
                <div class="p-6 rounded-3xl bg-[#200A40] border border-purple-500/20 space-y-3 text-xs text-purple-200">
                    <span class="font-mono font-bold text-[#C8F169] uppercase tracking-wider text-[11px] block">JAMINAN KEAMANAN & SLA</span>
                    <p class="leading-relaxed">
                        • Transaksi terlindungi enkripsi SSL 256-bit standar perbankan.<br>
                        • Pembayaran resmi otomatis via QRIS (BCA, Mandiri, GoPay, OVO) & Virtual Account.<br>
                        • Privasi data bisnis terjamin di bawah regulasi UU PDP No. 27/2022.
                    </p>
                </div>
            </div>

        </div>

    </div>
</div>
@endsection
