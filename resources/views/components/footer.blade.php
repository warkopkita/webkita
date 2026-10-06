<!-- resources/views/components/footer.blade.php -->
<footer class="bg-[#1D083A] border-t border-purple-500/20 pt-16 pb-12 relative overflow-hidden">
    <!-- Decorative background glow -->
    <div class="absolute bottom-0 left-1/2 -translate-x-1/2 w-3/4 h-32 bg-[#C8F169]/5 blur-3xl pointer-events-none"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-10 pb-12 border-b border-purple-500/15">
            <!-- Brand Column -->
            <div class="lg:col-span-2 space-y-4">
                <a href="{{ url('/') }}" class="flex items-center gap-3">
                    <div class="w-9 h-9 rounded-xl bg-gradient-to-tr from-[#C8F169] to-emerald-400 p-0.5 shadow-md shadow-[#C8F169]/20">
                        <div class="w-full h-full bg-[#270D52] rounded-[10px] flex items-center justify-center">
                            <svg class="w-5 h-5 text-[#C8F169]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                                <polyline points="16 18 22 12 16 6"></polyline>
                                <polyline points="8 6 2 12 8 18"></polyline>
                                <path d="m9 15 3-7 3 7"></path>
                            </svg>
                        </div>
                    </div>
                    <span class="text-2xl font-bold tracking-tight text-white">
                        Web<span class="text-[#C8F169]">kita</span>
                    </span>
                </a>
                <p class="text-purple-200/80 text-sm leading-relaxed max-w-sm">
                    Studio pengembangan website profesional & UI/UX terdepan untuk UMKM, korporat, dan kreator digital Indonesia. Kami merancang pengalaman digital yang mulus dan berfokus pada hasil konversi bisnis.
                </p>
                <div class="pt-2 flex flex-wrap items-center gap-3 text-xs text-purple-200/70">
                    <div class="flex items-center gap-1.5 px-3 py-1.5 rounded-full bg-[#2D1259] border border-purple-500/20">
                        <span class="w-2 h-2 rounded-full bg-[#C8F169] animate-pulse"></span>
                        Status Server: 99.98% Normal
                    </div>
                    <div class="flex items-center gap-1.5 px-3 py-1.5 rounded-full bg-[#2D1259] border border-purple-500/20">
                        <svg class="w-3.5 h-3.5 text-[#C8F169]" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                        SSL 256-bit Encrypted
                    </div>
                </div>
            </div>

            <!-- Layanan Kami -->
            <div>
                <h4 class="text-xs font-bold uppercase tracking-wider text-[#C8F169] mb-4">Layanan Unggulan</h4>
                <ul class="space-y-2.5 text-sm text-purple-200/80">
                    <li><a href="#layanan" class="hover:text-[#C8F169] transition-colors">Landing Page Iklan</a></li>
                    <li><a href="#layanan" class="hover:text-[#C8F169] transition-colors">Website Company Profile</a></li>
                    <li><a href="#layanan" class="hover:text-[#C8F169] transition-colors">Toko Online & E-Commerce</a></li>
                    <li><a href="#layanan" class="hover:text-[#C8F169] transition-colors">Aplikasi Web Laravel Kustom</a></li>
                    <li><a href="#layanan" class="hover:text-[#C8F169] transition-colors">UI/UX Design & Redesign</a></li>
                </ul>
            </div>

            <!-- Paket & Solusi -->
            <div>
                <h4 class="text-xs font-bold uppercase tracking-wider text-[#C8F169] mb-4">Pilihan Paket</h4>
                <ul class="space-y-2.5 text-sm text-purple-200/80">
                    <li><a href="#paket" class="hover:text-[#C8F169] transition-colors">Paket Webkita Kilat</a></li>
                    <li><a href="#paket" class="hover:text-[#C8F169] transition-colors">Paket Webkita Bisnis</a></li>
                    <li><a href="#paket" class="hover:text-[#C8F169] transition-colors">Paket Toko & Kustom App</a></li>
                    <li><a href="#kalkulator" class="hover:text-[#C8F169] transition-colors">Kalkulator Estimasi Biaya</a></li>
                    <li><a href="#faq" class="hover:text-[#C8F169] transition-colors">Garansi & Tanya Jawab</a></li>
                </ul>
            </div>

            <!-- Kontak & Konsultasi -->
            <div>
                <h4 class="text-xs font-bold uppercase tracking-wider text-[#C8F169] mb-4">Hubungi Kami</h4>
                <ul class="space-y-3 text-sm text-purple-200/80">
                    <li class="flex items-start gap-2.5">
                        <svg class="w-4 h-4 text-[#C8F169] mt-0.5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                        <span>+62 812-3456-7890<br><span class="text-xs text-purple-400">Senin - Sabtu: 08.00 - 21.00 WIB</span></span>
                    </li>
                    <li class="flex items-start gap-2.5">
                        <svg class="w-4 h-4 text-[#C8F169] mt-0.5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                        <span>halo@webkita.id</span>
                    </li>
                    <li class="flex items-start gap-2.5">
                        <svg class="w-4 h-4 text-purple-300 mt-0.5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                        <span>Jakarta & Bandung, Indonesia</span>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Bottom Copyright & Badges -->
        <div class="pt-8 flex flex-col sm:flex-row items-center justify-between gap-4 text-xs text-purple-300/60">
            <div>
                &copy; {{ date('Y') }} <span class="text-white font-medium">Webkita</span>. Seluruh Hak Cipta Dilindungi. Solusi Website Bisnis Indonesia.
            </div>
            <div class="flex items-center gap-6 text-purple-200/70">
                <a href="{{ route('legal.privacy') }}" class="hover:text-white transition-colors">Kebijakan Privasi</a>
                <a href="{{ route('legal.terms') }}" class="hover:text-white transition-colors">Syarat & Ketentuan</a>
                <a href="{{ url('/#faq') }}" class="hover:text-white transition-colors">SLA & Garansi</a>
                <span class="text-purple-600">|</span>
                <span>Ditenagai oleh <span class="text-[#C8F169] font-bold">Laravel 11</span></span>
            </div>
        </div>
    </div>
</footer>
