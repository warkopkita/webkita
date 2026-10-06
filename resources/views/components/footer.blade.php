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
                            <span class="font-mono font-black text-[#C8F169] text-xs">&lt;W/&gt;</span>
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
                        <span class="font-mono text-[10px] text-[#C8F169] font-bold">SECURE</span>
                        SSL 256-bit Encrypted
                    </div>
                </div>
            </div>

            <!-- Layanan Kami -->
            <div>
                <h4 class="text-xs font-bold uppercase tracking-wider text-[#C8F169] mb-4">Layanan Unggulan</h4>
                <ul class="space-y-2.5 text-sm text-purple-200/80">
                    <li><a href="{{ route('services.index') }}" class="hover:text-[#C8F169] transition-colors">Semua Layanan</a></li>
                    <li><a href="{{ route('services.show', 'landing-page') }}" class="hover:text-[#C8F169] transition-colors">Landing Page Iklan</a></li>
                    <li><a href="{{ route('services.show', 'company-profile') }}" class="hover:text-[#C8F169] transition-colors">Company Profile</a></li>
                    <li><a href="{{ route('services.show', 'toko-online') }}" class="hover:text-[#C8F169] transition-colors">Toko Online Otomatis</a></li>
                    <li><a href="{{ route('services.show', 'custom-web-app') }}" class="hover:text-[#C8F169] transition-colors">Custom Web App</a></li>
                </ul>
            </div>

            <!-- Paket & Solusi -->
            <div>
                <h4 class="text-xs font-bold uppercase tracking-wider text-[#C8F169] mb-4">Pilihan Paket</h4>
                <ul class="space-y-2.5 text-sm text-purple-200/80">
                    <li><a href="{{ url('/#paket') }}" class="hover:text-[#C8F169] transition-colors">Paket Webkita Kilat</a></li>
                    <li><a href="{{ url('/#paket') }}" class="hover:text-[#C8F169] transition-colors">Paket Webkita Bisnis</a></li>
                    <li><a href="{{ url('/#paket') }}" class="hover:text-[#C8F169] transition-colors">Paket Toko &amp; Kustom App</a></li>
                    <li><a href="{{ url('/#kalkulator') }}" class="hover:text-[#C8F169] transition-colors">Kalkulator Estimasi Biaya</a></li>
                    <li><a href="{{ url('/#faq') }}" class="hover:text-[#C8F169] transition-colors">Garansi &amp; Tanya Jawab</a></li>
                </ul>
            </div>

            <!-- Kontak & Konsultasi -->
            <div>
                <h4 class="text-xs font-bold uppercase tracking-wider text-[#C8F169] mb-4">Hubungi Kami</h4>
                <ul class="space-y-3 text-sm text-purple-200/80">
                    <li class="space-y-0.5">
                        <span class="text-[10px] font-mono text-[#C8F169] uppercase font-bold block">WHATSAPP:</span>
                        <span>+62 812-3456-7890</span>
                        <span class="text-[11px] text-purple-400 block">Senin - Sabtu: 08.00 - 21.00 WIB</span>
                    </li>
                    <li class="space-y-0.5">
                        <span class="text-[10px] font-mono text-[#C8F169] uppercase font-bold block">EMAIL:</span>
                        <span>halo@webkita.id</span>
                    </li>
                    <li class="space-y-0.5">
                        <span class="text-[10px] font-mono text-[#C8F169] uppercase font-bold block">STUDIO:</span>
                        <span>Jakarta &amp; Bandung, Indonesia</span>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Newsletter Strip in Footer -->
        <div class="my-8 p-6 rounded-2xl bg-[#240B4D] border border-white/10 flex flex-col md:flex-row items-center justify-between gap-6">
            <div class="space-y-1 text-center md:text-left">
                <span class="text-[10px] font-mono font-bold text-[#C8F169] uppercase tracking-wider block">BERLANGGANAN WAWASAN</span>
                <h4 class="text-sm font-bold text-white">Dapatkan Tips SEO &amp; Strategi Digital Terbaru</h4>
                <p class="text-xs text-purple-200/70">Wawasan praktis mingguan untuk pertumbuhan bisnis Anda, langsung ke inbox. Bebas spam.</p>
            </div>
            <form action="{{ route('newsletter.subscribe') }}" method="POST" class="flex items-center gap-2 max-w-sm w-full">
                @csrf
                <input type="hidden" name="source" value="website_footer">
                <input type="email" name="email" required placeholder="Email Anda..." 
                       class="w-full px-4 py-2.5 rounded-full bg-[#1A0630] border border-purple-400/30 text-xs text-white placeholder-purple-300/50 focus:outline-none focus:border-[#C8F169]">
                <button type="submit" class="lime-pill px-5 py-2.5 rounded-full text-xs font-bold shrink-0">
                    Kirim
                </button>
            </form>
        </div>

        <!-- Bottom Copyright & Badges -->
        <div class="pt-8 flex flex-col sm:flex-row items-center justify-between gap-4 text-xs text-purple-300/60">
            <div>
                &copy; {{ date('Y') }} <span class="text-white font-medium">Webkita</span>. Seluruh Hak Cipta Dilindungi. Solusi Website Bisnis Indonesia.
            </div>
            <div class="flex items-center gap-6 text-purple-200/70">
                <a href="{{ route('legal.privacy') }}" class="hover:text-white transition-colors">Kebijakan Privasi</a>
                <a href="{{ route('legal.terms') }}" class="hover:text-white transition-colors">Syarat &amp; Ketentuan</a>
                <a href="{{ url('/#faq') }}" class="hover:text-white transition-colors">SLA &amp; Garansi</a>
                <span class="text-purple-600">|</span>
                <span>Ditenagai oleh <span class="text-[#C8F169] font-bold">Laravel 11</span></span>
            </div>
        </div>
    </div>
</footer>

