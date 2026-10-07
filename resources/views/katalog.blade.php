@extends('layouts.app')

@section('title', 'Katalog Layanan & Brosur Resmi — Webkita Studio')
@section('meta_description', 'Katalog resmi paket pembuatan website bisnis, landing page, dan toko online otomatis Webkita Studio. Unduh brosur dan pilih paket sesuai kebutuhan bisnis Anda.')

@section('content')
<div class="relative overflow-hidden bg-[#381867] text-white pt-28 pb-24 px-4 sm:px-6 lg:px-8">
    <!-- Ambient Glow -->
    <div class="absolute -top-24 -left-24 w-96 h-96 bg-[#C8F169]/10 rounded-full blur-3xl pointer-events-none"></div>
    <div class="absolute bottom-10 right-10 w-96 h-96 bg-purple-500/15 rounded-full blur-3xl pointer-events-none"></div>

    <div class="max-w-5xl mx-auto relative z-10 space-y-12">

        <!-- Header Banner -->
        <div class="relative rounded-3xl bg-gradient-to-br from-[#451C7E] via-[#351563] to-[#240B4D] border border-white/15 p-8 sm:p-12 shadow-2xl overflow-hidden">
            <div class="frame-corner frame-corner-tl"></div>
            <div class="frame-corner frame-corner-tr"></div>
            <div class="frame-corner frame-corner-bl"></div>
            <div class="frame-corner frame-corner-br"></div>

            <div class="text-center max-w-2xl mx-auto space-y-4">
                <span class="text-xs font-mono font-bold tracking-widest text-[#C8F169] uppercase">[KATALOG RESMI 2026]</span>
                <h1 class="text-3xl sm:text-5xl font-black text-white tracking-tight leading-tight">
                    Katalog Paket Pembuatan Website <span class="text-[#C8F169]">Webkita</span>
                </h1>
                <p class="text-xs sm:text-sm text-purple-200/90 leading-relaxed">
                    Solusi website bisnis profesional berkecepatan tinggi, siap masuk Google, dan dirancang khusus untuk meningkatkan konversi penjualan produk &amp; jasa Anda.
                </p>
                
                <div class="pt-4 flex flex-wrap items-center justify-center gap-3">
                    <a href="{{ asset('images/katalog-webkita.jpg') }}" download="Katalog-Webkita-Studio.jpg" class="lime-pill px-6 py-3 rounded-full text-xs font-extrabold flex items-center gap-2 shadow-lg shadow-[#C8F169]/25">
                        <span>[UNDUH] Simpan Brosur Gambar HD</span>
                        <span>↓</span>
                    </a>
                    <a href="https://wa.me/6281234567890?text=Halo%20Webkita,%20saya%20tertarik%20dengan%20katalog%20paket%20pembuatan%20website." target="_blank" class="glass-pill px-6 py-3 rounded-full text-xs font-bold text-white flex items-center gap-2">
                        <span class="text-[#C8F169]">[WA]</span>
                        <span>Konsultasi Gratis via WhatsApp</span>
                    </a>
                </div>
            </div>
        </div>

        <!-- Visual Flyer Preview & Quick Order Cards -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
            
            <!-- Left: Visual Flyer Preview -->
            <div class="lg:col-span-5 space-y-4">
                <div class="relative rounded-3xl overflow-hidden border border-white/15 bg-[#270D52]/90 shadow-2xl p-3 group">
                    <img src="{{ asset('images/katalog-webkita.jpg') }}" alt="Brosur Resmi Webkita" class="w-full h-auto rounded-2xl shadow-lg object-cover group-hover:scale-[1.01] transition-transform duration-300">
                </div>
                <div class="p-4 rounded-2xl bg-white/5 border border-white/10 text-center">
                    <p class="text-xs text-purple-200">
                        Brosur siap dibagikan ke WhatsApp Story atau dikirim langsung ke calon klien Anda.
                    </p>
                    <a href="{{ asset('images/katalog-webkita.jpg') }}" target="_blank" class="text-xs font-bold text-[#C8F169] hover:underline mt-1 inline-block">
                        Lihat Gambar Resolusi Penuh →
                    </a>
                </div>
            </div>

            <!-- Right: 3 Packages Details -->
            <div class="lg:col-span-7 space-y-6">
                
                <!-- Package 1: Starter Landing Page -->
                <div class="relative rounded-3xl bg-[#270D52]/90 border border-white/15 p-6 sm:p-7 shadow-xl hover:border-[#C8F169]/50 transition-all">
                    <div class="flex items-start justify-between gap-4 mb-4">
                        <div>
                            <span class="text-[10px] font-mono font-bold text-[#C8F169] uppercase tracking-wider">PAKET 01 — CEPAT &amp; HEMAT</span>
                            <h3 class="text-xl sm:text-2xl font-black text-white mt-0.5">Starter Landing Page</h3>
                            <p class="text-xs text-purple-200/80 mt-1">Cocok untuk promosi 1 produk utama, kampanye iklan, atau portofolio pribadi.</p>
                        </div>
                        <div class="text-right shrink-0">
                            <span class="text-xs text-purple-300 block line-through">Rp 750.000</span>
                            <span class="text-xl sm:text-2xl font-black text-[#C8F169]">Rp 499.000</span>
                            <span class="text-[10px] text-purple-300 block">sekali bayar</span>
                        </div>
                    </div>

                    <ul class="grid grid-cols-1 sm:grid-cols-2 gap-2 text-xs text-purple-200/90 mb-5">
                        <li class="flex items-center gap-2"><span class="text-[#C8F169] font-mono font-bold">[✓]</span> 1 Halaman Responsif Modern</li>
                        <li class="flex items-center gap-2"><span class="text-[#C8F169] font-mono font-bold">[✓]</span> Gratis Domain (.my.id) 1 Tahun</li>
                        <li class="flex items-center gap-2"><span class="text-[#C8F169] font-mono font-bold">[✓]</span> Tombol Pesan Direct WhatsApp</li>
                        <li class="flex items-center gap-2"><span class="text-[#C8F169] font-mono font-bold">[✓]</span> Pengerjaan Kilat 3 Hari Kerja</li>
                    </ul>

                    <div class="flex items-center gap-3 pt-3 border-t border-white/10">
                        <a href="https://wa.me/6281234567890?text=Halo%20Webkita,%20saya%20mau%20pesan%20Paket%20Starter%20Landing%20Page%20(Rp%20499rb)." target="_blank" class="lime-pill px-5 py-2.5 rounded-full text-xs font-bold flex-1 text-center">
                            Pesan Paket Ini via WhatsApp →
                        </a>
                        <a href="{{ route('checkout.show', 'starter') }}" class="glass-pill px-4 py-2.5 rounded-full text-xs font-bold text-white text-center">
                            Checkout Online
                        </a>
                    </div>
                </div>

                <!-- Package 2: Bisnis & UMKM (Most Popular) -->
                <div class="relative rounded-3xl bg-gradient-to-br from-[#351563] to-[#270D52] border-2 border-[#C8F169]/80 p-6 sm:p-7 shadow-2xl relative overflow-hidden">
                    <div class="absolute top-3 right-4 px-3 py-1 rounded-full bg-[#C8F169] text-[#1E0A38] text-[10px] font-black uppercase tracking-wider shadow">
                        PALING DIMINATI
                    </div>

                    <div class="flex items-start justify-between gap-4 mb-4">
                        <div>
                            <span class="text-[10px] font-mono font-bold text-[#C8F169] uppercase tracking-wider">PAKET 02 — KREDIBILITAS PENUH</span>
                            <h3 class="text-xl sm:text-2xl font-black text-white mt-0.5">Bisnis &amp; UMKM Profesional</h3>
                            <p class="text-xs text-purple-200/80 mt-1">Solusi Company Profile lengkap untuk bisnis, klinik, resto, dan kantor jasa.</p>
                        </div>
                        <div class="text-right shrink-0 mt-6 sm:mt-0">
                            <span class="text-xs text-purple-300 block line-through">Rp 1.800.000</span>
                            <span class="text-xl sm:text-2xl font-black text-[#C8F169]">Rp 1.200.000</span>
                            <span class="text-[10px] text-purple-300 block">sekali bayar</span>
                        </div>
                    </div>

                    <ul class="grid grid-cols-1 sm:grid-cols-2 gap-2 text-xs text-purple-200/90 mb-5">
                        <li class="flex items-center gap-2"><span class="text-[#C8F169] font-mono font-bold">[✓]</span> Hingga 5-10 Halaman Lengkap</li>
                        <li class="flex items-center gap-2"><span class="text-[#C8F169] font-mono font-bold">[✓]</span> Domain .com / .id &amp; Hosting 1 Tahun</li>
                        <li class="flex items-center gap-2"><span class="text-[#C8F169] font-mono font-bold">[✓]</span> Integrasi Google Maps &amp; Medsos</li>
                        <li class="flex items-center gap-2"><span class="text-[#C8F169] font-mono font-bold">[✓]</span> Optimasi SEO Google Masuk Halaman 1</li>
                        <li class="flex items-center gap-2"><span class="text-[#C8F169] font-mono font-bold">[✓]</span> Email Bisnis (info@bisnisanda.com)</li>
                        <li class="flex items-center gap-2"><span class="text-[#C8F169] font-mono font-bold">[✓]</span> Pengerjaan 5-7 Hari Kerja</li>
                    </ul>

                    <div class="flex items-center gap-3 pt-3 border-t border-white/10">
                        <a href="https://wa.me/6281234567890?text=Halo%20Webkita,%20saya%20mau%20pesan%20Paket%20Bisnis%20UMKM%20(Rp%201.2jt)." target="_blank" class="lime-pill px-5 py-2.5 rounded-full text-xs font-black flex-1 text-center shadow-lg shadow-[#C8F169]/30">
                            Pesan Paket Bisnis via WhatsApp →
                        </a>
                        <a href="{{ route('checkout.show', 'pro') }}" class="glass-pill px-4 py-2.5 rounded-full text-xs font-bold text-white text-center">
                            Checkout Online
                        </a>
                    </div>
                </div>

                <!-- Package 3: Toko Online Otomatis -->
                <div class="relative rounded-3xl bg-[#270D52]/90 border border-white/15 p-6 sm:p-7 shadow-xl hover:border-[#C8F169]/50 transition-all">
                    <div class="flex items-start justify-between gap-4 mb-4">
                        <div>
                            <span class="text-[10px] font-mono font-bold text-[#C8F169] uppercase tracking-wider">PAKET 03 — TRANSAKSI OTOMATIS</span>
                            <h3 class="text-xl sm:text-2xl font-black text-white mt-0.5">Toko Online Otomatis (E-Commerce)</h3>
                            <p class="text-xs text-purple-200/80 mt-1">Katalog produk tak terbatas, kalkulator ongkir otomatis, dan payment gateway.</p>
                        </div>
                        <div class="text-right shrink-0">
                            <span class="text-xs text-purple-300 block line-through">Rp 3.500.000</span>
                            <span class="text-xl sm:text-2xl font-black text-[#C8F169]">Rp 2.500.000</span>
                            <span class="text-[10px] text-purple-300 block">sekali bayar</span>
                        </div>
                    </div>

                    <ul class="grid grid-cols-1 sm:grid-cols-2 gap-2 text-xs text-purple-200/90 mb-5">
                        <li class="flex items-center gap-2"><span class="text-[#C8F169] font-mono font-bold">[✓]</span> Manajemen Stok &amp; Varian Produk</li>
                        <li class="flex items-center gap-2"><span class="text-[#C8F169] font-mono font-bold">[✓]</span> Pembayaran Otomatis (QRIS, VA, E-Wallet)</li>
                        <li class="flex items-center gap-2"><span class="text-[#C8F169] font-mono font-bold">[✓]</span> Cek Ongkir Otomatis (JNE, J&amp;T, SiCepat)</li>
                        <li class="flex items-center gap-2"><span class="text-[#C8F169] font-mono font-bold">[✓]</span> Notifikasi Pesanan Otomatis ke WhatsApp</li>
                    </ul>

                    <div class="flex items-center gap-3 pt-3 border-t border-white/10">
                        <a href="https://wa.me/6281234567890?text=Halo%20Webkita,%20saya%20mau%20pesan%20Paket%20Toko%20Online%20Otomatis%20(Rp%202.5jt)." target="_blank" class="lime-pill px-5 py-2.5 rounded-full text-xs font-bold flex-1 text-center">
                            Pesan Toko Online via WhatsApp →
                        </a>
                        <a href="{{ route('checkout.show', 'enterprise') }}" class="glass-pill px-4 py-2.5 rounded-full text-xs font-bold text-white text-center">
                            Checkout Online
                        </a>
                    </div>
                </div>

            </div>
        </div>

        <!-- How It Works & Process -->
        <div class="rounded-3xl bg-[#270D52]/80 border border-white/10 p-8 sm:p-10 space-y-6">
            <div class="text-center max-w-xl mx-auto space-y-2">
                <span class="text-xs font-mono font-bold text-[#C8F169] uppercase tracking-wider">ALUR KERJA TERSTRUKTUR</span>
                <h2 class="text-2xl sm:text-3xl font-black text-white">3 Langkah Mudah Pembuatan Website</h2>
                <p class="text-xs text-purple-200/80">Anda cukup siapkan materi bisnis, seluruh urusan teknis ditangani tim Webkita.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 pt-4">
                <div class="p-6 rounded-2xl bg-white/5 border border-white/10 space-y-3">
                    <span class="text-2xl font-black font-mono text-[#C8F169]">01.</span>
                    <h3 class="text-base font-bold text-white">Konsultasi &amp; Penyerahan Bahan</h3>
                    <p class="text-xs text-purple-200/80 leading-relaxed">
                        Diskusikan kebutuhan, pilih paket, dan kirimkan logo, foto produk, serta kontak usaha Anda melalui WhatsApp.
                    </p>
                </div>
                <div class="p-6 rounded-2xl bg-white/5 border border-white/10 space-y-3">
                    <span class="text-2xl font-black font-mono text-[#C8F169]">02.</span>
                    <h3 class="text-base font-bold text-white">Desain &amp; Pengembangan</h3>
                    <p class="text-xs text-purple-200/80 leading-relaxed">
                        Tim Webkita merancang UI/UX, mengonfigurasi domain, dan menyusun konten dalam waktu 3–7 hari kerja.
                    </p>
                </div>
                <div class="p-6 rounded-2xl bg-white/5 border border-white/10 space-y-3">
                    <span class="text-2xl font-black font-mono text-[#C8F169]">03.</span>
                    <h3 class="text-base font-bold text-white">Peluncuran &amp; Garansi</h3>
                    <p class="text-xs text-purple-200/80 leading-relaxed">
                        Website online resmi, serah terima akun admin, panduan kelola, dan garansi maintenance teknis.
                    </p>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
