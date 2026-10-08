@extends('layouts.app')

@section('title', 'Webkita — UI/UX & Web Development Studio Profesional')
@section('meta_description', 'Studio UI/UX and Web Development profesional berbasis Laravel. Menghadirkan desain seamless, user-centered, dan problem solving untuk pertumbuhan bisnis Anda.')

@section('content')
<div class="relative overflow-hidden bg-[#381867] text-white">

    <!-- HERO PRESENTATION FRAME SECTION (Mirroring Reference UI/UX) -->
    <section id="beranda" class="relative pt-24 pb-16 md:pt-28 md:pb-24 px-3 sm:px-6 lg:px-8">
        
        <!-- Presentation Slide Container with Camera Frame Corners -->
        <div class="max-w-7xl mx-auto relative rounded-3xl sm:rounded-[36px] bg-gradient-to-br from-[#451C7E] via-[#351563] to-[#240B4D] border border-white/15 p-6 sm:p-10 lg:p-14 shadow-2xl overflow-hidden">
            
            <!-- White Corner Brackets (Reference Presentation Frame) -->
            <div class="frame-corner frame-corner-tl"></div>
            <div class="frame-corner frame-corner-tr"></div>
            <div class="frame-corner frame-corner-bl"></div>
            <div class="frame-corner frame-corner-br"></div>

            <!-- Ambient Glow Backgrounds -->
            <div class="absolute -top-24 -left-24 w-96 h-96 bg-[#C8F169]/10 rounded-full blur-3xl pointer-events-none"></div>
            <div class="absolute -bottom-24 -right-24 w-96 h-96 bg-purple-500/20 rounded-full blur-3xl pointer-events-none"></div>

            <!-- Top Header Inside Slide (Dot Matrix & Nav Pills from Reference) -->
            <div class="flex flex-wrap items-center justify-between gap-4 pb-8 mb-4 border-b border-white/10 relative z-10">
                <!-- Dot Grid Matrix (Top-Left Decor from Reference) -->
                <div class="flex items-center gap-4">
                    <div class="grid grid-cols-4 gap-1.5 opacity-60">
                        <span class="w-1.5 h-1.5 rounded-full bg-white"></span>
                        <span class="w-1.5 h-1.5 rounded-full bg-white"></span>
                        <span class="w-1.5 h-1.5 rounded-full bg-white"></span>
                        <span class="w-1.5 h-1.5 rounded-full bg-white"></span>
                        <span class="w-1.5 h-1.5 rounded-full bg-white"></span>
                        <span class="w-1.5 h-1.5 rounded-full bg-white"></span>
                        <span class="w-1.5 h-1.5 rounded-full bg-white"></span>
                        <span class="w-1.5 h-1.5 rounded-full bg-white"></span>
                        <span class="w-1.5 h-1.5 rounded-full bg-white"></span>
                        <span class="w-1.5 h-1.5 rounded-full bg-white"></span>
                        <span class="w-1.5 h-1.5 rounded-full bg-white"></span>
                        <span class="w-1.5 h-1.5 rounded-full bg-white"></span>
                    </div>
                    <span class="text-xs font-semibold tracking-wider text-purple-200/70 hidden sm:inline-block">WEBKITA STUDIO PRESENTATION</span>
                </div>

                <!-- Slide Navigation Pills (Reference: "Pilih teks", "Vision & Mission", "Contact Us", "Get Started") -->
                <div class="flex flex-wrap items-center gap-2.5">
                    <!-- Text Pill "Pilih teks" -->
                    <div class="px-5 py-2 rounded-full bg-white text-[#230B48] font-bold text-xs shadow-md">
                        <span>Pilih teks</span>
                    </div>

                    <!-- Vision & Mission Pill -->
                    <a href="#vision" class="glass-pill px-4 py-2 rounded-full text-xs font-semibold hover:text-[#C8F169]">
                        Vision & Mission
                    </a>

                    <!-- Contact Us Pill -->
                    <a href="#kontak" class="glass-pill px-4 py-2 rounded-full text-xs font-semibold hover:text-[#C8F169]">
                        Contact Us
                    </a>

                    <!-- Get Started Pill (Electric Lime Pill) -->
                    <a href="#paket" class="lime-pill px-5 py-2 rounded-full text-xs font-black shadow-md flex items-center gap-1.5">
                        <span>Get Started</span>
                    </a>
                </div>
            </div>

            <!-- Slide Body Grid: Left Content & Right Bespoke Illustration -->
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-8 items-center relative z-10">
                
                <!-- Left Column: Typography, Badges & Mosaic Graphics -->
                <div class="lg:col-span-6 space-y-6 text-left">
                    
                    <!-- Giant Display Headline (Electric Lime typography matching reference) -->
                    <div class="relative">
                        <h1 class="text-4xl sm:text-6xl lg:text-7xl font-black text-[#C8F169] tracking-tight leading-[1.05]">
                            UI/UX Portfolio<br>
                            <span class="text-white drop-shadow-sm">Presentation</span>
                        </h1>
                    </div>

                    @php
                        $heroExperiment = \App\Services\AbTestingService::getExperiment('hero_subtitle', [
                            'A' => 'Designing Seamless Digital Journeys: User-Centered & Problem Solving Design',
                            'B' => 'Solusi Website Bisnis Cepat & Andal: Arsitektur Kokoh Berkinerja Tinggi',
                        ]);
                    @endphp

                    <!-- Translucent Subtitle Pill Container (A/B Tested Variant) -->
                    <div class="pt-2">
                        <div class="inline-block p-4 sm:p-5 rounded-2xl bg-white/10 backdrop-blur-md border border-white/20 text-white text-sm sm:text-base font-semibold leading-relaxed shadow-lg max-w-xl">
                            <span>{{ $heroExperiment['value'] }}</span>
                            <span class="block text-[10px] text-[#C8F169]/80 font-mono mt-1">
                                [A/B TEST ACTIVE: VARIAN-{{ $heroExperiment['key'] }}]
                            </span>
                        </div>
                    </div>

                    <!-- Action Capsule Pill Button: "PRESENTATION — 2026 ( → )" -->
                    <div class="pt-2 flex flex-wrap items-center gap-4">
                        <a href="#paket" class="inline-flex items-center gap-3 px-6 py-3.5 rounded-full bg-[#1A0630] border border-white/20 text-white font-bold text-xs uppercase tracking-wider hover:border-[#C8F169] transition-all shadow-xl group">
                            <span>PRESENTATION — 2026</span>
                            <span class="w-6 h-6 rounded-full bg-[#C8F169] text-[#1A0630] flex items-center justify-center font-black text-sm group-hover:translate-x-1 transition-transform">→</span>
                        </a>

                        <a href="https://wa.me/6281288990536?text=Halo%20Webkita,%20saya%20tertarik%20dengan%20layanan%20pembuatan%20website%20dan%20UI/UX." 
                           target="_blank" 
                           class="glass-pill px-5 py-3.5 rounded-full text-xs font-bold text-white hover:text-[#C8F169]">
                            Konsultasi WhatsApp
                        </a>
                    </div>

                    <!-- Lower-Left Graphic Decor: Overlapping Dual Circles & Mosaic Square Tiles (From Reference) -->
                    <div class="pt-8 flex items-end gap-6">
                        <!-- Overlapping Dual Circles -->
                        <div class="flex items-center">
                            <div class="w-12 h-12 rounded-full bg-[#9366E3] opacity-80 backdrop-blur-md border border-white/20 shadow-md"></div>
                            <div class="w-12 h-12 rounded-full bg-[#E6E8F0] -ml-5 shadow-lg border border-white/40"></div>
                        </div>

                        <!-- Stepped Mosaic Geometric Tiles (Purple, Lime, White) -->
                        <div class="grid grid-cols-2 gap-1.5 pb-1">
                            <div class="w-8 h-8 rounded-md bg-[#240B4D] border border-white/10"></div>
                            <div class="w-8 h-8 rounded-md bg-white shadow-md"></div>
                            <div class="w-8 h-8 rounded-md bg-[#C8F169] shadow-sm"></div>
                            <div class="w-8 h-8 rounded-md bg-[#5A249D]"></div>
                        </div>

                        <!-- Mini Credibility Note -->
                        <div class="text-[11px] text-purple-200/70 pb-1 hidden sm:block">
                            <span class="text-[#C8F169] font-bold">120+</span> Proyek Web Selesai & Beroperasi
                        </div>
                    </div>

                </div>

                <!-- Right Column: Bespoke Workspace Visual & Floating Decor -->
                <div class="lg:col-span-6 relative">
                    
                    <!-- Floating Dot Matrix Decor (Middle-Right from reference) -->
                    <div class="absolute -top-6 right-6 grid grid-cols-4 gap-1.5 opacity-60 z-20">
                        <span class="w-1.5 h-1.5 rounded-full bg-white"></span>
                        <span class="w-1.5 h-1.5 rounded-full bg-white"></span>
                        <span class="w-1.5 h-1.5 rounded-full bg-white"></span>
                        <span class="w-1.5 h-1.5 rounded-full bg-white"></span>
                        <span class="w-1.5 h-1.5 rounded-full bg-white"></span>
                        <span class="w-1.5 h-1.5 rounded-full bg-white"></span>
                        <span class="w-1.5 h-1.5 rounded-full bg-white"></span>
                        <span class="w-1.5 h-1.5 rounded-full bg-white"></span>
                    </div>

                    <!-- Main Workspace Artwork Container -->
                    <div class="relative rounded-2xl sm:rounded-3xl overflow-hidden border border-white/20 shadow-2xl bg-[#280C4F]/90 group">
                        
                        <!-- Hero Workspace Artwork (Generated matching reference) -->
                        <img src="{{ asset('images/webkita_hero_workspace.jpg') }}" 
                             alt="UI/UX Workspace Presentation Webkita" 
                             class="w-full h-auto object-cover transform group-hover:scale-[1.02] transition-transform duration-500">

                        <!-- Interactive Floating Badges -->
                        <div class="absolute top-4 left-4 glass-pill px-3 py-1.5 rounded-xl text-[11px] font-bold text-white flex items-center gap-2 shadow-lg">
                            <span class="w-2 h-2 rounded-full bg-[#C8F169] animate-pulse"></span>
                            <span>Live Wireframe Studio</span>
                        </div>

                        <div class="absolute bottom-4 right-4 bg-[#1A0630]/90 backdrop-blur-md border border-white/20 px-4 py-2 rounded-xl text-[11px] font-semibold text-purple-200 flex items-center gap-2 shadow-xl">
                            <span>Powered by</span>
                            <span class="text-[#C8F169] font-extrabold">Laravel 11.x</span>
                        </div>
                    </div>

                    <!-- Bottom Accent Pill Bar -->
                    <div class="mt-4 flex items-center justify-between text-xs text-purple-200/80 px-2">
                        <span class="flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-[#C8F169]"></span> Desain Responsif & Modern</span>
                        <span class="flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-[#C8F169]"></span> Integrasi QRIS & Otomatisasi</span>
                        <span class="flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-[#C8F169]"></span> Pengerjaan Cepat Mulai 3 Hari</span>
                    </div>

                </div>

            </div>

        </div>

    </section>

    <!-- SECTION: VISION & MISSION (No icons, clean typography) -->
    <section id="vision" class="py-20 relative bg-[#270D52]/60 border-y border-purple-500/20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <span class="text-xs font-bold uppercase tracking-widest text-[#C8F169] bg-[#C8F169]/10 px-4 py-1.5 rounded-full border border-[#C8F169]/30 inline-block mb-3">
                    Fondasi & Nilai Kami
                </span>
                <h2 class="text-3xl sm:text-5xl font-black text-white tracking-tight mb-4">
                    Vision & Mission <span class="text-[#C8F169]">Webkita</span>
                </h2>
                <p class="text-base text-purple-200/80 leading-relaxed">
                    Kami tidak hanya membangun baris kode, tapi merancang solusi digital yang berpusat pada pengguna (user-centered) untuk memecahkan hambatan penjualan bisnis Anda.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-stretch">
                <!-- Vision Card -->
                <div class="studio-card-dark p-8 sm:p-10 rounded-3xl border border-purple-400/20 flex flex-col justify-between relative overflow-hidden">
                    <div class="absolute -top-10 -right-10 w-40 h-40 bg-[#C8F169]/10 rounded-full blur-2xl pointer-events-none"></div>
                    <div>
                        <div class="flex items-center justify-between pb-4 mb-5 border-b border-purple-500/20">
                            <span class="text-xs font-mono font-bold tracking-widest text-[#C8F169] uppercase">01 / VISI STRATEGIS</span>
                            <span class="text-[10px] uppercase tracking-wider px-3 py-1 rounded-full bg-white/10 text-purple-200 font-semibold">Tujuan Jangka Panjang</span>
                        </div>
                        <h3 class="text-2xl font-bold text-white mb-4">Mendemokratisasi Desain & Teknologi Web Berkelas Dunia</h3>
                        <p class="text-sm text-purple-200/80 leading-relaxed">
                            Menjadi studio digital nomor satu di Indonesia yang memungkinkan setiap UMKM, profesional, dan brand lokal memiliki website berstandar internasional, berkecepatan tinggi, dan terbukti menghasilkan closing tanpa biaya agensi yang memberatkan.
                        </p>
                    </div>
                    <div class="pt-6 mt-6 border-t border-purple-500/20 flex items-center gap-4 text-xs text-[#C8F169] font-semibold">
                        <span>Aksesibel</span>
                        <span class="text-purple-400">•</span>
                        <span>Kredibel</span>
                        <span class="text-purple-400">•</span>
                        <span>Berorientasi Hasil</span>
                    </div>
                </div>

                <!-- Mission Card -->
                <div class="studio-card-dark p-8 sm:p-10 rounded-3xl border border-purple-400/20 flex flex-col justify-between relative overflow-hidden">
                    <div class="absolute -bottom-10 -left-10 w-40 h-40 bg-purple-500/20 rounded-full blur-2xl pointer-events-none"></div>
                    <div>
                        <div class="flex items-center justify-between pb-4 mb-5 border-b border-purple-500/20">
                            <span class="text-xs font-mono font-bold tracking-widest text-white uppercase">02 / MISI UTAMA</span>
                            <span class="text-[10px] uppercase tracking-wider px-3 py-1 rounded-full bg-[#C8F169]/15 text-[#C8F169] font-semibold">3 Pilar Kerja</span>
                        </div>
                        <h3 class="text-2xl font-bold text-white mb-4">Tiga Standar Dalam Setiap Proyek</h3>
                        
                        <div class="space-y-4 text-xs text-purple-100">
                            <div class="pb-3 border-b border-purple-500/15">
                                <span class="font-mono text-[#C8F169] font-bold text-xs mr-2">01.</span>
                                <strong class="text-white">User-Centered & Problem Solving:</strong> Tata letak dan alur dirancang agar pengunjung langsung memahami penawaran dan segera menghubungi Anda.
                            </div>
                            <div class="pb-3 border-b border-purple-500/15">
                                <span class="font-mono text-[#C8F169] font-bold text-xs mr-2">02.</span>
                                <strong class="text-white">High-Performance Engineering:</strong> Kecepatan kilat Laravel 11, mobile-first, dan optimasi Core Web Vitals untuk ranking Google terbaik.
                            </div>
                            <div>
                                <span class="font-mono text-[#C8F169] font-bold text-xs mr-2">03.</span>
                                <strong class="text-white">Transparansi Penuh & Garansi Resmi:</strong> Harga tertera tanpa biaya siluman, termasuk hosting/domain tahun pertama, serta pendampingan purna jual resmi.
                            </div>
                        </div>
                    </div>
                    <div class="pt-6 mt-6 border-t border-purple-500/20 flex items-center justify-between text-xs text-purple-200/70">
                        <span>Pengerjaan Mulai 3 Hari Kerja</span>
                        <a href="#layanan" class="text-[#C8F169] font-bold hover:underline">Jelajahi Layanan →</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- SECTION: LAYANAN UNGGULAN (SERVICES GRID - NO ICONS, PURE TYPOGRAPHY) -->
    <section id="layanan" class="py-24 relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <span class="text-xs font-bold uppercase tracking-widest text-[#C8F169] bg-[#C8F169]/10 px-4 py-1.5 rounded-full border border-[#C8F169]/30 inline-block mb-3">
                    Solusi Spesialis
                </span>
                <h2 class="text-3xl sm:text-5xl font-black text-white tracking-tight mb-4">
                    Layanan Web Development & <span class="text-[#C8F169]">UI/UX</span>
                </h2>
                <p class="text-base text-purple-200/80">
                    Dari landing page promosi produk cepat hingga aplikasi web kustom skala besar, kami siapkan dengan desain modern dan arsitektur kokoh.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                
                <!-- Service 1: Landing Page Iklan (NO ICON) -->
                <div class="studio-glass studio-glass-hover p-8 rounded-3xl flex flex-col justify-between">
                    <div>
                        <div class="flex items-center justify-between pb-4 mb-5 border-b border-purple-500/20">
                            <span class="text-xs font-mono font-bold tracking-widest text-[#C8F169]">01</span>
                            <span class="text-[10px] font-semibold tracking-wider uppercase px-2.5 py-0.5 rounded-full bg-white/10 text-purple-200">3 Hari Kerja</span>
                        </div>
                        <h3 class="text-xl font-bold text-white mb-1">Landing Page Iklan</h3>
                        <p class="text-xs text-[#C8F169] font-semibold mb-3">High-Converting Layout</p>
                        <p class="text-xs text-purple-200/80 leading-relaxed mb-6">
                            Dirancang khusus untuk kampanye iklan Google Ads, TikTok Ads, dan Meta Ads. Fokus 100% mengonversi pengunjung menjadi pesan WhatsApp.
                        </p>
                        <ul class="space-y-2.5 text-xs text-purple-100 mb-6">
                            <li class="flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-[#C8F169]"></span> Copywriting berorientasi aksi</li>
                            <li class="flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-[#C8F169]"></span> Loading di bawah 2 detik</li>
                            <li class="flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-[#C8F169]"></span> Direct WhatsApp CTA</li>
                        </ul>
                    </div>
                    <a href="#paket" class="lime-pill px-4 py-2.5 rounded-xl text-center text-xs font-bold flex items-center justify-center gap-2">
                        <span>Pilih Paket Kilat</span> <span>→</span>
                    </a>
                </div>

                <!-- Service 2: Company Profile (NO ICON) -->
                <div class="studio-glass studio-glass-hover p-8 rounded-3xl flex flex-col justify-between">
                    <div>
                        <div class="flex items-center justify-between pb-4 mb-5 border-b border-purple-500/20">
                            <span class="text-xs font-mono font-bold tracking-widest text-white">02</span>
                            <span class="text-[10px] font-semibold tracking-wider uppercase px-2.5 py-0.5 rounded-full bg-white/10 text-purple-200">5 Hari Kerja</span>
                        </div>
                        <h3 class="text-xl font-bold text-white mb-1">Company Profile</h3>
                        <p class="text-xs text-purple-300 font-semibold mb-3">Kredibilitas Bisnis & Jasa</p>
                        <p class="text-xs text-purple-200/80 leading-relaxed mb-6">
                            Membangun reputasi terpercaya untuk CV, PT, kantor konsultan, klinik, dan jasa profesional. Lengkap dengan portofolio dan legalitas.
                        </p>
                        <ul class="space-y-2.5 text-xs text-purple-100 mb-6">
                            <li class="flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-[#C8F169]"></span> Hingga 5-10 halaman eksklusif</li>
                            <li class="flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-[#C8F169]"></span> Google Maps & Form Kontak</li>
                            <li class="flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-[#C8F169]"></span> Optimasi SEO Google Organik</li>
                        </ul>
                    </div>
                    <a href="#paket" class="lime-pill px-4 py-2.5 rounded-xl text-center text-xs font-bold flex items-center justify-center gap-2">
                        <span>Pilih Paket Bisnis</span> <span>→</span>
                    </a>
                </div>

                <!-- Service 3: Toko Online Otomatis (NO ICON) -->
                <div class="studio-glass studio-glass-hover p-8 rounded-3xl flex flex-col justify-between">
                    <div>
                        <div class="flex items-center justify-between pb-4 mb-5 border-b border-purple-500/20">
                            <span class="text-xs font-mono font-bold tracking-widest text-[#C8F169]">03</span>
                            <span class="text-[10px] font-semibold tracking-wider uppercase px-2.5 py-0.5 rounded-full bg-white/10 text-purple-200">8 Hari Kerja</span>
                        </div>
                        <h3 class="text-xl font-bold text-white mb-1">Toko Online Otomatis</h3>
                        <p class="text-xs text-[#C8F169] font-semibold mb-3">E-Commerce Lengkap</p>
                        <p class="text-xs text-purple-200/80 leading-relaxed mb-6">
                            Terima pesanan 24 jam nonstop dengan sistem pembayaran otomatis (QRIS instan, Transfer VA) dan cek ongkir ekspedisi se-Indonesia.
                        </p>
                        <ul class="space-y-2.5 text-xs text-purple-100 mb-6">
                            <li class="flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-[#C8F169]"></span> Payment Gateway QRIS & VA</li>
                            <li class="flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-[#C8F169]"></span> Hitung ongkir JNE/J&T/SiCepat</li>
                            <li class="flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-[#C8F169]"></span> Manajemen stok & order</li>
                        </ul>
                    </div>
                    <a href="#paket" class="lime-pill px-4 py-2.5 rounded-xl text-center text-xs font-bold flex items-center justify-center gap-2">
                        <span>Pilih Paket Toko</span> <span>→</span>
                    </a>
                </div>

                <!-- Service 4: Custom Web App (NO ICON) -->
                <div class="studio-glass studio-glass-hover p-8 rounded-3xl flex flex-col justify-between">
                    <div>
                        <div class="flex items-center justify-between pb-4 mb-5 border-b border-purple-500/20">
                            <span class="text-xs font-mono font-bold tracking-widest text-white">04</span>
                            <span class="text-[10px] font-semibold tracking-wider uppercase px-2.5 py-0.5 rounded-full bg-white/10 text-purple-200">Arsitektur Kustom</span>
                        </div>
                        <h3 class="text-xl font-bold text-white mb-1">Custom Web App</h3>
                        <p class="text-xs text-purple-300 font-semibold mb-3">Laravel 11 Architecture</p>
                        <p class="text-xs text-purple-200/80 leading-relaxed mb-6">
                            Solusi sistem manajemen khusus seperti portal membership, booking janji klinik, sistem inventaris gudang, atau CRM bisnis kustom.
                        </p>
                        <ul class="space-y-2.5 text-xs text-purple-100 mb-6">
                            <li class="flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-[#C8F169]"></span> Database MySQL Scalable</li>
                            <li class="flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-[#C8F169]"></span> Role admin, staf, & user</li>
                            <li class="flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-[#C8F169]"></span> REST API & Webhook ready</li>
                        </ul>
                    </div>
                    <a href="#kalkulator" class="lime-pill px-4 py-2.5 rounded-xl text-center text-xs font-bold flex items-center justify-center gap-2">
                        <span>Hitung Estimasi Biaya</span> <span>→</span>
                    </a>
                </div>

            </div>
        </div>
    </section>

    <!-- SECTION: PORTOFOLIO INTERAKTIF DENGAN FILTER -->
    <section id="portofolio" class="py-24 bg-[#230B48]/70 border-y border-purple-500/20" x-data="{ activeFilter: 'all' }">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row md:items-end justify-between mb-12 gap-6">
                <div>
                    <span class="text-xs font-bold uppercase tracking-widest text-[#C8F169] bg-[#C8F169]/10 px-4 py-1.5 rounded-full border border-[#C8F169]/30 inline-block mb-3">
                        Portofolio Unggulan
                    </span>
                    <h2 class="text-3xl sm:text-5xl font-black text-white tracking-tight">
                        Karya yang Menghasilkan <span class="text-[#C8F169]">Dampak Nyata</span>
                    </h2>
                </div>

                <!-- Filter Tabs -->
                <div class="flex flex-wrap items-center gap-2 bg-[#1A0630] p-1.5 rounded-2xl border border-purple-500/20">
                    <button @click="activeFilter = 'all'" 
                            :class="activeFilter === 'all' ? 'lime-pill' : 'text-purple-200 hover:text-white'"
                            class="px-4 py-2 rounded-xl text-xs font-bold transition-all">Semua</button>
                    <button @click="activeFilter = 'landing'" 
                            :class="activeFilter === 'landing' ? 'lime-pill' : 'text-purple-200 hover:text-white'"
                            class="px-4 py-2 rounded-xl text-xs font-bold transition-all">Landing Page</button>
                    <button @click="activeFilter = 'company'" 
                            :class="activeFilter === 'company' ? 'lime-pill' : 'text-purple-200 hover:text-white'"
                            class="px-4 py-2 rounded-xl text-xs font-bold transition-all">Company Profile</button>
                    <button @click="activeFilter = 'toko'" 
                            :class="activeFilter === 'toko' ? 'lime-pill' : 'text-purple-200 hover:text-white'"
                            class="px-4 py-2 rounded-xl text-xs font-bold transition-all">Toko Online</button>
                </div>
            </div>

            <!-- Portfolio Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                
                <!-- Item 1: Maya Bakery -->
                <div x-show="activeFilter === 'all' || activeFilter === 'landing'" 
                     x-transition class="studio-card-dark rounded-3xl overflow-hidden border border-purple-400/20 group hover:border-[#C8F169]/40 transition-all">
                    <div class="h-56 bg-gradient-to-tr from-[#1E0A38] via-[#3B1566] to-[#551E8E] p-6 flex flex-col justify-between relative overflow-hidden">
                        <div class="flex justify-between items-start">
                            <span class="px-3 py-1 rounded-full text-[10px] font-bold bg-[#C8F169] text-[#1E0A38]">Landing Page Iklan</span>
                            <span class="text-xs text-purple-200/80">3 Hari Kerja</span>
                        </div>
                        <div>
                            <div class="text-xs text-[#C8F169] font-bold">Hasil Klien:</div>
                            <div class="text-xl font-bold text-white">Maya Artisan Bakery</div>
                            <div class="text-xs text-purple-200 mt-1">Konversi Iklan Naik +185%</div>
                        </div>
                    </div>
                    <div class="p-6">
                        <p class="text-xs text-purple-200/80 leading-relaxed mb-4">
                            Landing page seasonal hampers lebaran dengan tombol direct WhatsApp otomatis dan katalog produk interaktif.
                        </p>
                        <div class="flex items-center justify-between text-xs pt-3 border-t border-purple-500/20">
                            <span class="text-purple-300">F&B / Kuliner UMKM</span>
                            <a href="https://wa.me/6281288990536?text=Halo%20Webkita,%20saya%20tertarik%20dengan%20studi%20kasus%20Maya%20Bakery." target="_blank" class="text-[#C8F169] font-bold hover:underline">Konsultasi Serupa →</a>
                        </div>
                    </div>
                </div>

                <!-- Item 2: Sentosa Logistik -->
                <div x-show="activeFilter === 'all' || activeFilter === 'company'" 
                     x-transition class="studio-card-dark rounded-3xl overflow-hidden border border-purple-400/20 group hover:border-[#C8F169]/40 transition-all">
                    <div class="h-56 bg-gradient-to-tr from-[#1E0A38] via-[#2D1654] to-[#4A1E82] p-6 flex flex-col justify-between relative overflow-hidden">
                        <div class="flex justify-between items-start">
                            <span class="px-3 py-1 rounded-full text-[10px] font-bold bg-white text-[#1E0A38]">Company Profile</span>
                            <span class="text-xs text-purple-200/80">5 Hari Kerja</span>
                        </div>
                        <div>
                            <div class="text-xs text-[#C8F169] font-bold">Hasil Klien:</div>
                            <div class="text-xl font-bold text-white">Sentosa Logistik Nusantara</div>
                            <div class="text-xs text-purple-200 mt-1">Closing Tender Perusahaan B2B</div>
                        </div>
                    </div>
                    <div class="p-6">
                        <p class="text-xs text-purple-200/80 leading-relaxed mb-4">
                            Website profil resmi korporasi logistik dengan 6 halaman, fitur pelacakan armada terintegrasi, dan legalitas resmi.
                        </p>
                        <div class="flex items-center justify-between text-xs pt-3 border-t border-purple-500/20">
                            <span class="text-purple-300">Logistik & Cargo</span>
                            <a href="https://wa.me/6281288990536?text=Halo%20Webkita,%20saya%20tertarik%20dengan%20studi%20kasus%20Sentosa%20Logistik." target="_blank" class="text-[#C8F169] font-bold hover:underline">Konsultasi Serupa →</a>
                        </div>
                    </div>
                </div>

                <!-- Item 3: Lumina Store -->
                <div x-show="activeFilter === 'all' || activeFilter === 'toko'" 
                     x-transition class="studio-card-dark rounded-3xl overflow-hidden border border-purple-400/20 group hover:border-[#C8F169]/40 transition-all">
                    <div class="h-56 bg-gradient-to-tr from-[#1E0A38] via-[#3B1566] to-[#551E8E] p-6 flex flex-col justify-between relative overflow-hidden">
                        <div class="flex justify-between items-start">
                            <span class="px-3 py-1 rounded-full text-[10px] font-bold bg-[#C8F169] text-[#1E0A38]">Toko Online Otomatis</span>
                            <span class="text-xs text-purple-200/80">8 Hari Kerja</span>
                        </div>
                        <div>
                            <div class="text-xs text-[#C8F169] font-bold">Hasil Klien:</div>
                            <div class="text-xl font-bold text-white">Lumina Fashion Store</div>
                            <div class="text-xs text-purple-200 mt-1">2.400+ Order Otomatis / Bulan</div>
                        </div>
                    </div>
                    <div class="p-6">
                        <p class="text-xs text-purple-200/80 leading-relaxed mb-4">
                            Toko online retail pakaian dengan QRIS instan, notifikasi WhatsApp invoice otomatis, dan pencetakan resi pengiriman.
                        </p>
                        <div class="flex items-center justify-between text-xs pt-3 border-t border-purple-500/20">
                            <span class="text-purple-300">Retail & E-Commerce</span>
                            <a href="https://wa.me/6281288990536?text=Halo%20Webkita,%20saya%20tertarik%20dengan%20studi%20kasus%20Lumina%20Store." target="_blank" class="text-[#C8F169] font-bold hover:underline">Konsultasi Serupa →</a>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Video Testimonial & Project Walkthrough Showcase (Sprint 5 Task 5.8) -->
            <div x-data="{ videoModalOpen: false }" class="mt-16 pt-12 border-t border-purple-500/20">
                <div class="relative rounded-3xl bg-gradient-to-r from-[#2B1053] via-[#1E093B] to-[#3B1569] border border-white/15 p-8 sm:p-12 shadow-2xl overflow-hidden">
                    <div class="frame-corner frame-corner-tl"></div>
                    <div class="frame-corner frame-corner-tr"></div>
                    <div class="frame-corner frame-corner-bl"></div>
                    <div class="frame-corner frame-corner-br"></div>

                    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center relative z-10">
                        <div class="lg:col-span-7 space-y-4">
                            <div class="flex items-center gap-3">
                                <span class="px-3 py-1 rounded-full text-[10px] font-mono font-bold tracking-widest bg-[#C8F169] text-[#1E0A38] uppercase">
                                    [STUDI KASUS VIDEO]
                                </span>
                                <span class="text-xs font-mono text-purple-300">DURASI: 03:45 MIN</span>
                            </div>
                            <h3 class="text-2xl sm:text-3xl font-extrabold text-white leading-tight">
                                Transformasi Digital: Dari Desain Figma ke Arsitektur Produksi Laravel
                            </h3>
                            <p class="text-sm text-purple-200/80 leading-relaxed">
                                Simak rekaman komparasi sebelum dan sesudah refaktor sistem untuk PT Sentosa Nusantara. Bagaimana waktu muat dipercepat dari 4.2 detik menjadi 0.8 detik, dan tingkat konversi formulir penawaran meningkat 210%.
                            </p>
                            
                            <div class="pt-2 flex flex-wrap items-center gap-6 text-xs font-mono text-purple-200">
                                <div class="flex items-center gap-2">
                                    <span class="w-2 h-2 rounded-full bg-[#C8F169]"></span>
                                    <span>Skor Lighthouse: 98/100</span>
                                </div>
                                <div class="flex items-center gap-2">
                                    <span class="w-2 h-2 rounded-full bg-[#C8F169]"></span>
                                    <span>Zero Layout Shift</span>
                                </div>
                                <div class="flex items-center gap-2">
                                    <span class="w-2 h-2 rounded-full bg-[#C8F169]"></span>
                                    <span>Midtrans Auto-Reconcile</span>
                                </div>
                            </div>
                        </div>

                        <div class="lg:col-span-5 flex flex-col items-center justify-center">
                            <div class="w-full aspect-video rounded-2xl bg-black/50 border border-white/20 p-4 flex flex-col items-center justify-center text-center relative group hover:border-[#C8F169]/60 transition-all cursor-pointer"
                                 @click="videoModalOpen = true">
                                <div class="w-16 h-16 rounded-full bg-[#C8F169] text-[#1E0A38] font-mono font-black text-xs flex items-center justify-center shadow-xl shadow-[#C8F169]/30 group-hover:scale-110 transition-transform mb-3">
                                    PLAY
                                </div>
                                <span class="text-xs font-bold text-white tracking-wider">[PUTAR VIDEO DEMO 4K]</span>
                                <span class="text-[10px] text-purple-300 mt-1">Interaktif Walkthrough Sistem</span>
                            </div>
                        </div>
                    </div>

                    <!-- Video Player Modal -->
                    <div x-show="videoModalOpen" 
                         x-cloak
                         x-transition:enter="transition ease-out duration-300"
                         x-transition:enter-start="opacity-0"
                         x-transition:enter-end="opacity-100"
                         x-transition:leave="transition ease-in duration-200"
                         x-transition:leave-start="opacity-100"
                         x-transition:leave-end="opacity-0"
                         class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/85 backdrop-blur-md">
                        <div @click.away="videoModalOpen = false" 
                             class="w-full max-w-4xl bg-[#1D083A] border border-white/20 rounded-3xl p-6 sm:p-8 shadow-2xl relative">
                            <div class="flex justify-between items-center pb-4 mb-4 border-b border-white/10">
                                <div>
                                    <span class="text-[10px] font-mono text-[#C8F169] uppercase tracking-wider">[WEBSITE WALKTHROUGH DEMO]</span>
                                    <h4 class="text-base font-bold text-white">Studi Kasus Arsitektur Webkita Studio</h4>
                                </div>
                                <button @click="videoModalOpen = false" 
                                        type="button" 
                                        class="px-4 py-1.5 rounded-full bg-white/10 hover:bg-white/20 text-xs font-mono font-bold text-white transition-all">
                                    [TUTUP]
                                </button>
                            </div>

                            <div class="w-full aspect-video rounded-2xl bg-black border border-white/10 overflow-hidden flex items-center justify-center relative">
                                <iframe class="w-full h-full"
                                        src="https://www.youtube-nocookie.com/embed/dQw4w9WgXcQ?autoplay=0" 
                                        title="Webkita Case Study Walkthrough"
                                        frameborder="0" 
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                                        allowfullscreen>
                                </iframe>
                            </div>

                            <div class="mt-4 pt-3 flex flex-wrap justify-between items-center text-xs text-purple-200/80 font-mono">
                                <span>Klien: PT Sentosa Nusantara Logistik</span>
                                <span>Stack: Laravel 11 + Alpine.js + Tailwind CSS</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <!-- SECTION: PAKET HARGA TRANSPARAN -->
    <section id="paket" class="py-24 relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <span class="text-xs font-bold uppercase tracking-widest text-[#C8F169] bg-[#C8F169]/10 px-4 py-1.5 rounded-full border border-[#C8F169]/30 inline-block mb-3">
                    Biaya Transparan Tanpa Biaya Tersembunyi
                </span>
                <h2 class="text-3xl sm:text-5xl font-black text-white tracking-tight mb-4">
                    Investasi Terbaik untuk <span class="text-[#C8F169]">Pertumbuhan Bisnis</span>
                </h2>
                <p class="text-base text-purple-200/80">
                    Pilih paket yang paling cocok untuk fase bisnis Anda saat ini. Semua paket sudah mencakup hosting dan domain tahun pertama!
                </p>
            </div>

            <!-- Pricing Cards Grid -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 items-stretch">
                
                <!-- Paket 1: Webkita Kilat -->
                <div class="studio-card-dark p-8 rounded-3xl flex flex-col justify-between relative border border-purple-500/20 hover:border-purple-400/40 transition-all">
                    <div>
                        <div class="flex justify-between items-center mb-4">
                            <span class="text-sm font-bold text-white uppercase tracking-wider">Webkita Kilat</span>
                            <span class="text-xs px-3 py-1 rounded-full bg-white/10 text-purple-200 font-semibold">1 Halaman</span>
                        </div>
                        <div class="mb-4">
                            <span class="text-3xl sm:text-4xl font-black text-white">Rp 499.000</span>
                            <span class="text-xs text-purple-300 line-through ml-2">Rp 750.000</span>
                            <p class="text-xs text-purple-300 mt-1">Pembayaran satu kali (One-time fee)</p>
                        </div>
                        <p class="text-xs text-purple-200/80 pb-6 border-b border-purple-500/20 leading-relaxed">
                            Cocok untuk UMKM, promosi produk tunggal, event, webinar, landing page iklan, atau portofolio personal.
                        </p>

                        <ul class="space-y-3 py-6 text-xs text-purple-100">
                            <li class="flex items-center gap-2.5"><span class="w-1.5 h-1.5 rounded-full bg-[#C8F169]"></span> 1 Halaman High-Converting Design</li>
                            <li class="flex items-center gap-2.5"><span class="w-1.5 h-1.5 rounded-full bg-[#C8F169]"></span> Pengerjaan Cepat (3-4 Hari Kerja)</li>
                            <li class="flex items-center gap-2.5"><span class="w-1.5 h-1.5 rounded-full bg-[#C8F169]"></span> 100% Responsif Smartphone & Desktop</li>
                            <li class="flex items-center gap-2.5"><span class="w-1.5 h-1.5 rounded-full bg-[#C8F169]"></span> Integrasi Tombol WhatsApp Direct</li>
                            <li class="flex items-center gap-2.5"><span class="w-1.5 h-1.5 rounded-full bg-[#C8F169]"></span> Domain & Cloud Hosting 1 Tahun</li>
                            <li class="flex items-center gap-2.5"><span class="w-1.5 h-1.5 rounded-full bg-[#C8F169]"></span> Garansi Perbaikan 14 Hari</li>
                        </ul>
                    </div>

                    <div class="space-y-2 pt-2">
                        <a href="{{ route('checkout.show', 'paket-kilat') }}" 
                           class="lime-pill w-full py-3.5 px-4 rounded-xl text-center text-xs font-black shadow-lg shadow-[#C8F169]/20 hover:scale-[1.02] transition-all block">
                            Pesan Paket Kilat Online →
                        </a>
                        <a href="https://wa.me/6281288990536?text=Halo%20Webkita,%20saya%20tertarik%20dengan%20Paket%20Starter%20Landing%20Page%20(Rp%20499rb).%20Bisa%20konsultasi%20dulu?" 
                           target="_blank" 
                           class="glass-pill w-full py-2.5 px-4 rounded-xl text-center text-xs font-bold text-purple-200 hover:text-white transition-all block">
                            Konsultasi via WA
                        </a>
                    </div>
                </div>

                <!-- Paket 2: Webkita Bisnis (PALING POPULER & HIGHLIGHTED) -->
                <div class="relative rounded-3xl p-1 bg-gradient-to-b from-[#C8F169] via-emerald-400 to-[#5B21B6] shadow-2xl shadow-[#C8F169]/20 flex flex-col justify-between">
                    <div class="bg-[#240B4D] p-8 rounded-[22px] h-full flex flex-col justify-between">
                        <div>
                            <div class="flex justify-between items-center mb-4">
                                <span class="text-sm font-bold text-[#C8F169] uppercase tracking-wider">Webkita Bisnis</span>
                                <span class="text-xs px-3 py-1 rounded-full bg-[#C8F169] text-[#1E0A38] font-black">Paling Populer</span>
                            </div>
                            <div class="mb-4">
                                <span class="text-3xl sm:text-4xl font-black text-white">Rp 1.499.000</span>
                                <span class="text-xs text-purple-300 line-through ml-2">Rp 2.499.000</span>
                                <p class="text-xs text-[#C8F169] font-semibold mt-1">Paket Komplit Siap Pakai Bisnis Resmi</p>
                            </div>
                            <p class="text-xs text-purple-200/90 pb-6 border-b border-purple-500/20 leading-relaxed">
                                Standar emas untuk CV, PT, biro jasa, klinik, restoran, dan UMKM yang ingin tampil profesional dan kredibel di Google.
                            </p>

                            <ul class="space-y-3 py-6 text-xs text-white">
                                <li class="flex items-center gap-2.5"><span class="w-1.5 h-1.5 rounded-full bg-[#C8F169]"></span> <strong>Hingga 5 Halaman Utama</strong> (Home, Tentang, Layanan, Portofolio, Kontak)</li>
                                <li class="flex items-center gap-2.5"><span class="w-1.5 h-1.5 rounded-full bg-[#C8F169]"></span> Pengerjaan 5-7 Hari Kerja</li>
                                <li class="flex items-center gap-2.5"><span class="w-1.5 h-1.5 rounded-full bg-[#C8F169]"></span> <strong>Dashboard CMS</strong> (Kelola konten & artikel mandiri)</li>
                                <li class="flex items-center gap-2.5"><span class="w-1.5 h-1.5 rounded-full bg-[#C8F169]"></span> Terhubung Google Maps & Form Kontak</li>
                                <li class="flex items-center gap-2.5"><span class="w-1.5 h-1.5 rounded-full bg-[#C8F169]"></span> <strong>Dasar Optimasi SEO Google</strong> (Cepat terindeks)</li>
                                <li class="flex items-center gap-2.5"><span class="w-1.5 h-1.5 rounded-full bg-[#C8F169]"></span> Domain Resmi .com/.id + Cloud Hosting 1 Tahun</li>
                                <li class="flex items-center gap-2.5"><span class="w-1.5 h-1.5 rounded-full bg-[#C8F169]"></span> 3 Akun Email Bisnis (nama@domain.com)</li>
                                <li class="flex items-center gap-2.5"><span class="w-1.5 h-1.5 rounded-full bg-[#C8F169]"></span> Garansi Perbaikan & Pendampingan 30 Hari</li>
                            </ul>
                        </div>

                        <div class="space-y-2 pt-2">
                            <a href="{{ route('checkout.show', 'paket-bisnis') }}" 
                               class="lime-pill w-full py-4 px-4 rounded-xl text-center text-xs font-black shadow-lg shadow-[#C8F169]/30 hover:scale-[1.02] transition-all block">
                                Pilih Paket Bisnis Online →
                            </a>
                            <a href="https://wa.me/6281288990536?text=Halo%20Webkita,%20saya%20ingin%20membuat%20Website%20Paket%20Bisnis%20Company%20Profile%20(Rp%201.499rb).%20Mohon%20infonya." 
                               target="_blank" 
                               class="glass-pill w-full py-2.5 px-4 rounded-xl text-center text-xs font-bold text-purple-200 hover:text-white transition-all block">
                                Konsultasi via WA
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Paket 3: Webkita Toko / Custom App -->
                <div class="studio-card-dark p-8 rounded-3xl flex flex-col justify-between relative border border-purple-500/20 hover:border-purple-400/40 transition-all">
                    <div>
                        <div class="flex justify-between items-center mb-4">
                            <span class="text-sm font-bold text-white uppercase tracking-wider">Webkita Toko / Custom</span>
                            <span class="text-xs px-3 py-1 rounded-full bg-white/10 text-[#C8F169] font-semibold">Full Feature</span>
                        </div>
                        <div class="mb-4">
                            <span class="text-3xl sm:text-4xl font-black text-white">Rp 3.500.000</span>
                            <span class="text-xs text-purple-300 line-through ml-2">Rp 5.500.000</span>
                            <p class="text-xs text-purple-300 mt-1">Sistem Otomatisasi Lengkap</p>
                        </div>
                        <p class="text-xs text-purple-200/80 pb-6 border-b border-purple-500/20 leading-relaxed">
                            Untuk brand retail banyak produk, toko online dengan checkout otomatis, atau sistem aplikasi web kustom berbasis Laravel.
                        </p>

                        <ul class="space-y-3 py-6 text-xs text-purple-100">
                            <li class="flex items-center gap-2.5"><span class="w-1.5 h-1.5 rounded-full bg-[#C8F169]"></span> Arsitektur Laravel 11 / E-Commerce</li>
                            <li class="flex items-center gap-2.5"><span class="w-1.5 h-1.5 rounded-full bg-[#C8F169]"></span> Keranjang Belanja & Manajemen Stok</li>
                            <li class="flex items-center gap-2.5"><span class="w-1.5 h-1.5 rounded-full bg-[#C8F169]"></span> <strong>Pembayaran Otomatis Midtrans</strong> (QRIS & VA)</li>
                            <li class="flex items-center gap-2.5"><span class="w-1.5 h-1.5 rounded-full bg-[#C8F169]"></span> <strong>Hitung Ongkir Ekspedisi Otomatis</strong></li>
                            <li class="flex items-center gap-2.5"><span class="w-1.5 h-1.5 rounded-full bg-[#C8F169]"></span> Dashboard Penjualan & Laporan Finansial</li>
                            <li class="flex items-center gap-2.5"><span class="w-1.5 h-1.5 rounded-full bg-[#C8F169]"></span> Notifikasi WhatsApp Invoice Otomatis</li>
                            <li class="flex items-center gap-2.5"><span class="w-1.5 h-1.5 rounded-full bg-[#C8F169]"></span> Garansi & Pendampingan Prioritas 60 Hari</li>
                        </ul>
                    </div>

                    <div class="space-y-2 pt-2">
                        <a href="{{ route('checkout.show', 'paket-toko') }}" 
                           class="lime-pill w-full py-3.5 px-4 rounded-xl text-center text-xs font-black shadow-lg shadow-[#C8F169]/20 hover:scale-[1.02] transition-all block">
                            Pesan Paket Toko Online →
                        </a>
                        <a href="https://wa.me/6281288990536?text=Halo%20Webkita,%20saya%20ingin%20membuat%20Toko%20Online%20dengan%20fitur%20pembayaran%20otomatis%20(Rp%203.5jt).%20Mohon%20infonya." 
                           target="_blank" 
                           class="glass-pill w-full py-2.5 px-4 rounded-xl text-center text-xs font-bold text-purple-200 hover:text-white transition-all block">
                            Konsultasi via WA
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- SECTION: KALKULATOR ESTIMASI BIAYA INTERAKTIF -->
    <section id="kalkulator" class="py-24 bg-[#210944]/80 border-y border-purple-500/20 relative">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <span class="text-xs font-bold uppercase tracking-widest text-[#C8F169] bg-[#C8F169]/10 px-4 py-1.5 rounded-full border border-[#C8F169]/30 inline-block mb-3">
                    Interactive Cost Calculator
                </span>
                <h2 class="text-3xl sm:text-4xl font-black text-white tracking-tight mb-3">
                    Hitung Estimasi Biaya <span class="text-[#C8F169]">Website Anda</span>
                </h2>
                <p class="text-sm text-purple-200/80">
                    Pilih paket dasar dan sesuaikan fitur tambahan sesuai kebutuhan proyek Anda. Dapatkan perkiraan biaya instan secara transparan!
                </p>
            </div>

            <!-- Alpine.js Calculator Card -->
            <div x-data="{
                baseTier: 1499000,
                baseName: 'Paket Webkita Bisnis (5 Halaman)',
                extraPages: 0,
                hasPaymentGateway: false,
                hasMultiLang: false,
                hasWhatsAppBot: false,
                hasCopywriting: false,
                hasExpress48h: false,
                
                get extraPagesCost() { return this.extraPages * 150000; },
                get paymentCost() { return this.hasPaymentGateway ? 350000 : 0; },
                get multiLangCost() { return this.hasMultiLang ? 400000 : 0; },
                get waBotCost() { return this.hasWhatsAppBot ? 250000 : 0; },
                get copyCost() { return this.hasCopywriting ? 300000 : 0; },
                get expressCost() { return this.hasExpress48h ? 450000 : 0; },

                get grandTotal() {
                    return this.baseTier + this.extraPagesCost + this.paymentCost + this.multiLangCost + this.waBotCost + this.copyCost + this.expressCost;
                },

                formatRupiah(num) {
                    return new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR', minimumFractionDigits: 0 }).format(num);
                },

                get waLink() {
                    let text = 'Halo Webkita, saya ingin konsultasi estimasi website kustom:%0A';
                    text += '- ' + this.baseName + '%0A';
                    if (this.extraPages > 0) text += '- Tambahan Halaman: ' + this.extraPages + ' hal (' + this.formatRupiah(this.extraPagesCost) + ')%0A';
                    if (this.hasPaymentGateway) text += '- Payment Gateway QRIS/VA (Rp 350.000)%0A';
                    if (this.hasMultiLang) text += '- Multi-Bahasa ID/EN (Rp 400.000)%0A';
                    if (this.hasWhatsAppBot) text += '- WhatsApp CRM Auto-Reply (Rp 250.000)%0A';
                    if (this.hasCopywriting) text += '- Copywriting Profesional (Rp 300.000)%0A';
                    if (this.hasExpress48h) text += '- Prioritas Kilat 48 Jam (Rp 450.000)%0A';
                    text += '%0A*Total Estimasi: ' + this.formatRupiah(this.grandTotal) + '*%0A%0AMohon info jadwal pengerjaan.';
                    return 'https://wa.me/6281288990536?text=' + text;
                }
            }" class="studio-card-dark p-6 sm:p-10 rounded-3xl border border-purple-400/20 shadow-2xl">

                <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
                    
                    <!-- Left Options -->
                    <div class="lg:col-span-7 space-y-6">
                        <!-- Step 1: Base Tier -->
                        <div>
                            <label class="block text-xs font-bold uppercase tracking-wider text-purple-200 mb-3">
                                1. Pilih Paket Dasar
                            </label>
                            <div class="grid grid-cols-1 sm:grid-cols-3 gap-3">
                                <button type="button" 
                                        @click="baseTier = 499000; baseName = 'Paket Webkita Kilat (1 Hal)'"
                                        :class="baseTier === 499000 ? 'border-[#C8F169] bg-[#C8F169]/10 text-white' : 'border-purple-500/20 bg-[#1D083A] text-purple-300 hover:border-purple-400'"
                                        class="p-3.5 rounded-2xl border text-left transition-all">
                                    <div class="text-xs font-bold">Kilat</div>
                                    <div class="text-[11px] text-[#C8F169] font-bold mt-1">Rp 499.000</div>
                                    <div class="text-[10px] text-purple-300 mt-0.5">1 Halaman</div>
                                </button>

                                <button type="button" 
                                        @click="baseTier = 1499000; baseName = 'Paket Webkita Bisnis (5 Hal)'"
                                        :class="baseTier === 1499000 ? 'border-[#C8F169] bg-[#C8F169]/10 text-white' : 'border-purple-500/20 bg-[#1D083A] text-purple-300 hover:border-purple-400'"
                                        class="p-3.5 rounded-2xl border text-left transition-all">
                                    <div class="text-xs font-bold">Bisnis</div>
                                    <div class="text-[11px] text-[#C8F169] font-bold mt-1">Rp 1.499.000</div>
                                    <div class="text-[10px] text-purple-300 mt-0.5">Hingga 5 Hal</div>
                                </button>

                                <button type="button" 
                                        @click="baseTier = 3500000; baseName = 'Paket Toko / Custom App'"
                                        :class="baseTier === 3500000 ? 'border-[#C8F169] bg-[#C8F169]/10 text-white' : 'border-purple-500/20 bg-[#1D083A] text-purple-300 hover:border-purple-400'"
                                        class="p-3.5 rounded-2xl border text-left transition-all">
                                    <div class="text-xs font-bold">Toko / Custom</div>
                                    <div class="text-[11px] text-[#C8F169] font-bold mt-1">Rp 3.500.000</div>
                                    <div class="text-[10px] text-purple-300 mt-0.5">E-Commerce</div>
                                </button>
                            </div>
                        </div>

                        <!-- Step 2: Extra Pages Slider -->
                        <div class="pt-2">
                            <div class="flex items-center justify-between mb-2">
                                <label class="text-xs font-bold uppercase tracking-wider text-purple-200">
                                    2. Tambahan Halaman (+Rp 150rb/hal)
                                </label>
                                <span class="text-xs font-bold text-[#C8F169]" x-text="extraPages + ' Halaman Tambahan'"></span>
                            </div>
                            <div class="flex items-center gap-3">
                                <button type="button" @click="if(extraPages > 0) extraPages--" class="w-10 h-10 rounded-xl bg-[#1D083A] border border-purple-500/30 text-white text-lg font-bold hover:bg-white/10">-</button>
                                <input type="range" min="0" max="15" step="1" x-model.number="extraPages" class="w-full accent-[#C8F169]">
                                <button type="button" @click="if(extraPages < 15) extraPages++" class="w-10 h-10 rounded-xl bg-[#1D083A] border border-purple-500/30 text-white text-lg font-bold hover:bg-white/10">+</button>
                            </div>
                        </div>

                        <!-- Step 3: Additional Features Checkboxes -->
                        <div class="pt-2 space-y-2.5">
                            <label class="block text-xs font-bold uppercase tracking-wider text-purple-200 mb-2">
                                3. Fitur Tambahan Pilihan
                            </label>

                            <label class="flex items-center justify-between p-3 rounded-xl bg-[#1D083A] border border-purple-500/20 hover:border-[#C8F169]/40 cursor-pointer text-xs">
                                <div class="flex items-center gap-2.5">
                                    <input type="checkbox" x-model="hasPaymentGateway" class="w-4 h-4 rounded text-[#C8F169] accent-[#C8F169]">
                                    <span class="text-white font-medium">Payment Gateway QRIS & VA Otomatis</span>
                                </div>
                                <span class="text-purple-300 font-mono">+Rp 350.000</span>
                            </label>

                            <label class="flex items-center justify-between p-3 rounded-xl bg-[#1D083A] border border-purple-500/20 hover:border-[#C8F169]/40 cursor-pointer text-xs">
                                <div class="flex items-center gap-2.5">
                                    <input type="checkbox" x-model="hasMultiLang" class="w-4 h-4 rounded text-[#C8F169] accent-[#C8F169]">
                                    <span class="text-white font-medium">Fitur Multi-Bahasa (Indonesia & English)</span>
                                </div>
                                <span class="text-purple-300 font-mono">+Rp 400.000</span>
                            </label>

                            <label class="flex items-center justify-between p-3 rounded-xl bg-[#1D083A] border border-purple-500/20 hover:border-[#C8F169]/40 cursor-pointer text-xs">
                                <div class="flex items-center gap-2.5">
                                    <input type="checkbox" x-model="hasWhatsAppBot" class="w-4 h-4 rounded text-[#C8F169] accent-[#C8F169]">
                                    <span class="text-white font-medium">Integrasi WhatsApp CRM & Chatbot Auto-Reply</span>
                                </div>
                                <span class="text-purple-300 font-mono">+Rp 250.000</span>
                            </label>

                            <label class="flex items-center justify-between p-3 rounded-xl bg-[#1D083A] border border-purple-500/20 hover:border-[#C8F169]/40 cursor-pointer text-xs">
                                <div class="flex items-center gap-2.5">
                                    <input type="checkbox" x-model="hasCopywriting" class="w-4 h-4 rounded text-[#C8F169] accent-[#C8F169]">
                                    <span class="text-white font-medium">Jasa Copywriting Naskah Penjualan Profesional</span>
                                </div>
                                <span class="text-purple-300 font-mono">+Rp 300.000</span>
                            </label>

                            <label class="flex items-center justify-between p-3 rounded-xl bg-[#1D083A] border border-purple-500/20 hover:border-[#C8F169]/40 cursor-pointer text-xs">
                                <div class="flex items-center gap-2.5">
                                    <input type="checkbox" x-model="hasExpress48h" class="w-4 h-4 rounded text-[#C8F169] accent-[#C8F169]">
                                    <span class="text-[#C8F169] font-medium">Prioritas Pengerjaan Kilat (Selesai 48 Jam)</span>
                                </div>
                                <span class="text-[#C8F169] font-mono">+Rp 450.000</span>
                            </label>
                        </div>
                    </div>

                    <!-- Right Summary Card -->
                    <div class="lg:col-span-5 bg-[#17062E] border border-purple-500/30 rounded-2xl p-6 space-y-6 sticky top-28 shadow-xl">
                        <div class="border-b border-purple-500/20 pb-4">
                            <span class="text-xs font-bold text-purple-300 uppercase tracking-wide">Ringkasan Estimasi</span>
                            <div class="text-xs text-[#C8F169] font-bold mt-1" x-text="baseName"></div>
                        </div>

                        <div class="space-y-2.5 text-xs text-purple-100">
                            <div class="flex justify-between">
                                <span class="text-purple-300">Biaya Paket Dasar</span>
                                <span class="font-mono text-white" x-text="formatRupiah(baseTier)"></span>
                            </div>
                            <div x-show="extraPages > 0" class="flex justify-between">
                                <span class="text-purple-300" x-text="'Halaman Tambahan (' + extraPages + ')'"></span>
                                <span class="font-mono text-white" x-text="formatRupiah(extraPagesCost)"></span>
                            </div>
                            <div x-show="hasPaymentGateway" class="flex justify-between">
                                <span class="text-purple-300">Payment Gateway</span>
                                <span class="font-mono text-white">Rp 350.000</span>
                            </div>
                            <div x-show="hasMultiLang" class="flex justify-between">
                                <span class="text-purple-300">Multi-Bahasa (ID/EN)</span>
                                <span class="font-mono text-white">Rp 400.000</span>
                            </div>
                            <div x-show="hasWhatsAppBot" class="flex justify-between">
                                <span class="text-purple-300">WhatsApp CRM</span>
                                <span class="font-mono text-white">Rp 250.000</span>
                            </div>
                            <div x-show="hasCopywriting" class="flex justify-between">
                                <span class="text-purple-300">Copywriting Naskah</span>
                                <span class="font-mono text-white">Rp 300.000</span>
                            </div>
                            <div x-show="hasExpress48h" class="flex justify-between">
                                <span class="text-[#C8F169]">Prioritas Kilat 48 Jam</span>
                                <span class="font-mono text-[#C8F169]">Rp 450.000</span>
                            </div>
                        </div>

                        <!-- Grand Total -->
                        <div class="pt-4 border-t border-purple-500/20">
                            <div class="text-xs text-purple-300 mb-1">Total Estimasi Investasi:</div>
                            <div class="text-3xl font-black text-[#C8F169]" x-text="formatRupiah(grandTotal)"></div>
                            <div class="text-[11px] text-purple-400 mt-1">Sudah termasuk domain, server 1 thn & garansi resmi.</div>
                        </div>

                        <!-- Direct WhatsApp Order Button -->
                        <a :href="waLink" 
                           target="_blank" 
                           class="lime-pill w-full py-4 px-4 rounded-xl text-center text-xs font-black shadow-xl shadow-[#C8F169]/25 flex items-center justify-center gap-2 transition-all">
                            <span>Pesan Sesuai Estimasi via WhatsApp</span>
                            <span>→</span>
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <!-- SECTION: TESTIMONI KLIEN (NO ICONS) -->
    <section class="py-24 relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <span class="text-xs font-bold uppercase tracking-widest text-[#C8F169] bg-[#C8F169]/10 px-4 py-1.5 rounded-full border border-[#C8F169]/30 inline-block mb-3">
                    Cerita Kepuasan Klien
                </span>
                <h2 class="text-3xl sm:text-5xl font-black text-white tracking-tight mb-4">
                    Dipercaya Lebih dari <span class="text-[#C8F169]">120+ Pelaku Usaha</span>
                </h2>
                <p class="text-base text-purple-200/80">
                    Bukan sekadar website cantik, tetapi alat konversi nyata yang meningkatkan omset dan kredibilitas brand Anda.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Testimonial 1 -->
                <div class="studio-card-dark p-8 rounded-3xl border border-purple-500/20 flex flex-col justify-between">
                    <div class="space-y-4">
                        <div class="text-[11px] font-mono uppercase tracking-wider text-[#C8F169]">Rating 5.0 / 5.0 — Klien Terverifikasi</div>
                        <p class="text-sm text-purple-100 leading-relaxed italic">
                            "Sebelumnya saya hanya jualan lewat medsos dan sering kewalahan balas chat. Sejak dibuatkan website oleh Webkita, pembeli langsung bayar mandiri lewat QRIS. Omset naik 3x lipat!"
                        </p>
                    </div>
                    <div class="pt-6 border-t border-purple-500/20 flex items-center gap-3 mt-6">
                        <div class="w-10 h-10 rounded-full bg-[#C8F169] text-[#1E0A38] font-bold flex items-center justify-center text-sm">
                            MA
                        </div>
                        <div>
                            <div class="text-xs font-bold text-white">Maya Anggraini</div>
                            <div class="text-[11px] text-purple-300">Founder Maya Artisan Bakery</div>
                        </div>
                    </div>
                </div>

                <!-- Testimonial 2 -->
                <div class="studio-card-dark p-8 rounded-3xl border border-purple-500/20 flex flex-col justify-between">
                    <div class="space-y-4">
                        <div class="text-[11px] font-mono uppercase tracking-wider text-[#C8F169]">Rating 5.0 / 5.0 — Klien Terverifikasi</div>
                        <p class="text-sm text-purple-100 leading-relaxed italic">
                            "Pengerjaan tepat waktu, tim komunikatif dan sangat paham kebutuhan B2B. Company profile yang dibuat Webkita berhasil meyakinkan klien korporat besar untuk deal tender logistik kami."
                        </p>
                    </div>
                    <div class="pt-6 border-t border-purple-500/20 flex items-center gap-3 mt-6">
                        <div class="w-10 h-10 rounded-full bg-white text-[#1E0A38] font-bold flex items-center justify-center text-sm">
                            HS
                        </div>
                        <div>
                            <div class="text-xs font-bold text-white">Hendro Santoso</div>
                            <div class="text-[11px] text-purple-300">Direktur Sentosa Logistik</div>
                        </div>
                    </div>
                </div>

                <!-- Testimonial 3 -->
                <div class="studio-card-dark p-8 rounded-3xl border border-purple-500/20 flex flex-col justify-between">
                    <div class="space-y-4">
                        <div class="text-[11px] font-mono uppercase tracking-wider text-[#C8F169]">Rating 5.0 / 5.0 — Klien Terverifikasi</div>
                        <p class="text-sm text-purple-100 leading-relaxed italic">
                            "Paket Kilat-nya beneran kilat! Dalam 3 hari landing page kami sudah siap pakai untuk pasang iklan Meta Ads. Hasilnya luar biasa, biaya iklan jadi jauh lebih efisien karena websitenya ngebut."
                        </p>
                    </div>
                    <div class="pt-6 border-t border-purple-500/20 flex items-center gap-3 mt-6">
                        <div class="w-10 h-10 rounded-full bg-[#C8F169] text-[#1E0A38] font-bold flex items-center justify-center text-sm">
                            RF
                        </div>
                        <div>
                            <div class="text-xs font-bold text-white">Rizky Fadillah</div>
                            <div class="text-[11px] text-purple-300">Marketing Lead KopiKita</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- SECTION: FAQ ACCORDION -->
    <section id="faq" class="py-24 bg-[#230B48]/70 border-y border-purple-500/20" x-data="{ activeFaq: null }">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <span class="text-xs font-bold uppercase tracking-widest text-[#C8F169] bg-[#C8F169]/10 px-4 py-1.5 rounded-full border border-[#C8F169]/30 inline-block mb-3">
                    Pertanyaan Umum
                </span>
                <h2 class="text-3xl sm:text-4xl font-black text-white tracking-tight mb-3">
                    Sering Ditanyakan (FAQ)
                </h2>
                <p class="text-sm text-purple-200/80">
                    Semua yang perlu Anda ketahui mengenai proses pembuatan website di Webkita.
                </p>
            </div>

            <!-- Accordion List -->
            <div class="space-y-4">
                <!-- Q1 -->
                <div class="studio-card-dark rounded-2xl border border-purple-500/20 overflow-hidden">
                    <button @click="activeFaq = (activeFaq === 1 ? null : 1)" 
                            type="button"
                            class="w-full p-5 text-left flex items-center justify-between text-sm font-bold text-white hover:text-[#C8F169] transition-colors">
                        <span>Apakah harga sudah termasuk domain dan hosting?</span>
                        <span class="text-lg transition-transform duration-200" :class="activeFaq === 1 ? 'rotate-180 text-[#C8F169]' : 'text-purple-400'">↓</span>
                    </button>
                    <div x-show="activeFaq === 1" x-collapse x-cloak class="px-5 pb-5 text-xs text-purple-200/80 leading-relaxed border-t border-purple-500/20 pt-3">
                        Ya, seluruh paket layanan Webkita sudah mencakup nama domain resmi pilihan Anda dan cloud hosting berkecepatan tinggi selama 1 tahun pertama. Untuk tahun berikutnya, perpanjangan domain dan server sangat terjangkau.
                    </div>
                </div>

                <!-- Q2 -->
                <div class="studio-card-dark rounded-2xl border border-purple-500/20 overflow-hidden">
                    <button @click="activeFaq = (activeFaq === 2 ? null : 2)" 
                            type="button"
                            class="w-full p-5 text-left flex items-center justify-between text-sm font-bold text-white hover:text-[#C8F169] transition-colors">
                        <span>Berapa lama proses pengerjaan website hingga selesai?</span>
                        <span class="text-lg transition-transform duration-200" :class="activeFaq === 2 ? 'rotate-180 text-[#C8F169]' : 'text-purple-400'">↓</span>
                    </button>
                    <div x-show="activeFaq === 2" x-collapse x-cloak class="px-5 pb-5 text-xs text-purple-200/80 leading-relaxed border-t border-purple-500/20 pt-3">
                        Waktu pengerjaan bergantung pada paket: Paket Kilat selesai 3-4 hari kerja, Paket Bisnis 5-7 hari kerja, dan Paket Toko / Custom App 8-14 hari kerja setelah materi konten (logo, teks brief, dan foto) kami terima secara lengkap.
                    </div>
                </div>

                <!-- Q3 -->
                <div class="studio-card-dark rounded-2xl border border-purple-500/20 overflow-hidden">
                    <button @click="activeFaq = (activeFaq === 3 ? null : 3)" 
                            type="button"
                            class="w-full p-5 text-left flex items-center justify-between text-sm font-bold text-white hover:text-[#C8F169] transition-colors">
                        <span>Apakah ada garansi jika terjadi error atau kendala teknis?</span>
                        <span class="text-lg transition-transform duration-200" :class="activeFaq === 3 ? 'rotate-180 text-[#C8F169]' : 'text-purple-400'">↓</span>
                    </button>
                    <div x-show="activeFaq === 3" x-collapse x-cloak class="px-5 pb-5 text-xs text-purple-200/80 leading-relaxed border-t border-purple-500/20 pt-3">
                        Tentu saja! Kami memberikan garansi perbaikan gratis antara 14 hingga 60 hari (tergantung paket). Jika terjadi bug, error server, atau link rusak pasca-rilis, tim teknis Webkita akan memperbaikinya tanpa pungutan biaya tambahan.
                    </div>
                </div>

                <!-- Q4 -->
                <div class="studio-card-dark rounded-2xl border border-purple-500/20 overflow-hidden">
                    <button @click="activeFaq = (activeFaq === 4 ? null : 4)" 
                            type="button"
                            class="w-full p-5 text-left flex items-center justify-between text-sm font-bold text-white hover:text-[#C8F169] transition-colors">
                        <span>Apakah saya bisa mengelola isi konten website sendiri nantinya?</span>
                        <span class="text-lg transition-transform duration-200" :class="activeFaq === 4 ? 'rotate-180 text-[#C8F169]' : 'text-purple-400'">↓</span>
                    </button>
                    <div x-show="activeFaq === 4" x-collapse x-cloak class="px-5 pb-5 text-xs text-purple-200/80 leading-relaxed border-t border-purple-500/20 pt-3">
                        Bisa! Untuk Paket Bisnis dan Toko Online, kami sediakan dashboard manajemen konten (CMS) yang sangat mudah digunakan bahkan bagi orang awam sekalipun. Anda juga akan mendapatkan panduan video tutorial.
                    </div>
                </div>

                <!-- Q5 -->
                <div class="studio-card-dark rounded-2xl border border-purple-500/20 overflow-hidden">
                    <button @click="activeFaq = (activeFaq === 5 ? null : 5)" 
                            type="button"
                            class="w-full p-5 text-left flex items-center justify-between text-sm font-bold text-white hover:text-[#C8F169] transition-colors">
                        <span>Bagaimana tahapan pembayaran dan proses kerjasamanya?</span>
                        <span class="text-lg transition-transform duration-200" :class="activeFaq === 5 ? 'rotate-180 text-[#C8F169]' : 'text-purple-400'">↓</span>
                    </button>
                    <div x-show="activeFaq === 5" x-collapse x-cloak class="px-5 pb-5 text-xs text-purple-200/80 leading-relaxed border-t border-purple-500/20 pt-3">
                        Alurnya sangat aman dan transparan: Anda memilih paket → konsultasi brief awal via WhatsApp → DP 50% untuk mulai pengerjaan → kami buatkan draft desain untuk Anda review → revisi hingga puas → pelunasan 50% saat website siap online (Go-Live).
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- SECTION: KONTAK & KONSULTASI FORM -->
    <section id="kontak" class="py-24 relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="studio-glass rounded-3xl p-8 sm:p-14 border border-purple-500/20 grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
                
                <div class="lg:col-span-6 space-y-6">
                    <span class="text-xs font-bold uppercase tracking-widest text-[#C8F169] bg-[#C8F169]/10 px-4 py-1.5 rounded-full border border-[#C8F169]/30 inline-block">
                        Mulai Kolaborasi
                    </span>
                    <h2 class="text-3xl sm:text-5xl font-black text-white tracking-tight leading-tight">
                        Wujudkan Website Impian Bersama <span class="text-[#C8F169]">Webkita</span>.
                    </h2>
                    <p class="text-sm text-purple-200/80 leading-relaxed">
                        Punya pertanyaan seputar ide website atau butuh rekomendasi strategi digital? Diskusikan langsung dengan tim kami secara gratis tanpa komitmen.
                    </p>

                    <div class="space-y-4 pt-4 text-xs text-purple-100">
                        <div class="flex items-center gap-3">
                            <span class="w-2 h-2 rounded-full bg-[#C8F169] shrink-0"></span>
                            <span>Respon cepat dalam hitungan menit via WhatsApp resmi</span>
                        </div>
                        <div class="flex items-center gap-3">
                            <span class="w-2 h-2 rounded-full bg-[#C8F169] shrink-0"></span>
                            <span>Gratis konsultasi konsep, pemilihan domain, dan arsitektur</span>
                        </div>
                        <div class="flex items-center gap-3">
                            <span class="w-2 h-2 rounded-full bg-[#C8F169] shrink-0"></span>
                            <span>Invoice resmi & garansi purna jual berbadan hukum</span>
                        </div>
                    </div>
                </div>

                <!-- Form Card -->
                <div class="lg:col-span-6 bg-[#17062E] border border-purple-500/30 rounded-3xl p-6 sm:p-8" 
                     x-data="{
                         nama: '',
                         whatsapp: '',
                         paketPilihan: 'Paket Webkita Bisnis',
                         pesan: '',
                         submitting: false,
                         submitted: false,
                         async kirimKeWhatsApp() {
                             if(!this.nama || !this.whatsapp) {
                                 alert('Mohon isi nama dan nomor WhatsApp Anda terlebih dahulu.');
                                 return;
                             }
                             this.submitting = true;
                             try {
                                 let response = await fetch('{{ route('leads.store') }}', {
                                     method: 'POST',
                                     headers: {
                                         'Content-Type': 'application/json',
                                         'X-CSRF-TOKEN': document.querySelector('meta[name=\'csrf-token\']').getAttribute('content'),
                                         'Accept': 'application/json'
                                     },
                                     body: JSON.stringify({
                                         nama: this.nama,
                                         whatsapp: this.whatsapp,
                                         paketPilihan: this.paketPilihan,
                                         pesan: this.pesan
                                     })
                                 });
                                 let data = await response.json();
                                 this.submitted = true;
                                 if(data.whatsapp_url) {
                                     window.open(data.whatsapp_url, '_blank');
                                 }
                             } catch(e) {
                                 let t = 'Halo Webkita, saya ingin konsultasi pembuatan website:%0A';
                                 t += '- Nama: ' + encodeURIComponent(this.nama) + '%0A';
                                 t += '- No WhatsApp: ' + encodeURIComponent(this.whatsapp) + '%0A';
                                 t += '- Minat Paket: ' + encodeURIComponent(this.paketPilihan) + '%0A';
                                 if(this.pesan) t += '- Keterangan: ' + encodeURIComponent(this.pesan) + '%0A';
                                 t += '%0AMohon informasi lebih lanjut.';
                                 window.open('https://wa.me/6281288990536?text=' + t, '_blank');
                             } finally {
                                 this.submitting = false;
                             }
                         }
                     }">
                    <h3 class="text-base font-bold text-white mb-4">Kirim Brief Singkat</h3>
                    
                    <form @submit.prevent="kirimKeWhatsApp" class="space-y-4">
                        <div x-show="submitted" x-cloak class="p-3 rounded-xl bg-[#C8F169]/15 border border-[#C8F169]/40 text-xs text-[#C8F169] font-semibold">
                            Data brief Anda telah tersimpan di sistem Webkita dan dialihkan ke WhatsApp konsultan kami!
                        </div>

                        <div>
                            <label class="block text-xs font-semibold text-purple-200 mb-1">Nama Lengkap / Nama Bisnis *</label>
                            <input type="text" x-model="nama" required placeholder="Contoh: Budi Santoso (KopiKita)" 
                                   class="w-full px-3.5 py-2.5 rounded-xl bg-[#230B48] border border-purple-500/30 text-xs text-white focus:outline-none focus:border-[#C8F169]">
                        </div>

                        <div>
                            <label class="block text-xs font-semibold text-purple-200 mb-1">Nomor WhatsApp Aktif *</label>
                            <input type="tel" x-model="whatsapp" required placeholder="Contoh: 081234567890" 
                                   class="w-full px-3.5 py-2.5 rounded-xl bg-[#230B48] border border-purple-500/30 text-xs text-white focus:outline-none focus:border-[#C8F169]">
                        </div>

                        <div>
                            <label class="block text-xs font-semibold text-purple-200 mb-1">Paket yang Diminati</label>
                            <select x-model="paketPilihan" class="w-full px-3.5 py-2.5 rounded-xl bg-[#230B48] border border-purple-500/30 text-xs text-white focus:outline-none focus:border-[#C8F169]">
                                <option value="Paket Webkita Kilat (Rp 499rb)">Paket Webkita Kilat (Rp 499.000)</option>
                                <option value="Paket Webkita Bisnis (Rp 1.499rb)">Paket Webkita Bisnis (Rp 1.499.000) (Paling Populer)</option>
                                <option value="Paket Toko Online / Custom App (Rp 3.5jt+)">Paket Toko Online / Custom App (Rp 3.500.000+)</option>
                                <option value="Belum Tahu, Butuh Saran Konsultan">Belum Tahu, Butuh Saran Konsultan</option>
                            </select>
                        </div>

                        <div>
                            <label class="block text-xs font-semibold text-purple-200 mb-1">Ceritakan Kebutuhan Website Anda</label>
                            <textarea x-model="pesan" rows="3" placeholder="Contoh: Saya butuh website untuk jualan hijab dengan fitur katalog dan direct WhatsApp..." 
                                      class="w-full px-3.5 py-2.5 rounded-xl bg-[#230B48] border border-purple-500/30 text-xs text-white focus:outline-none focus:border-[#C8F169]"></textarea>
                        </div>

                        <button type="submit" 
                                :disabled="submitting"
                                class="lime-pill w-full py-3.5 rounded-xl font-black text-xs shadow-lg shadow-[#C8F169]/20 transition-all flex items-center justify-center gap-2 disabled:opacity-50">
                            <span x-text="submitting ? 'Menyimpan & Menghubungkan...' : 'Hubungi Konsultan Sekarang via WhatsApp'"></span>
                            <span>→</span>
                        </button>
                        
                        <p class="text-[10px] text-purple-400 text-center">
                            Privasi Anda terjamin. Kami tidak pernah membagikan kontak Anda kepada pihak ketiga.
                        </p>
                    </form>
                </div>

            </div>
        </div>
    </section>

</div>
@endsection
