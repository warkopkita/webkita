@extends('layouts.app')

@section('title', 'Webkita — Bikin Website Bisnis Profesional, Cepat & Menghasilkan')

@section('content')
<div class="relative overflow-hidden">

    <!-- HERO SECTION -->
    <section id="beranda" class="relative pt-32 pb-20 md:pt-40 md:pb-28 gradient-bg-radial">
        <!-- Ambient Glow Circles -->
        <div class="absolute top-20 left-1/2 -translate-x-1/2 w-96 h-96 bg-emerald-500/10 rounded-full blur-3xl pointer-events-none"></div>
        <div class="absolute top-48 right-10 w-72 h-72 bg-cyan-500/10 rounded-full blur-3xl pointer-events-none"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center max-w-4xl mx-auto">
                <!-- Top Trust Pill -->
                <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-slate-900/80 border border-slate-700/60 text-xs font-semibold text-slate-300 mb-8 backdrop-blur-md shadow-lg shadow-black/20">
                    <span class="flex h-2 w-2 relative">
                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-2 w-2 bg-emerald-500"></span>
                    </span>
                    <span>Dipercaya berbagai UMKM & Brand Lokal — Pengerjaan mulai 3 Hari Kerja</span>
                </div>

                <!-- Main Headline -->
                <h1 class="text-4xl sm:text-6xl lg:text-7xl font-extrabold tracking-tight text-white leading-[1.1] mb-6">
                    Bikin Website Bisnis yang <span class="gradient-text">Profesional</span> & Menghasilkan Penjualan.
                </h1>

                <!-- Subheadline -->
                <p class="text-lg sm:text-xl text-slate-300 leading-relaxed max-w-2xl mx-auto mb-10">
                    Webkita hadir membantu UMKM, brand, dan profesional memiliki website cepat, responsif di semua perangkat, serta siap terima pembayaran online otomatis tanpa ribet.
                </p>

                <!-- Dual CTA Buttons -->
                <div class="flex flex-col sm:flex-row items-center justify-center gap-4 mb-16">
                    <a href="#paket" 
                       class="w-full sm:w-auto px-8 py-4 rounded-xl font-bold text-slate-950 bg-gradient-to-r from-emerald-400 via-teal-300 to-cyan-400 hover:opacity-95 shadow-xl shadow-emerald-500/25 hover:shadow-emerald-500/40 hover:-translate-y-0.5 transition-all duration-300 flex items-center justify-center gap-2.5 text-base">
                        <span>Lihat Pilihan Paket</span>
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                    </a>
                    
                    <a href="https://wa.me/6281234567890?text=Halo%20Webkita,%20saya%20ingin%20konsultasi%20pembuatan%20website%20bisnis." 
                       target="_blank"
                       class="w-full sm:w-auto px-8 py-4 rounded-xl font-bold text-slate-200 bg-slate-900/80 hover:bg-slate-800 border border-slate-700/80 hover:border-slate-600 transition-all duration-300 flex items-center justify-center gap-2.5 text-base shadow-lg">
                        <svg class="w-5 h-5 fill-emerald-400" viewBox="0 0 24 24"><path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.582 2.128 2.182-.573c.978.58 1.911.928 3.145.929 3.178 0 5.767-2.587 5.768-5.766.001-3.187-2.575-5.77-5.764-5.771zm3.392 8.244c-.144.405-.837.774-1.17.824-.299.045-.677.063-1.092-.069-.252-.08-.575-.187-.988-.365-1.739-.751-2.874-2.502-2.961-2.617-.087-.116-.708-.94-.708-1.793s.448-1.273.607-1.446c.159-.173.346-.217.462-.217l.332.006c.106.005.249-.04.39.298.144.347.491 1.2.534 1.287.043.087.072.188.014.304-.058.116-.087.188-.173.289l-.26.304c-.087.086-.177.18-.076.354.101.174.449.741.964 1.201.662.591 1.221.774 1.394.86.174.086.275.072.376-.044.101-.116.433-.506.549-.68.116-.173.231-.145.39-.086s1.011.477 1.184.564.289.13.332.202c.043.073.043.419-.101.824z"/></svg>
                        <span>Konsultasi WhatsApp Gratis</span>
                    </a>
                </div>

                <!-- 4 Value Props Badges -->
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4 max-w-4xl mx-auto pt-4 text-left">
                    <div class="p-3.5 rounded-xl bg-slate-900/60 border border-slate-800/80 backdrop-blur-sm flex items-center gap-3">
                        <div class="w-9 h-9 rounded-lg bg-emerald-500/15 text-emerald-400 flex items-center justify-center shrink-0">
                            ⚡
                        </div>
                        <div>
                            <div class="text-xs font-bold text-slate-100">Cepat & Tepat</div>
                            <div class="text-[11px] text-slate-400">Mulai 3 hari kerja</div>
                        </div>
                    </div>

                    <div class="p-3.5 rounded-xl bg-slate-900/60 border border-slate-800/80 backdrop-blur-sm flex items-center gap-3">
                        <div class="w-9 h-9 rounded-lg bg-cyan-500/15 text-cyan-400 flex items-center justify-center shrink-0">
                            📱
                        </div>
                        <div>
                            <div class="text-xs font-bold text-slate-100">100% Responsif</div>
                            <div class="text-[11px] text-slate-400">Mobile, tablet & PC</div>
                        </div>
                    </div>

                    <div class="p-3.5 rounded-xl bg-slate-900/60 border border-slate-800/80 backdrop-blur-sm flex items-center gap-3">
                        <div class="w-9 h-9 rounded-lg bg-emerald-500/15 text-emerald-400 flex items-center justify-center shrink-0">
                            💳
                        </div>
                        <div>
                            <div class="text-xs font-bold text-slate-100">Siap Pembayaran</div>
                            <div class="text-[11px] text-slate-400">QRIS & VA Otomatis</div>
                        </div>
                    </div>

                    <div class="p-3.5 rounded-xl bg-slate-900/60 border border-slate-800/80 backdrop-blur-sm flex items-center gap-3">
                        <div class="w-9 h-9 rounded-lg bg-cyan-500/15 text-cyan-400 flex items-center justify-center shrink-0">
                            🛡️
                        </div>
                        <div>
                            <div class="text-xs font-bold text-slate-100">Garansi Maintenance</div>
                            <div class="text-[11px] text-slate-400">Hingga 60 hari resmi</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Interactive Hero Showcase Mockup -->
            <div class="mt-16 relative max-w-5xl mx-auto">
                <div class="relative rounded-2xl p-1 bg-gradient-to-b from-slate-700/40 via-slate-800/20 to-transparent shadow-2xl">
                    <div class="bg-slate-950 rounded-[14px] overflow-hidden border border-slate-800">
                        <!-- Browser Header Bar -->
                        <div class="px-4 py-3 bg-slate-900 border-b border-slate-800 flex items-center justify-between">
                            <div class="flex items-center gap-2">
                                <span class="w-3 h-3 rounded-full bg-rose-500/80 inline-block"></span>
                                <span class="w-3 h-3 rounded-full bg-amber-500/80 inline-block"></span>
                                <span class="w-3 h-3 rounded-full bg-emerald-500/80 inline-block"></span>
                            </div>
                            <div class="px-6 py-1 rounded-md bg-slate-950 border border-slate-800 text-[11px] text-slate-400 font-mono flex items-center gap-2">
                                <span class="text-emerald-400">🔒 https://</span>webkita.id/preview/klien-sukses
                            </div>
                            <div class="text-xs text-slate-500 font-mono">
                                Laravel 11.x
                            </div>
                        </div>

                        <!-- Mockup Content Grid -->
                        <div class="p-6 md:p-8 bg-gradient-to-b from-slate-900/60 to-slate-950 grid grid-cols-1 md:grid-cols-12 gap-6 items-center">
                            <div class="md:col-span-7 space-y-4 text-left">
                                <span class="px-3 py-1 rounded-full text-xs font-semibold bg-emerald-500/20 text-emerald-400 border border-emerald-500/30">
                                    Live Demonstration Preview
                                </span>
                                <h3 class="text-2xl sm:text-3xl font-bold text-white">
                                    Desain Bersih, Elegan, dan Teroptimasi untuk Konversi Penjualan
                                </h3>
                                <p class="text-sm text-slate-300 leading-relaxed">
                                    Setiap piksel dirancang dengan cermat untuk memastikan calon pelanggan Anda merasa nyaman, percaya, dan segera menekan tombol WhatsApp atau checkout produk Anda.
                                </p>
                                <div class="pt-2 flex flex-wrap items-center gap-4 text-xs font-medium text-slate-300">
                                    <span class="flex items-center gap-1.5"><span class="text-emerald-400">✓</span> PageSpeed Score 95+</span>
                                    <span class="flex items-center gap-1.5"><span class="text-emerald-400">✓</span> SEO Google Friendly</span>
                                    <span class="flex items-center gap-1.5"><span class="text-emerald-400">✓</span> WhatsApp CRM Ready</span>
                                </div>
                            </div>
                            
                            <div class="md:col-span-5 bg-slate-900 border border-slate-800 rounded-xl p-5 shadow-xl space-y-4">
                                <div class="flex items-center justify-between pb-3 border-b border-slate-800">
                                    <span class="text-xs font-bold text-slate-200">Statistik Website Klien</span>
                                    <span class="text-[10px] text-emerald-400 bg-emerald-950/60 px-2 py-0.5 rounded-full border border-emerald-800/40">30 Hari Pertama</span>
                                </div>
                                <div class="grid grid-cols-2 gap-3">
                                    <div class="p-3 rounded-lg bg-slate-950/70 border border-slate-800/80">
                                        <div class="text-[11px] text-slate-400">Kunjungan Web</div>
                                        <div class="text-xl font-bold text-white mt-1">14.280</div>
                                        <div class="text-[10px] text-emerald-400 mt-0.5">↑ +142% vs medsos</div>
                                    </div>
                                    <div class="p-3 rounded-lg bg-slate-950/70 border border-slate-800/80">
                                        <div class="text-[11px] text-slate-400">Klik WhatsApp</div>
                                        <div class="text-xl font-bold text-emerald-400 mt-1">842 Lead</div>
                                        <div class="text-[10px] text-emerald-400 mt-0.5">Tingkat konversi 5.9%</div>
                                    </div>
                                </div>
                                <div class="p-3 rounded-lg bg-emerald-500/10 border border-emerald-500/20 text-xs text-slate-300 flex items-center justify-between">
                                    <span>Estimasi Omset Baru</span>
                                    <span class="font-bold text-emerald-400 text-sm">Rp 48.500.000+</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- LOGO CLOUD / SOCIAL PROOF -->
    <section class="py-12 border-y border-slate-900 bg-slate-950/50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <p class="text-xs font-semibold uppercase tracking-wider text-slate-400 mb-8">
                Telah Membantu Pertumbuhan Digital Berbagai Kategori Bisnis di Indonesia
            </p>
            <div class="flex flex-wrap items-center justify-center gap-8 md:gap-14 opacity-75">
                <span class="text-sm font-bold tracking-widest text-slate-300 uppercase">🏢 SENTOSA LOGISTIK</span>
                <span class="text-sm font-bold tracking-widest text-slate-300 uppercase">🥐 MAYA ARTISAN BAKERY</span>
                <span class="text-sm font-bold tracking-widest text-slate-300 uppercase">☕ KOPIKITA ROASTERY</span>
                <span class="text-sm font-bold tracking-widest text-slate-300 uppercase">🏥 MEDIKA CLINIC GROUP</span>
                <span class="text-sm font-bold tracking-widest text-slate-300 uppercase">👗 LUMINA APPAREL</span>
                <span class="text-sm font-bold tracking-widest text-slate-300 uppercase">⚖️ PRATAMA & CO LAW</span>
            </div>
        </div>
    </section>

    <!-- LAYANAN UNGGULAN (SERVICES GRID) -->
    <section id="layanan" class="py-24 relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <span class="text-xs font-bold uppercase tracking-widest text-emerald-400 bg-emerald-950/40 px-3.5 py-1.5 rounded-full border border-emerald-800/40 inline-block mb-3">
                    Layanan Spesialis
                </span>
                <h2 class="text-3xl sm:text-5xl font-extrabold text-white tracking-tight mb-4">
                    Solusi Web Lengkap untuk Setiap Skala Bisnis
                </h2>
                <p class="text-base text-slate-400">
                    Dari promosi produk tunggal hingga aplikasi web enterprise yang kompleks, kami bangun dengan arsitektur modern dan standar performa tinggi.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Service 1: Landing Page -->
                <div class="glass-panel glass-panel-hover p-7 rounded-2xl flex flex-col justify-between">
                    <div>
                        <div class="w-12 h-12 rounded-xl bg-emerald-500/15 border border-emerald-500/30 text-emerald-400 flex items-center justify-center text-2xl mb-6">
                            🚀
                        </div>
                        <h3 class="text-xl font-bold text-white mb-2">Landing Page Iklan</h3>
                        <p class="text-xs text-emerald-400 font-semibold mb-3">High-Converting Layout</p>
                        <p class="text-sm text-slate-400 leading-relaxed mb-6">
                            Dirancang khusus untuk kampanye iklan Google Ads, TikTok Ads, dan Meta Ads. Fokus 100% mengarahkan pengunjung menjadi prospek WhatsApp.
                        </p>
                        <ul class="space-y-2 text-xs text-slate-300 mb-6">
                            <li class="flex items-center gap-2"><span class="text-emerald-400">✓</span> Copywriting berorientasi aksi</li>
                            <li class="flex items-center gap-2"><span class="text-emerald-400">✓</span> Loading di bawah 2 detik</li>
                            <li class="flex items-center gap-2"><span class="text-emerald-400">✓</span> Tombol WhatsApp interaktif</li>
                        </ul>
                    </div>
                    <a href="#paket" class="text-xs font-bold text-emerald-400 hover:text-emerald-300 flex items-center gap-1.5 pt-4 border-t border-slate-800">
                        <span>Pilih Paket Kilat</span> <span>→</span>
                    </a>
                </div>

                <!-- Service 2: Company Profile -->
                <div class="glass-panel glass-panel-hover p-7 rounded-2xl flex flex-col justify-between">
                    <div>
                        <div class="w-12 h-12 rounded-xl bg-cyan-500/15 border border-cyan-500/30 text-cyan-400 flex items-center justify-center text-2xl mb-6">
                            🏢
                        </div>
                        <h3 class="text-xl font-bold text-white mb-2">Company Profile</h3>
                        <p class="text-xs text-cyan-400 font-semibold mb-3">Kredibilitas Bisnis & Jasa</p>
                        <p class="text-sm text-slate-400 leading-relaxed mb-6">
                            Membangun reputasi terpercaya untuk CV, PT, kantor hukum, konsultan, dan penyedia jasa. Dilengkapi katalog portofolio dan legalitas.
                        </p>
                        <ul class="space-y-2 text-xs text-slate-300 mb-6">
                            <li class="flex items-center gap-2"><span class="text-cyan-400">✓</span> Hingga 5-10 halaman eksklusif</li>
                            <li class="flex items-center gap-2"><span class="text-cyan-400">✓</span> Terhubung Google Maps & Kontak</li>
                            <li class="flex items-center gap-2"><span class="text-cyan-400">✓</span> Optimasi SEO Google Organik</li>
                        </ul>
                    </div>
                    <a href="#paket" class="text-xs font-bold text-cyan-400 hover:text-cyan-300 flex items-center gap-1.5 pt-4 border-t border-slate-800">
                        <span>Pilih Paket Bisnis</span> <span>→</span>
                    </a>
                </div>

                <!-- Service 3: Toko Online -->
                <div class="glass-panel glass-panel-hover p-7 rounded-2xl flex flex-col justify-between">
                    <div>
                        <div class="w-12 h-12 rounded-xl bg-emerald-500/15 border border-emerald-500/30 text-emerald-400 flex items-center justify-center text-2xl mb-6">
                            🛍️
                        </div>
                        <h3 class="text-xl font-bold text-white mb-2">Toko Online Otomatis</h3>
                        <p class="text-xs text-emerald-400 font-semibold mb-3">E-Commerce Lengkap</p>
                        <p class="text-sm text-slate-400 leading-relaxed mb-6">
                            Terima pesanan 24 jam nonstop dengan sistem pembayaran otomatis (QRIS, VA Bank) dan kalkulasi ongkos kirim ekspedisi nasional secara akurat.
                        </p>
                        <ul class="space-y-2 text-xs text-slate-300 mb-6">
                            <li class="flex items-center gap-2"><span class="text-emerald-400">✓</span> Payment Gateway QRIS & VA</li>
                            <li class="flex items-center gap-2"><span class="text-emerald-400">✓</span> Ongkir JNE, J&T, SiCepat</li>
                            <li class="flex items-center gap-2"><span class="text-emerald-400">✓</span> Manajemen stok & laporan order</li>
                        </ul>
                    </div>
                    <a href="#paket" class="text-xs font-bold text-emerald-400 hover:text-emerald-300 flex items-center gap-1.5 pt-4 border-t border-slate-800">
                        <span>Pilih Paket Toko</span> <span>→</span>
                    </a>
                </div>

                <!-- Service 4: Custom Laravel App -->
                <div class="glass-panel glass-panel-hover p-7 rounded-2xl flex flex-col justify-between">
                    <div>
                        <div class="w-12 h-12 rounded-xl bg-cyan-500/15 border border-cyan-500/30 text-cyan-400 flex items-center justify-center text-2xl mb-6">
                            ⚙️
                        </div>
                        <h3 class="text-xl font-bold text-white mb-2">Custom Web App</h3>
                        <p class="text-xs text-cyan-400 font-semibold mb-3">Laravel 11 Architecture</p>
                        <p class="text-sm text-slate-400 leading-relaxed mb-6">
                            Solusi sistem manajemen khusus seperti portal member, sistem booking janji, inventaris gudang, atau CRM bisnis berbasis framework Laravel.
                        </p>
                        <ul class="space-y-2 text-xs text-slate-300 mb-6">
                            <li class="flex items-center gap-2"><span class="text-cyan-400">✓</span> Database MySQL 8 Scalable</li>
                            <li class="flex items-center gap-2"><span class="text-cyan-400">✓</span> Role admin, staf, & klien</li>
                            <li class="flex items-center gap-2"><span class="text-cyan-400">✓</span> REST API & Webhook siap pakai</li>
                        </ul>
                    </div>
                    <a href="#kalkulator" class="text-xs font-bold text-cyan-400 hover:text-cyan-300 flex items-center gap-1.5 pt-4 border-t border-slate-800">
                        <span>Hitung Estimasi Biaya</span> <span>→</span>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- SHOWCASE PORTOFOLIO INTERAKTIF -->
    <section id="portofolio" class="py-24 bg-slate-950/70 border-y border-slate-900" x-data="{ activeFilter: 'all' }">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row md:items-end justify-between mb-12 gap-6">
                <div>
                    <span class="text-xs font-bold uppercase tracking-widest text-cyan-400 bg-cyan-950/40 px-3.5 py-1.5 rounded-full border border-cyan-800/40 inline-block mb-3">
                        Portofolio Unggulan
                    </span>
                    <h2 class="text-3xl sm:text-5xl font-extrabold text-white tracking-tight">
                        Karya yang Menghasilkan Dampak
                    </h2>
                </div>

                <!-- Filter Tabs -->
                <div class="flex flex-wrap items-center gap-2 bg-slate-900 p-1.5 rounded-xl border border-slate-800">
                    <button @click="activeFilter = 'all'" 
                            :class="activeFilter === 'all' ? 'bg-emerald-500 text-slate-950 font-bold shadow-md' : 'text-slate-400 hover:text-white'"
                            class="px-3.5 py-1.5 rounded-lg text-xs transition-all">Semua</button>
                    <button @click="activeFilter = 'landing'" 
                            :class="activeFilter === 'landing' ? 'bg-emerald-500 text-slate-950 font-bold shadow-md' : 'text-slate-400 hover:text-white'"
                            class="px-3.5 py-1.5 rounded-lg text-xs transition-all">Landing Page</button>
                    <button @click="activeFilter = 'company'" 
                            :class="activeFilter === 'company' ? 'bg-emerald-500 text-slate-950 font-bold shadow-md' : 'text-slate-400 hover:text-white'"
                            class="px-3.5 py-1.5 rounded-lg text-xs transition-all">Company Profile</button>
                    <button @click="activeFilter = 'toko'" 
                            :class="activeFilter === 'toko' ? 'bg-emerald-500 text-slate-950 font-bold shadow-md' : 'text-slate-400 hover:text-white'"
                            class="px-3.5 py-1.5 rounded-lg text-xs transition-all">Toko Online</button>
                </div>
            </div>

            <!-- Portfolio Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Item 1 -->
                <div x-show="activeFilter === 'all' || activeFilter === 'landing'" 
                     x-transition class="glass-panel rounded-2xl overflow-hidden border border-slate-800 group">
                    <div class="h-52 bg-gradient-to-tr from-slate-900 to-emerald-950/60 p-6 flex flex-col justify-between relative overflow-hidden">
                        <div class="flex justify-between items-start">
                            <span class="px-2.5 py-1 rounded-md text-[10px] font-bold bg-emerald-500/20 text-emerald-300 border border-emerald-500/30">Landing Page Iklan</span>
                            <span class="text-xs text-slate-400">Pengerjaan 3 Hari</span>
                        </div>
                        <div>
                            <div class="text-xs text-emerald-400 font-semibold">Hasil Klien:</div>
                            <div class="text-xl font-bold text-white">Maya Artisan Bakery</div>
                            <div class="text-xs text-slate-300 mt-1">Konversi Iklan Naik +185%</div>
                        </div>
                    </div>
                    <div class="p-6">
                        <p class="text-xs text-slate-400 leading-relaxed mb-4">
                            Landing page produk hampers lebaran dengan tombol pemesanan WhatsApp otomatis dan integrasi katalog digital.
                        </p>
                        <div class="flex items-center justify-between text-xs pt-3 border-t border-slate-800/80">
                            <span class="text-slate-500">Kategori: F&B / UMKM</span>
                            <a href="https://wa.me/6281234567890?text=Halo%20Webkita,%20saya%20tertarik%20dengan%20studi%20kasus%20Maya%20Bakery." target="_blank" class="text-emerald-400 font-semibold hover:underline">Konsultasi Serupa →</a>
                        </div>
                    </div>
                </div>

                <!-- Item 2 -->
                <div x-show="activeFilter === 'all' || activeFilter === 'company'" 
                     x-transition class="glass-panel rounded-2xl overflow-hidden border border-slate-800 group">
                    <div class="h-52 bg-gradient-to-tr from-slate-900 to-cyan-950/60 p-6 flex flex-col justify-between relative overflow-hidden">
                        <div class="flex justify-between items-start">
                            <span class="px-2.5 py-1 rounded-md text-[10px] font-bold bg-cyan-500/20 text-cyan-300 border border-cyan-500/30">Company Profile</span>
                            <span class="text-xs text-slate-400">Pengerjaan 5 Hari</span>
                        </div>
                        <div>
                            <div class="text-xs text-cyan-400 font-semibold">Hasil Klien:</div>
                            <div class="text-xl font-bold text-white">Sentosa Logistik Nusantara</div>
                            <div class="text-xs text-slate-300 mt-1">Closing Tender Perusahaan B2B</div>
                        </div>
                    </div>
                    <div class="p-6">
                        <p class="text-xs text-slate-400 leading-relaxed mb-4">
                            Website profil resmi perusahaan dengan 6 halaman, fitur pelacakan armada terintegrasi, dan legalitas perusahaan lengkap.
                        </p>
                        <div class="flex items-center justify-between text-xs pt-3 border-t border-slate-800/80">
                            <span class="text-slate-500">Kategori: Logistik & Cargo</span>
                            <a href="https://wa.me/6281234567890?text=Halo%20Webkita,%20saya%20tertarik%20dengan%20studi%20kasus%20Sentosa%20Logistik." target="_blank" class="text-cyan-400 font-semibold hover:underline">Konsultasi Serupa →</a>
                        </div>
                    </div>
                </div>

                <!-- Item 3 -->
                <div x-show="activeFilter === 'all' || activeFilter === 'toko'" 
                     x-transition class="glass-panel rounded-2xl overflow-hidden border border-slate-800 group">
                    <div class="h-52 bg-gradient-to-tr from-slate-900 to-teal-950/60 p-6 flex flex-col justify-between relative overflow-hidden">
                        <div class="flex justify-between items-start">
                            <span class="px-2.5 py-1 rounded-md text-[10px] font-bold bg-teal-500/20 text-teal-300 border border-teal-500/30">Toko Online Otomatis</span>
                            <span class="text-xs text-slate-400">Pengerjaan 8 Hari</span>
                        </div>
                        <div>
                            <div class="text-xs text-teal-400 font-semibold">Hasil Klien:</div>
                            <div class="text-xl font-bold text-white">Lumina Fashion Store</div>
                            <div class="text-xs text-slate-300 mt-1">2.400+ Transaksi Otomatis / Bln</div>
                        </div>
                    </div>
                    <div class="p-6">
                        <p class="text-xs text-slate-400 leading-relaxed mb-4">
                            Toko online fashion dengan QRIS instan, notifikasi WhatsApp otomatis saat pesanan masuk, dan cetak resi pengiriman kilat.
                        </p>
                        <div class="flex items-center justify-between text-xs pt-3 border-t border-slate-800/80">
                            <span class="text-slate-500">Kategori: Retail & Fashion</span>
                            <a href="https://wa.me/6281234567890?text=Halo%20Webkita,%20saya%20tertarik%20dengan%20studi%20kasus%20Lumina%20Store." target="_blank" class="text-emerald-400 font-semibold hover:underline">Konsultasi Serupa →</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- TABEL PAKET HARGA TRANSPARAN -->
    <section id="paket" class="py-24 relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <span class="text-xs font-bold uppercase tracking-widest text-emerald-400 bg-emerald-950/40 px-3.5 py-1.5 rounded-full border border-emerald-800/40 inline-block mb-3">
                    Biaya Transparan Tanpa Biaya Tersembunyi
                </span>
                <h2 class="text-3xl sm:text-5xl font-extrabold text-white tracking-tight mb-4">
                    Investasi Terbaik untuk Pertumbuhan Bisnis Anda
                </h2>
                <p class="text-base text-slate-400">
                    Pilih paket yang paling sesuai dengan fase bisnis Anda saat ini. Semua paket sudah termasuk hosting dan domain tahun pertama!
                </p>
            </div>

            <!-- Pricing Cards Grid -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 items-stretch">
                
                <!-- Paket 1: Webkita Kilat -->
                <div class="glass-panel p-8 rounded-3xl flex flex-col justify-between relative border border-slate-800 hover:border-slate-700 transition-all">
                    <div>
                        <div class="flex justify-between items-center mb-4">
                            <span class="text-sm font-bold text-slate-300 uppercase tracking-wide">Webkita Kilat</span>
                            <span class="text-xs px-3 py-1 rounded-full bg-slate-800 text-slate-300 font-medium">1 Halaman</span>
                        </div>
                        <div class="mb-4">
                            <span class="text-3xl sm:text-4xl font-extrabold text-white">Rp 499.000</span>
                            <span class="text-xs text-slate-400 line-through ml-2">Rp 750.000</span>
                            <p class="text-xs text-slate-400 mt-1">Pembayaran satu kali (One-time fee)</p>
                        </div>
                        <p class="text-xs text-slate-300 pb-6 border-b border-slate-800 leading-relaxed">
                            Cocok untuk UMKM, promosi satu produk unggulan, event, seminar, atau portofolio personal.
                        </p>

                        <!-- Feature List -->
                        <ul class="space-y-3 py-6 text-xs text-slate-300">
                            <li class="flex items-center gap-2.5"><span class="text-emerald-400 font-bold">✓</span> 1 Halaman Modern & High-Converting</li>
                            <li class="flex items-center gap-2.5"><span class="text-emerald-400 font-bold">✓</span> Pengerjaan Cepat (3-4 Hari Kerja)</li>
                            <li class="flex items-center gap-2.5"><span class="text-emerald-400 font-bold">✓</span> 100% Responsif Smartphone & Desktop</li>
                            <li class="flex items-center gap-2.5"><span class="text-emerald-400 font-bold">✓</span> Integrasi Tombol Langsung ke WhatsApp</li>
                            <li class="flex items-center gap-2.5"><span class="text-emerald-400 font-bold">✓</span> Gratis Domain (.my.id / .com promo) & Hosting 1 Thn</li>
                            <li class="flex items-center gap-2.5"><span class="text-emerald-400 font-bold">✓</span> SSL Security (HTTPS) Aktif</li>
                            <li class="flex items-center gap-2.5"><span class="text-emerald-400 font-bold">✓</span> Garansi Perbaikan 14 Hari</li>
                        </ul>
                    </div>

                    <a href="https://wa.me/6281234567890?text=Halo%20Webkita,%20saya%20tertarik%20dengan%20Paket%20Starter%20Landing%20Page%20(Rp%20499rb).%20Bisa%20konsultasi%20dulu?" 
                       target="_blank"
                       class="w-full py-3.5 px-4 rounded-xl text-center text-xs font-bold text-slate-200 bg-slate-900 hover:bg-slate-800 border border-slate-700 hover:border-slate-600 transition-all shadow-md">
                        Pesan Paket Kilat via WA
                    </a>
                </div>

                <!-- Paket 2: Webkita Bisnis (PALING POPULER) -->
                <div class="relative rounded-3xl p-1 bg-gradient-to-b from-emerald-400 via-teal-500 to-cyan-500 shadow-2xl shadow-emerald-500/20 flex flex-col justify-between">
                    <div class="bg-slate-950 p-8 rounded-[22px] h-full flex flex-col justify-between">
                        <div>
                            <!-- Popular Badge -->
                            <div class="flex justify-between items-center mb-4">
                                <span class="text-sm font-bold text-emerald-400 uppercase tracking-wide">Webkita Bisnis</span>
                                <span class="text-xs px-3 py-1 rounded-full bg-emerald-500 text-slate-950 font-extrabold shadow-sm">⭐ Paling Populer</span>
                            </div>
                            <div class="mb-4">
                                <span class="text-3xl sm:text-4xl font-extrabold text-white">Rp 1.499.000</span>
                                <span class="text-xs text-slate-400 line-through ml-2">Rp 2.499.000</span>
                                <p class="text-xs text-emerald-400 font-medium mt-1">Paket Komplit Siap Pakai Bisnis Resmi</p>
                            </div>
                            <p class="text-xs text-slate-300 pb-6 border-b border-slate-800 leading-relaxed">
                                Standar emas untuk CV, PT, biro jasa, klinik, restoran, dan UMKM yang ingin tampil profesional dan kredibel di Google.
                            </p>

                            <!-- Feature List -->
                            <ul class="space-y-3 py-6 text-xs text-slate-200">
                                <li class="flex items-center gap-2.5"><span class="text-emerald-400 font-bold">✓</span> <strong>Hingga 5 Halaman Utama</strong> (Home, Tentang, Layanan, Portofolio, Kontak)</li>
                                <li class="flex items-center gap-2.5"><span class="text-emerald-400 font-bold">✓</span> Pengerjaan Kilat 5-7 Hari Kerja</li>
                                <li class="flex items-center gap-2.5"><span class="text-emerald-400 font-bold">✓</span> <strong>Dashboard CMS</strong> (Kelola konten & artikel mandiri)</li>
                                <li class="flex items-center gap-2.5"><span class="text-emerald-400 font-bold">✓</span> Terhubung Google Maps Lokasi & Form Kontak</li>
                                <li class="flex items-center gap-2.5"><span class="text-emerald-400 font-bold">✓</span> <strong>Dasar Optimasi SEO Google</strong> (Cepat terindeks)</li>
                                <li class="flex items-center gap-2.5"><span class="text-emerald-400 font-bold">✓</span> Domain .com / .id Resmi + Cloud VPS 1 Tahun</li>
                                <li class="flex items-center gap-2.5"><span class="text-emerald-400 font-bold">✓</span> 3 Akun Email Bisnis (nama@domainanda.com)</li>
                                <li class="flex items-center gap-2.5"><span class="text-emerald-400 font-bold">✓</span> Garansi Perbaikan & Pendampingan 30 Hari</li>
                            </ul>
                        </div>

                        <a href="https://wa.me/6281234567890?text=Halo%20Webkita,%20saya%20ingin%20membuat%20Website%20Paket%20Bisnis%20Company%20Profile%20(Rp%201.499rb).%20Mohon%20infonya." 
                           target="_blank"
                           class="w-full py-4 px-4 rounded-xl text-center text-xs font-extrabold text-slate-950 bg-gradient-to-r from-emerald-400 via-teal-300 to-cyan-400 hover:opacity-95 shadow-lg shadow-emerald-500/30 hover:scale-[1.02] transition-all">
                            Pilih Paket Bisnis Sekarang
                        </a>
                    </div>
                </div>

                <!-- Paket 3: Webkita Toko / Custom App -->
                <div class="glass-panel p-8 rounded-3xl flex flex-col justify-between relative border border-slate-800 hover:border-slate-700 transition-all">
                    <div>
                        <div class="flex justify-between items-center mb-4">
                            <span class="text-sm font-bold text-slate-300 uppercase tracking-wide">Webkita Toko / Custom</span>
                            <span class="text-xs px-3 py-1 rounded-full bg-cyan-950 text-cyan-300 font-medium border border-cyan-800/40">Full Feature</span>
                        </div>
                        <div class="mb-4">
                            <span class="text-3xl sm:text-4xl font-extrabold text-white">Rp 3.500.000</span>
                            <span class="text-xs text-slate-400 line-through ml-2">Rp 5.500.000</span>
                            <p class="text-xs text-slate-400 mt-1">Sistem Otomatisasi Lengkap</p>
                        </div>
                        <p class="text-xs text-slate-300 pb-6 border-b border-slate-800 leading-relaxed">
                            Untuk brand retail banyak produk, toko online skala berkembang, atau sistem aplikasi web kustom berbasis Laravel.
                        </p>

                        <!-- Feature List -->
                        <ul class="space-y-3 py-6 text-xs text-slate-300">
                            <li class="flex items-center gap-2.5"><span class="text-cyan-400 font-bold">✓</span> Arsitektur Kustom Laravel 11 / E-Commerce</li>
                            <li class="flex items-center gap-2.5"><span class="text-cyan-400 font-bold">✓</span> Sistem Keranjang Belanja & Manajemen Stok</li>
                            <li class="flex items-center gap-2.5"><span class="text-cyan-400 font-bold">✓</span> <strong>Pembayaran Otomatis Midtrans</strong> (QRIS, VA Bank)</li>
                            <li class="flex items-center gap-2.5"><span class="text-cyan-400 font-bold">✓</span> <strong>Hitung Ongkir Otomatis</strong> (JNE, J&T, SiCepat)</li>
                            <li class="flex items-center gap-2.5"><span class="text-cyan-400 font-bold">✓</span> Dashboard Penjualan & Laporan Finansial</li>
                            <li class="flex items-center gap-2.5"><span class="text-cyan-400 font-bold">✓</span> Integrasi Notifikasi WhatsApp (Fonnte/Wablas)</li>
                            <li class="flex items-center gap-2.5"><span class="text-cyan-400 font-bold">✓</span> Garansi & Dukungan Teknis Prioritas 60 Hari</li>
                        </ul>
                    </div>

                    <a href="https://wa.me/6281234567890?text=Halo%20Webkita,%20saya%20ingin%20membuat%20Toko%20Online%20dengan%20fitur%20pembayaran%20otomatis%20(Rp%203.5jt).%20Mohon%20infonya." 
                       target="_blank"
                       class="w-full py-3.5 px-4 rounded-xl text-center text-xs font-bold text-slate-200 bg-slate-900 hover:bg-slate-800 border border-slate-700 hover:border-slate-600 transition-all shadow-md">
                        Pesan Paket Toko via WA
                    </a>
                </div>

            </div>
        </div>
    </section>

    <!-- KALKULATOR ESTIMASI BIAYA INTERAKTIF (WIDGET ALPINE.JS) -->
    <section id="kalkulator" class="py-24 bg-slate-950/80 border-y border-slate-900 relative">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <span class="text-xs font-bold uppercase tracking-widest text-emerald-400 bg-emerald-950/40 px-3.5 py-1.5 rounded-full border border-emerald-800/40 inline-block mb-3">
                    Interactive Calculator Widget
                </span>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-white tracking-tight mb-3">
                    Hitung Estimasi Biaya Pembuatan Website Anda
                </h2>
                <p class="text-sm text-slate-400">
                    Pilih paket dasar dan sesuaikan fitur tambahan sesuai kebutuhan proyek Anda. Dapatkan estimasi biaya instan dan konsultasikan langsung!
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
                    if (this.hasMultiLang) text += '- Fitur Multi-Bahasa ID/EN (Rp 400.000)%0A';
                    if (this.hasWhatsAppBot) text += '- WhatsApp CRM / Auto-Reply (Rp 250.000)%0A';
                    if (this.hasCopywriting) text += '- Copywriting Profesional (Rp 300.000)%0A';
                    if (this.hasExpress48h) text += '- Prioritas Kilat 48 Jam (Rp 450.000)%0A';
                    text += '%0A*Total Estimasi: ' + this.formatRupiah(this.grandTotal) + '*%0A%0AMohon konfirmasi jadwal pengerjaan.';
                    return 'https://wa.me/6281234567890?text=' + text;
                }
            }" class="glass-panel p-6 sm:p-10 rounded-3xl border border-slate-800 shadow-2xl">

                <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
                    
                    <!-- Left Options -->
                    <div class="lg:col-span-7 space-y-6">
                        <!-- Step 1: Base Tier -->
                        <div>
                            <label class="block text-xs font-bold uppercase tracking-wider text-slate-300 mb-3">
                                1. Pilih Paket Dasar
                            </label>
                            <div class="grid grid-cols-1 sm:grid-cols-3 gap-3">
                                <button type="button" 
                                        @click="baseTier = 499000; baseName = 'Paket Webkita Kilat (1 Hal)'"
                                        :class="baseTier === 499000 ? 'border-emerald-500 bg-emerald-950/40 text-white' : 'border-slate-800 bg-slate-900/60 text-slate-400 hover:border-slate-700'"
                                        class="p-3.5 rounded-xl border text-left transition-all">
                                    <div class="text-xs font-bold">Kilat</div>
                                    <div class="text-[11px] text-emerald-400 font-semibold mt-1">Rp 499.000</div>
                                    <div class="text-[10px] text-slate-500 mt-0.5">1 Halaman</div>
                                </button>

                                <button type="button" 
                                        @click="baseTier = 1499000; baseName = 'Paket Webkita Bisnis (5 Hal)'"
                                        :class="baseTier === 1499000 ? 'border-emerald-500 bg-emerald-950/40 text-white' : 'border-slate-800 bg-slate-900/60 text-slate-400 hover:border-slate-700'"
                                        class="p-3.5 rounded-xl border text-left transition-all">
                                    <div class="text-xs font-bold">Bisnis ⭐</div>
                                    <div class="text-[11px] text-emerald-400 font-semibold mt-1">Rp 1.499.000</div>
                                    <div class="text-[10px] text-slate-500 mt-0.5">Hingga 5 Hal</div>
                                </button>

                                <button type="button" 
                                        @click="baseTier = 3500000; baseName = 'Paket Toko / Custom App'"
                                        :class="baseTier === 3500000 ? 'border-emerald-500 bg-emerald-950/40 text-white' : 'border-slate-800 bg-slate-900/60 text-slate-400 hover:border-slate-700'"
                                        class="p-3.5 rounded-xl border text-left transition-all">
                                    <div class="text-xs font-bold">Toko / Custom</div>
                                    <div class="text-[11px] text-emerald-400 font-semibold mt-1">Rp 3.500.000</div>
                                    <div class="text-[10px] text-slate-500 mt-0.5">E-Commerce</div>
                                </button>
                            </div>
                        </div>

                        <!-- Step 2: Extra Pages Counter -->
                        <div class="pt-2">
                            <div class="flex items-center justify-between mb-2">
                                <label class="text-xs font-bold uppercase tracking-wider text-slate-300">
                                    2. Tambahan Halaman Khusus (+Rp 150rb/hal)
                                </label>
                                <span class="text-xs font-semibold text-emerald-400" x-text="extraPages + ' Halaman Tambahan'"></span>
                            </div>
                            <div class="flex items-center gap-3">
                                <button type="button" @click="if(extraPages > 0) extraPages--" class="w-10 h-10 rounded-xl bg-slate-900 border border-slate-800 text-slate-200 text-lg font-bold hover:bg-slate-800">-</button>
                                <input type="range" min="0" max="15" step="1" x-model.number="extraPages" class="w-full accent-emerald-500">
                                <button type="button" @click="if(extraPages < 15) extraPages++" class="w-10 h-10 rounded-xl bg-slate-900 border border-slate-800 text-slate-200 text-lg font-bold hover:bg-slate-800">+</button>
                            </div>
                        </div>

                        <!-- Step 3: Additional Features Checkboxes -->
                        <div class="pt-2 space-y-2.5">
                            <label class="block text-xs font-bold uppercase tracking-wider text-slate-300 mb-2">
                                3. Fitur Opsional Tambahan
                            </label>

                            <label class="flex items-center justify-between p-3 rounded-xl bg-slate-900/60 border border-slate-800/80 hover:border-slate-700 cursor-pointer text-xs">
                                <div class="flex items-center gap-2.5">
                                    <input type="checkbox" x-model="hasPaymentGateway" class="w-4 h-4 rounded text-emerald-500 focus:ring-emerald-500 accent-emerald-500">
                                    <span class="text-slate-200 font-medium">Integrasi Payment Gateway QRIS & VA Bank</span>
                                </div>
                                <span class="text-slate-400 font-mono">+Rp 350.000</span>
                            </label>

                            <label class="flex items-center justify-between p-3 rounded-xl bg-slate-900/60 border border-slate-800/80 hover:border-slate-700 cursor-pointer text-xs">
                                <div class="flex items-center gap-2.5">
                                    <input type="checkbox" x-model="hasMultiLang" class="w-4 h-4 rounded text-emerald-500 focus:ring-emerald-500 accent-emerald-500">
                                    <span class="text-slate-200 font-medium">Fitur Multi-Bahasa (Indonesia & English Switcher)</span>
                                </div>
                                <span class="text-slate-400 font-mono">+Rp 400.000</span>
                            </label>

                            <label class="flex items-center justify-between p-3 rounded-xl bg-slate-900/60 border border-slate-800/80 hover:border-slate-700 cursor-pointer text-xs">
                                <div class="flex items-center gap-2.5">
                                    <input type="checkbox" x-model="hasWhatsAppBot" class="w-4 h-4 rounded text-emerald-500 focus:ring-emerald-500 accent-emerald-500">
                                    <span class="text-slate-200 font-medium">Integrasi WhatsApp CRM & Chatbot Auto-Reply</span>
                                </div>
                                <span class="text-slate-400 font-mono">+Rp 250.000</span>
                            </label>

                            <label class="flex items-center justify-between p-3 rounded-xl bg-slate-900/60 border border-slate-800/80 hover:border-slate-700 cursor-pointer text-xs">
                                <div class="flex items-center gap-2.5">
                                    <input type="checkbox" x-model="hasCopywriting" class="w-4 h-4 rounded text-emerald-500 focus:ring-emerald-500 accent-emerald-500">
                                    <span class="text-slate-200 font-medium">Jasa Copywriting Naskah Konten Profesional</span>
                                </div>
                                <span class="text-slate-400 font-mono">+Rp 300.000</span>
                            </label>

                            <label class="flex items-center justify-between p-3 rounded-xl bg-slate-900/60 border border-slate-800/80 hover:border-slate-700 cursor-pointer text-xs">
                                <div class="flex items-center gap-2.5">
                                    <input type="checkbox" x-model="hasExpress48h" class="w-4 h-4 rounded text-emerald-500 focus:ring-emerald-500 accent-emerald-500">
                                    <span class="text-amber-300 font-medium">⚡ Prioritas Pengerjaan Kilat (Selesai 48 Jam)</span>
                                </div>
                                <span class="text-amber-400 font-mono">+Rp 450.000</span>
                            </label>
                        </div>
                    </div>

                    <!-- Right Summary Card -->
                    <div class="lg:col-span-5 bg-slate-900 border border-slate-800 rounded-2xl p-6 space-y-6 sticky top-28">
                        <div class="border-b border-slate-800 pb-4">
                            <span class="text-xs font-bold text-slate-400 uppercase tracking-wide">Ringkasan Estimasi</span>
                            <div class="text-xs text-emerald-400 mt-1" x-text="baseName"></div>
                        </div>

                        <div class="space-y-2.5 text-xs text-slate-300">
                            <div class="flex justify-between">
                                <span class="text-slate-400">Biaya Paket Dasar</span>
                                <span class="font-mono text-white" x-text="formatRupiah(baseTier)"></span>
                            </div>
                            <div x-show="extraPages > 0" class="flex justify-between">
                                <span class="text-slate-400" x-text="'Halaman Tambahan (' + extraPages + ')'"></span>
                                <span class="font-mono text-white" x-text="formatRupiah(extraPagesCost)"></span>
                            </div>
                            <div x-show="hasPaymentGateway" class="flex justify-between">
                                <span class="text-slate-400">Payment Gateway</span>
                                <span class="font-mono text-white">Rp 350.000</span>
                            </div>
                            <div x-show="hasMultiLang" class="flex justify-between">
                                <span class="text-slate-400">Multi-Bahasa (ID/EN)</span>
                                <span class="font-mono text-white">Rp 400.000</span>
                            </div>
                            <div x-show="hasWhatsAppBot" class="flex justify-between">
                                <span class="text-slate-400">WhatsApp CRM</span>
                                <span class="font-mono text-white">Rp 250.000</span>
                            </div>
                            <div x-show="hasCopywriting" class="flex justify-between">
                                <span class="text-slate-400">Copywriting Naskah</span>
                                <span class="font-mono text-white">Rp 300.000</span>
                            </div>
                            <div x-show="hasExpress48h" class="flex justify-between">
                                <span class="text-amber-400">Prioritas Kilat 48 Jam</span>
                                <span class="font-mono text-amber-400">Rp 450.000</span>
                            </div>
                        </div>

                        <!-- Grand Total -->
                        <div class="pt-4 border-t border-slate-800">
                            <div class="text-xs text-slate-400 mb-1">Total Estimasi Investasi:</div>
                            <div class="text-3xl font-extrabold text-white gradient-text" x-text="formatRupiah(grandTotal)"></div>
                            <div class="text-[11px] text-slate-500 mt-1">Sudah termasuk setup, hosting 1 thn & garansi resmi.</div>
                        </div>

                        <!-- Direct WhatsApp Order Button -->
                        <a :href="waLink" 
                           target="_blank"
                           class="w-full py-4 px-4 rounded-xl text-center text-xs font-bold text-slate-950 bg-gradient-to-r from-emerald-400 to-cyan-400 hover:opacity-95 shadow-xl shadow-emerald-500/25 flex items-center justify-center gap-2 transition-all">
                            <svg class="w-4 h-4 fill-slate-950" viewBox="0 0 24 24"><path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.582 2.128 2.182-.573c.978.58 1.911.928 3.145.929 3.178 0 5.767-2.587 5.768-5.766.001-3.187-2.575-5.77-5.764-5.771zm3.392 8.244c-.144.405-.837.774-1.17.824-.299.045-.677.063-1.092-.069-.252-.08-.575-.187-.988-.365-1.739-.751-2.874-2.502-2.961-2.617-.087-.116-.708-.94-.708-1.793s.448-1.273.607-1.446c.159-.173.346-.217.462-.217l.332.006c.106.005.249-.04.39.298.144.347.491 1.2.534 1.287.043.087.072.188.014.304-.058.116-.087.188-.173.289l-.26.304c-.087.086-.177.18-.076.354.101.174.449.741.964 1.201.662.591 1.221.774 1.394.86.174.086.275.072.376-.044.101-.116.433-.506.549-.68.116-.173.231-.145.39-.086s1.011.477 1.184.564.289.13.332.202c.043.073.043.419-.101.824z"/></svg>
                            <span>Pesan Sesuai Estimasi via WhatsApp</span>
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <!-- TESTIMONI KLIEN -->
    <section class="py-24 relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <span class="text-xs font-bold uppercase tracking-widest text-emerald-400 bg-emerald-950/40 px-3.5 py-1.5 rounded-full border border-emerald-800/40 inline-block mb-3">
                    Cerita Kepuasan Klien
                </span>
                <h2 class="text-3xl sm:text-5xl font-extrabold text-white tracking-tight mb-4">
                    Dipercaya Lebih dari 120+ Pelaku Bisnis
                </h2>
                <p class="text-base text-slate-400">
                    Bukan sekadar website bagus, tapi solusi nyata yang mendatangkan pesanan dan meningkatkan kredibilitas brand.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Testimonial 1 -->
                <div class="glass-panel p-8 rounded-3xl border border-slate-800 flex flex-col justify-between">
                    <div class="space-y-4">
                        <div class="flex text-amber-400 gap-1 text-sm">★★★★★</div>
                        <p class="text-sm text-slate-300 leading-relaxed italic">
                            "Sebelumnya saya hanya jualan lewat Instagram dan sering kewalahan balas chat. Sejak dibuatkan website oleh Webkita, pembeli langsung checkout mandiri lewat QRIS. Omset naik 3x lipat!"
                        </p>
                    </div>
                    <div class="pt-6 border-t border-slate-800/80 flex items-center gap-3 mt-6">
                        <div class="w-10 h-10 rounded-full bg-emerald-500/20 border border-emerald-500/30 flex items-center justify-center font-bold text-emerald-400 text-sm">
                            MA
                        </div>
                        <div>
                            <div class="text-xs font-bold text-white">Maya Anggraini</div>
                            <div class="text-[11px] text-slate-400">Founder Maya Artisan Bakery</div>
                        </div>
                    </div>
                </div>

                <!-- Testimonial 2 -->
                <div class="glass-panel p-8 rounded-3xl border border-slate-800 flex flex-col justify-between">
                    <div class="space-y-4">
                        <div class="flex text-amber-400 gap-1 text-sm">★★★★★</div>
                        <p class="text-sm text-slate-300 leading-relaxed italic">
                            "Pengerjaan tepat waktu, tim komunikatif dan sangat paham kebutuhan B2B. Company profile yang dibuat Webkita berhasil meyakinkan klien korporat besar untuk deal tender logistik kami."
                        </p>
                    </div>
                    <div class="pt-6 border-t border-slate-800/80 flex items-center gap-3 mt-6">
                        <div class="w-10 h-10 rounded-full bg-cyan-500/20 border border-cyan-500/30 flex items-center justify-center font-bold text-cyan-400 text-sm">
                            HS
                        </div>
                        <div>
                            <div class="text-xs font-bold text-white">Hendro Santoso</div>
                            <div class="text-[11px] text-slate-400">Direktur Sentosa Logistik</div>
                        </div>
                    </div>
                </div>

                <!-- Testimonial 3 -->
                <div class="glass-panel p-8 rounded-3xl border border-slate-800 flex flex-col justify-between">
                    <div class="space-y-4">
                        <div class="flex text-amber-400 gap-1 text-sm">★★★★★</div>
                        <p class="text-sm text-slate-300 leading-relaxed italic">
                            "Paket Kilat-nya beneran kilat! Dalam 3 hari landing page kami sudah siap pakai untuk pasang iklan Meta Ads. Hasilnya luar biasa, biaya iklan jadi jauh lebih efisien karena websitenya ngebut."
                        </p>
                    </div>
                    <div class="pt-6 border-t border-slate-800/80 flex items-center gap-3 mt-6">
                        <div class="w-10 h-10 rounded-full bg-emerald-500/20 border border-emerald-500/30 flex items-center justify-center font-bold text-emerald-400 text-sm">
                            RF
                        </div>
                        <div>
                            <div class="text-xs font-bold text-white">Rizky Fadillah</div>
                            <div class="text-[11px] text-slate-400">Marketing Lead KopiKita</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ SECTION (ACCORDION ALPINE.JS) -->
    <section id="faq" class="py-24 bg-slate-950/70 border-y border-slate-900" x-data="{ activeFaq: null }">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <span class="text-xs font-bold uppercase tracking-widest text-cyan-400 bg-cyan-950/40 px-3.5 py-1.5 rounded-full border border-cyan-800/40 inline-block mb-3">
                    Pertanyaan Umum
                </span>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-white tracking-tight mb-3">
                    Sering Ditanyakan (FAQ)
                </h2>
                <p class="text-sm text-slate-400">
                    Semua yang perlu Anda ketahui tentang proses pembuatan website di Webkita.
                </p>
            </div>

            <!-- Accordion List -->
            <div class="space-y-4">
                <!-- Q1 -->
                <div class="glass-panel rounded-2xl border border-slate-800 overflow-hidden">
                    <button @click="activeFaq = (activeFaq === 1 ? null : 1)" 
                            type="button"
                            class="w-full p-5 text-left flex items-center justify-between text-sm font-bold text-white hover:text-emerald-400 transition-colors">
                        <span>Apakah harga sudah termasuk domain dan hosting?</span>
                        <span class="text-lg transition-transform duration-200" :class="activeFaq === 1 ? 'rotate-180 text-emerald-400' : 'text-slate-500'">↓</span>
                    </button>
                    <div x-show="activeFaq === 1" x-collapse x-cloak class="px-5 pb-5 text-xs text-slate-400 leading-relaxed border-t border-slate-800/60 pt-3">
                        Ya, seluruh paket layanan Webkita sudah mencakup nama domain resmi pilihan Anda dan cloud hosting berkecepatan tinggi selama 1 tahun pertama. Untuk tahun berikutnya, perpanjangan domain dan server sangat terjangkau.
                    </div>
                </div>

                <!-- Q2 -->
                <div class="glass-panel rounded-2xl border border-slate-800 overflow-hidden">
                    <button @click="activeFaq = (activeFaq === 2 ? null : 2)" 
                            type="button"
                            class="w-full p-5 text-left flex items-center justify-between text-sm font-bold text-white hover:text-emerald-400 transition-colors">
                        <span>Berapa lama proses pengerjaan website hingga selesai?</span>
                        <span class="text-lg transition-transform duration-200" :class="activeFaq === 2 ? 'rotate-180 text-emerald-400' : 'text-slate-500'">↓</span>
                    </button>
                    <div x-show="activeFaq === 2" x-collapse x-cloak class="px-5 pb-5 text-xs text-slate-400 leading-relaxed border-t border-slate-800/60 pt-3">
                        Waktu pengerjaan bergantung pada paket yang dipilih: Paket Kilat selesai dalam 3-4 hari kerja, Paket Bisnis 5-7 hari kerja, dan Paket Toko / Custom App sekitar 8-14 hari kerja setelah materi konten (logo, teks, dan foto) kami terima secara lengkap.
                    </div>
                </div>

                <!-- Q3 -->
                <div class="glass-panel rounded-2xl border border-slate-800 overflow-hidden">
                    <button @click="activeFaq = (activeFaq === 3 ? null : 3)" 
                            type="button"
                            class="w-full p-5 text-left flex items-center justify-between text-sm font-bold text-white hover:text-emerald-400 transition-colors">
                        <span>Apakah ada garansi jika terjadi error atau kendala teknis?</span>
                        <span class="text-lg transition-transform duration-200" :class="activeFaq === 3 ? 'rotate-180 text-emerald-400' : 'text-slate-500'">↓</span>
                    </button>
                    <div x-show="activeFaq === 3" x-collapse x-cloak class="px-5 pb-5 text-xs text-slate-400 leading-relaxed border-t border-slate-800/60 pt-3">
                        Tentu saja! Kami memberikan garansi perbaikan gratis antara 14 hingga 60 hari (tergantung paket). Jika terjadi bug, error server, atau link rusak pasca-rilis, tim teknis Webkita akan memperbaikinya tanpa pungutan biaya tambahan.
                    </div>
                </div>

                <!-- Q4 -->
                <div class="glass-panel rounded-2xl border border-slate-800 overflow-hidden">
                    <button @click="activeFaq = (activeFaq === 4 ? null : 4)" 
                            type="button"
                            class="w-full p-5 text-left flex items-center justify-between text-sm font-bold text-white hover:text-emerald-400 transition-colors">
                        <span>Apakah saya bisa mengelola isi konten website sendiri nantinya?</span>
                        <span class="text-lg transition-transform duration-200" :class="activeFaq === 4 ? 'rotate-180 text-emerald-400' : 'text-slate-500'">↓</span>
                    </button>
                    <div x-show="activeFaq === 4" x-collapse x-cloak class="px-5 pb-5 text-xs text-slate-400 leading-relaxed border-t border-slate-800/60 pt-3">
                        Bisa! Untuk Paket Bisnis dan Toko Online, kami sediakan dashboard manajemen konten (CMS) yang sangat mudah digunakan bahkan bagi orang awam sekalipun. Anda juga akan mendapatkan video tutorial panduan penggunaan.
                    </div>
                </div>

                <!-- Q5 -->
                <div class="glass-panel rounded-2xl border border-slate-800 overflow-hidden">
                    <button @click="activeFaq = (activeFaq === 5 ? null : 5)" 
                            type="button"
                            class="w-full p-5 text-left flex items-center justify-between text-sm font-bold text-white hover:text-emerald-400 transition-colors">
                        <span>Bagaimana tahapan pembayaran dan proses kerjasamanya?</span>
                        <span class="text-lg transition-transform duration-200" :class="activeFaq === 5 ? 'rotate-180 text-emerald-400' : 'text-slate-500'">↓</span>
                    </button>
                    <div x-show="activeFaq === 5" x-collapse x-cloak class="px-5 pb-5 text-xs text-slate-400 leading-relaxed border-t border-slate-800/60 pt-3">
                        Alurnya sangat aman dan transparan: Anda memilih paket → konsultasi brief awal via WhatsApp → DP 50% untuk mulai pengerjaan → kami buatkan draft desain untuk Anda review → revisi hingga puas → pelunasan 50% saat website siap online (Go-Live).
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- KONTAK & KONSULTASI FORM SECTION -->
    <section id="kontak" class="py-24 relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="glass-panel rounded-3xl p-8 sm:p-14 border border-slate-800 grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
                
                <div class="lg:col-span-6 space-y-6">
                    <span class="text-xs font-bold uppercase tracking-widest text-emerald-400 bg-emerald-950/40 px-3.5 py-1.5 rounded-full border border-emerald-800/40 inline-block">
                        Mulai Kolaborasi
                    </span>
                    <h2 class="text-3xl sm:text-5xl font-extrabold text-white tracking-tight leading-tight">
                        Wujudkan Website Impian Bisnis Anda Bersama <span class="gradient-text">Webkita</span>.
                    </h2>
                    <p class="text-sm text-slate-300 leading-relaxed">
                        Punya pertanyaan khusus seputar ide website atau butuh rekomendasi strategi digital? Diskusikan langsung dengan konsultan senior kami secara gratis tanpa komitmen.
                    </p>

                    <div class="space-y-4 pt-4 text-xs text-slate-300">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 rounded-lg bg-emerald-500/20 text-emerald-400 flex items-center justify-center font-bold">✓</div>
                            <span>Respon cepat dalam hitungan menit via WhatsApp resmi</span>
                        </div>
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 rounded-lg bg-cyan-500/20 text-cyan-400 flex items-center justify-center font-bold">✓</div>
                            <span>Gratis konsultasi konsep, penentuan nama domain, dan arsitektur</span>
                        </div>
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 rounded-lg bg-emerald-500/20 text-emerald-400 flex items-center justify-center font-bold">✓</div>
                            <span>Invoice resmi & kontrak kerjasama berbadan hukum</span>
                        </div>
                    </div>
                </div>

                <!-- Interactive Contact Form -->
                <div class="lg:col-span-6 bg-slate-900 border border-slate-800 rounded-2xl p-6 sm:p-8" 
                     x-data="{
                         nama: '',
                         whatsapp: '',
                         paketPilihan: 'Paket Webkita Bisnis',
                         pesan: '',
                         kirimKeWhatsApp() {
                             if(!this.nama || !this.whatsapp) {
                                 alert('Mohon isi nama dan nomor WhatsApp Anda terlebih dahulu.');
                                 return;
                             }
                             let t = 'Halo Webkita, saya ingin konsultasi pembuatan website:%0A';
                             t += '- Nama: ' + this.nama + '%0A';
                             t += '- No WhatsApp: ' + this.whatsapp + '%0A';
                             t += '- Minat Paket: ' + this.paketPilihan + '%0A';
                             if(this.pesan) t += '- Keterangan: ' + this.pesan + '%0A';
                             t += '%0AMohon informasi lebih lanjut.';
                             window.open('https://wa.me/6281234567890?text=' + t, '_blank');
                         }
                     }">
                    <h3 class="text-base font-bold text-white mb-4">Kirim Brief Singkat</h3>
                    
                    <form @submit.prevent="kirimKeWhatsApp" class="space-y-4">
                        <div>
                            <label class="block text-xs font-semibold text-slate-300 mb-1">Nama Lengkap / Nama Bisnis *</label>
                            <input type="text" x-model="nama" required placeholder="Contoh: Budi Santoso (KopiKita)" 
                                   class="w-full px-3.5 py-2.5 rounded-xl bg-slate-950 border border-slate-800 text-xs text-white focus:outline-none focus:border-emerald-500">
                        </div>

                        <div>
                            <label class="block text-xs font-semibold text-slate-300 mb-1">Nomor WhatsApp Aktif *</label>
                            <input type="tel" x-model="whatsapp" required placeholder="Contoh: 081234567890" 
                                   class="w-full px-3.5 py-2.5 rounded-xl bg-slate-950 border border-slate-800 text-xs text-white focus:outline-none focus:border-emerald-500">
                        </div>

                        <div>
                            <label class="block text-xs font-semibold text-slate-300 mb-1">Paket yang Diminati</label>
                            <select x-model="paketPilihan" class="w-full px-3.5 py-2.5 rounded-xl bg-slate-950 border border-slate-800 text-xs text-white focus:outline-none focus:border-emerald-500">
                                <option value="Paket Webkita Kilat (Rp 499rb)">Paket Webkita Kilat (Rp 499.000)</option>
                                <option value="Paket Webkita Bisnis (Rp 1.499rb)">Paket Webkita Bisnis (Rp 1.499.000) ⭐ Paling Populer</option>
                                <option value="Paket Toko Online / Custom App (Rp 3.5jt+)">Paket Toko Online / Custom App (Rp 3.500.000+)</option>
                                <option value="Belum Tahu, Butuh Saran Konsultan">Belum Tahu, Butuh Rekomendasi Konsultan</option>
                            </select>
                        </div>

                        <div>
                            <label class="block text-xs font-semibold text-slate-300 mb-1">Ceritakan Sedikit Kebutuhan Website Anda</label>
                            <textarea x-model="pesan" rows="3" placeholder="Contoh: Saya butuh website untuk jualan hijab dengan fitur katalog dan direct WhatsApp..." 
                                      class="w-full px-3.5 py-2.5 rounded-xl bg-slate-950 border border-slate-800 text-xs text-white focus:outline-none focus:border-emerald-500"></textarea>
                        </div>

                        <button type="submit" 
                                class="w-full py-3.5 rounded-xl font-bold text-xs text-slate-950 bg-gradient-to-r from-emerald-400 to-cyan-400 hover:opacity-95 shadow-lg shadow-emerald-500/20 transition-all flex items-center justify-center gap-2">
                            <span>Hubungi Konsultan Sekarang via WhatsApp</span>
                            <span class="text-sm">→</span>
                        </button>
                        
                        <p class="text-[10px] text-slate-500 text-center">
                            Privasi Anda terjamin. Kami tidak pernah membagikan kontak Anda kepada pihak ketiga.
                        </p>
                    </form>
                </div>

            </div>
        </div>
    </section>

</div>
@endsection
