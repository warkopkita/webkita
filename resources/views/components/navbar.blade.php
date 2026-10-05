<!-- resources/views/components/navbar.blade.php -->
<nav x-data="{ mobileOpen: false, scrolled: false }" 
     @scroll.window="scrolled = (window.pageYOffset > 20)"
     :class="{ 'bg-slate-950/85 backdrop-blur-xl border-b border-slate-800/70 shadow-lg shadow-black/20': scrolled, 'bg-transparent border-b border-transparent': !scrolled }"
     class="fixed top-0 left-0 right-0 z-50 transition-all duration-300">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-20">
            <!-- Logo Brand -->
            <a href="{{ url('/') }}" class="flex items-center gap-3 group focus:outline-none">
                <div class="w-10 h-10 rounded-xl bg-gradient-to-tr from-emerald-500 to-cyan-500 p-0.5 shadow-lg shadow-emerald-500/20 group-hover:shadow-emerald-500/40 transition-all duration-300">
                    <div class="w-full h-full bg-slate-950 rounded-[10px] flex items-center justify-center">
                        <!-- Custom Icon <W/> with collaborative arrows -->
                        <svg class="w-6 h-6 text-emerald-400 group-hover:scale-110 transition-transform duration-300" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="16 18 22 12 16 6"></polyline>
                            <polyline points="8 6 2 12 8 18"></polyline>
                            <path d="m9 15 3-7 3 7"></path>
                        </svg>
                    </div>
                </div>
                <div class="flex flex-col">
                    <span class="text-2xl font-semibold tracking-tight text-white flex items-center">
                        Web<span class="font-extrabold text-emerald-400">kita</span>
                        <span class="w-1.5 h-1.5 rounded-full bg-cyan-400 ml-1 animate-pulse"></span>
                    </span>
                    <span class="text-[10px] tracking-wider text-slate-400 uppercase -mt-1 font-medium">Digital Studio</span>
                </div>
            </a>

            <!-- Desktop Nav Links -->
            <div class="hidden md:flex items-center gap-1 bg-slate-900/60 border border-slate-800/60 rounded-full px-4 py-1.5 backdrop-blur-md">
                <a href="#beranda" class="text-sm font-medium text-slate-300 hover:text-white px-3 py-1.5 rounded-full hover:bg-slate-800/50 transition-all">Beranda</a>
                <a href="#layanan" class="text-sm font-medium text-slate-300 hover:text-white px-3 py-1.5 rounded-full hover:bg-slate-800/50 transition-all">Layanan</a>
                <a href="#portofolio" class="text-sm font-medium text-slate-300 hover:text-white px-3 py-1.5 rounded-full hover:bg-slate-800/50 transition-all">Portofolio</a>
                <a href="#paket" class="text-sm font-medium text-slate-300 hover:text-white px-3 py-1.5 rounded-full hover:bg-slate-800/50 transition-all">Paket Harga</a>
                <a href="#kalkulator" class="text-sm font-medium text-emerald-400 hover:text-emerald-300 px-3 py-1.5 rounded-full hover:bg-emerald-950/30 transition-all flex items-center gap-1.5">
                    <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z" /></svg>
                    Cek Biaya
                </a>
                <a href="#kontak" class="text-sm font-medium text-slate-300 hover:text-white px-3 py-1.5 rounded-full hover:bg-slate-800/50 transition-all">Kontak</a>
            </div>

            <!-- Action Buttons -->
            <div class="hidden lg:flex items-center gap-3">
                <a href="https://wa.me/6281234567890?text=Halo%20Webkita,%20saya%20ingin%20konsultasi%20pembuatan%20website%20bisnis." 
                   target="_blank" 
                   class="text-xs font-semibold text-slate-300 hover:text-white px-3.5 py-2 rounded-lg border border-slate-700/60 hover:border-slate-600 bg-slate-900/40 transition-all flex items-center gap-2">
                    <span class="w-2 h-2 rounded-full bg-emerald-400 animate-ping"></span>
                    Konsultasi Gratis
                </a>
                <a href="#paket" 
                   class="relative group text-xs font-bold text-slate-950 px-4 py-2.5 rounded-lg bg-gradient-to-r from-emerald-400 via-teal-300 to-cyan-400 hover:opacity-95 shadow-md shadow-emerald-500/20 hover:shadow-emerald-500/40 transition-all duration-300 flex items-center gap-1.5">
                    <span>Pesan Web Sekarang</span>
                    <svg class="w-4 h-4 transform group-hover:translate-x-0.5 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                </a>
            </div>

            <!-- Mobile Hamburger Toggle -->
            <div class="flex md:hidden items-center">
                <button @click="mobileOpen = !mobileOpen" 
                        type="button" 
                        class="p-2 rounded-lg text-slate-400 hover:text-white hover:bg-slate-800/60 focus:outline-none"
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
         class="md:hidden bg-slate-950/95 backdrop-blur-2xl border-b border-slate-800 px-4 pt-3 pb-6 space-y-3">
        <a @click="mobileOpen = false" href="#beranda" class="block px-3 py-2 rounded-lg text-base font-medium text-slate-200 hover:bg-slate-800/60">Beranda</a>
        <a @click="mobileOpen = false" href="#layanan" class="block px-3 py-2 rounded-lg text-base font-medium text-slate-200 hover:bg-slate-800/60">Layanan</a>
        <a @click="mobileOpen = false" href="#portofolio" class="block px-3 py-2 rounded-lg text-base font-medium text-slate-200 hover:bg-slate-800/60">Portofolio</a>
        <a @click="mobileOpen = false" href="#paket" class="block px-3 py-2 rounded-lg text-base font-medium text-slate-200 hover:bg-slate-800/60">Paket Harga</a>
        <a @click="mobileOpen = false" href="#kalkulator" class="block px-3 py-2 rounded-lg text-base font-medium text-emerald-400 hover:bg-emerald-950/30">Kalkulator Biaya</a>
        <a @click="mobileOpen = false" href="#kontak" class="block px-3 py-2 rounded-lg text-base font-medium text-slate-200 hover:bg-slate-800/60">Kontak</a>
        <div class="pt-4 border-t border-slate-800/80 flex flex-col gap-2">
            <a href="https://wa.me/6281234567890?text=Halo%20Webkita,%20saya%20ingin%20konsultasi%20website." 
               target="_blank" 
               class="w-full text-center py-2.5 rounded-lg border border-slate-700 text-sm font-semibold text-slate-200 hover:bg-slate-800">
                Konsultasi WhatsApp Gratis
            </a>
            <a href="#paket" 
               @click="mobileOpen = false"
               class="w-full text-center py-2.5 rounded-lg bg-gradient-to-r from-emerald-500 to-cyan-500 text-slate-950 text-sm font-bold shadow-lg shadow-emerald-500/20">
                Pesan Web Sekarang
            </a>
        </div>
    </div>
</nav>
