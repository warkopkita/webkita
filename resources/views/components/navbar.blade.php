<!-- resources/views/components/navbar.blade.php -->
<nav x-data="{ mobileOpen: false, scrolled: false }" 
     @scroll.window="scrolled = (window.pageYOffset > 20)"
     :class="{ 'bg-[#2A1152]/90 backdrop-blur-xl border-b border-purple-400/20 shadow-xl shadow-purple-950/40': scrolled, 'bg-transparent border-b border-transparent': !scrolled }"
     class="fixed top-0 left-0 right-0 z-50 transition-all duration-300">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-20">
            <!-- Logo Brand -->
            <a href="{{ url('/') }}" class="flex items-center gap-3 group focus:outline-none">
                <div class="w-10 h-10 rounded-xl bg-gradient-to-tr from-[#C8F169] to-emerald-400 p-0.5 shadow-lg shadow-[#C8F169]/25 group-hover:shadow-[#C8F169]/40 transition-all duration-300">
                    <div class="w-full h-full bg-[#270D52] rounded-[10px] flex items-center justify-center">
                        <!-- Custom Icon <W/> -->
                        <svg class="w-6 h-6 text-[#C8F169] group-hover:scale-110 transition-transform duration-300" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="16 18 22 12 16 6"></polyline>
                            <polyline points="8 6 2 12 8 18"></polyline>
                            <path d="m9 15 3-7 3 7"></path>
                        </svg>
                    </div>
                </div>
                <div class="flex flex-col">
                    <span class="text-2xl font-bold tracking-tight text-white flex items-center">
                        Web<span class="text-[#C8F169]">kita</span>
                        <span class="w-1.5 h-1.5 rounded-full bg-[#C8F169] ml-1 animate-pulse"></span>
                    </span>
                    <span class="text-[10px] tracking-widest text-purple-200 uppercase -mt-1 font-semibold">Web Studio</span>
                </div>
            </a>

            <!-- Desktop Nav Pills (Styled like Reference Image) -->
            <div class="hidden lg:flex items-center gap-2">
                <a href="#vision" class="glass-pill px-4 py-2 rounded-full text-xs font-semibold hover:text-[#C8F169] transition-all">
                    Vision & Mission
                </a>
                <a href="#layanan" class="glass-pill px-4 py-2 rounded-full text-xs font-semibold hover:text-[#C8F169] transition-all">
                    Layanan
                </a>
                <a href="#portofolio" class="glass-pill px-4 py-2 rounded-full text-xs font-semibold hover:text-[#C8F169] transition-all">
                    Portofolio
                </a>
                <a href="#paket" class="glass-pill px-4 py-2 rounded-full text-xs font-semibold hover:text-[#C8F169] transition-all">
                    Paket Harga
                </a>
                <a href="#kalkulator" class="glass-pill px-4 py-2 rounded-full text-xs font-semibold text-[#C8F169] hover:bg-[#C8F169]/10 transition-all">
                    Cek Biaya
                </a>
                <a href="#kontak" class="glass-pill px-4 py-2 rounded-full text-xs font-semibold hover:text-[#C8F169] transition-all">
                    Contact Us
                </a>
            </div>

            <!-- Action Pill "Get Started" (Vibrant Lime Green Pill from Reference) -->
            <div class="hidden md:flex items-center gap-3">
                <a href="https://wa.me/6281234567890?text=Halo%20Webkita,%20saya%20ingin%20konsultasi%20pembuatan%20website%20bisnis." 
                   target="_blank" 
                   class="glass-pill px-4 py-2.5 rounded-full text-xs font-semibold text-white hover:text-[#C8F169]">
                    Konsultasi WA
                </a>

                <a href="#paket" 
                   class="lime-pill px-6 py-2.5 rounded-full text-xs font-extrabold shadow-lg shadow-[#C8F169]/30 flex items-center gap-2 group">
                    <span>Get Started</span>
                    <span class="w-4 h-4 rounded-full bg-[#1E0A38] text-[#C8F169] flex items-center justify-center text-[10px] group-hover:translate-x-0.5 transition-transform">→</span>
                </a>
            </div>

            <!-- Mobile Hamburger Toggle -->
            <div class="flex lg:hidden items-center">
                <button @click="mobileOpen = !mobileOpen" 
                        type="button" 
                        class="p-2.5 rounded-full bg-white/10 text-white hover:text-[#C8F169] hover:bg-white/20 focus:outline-none"
                        aria-label="Toggle navigation">
                    <svg x-show="!mobileOpen" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                    <svg x-show="mobileOpen" x-cloak class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Drawer Menu -->
    <div x-show="mobileOpen" 
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0 -translate-y-4"
         x-transition:enter-end="opacity-100 translate-y-0"
         x-transition:leave="transition ease-in duration-150"
         x-transition:leave-start="opacity-100 translate-y-0"
         x-transition:leave-end="opacity-0 -translate-y-4"
         x-cloak
         class="lg:hidden bg-[#240B4D]/95 backdrop-blur-2xl border-b border-purple-500/30 px-5 pt-4 pb-8 space-y-3">
        <a @click="mobileOpen = false" href="#beranda" class="block px-4 py-2.5 rounded-xl text-sm font-semibold text-white hover:bg-white/10">Beranda</a>
        <a @click="mobileOpen = false" href="#vision" class="block px-4 py-2.5 rounded-xl text-sm font-semibold text-white hover:bg-white/10">Vision & Mission</a>
        <a @click="mobileOpen = false" href="#layanan" class="block px-4 py-2.5 rounded-xl text-sm font-semibold text-white hover:bg-white/10">Layanan Kami</a>
        <a @click="mobileOpen = false" href="#portofolio" class="block px-4 py-2.5 rounded-xl text-sm font-semibold text-white hover:bg-white/10">Portofolio</a>
        <a @click="mobileOpen = false" href="#paket" class="block px-4 py-2.5 rounded-xl text-sm font-semibold text-white hover:bg-white/10">Paket Harga</a>
        <a @click="mobileOpen = false" href="#kalkulator" class="block px-4 py-2.5 rounded-xl text-sm font-semibold text-[#C8F169] hover:bg-[#C8F169]/10">Cek Biaya (Kalkulator)</a>
        <a @click="mobileOpen = false" href="#kontak" class="block px-4 py-2.5 rounded-xl text-sm font-semibold text-white hover:bg-white/10">Contact Us</a>
        <div class="pt-4 border-t border-purple-500/20 flex flex-col gap-2.5">
            <a href="https://wa.me/6281234567890?text=Halo%20Webkita,%20saya%20ingin%20konsultasi%20website." 
               target="_blank" 
               class="w-full text-center py-3 rounded-full border border-white/20 text-xs font-bold text-white hover:bg-white/10">
                Konsultasi WhatsApp Gratis
            </a>
            <a href="#paket" 
               @click="mobileOpen = false"
               class="lime-pill w-full text-center py-3 rounded-full text-xs font-extrabold shadow-lg shadow-[#C8F169]/20">
                Get Started — Pesan Sekarang
            </a>
        </div>
    </div>
</nav>
