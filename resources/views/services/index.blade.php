@extends('layouts.app')

@section('title', 'Layanan Pembuatan Website & UI/UX Studio — Webkita')
@section('meta_description', 'Layanan rekayasa website profesional Webkita: Landing Page Konversi Tinggi, Company Profile Kredibel, Toko Online Otomatis, dan Custom Web App Laravel.')

@section('content')
<div class="relative overflow-hidden bg-[#381867] text-white pt-28 pb-24 px-4 sm:px-6 lg:px-8">
    <!-- Ambient Glow -->
    <div class="absolute -top-24 -left-24 w-96 h-96 bg-[#C8F169]/10 rounded-full blur-3xl pointer-events-none"></div>
    <div class="absolute bottom-10 right-10 w-96 h-96 bg-purple-500/15 rounded-full blur-3xl pointer-events-none"></div>

    <div class="max-w-7xl mx-auto relative z-10 space-y-16">

        <!-- Header Presentation Banner -->
        <div class="relative rounded-3xl bg-gradient-to-br from-[#451C7E] via-[#351563] to-[#240B4D] border border-white/15 p-8 sm:p-12 shadow-2xl overflow-hidden">
            <div class="frame-corner frame-corner-tl"></div>
            <div class="frame-corner frame-corner-tr"></div>
            <div class="frame-corner frame-corner-bl"></div>
            <div class="frame-corner frame-corner-br"></div>

            <div class="max-w-3xl space-y-4">
                <span class="text-xs font-mono font-bold tracking-widest text-[#C8F169] uppercase">WEBKITA ENGINEERING SUITE</span>
                <h1 class="text-3xl sm:text-5xl font-black text-white tracking-tight leading-tight">
                    Layanan Rekayasa Website <span class="text-[#C8F169]">&amp; UI/UX Digital</span>
                </h1>
                <p class="text-sm sm:text-base text-purple-200/90 leading-relaxed">
                    Setiap bisnis memiliki model dan audiens unik. Webkita merancang arsitektur website dengan performa kilat, tampilan eksklusif, dan daya konversi terukur untuk akselerasi pertumbuhan bisnis Anda.
                </p>
                <div class="pt-4 flex flex-wrap gap-3">
                    <a href="#katalog-layanan" class="lime-pill px-6 py-3 rounded-full text-xs font-bold inline-block">
                        Lihat Spesifikasi Layanan
                    </a>
                    <a href="{{ route('home') }}#harga" class="glass-pill px-6 py-3 rounded-full text-xs font-bold text-white inline-block">
                        Daftar Paket Harga
                    </a>
                </div>
            </div>
        </div>

        <!-- Services Grid -->
        <div id="katalog-layanan" class="space-y-10">
            <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-4 border-b border-white/10 pb-4">
                <div>
                    <span class="text-xs font-mono text-[#C8F169] uppercase tracking-wider">KATALOG LENGKAP</span>
                    <h2 class="text-2xl sm:text-3xl font-black text-white">4 Pilar Solusi Webkita</h2>
                </div>
                <p class="text-xs text-purple-300 max-w-sm">
                    Teknologi mutakhir Laravel 11, Tailwind CSS, infrastruktur VPS andal, dan desain visual standar studio modern.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                @foreach ($services as $index => $srv)
                    <div class="relative rounded-3xl bg-[#270D52]/90 border border-white/15 p-8 flex flex-col justify-between hover:border-[#C8F169]/50 transition-all duration-300 shadow-xl overflow-hidden group">
                        <div class="frame-corner frame-corner-tl"></div>
                        <div class="frame-corner frame-corner-tr"></div>
                        <div class="frame-corner frame-corner-bl"></div>
                        <div class="frame-corner frame-corner-br"></div>

                        <div class="space-y-6">
                            <!-- Top Meta -->
                            <div class="flex items-center justify-between">
                                <span class="text-2xl font-black font-mono text-[#C8F169]/40 group-hover:text-[#C8F169] transition-colors">
                                    0{{ $index + 1 }}
                                </span>
                                <span class="px-3 py-1 rounded-full text-[10px] font-bold uppercase tracking-wider bg-white/10 text-[#C8F169] border border-white/15">
                                    {{ $srv->badge_text ?? 'Aktif' }}
                                </span>
                            </div>

                            <!-- Title & Tagline -->
                            <div>
                                <h3 class="text-xl sm:text-2xl font-black text-white group-hover:text-[#C8F169] transition-colors">
                                    {{ $srv->name }}
                                </h3>
                                <p class="text-xs font-mono text-purple-300 mt-1 uppercase tracking-wider">
                                    {{ $srv->tagline }}
                                </p>
                            </div>

                            <!-- Description -->
                            <p class="text-xs sm:text-sm text-purple-200/80 leading-relaxed">
                                {{ $srv->description }}
                            </p>

                            <!-- Key Specs / Deliverables -->
                            <div class="p-4 rounded-2xl bg-[#1A0630]/70 border border-white/10 space-y-2">
                                <span class="text-[11px] font-bold text-white block">Termasuk dalam Layanan:</span>
                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-2 text-[11px] text-purple-200">
                                    <div class="flex items-center gap-2">
                                        <span class="w-1.5 h-1.5 rounded-full bg-[#C8F169]"></span>
                                        <span>Mobile Responsive 100%</span>
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <span class="w-1.5 h-1.5 rounded-full bg-[#C8F169]"></span>
                                        <span>Optimasi SEO Google</span>
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <span class="w-1.5 h-1.5 rounded-full bg-[#C8F169]"></span>
                                        <span>SSL Let's Encrypt Gratis</span>
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <span class="w-1.5 h-1.5 rounded-full bg-[#C8F169]"></span>
                                        <span>Panduan &amp; Garansi Bug</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Packages Attached -->
                            @if ($srv->packages->isNotEmpty())
                                <div class="pt-2">
                                    <span class="text-[11px] font-mono text-purple-400 block mb-2">PILIHAN PAKET TERSEDIA:</span>
                                    <div class="space-y-2">
                                        @foreach ($srv->packages as $pkg)
                                            <div class="flex items-center justify-between p-2.5 rounded-xl bg-purple-900/30 border border-purple-500/20 text-xs">
                                                <div>
                                                    <span class="font-bold text-white">{{ $pkg->name }}</span>
                                                    <span class="text-[10px] text-[#C8F169] block font-mono">Rp {{ number_format($pkg->price, 0, ',', '.') }}</span>
                                                </div>
                                                <a href="{{ route('checkout.show', $pkg->slug) }}" class="lime-pill px-3 py-1 rounded-full text-[10px] font-bold shrink-0">
                                                    Pesan Sekarang
                                                </a>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endif
                        </div>

                        <!-- Action Footer -->
                        <div class="pt-6 mt-6 border-t border-white/10 flex items-center justify-between">
                            <a href="{{ route('services.show', $srv->slug) }}" class="text-xs font-bold text-[#C8F169] hover:underline flex items-center gap-1">
                                <span>Pelajari Selengkapnya</span>
                                <span>&rarr;</span>
                            </a>
                            <a href="{{ route('home') }}#kontak" class="text-xs text-purple-300 hover:text-white">
                                Konsultasi Gratis
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- 5-Step Engineering Workflow -->
        <div class="relative rounded-3xl bg-gradient-to-br from-[#2D0F5E] via-[#210947] to-[#170533] border border-white/15 p-8 sm:p-12 shadow-2xl overflow-hidden">
            <div class="frame-corner frame-corner-tl"></div>
            <div class="frame-corner frame-corner-tr"></div>
            <div class="frame-corner frame-corner-bl"></div>
            <div class="frame-corner frame-corner-br"></div>

            <div class="text-center max-w-2xl mx-auto space-y-3 mb-12">
                <span class="text-xs font-mono font-bold tracking-widest text-[#C8F169] uppercase">METODOLOGI EKSEKUSI</span>
                <h2 class="text-2xl sm:text-4xl font-black text-white">5 Langkah Kerja Terstruktur</h2>
                <p class="text-xs sm:text-sm text-purple-200/80">
                    Kami menjaga transparansi dan ketepatan tenggat waktu di setiap tahap pembuatan website Anda.
                </p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-6">
                @php
                    $steps = [
                        ['num' => '01', 'title' => 'Briefing & Riset', 'desc' => 'Analisis model bisnis, tujuan pemasaran, dan pengumpulan materi dari klien.'],
                        ['num' => '02', 'title' => 'Wireframe & UI/UX', 'desc' => 'Perancangan struktur visual berstandar studio dan tata letak konversi tinggi.'],
                        ['num' => '03', 'title' => 'Coding & Integrasi', 'desc' => 'Pengembangan kode bersih Laravel 11, database, pembayaran, dan WhatsApp API.'],
                        ['num' => '04', 'title' => 'Uji Kualitas (QA)', 'desc' => 'Pemeriksaan kecepatan Google PageSpeed, kompatibilitas mobile, dan uji keamanan.'],
                        ['num' => '05', 'title' => 'Go-Live & Garansi', 'desc' => 'Peluncuran domain resmi, konfigurasi SSL, penyerahan akses akun, dan dukungan garansi.'],
                    ];
                @endphp

                @foreach ($steps as $st)
                    <div class="relative p-5 rounded-2xl bg-[#1A0630]/80 border border-white/10 flex flex-col justify-between">
                        <div class="space-y-3">
                            <span class="text-xs font-mono font-bold text-[#C8F169] bg-white/5 px-2.5 py-1 rounded-full border border-[#C8F169]/30 inline-block">
                                {{ $st['num'] }}
                            </span>
                            <h3 class="text-sm font-bold text-white">{{ $st['title'] }}</h3>
                            <p class="text-xs text-purple-200/70 leading-relaxed">{{ $st['desc'] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Consultation CTA Section -->
        <div class="rounded-3xl bg-gradient-to-r from-[#200A44] to-[#3B156B] border border-[#C8F169]/30 p-8 sm:p-12 text-center relative overflow-hidden">
            <div class="max-w-2xl mx-auto space-y-4">
                <span class="text-xs font-mono text-[#C8F169] uppercase tracking-widest font-bold">BUTUH SOLUSI KUSTOM?</span>
                <h3 class="text-2xl sm:text-3xl font-black text-white">Diskusikan Kebutuhan Proyek Anda Sekarang</h3>
                <p class="text-xs sm:text-sm text-purple-200 leading-relaxed">
                    Tim arsitek web kami siap memberikan analisis gratis mengenai arsitektur sistem, estimasi waktu, dan anggaran terbaik untuk bisnis Anda.
                </p>
                <div class="pt-2 flex flex-wrap justify-center gap-4">
                    <a href="https://wa.me/6281234567890?text={{ urlencode('Halo Webkita, saya ingin konsultasi kebutuhan website bisnis saya.') }}" 
                       target="_blank" 
                       class="lime-pill px-8 py-3 rounded-full text-xs font-bold inline-block">
                        Konsultasi via WhatsApp (Fast Response)
                    </a>
                    <a href="{{ route('home') }}#kontak" class="glass-pill px-6 py-3 rounded-full text-xs font-bold text-white inline-block">
                        Kirim Brief Online
                    </a>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
