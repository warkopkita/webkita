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
                        <span class="font-mono font-black text-[#C8F169] text-base group-hover:scale-110 transition-transform">&lt;W/&gt;</span>
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
                <a href="{{ url('/#vision') }}" class="glass-pill px-3.5 py-2 rounded-full text-xs font-semibold hover:text-[#C8F169] transition-all">
                    Vision & Mission
                </a>
                <a href="{{ url('/#layanan') }}" class="glass-pill px-3.5 py-2 rounded-full text-xs font-semibold hover:text-[#C8F169] transition-all">
                    Layanan
                </a>
                <a href="{{ url('/#portofolio') }}" class="glass-pill px-3.5 py-2 rounded-full text-xs font-semibold hover:text-[#C8F169] transition-all">
                    Portofolio
                </a>
                <a href="{{ url('/#paket') }}" class="glass-pill px-3.5 py-2 rounded-full text-xs font-semibold hover:text-[#C8F169] transition-all">
                    Paket Harga
                </a>
                <a href="{{ url('/#kalkulator') }}" class="glass-pill px-3.5 py-2 rounded-full text-xs font-semibold text-[#C8F169] hover:bg-[#C8F169]/10 transition-all">
                    Cek Biaya
                </a>
                <a href="{{ route('blog.index') }}" class="glass-pill px-3.5 py-2 rounded-full text-xs font-semibold hover:text-[#C8F169] transition-all">
                    Wawasan
                </a>
                <a href="{{ route('katalog') }}" class="glass-pill px-3.5 py-2 rounded-full text-xs font-semibold text-[#C8F169] hover:bg-[#C8F169]/10 transition-all">
                    Katalog
                </a>
                <a href="{{ url('/#kontak') }}" class="glass-pill px-3.5 py-2 rounded-full text-xs font-semibold hover:text-[#C8F169] transition-all">
                    Contact Us
                </a>
            </div>

            <!-- Action Pills (Auth Aware) -->
            <div class="hidden md:flex items-center gap-3">
                <!-- Language Switcher Pill -->
                <div class="inline-flex items-center rounded-full bg-white/5 border border-white/10 p-0.5 text-[10px] font-mono tracking-wider">
                    <a href="{{ route('lang.switch', 'id') }}" 
                       class="px-2 py-1 rounded-full transition-all {{ app()->getLocale() === 'id' ? 'bg-[#C8F169] text-[#1E0A38] font-bold shadow' : 'text-purple-300 hover:text-white' }}">
                        ID
                    </a>
                    <a href="{{ route('lang.switch', 'en') }}" 
                       class="px-2 py-1 rounded-full transition-all {{ app()->getLocale() === 'en' ? 'bg-[#C8F169] text-[#1E0A38] font-bold shadow' : 'text-purple-300 hover:text-white' }}">
                        EN
                    </a>
                </div>

                @auth
                    @if (auth()->user()->isAdmin())
                        <a href="{{ route('admin.dashboard') }}" 
                           class="glass-pill px-4 py-2.5 rounded-full text-xs font-bold text-[#C8F169] border border-[#C8F169]/40 hover:bg-[#C8F169]/10 transition-all">
                            Admin Panel
                        </a>
                    @else
                        <a href="{{ route('portal.dashboard') }}" 
                           class="glass-pill px-4 py-2.5 rounded-full text-xs font-bold text-[#C8F169] border border-[#C8F169]/40 hover:bg-[#C8F169]/10 transition-all">
                            Portal Klien ({{ Str::limit(auth()->user()->name, 12) }})
                        </a>
                    @endif

                    <form action="{{ route('logout') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" 
                                class="px-3.5 py-2.5 rounded-full bg-white/10 hover:bg-white/20 text-xs font-semibold text-purple-200 transition-all border border-white/15">
                            Keluar
                        </button>
                    </form>
                @else
                    <a href="{{ route('login') }}" 
                       class="glass-pill px-4 py-2.5 rounded-full text-xs font-semibold text-white hover:text-[#C8F169] transition-all">
                        Masuk
                    </a>

                    <a href="{{ url('/#paket') }}" 
                       class="lime-pill px-5 py-2.5 rounded-full text-xs font-extrabold shadow-lg shadow-[#C8F169]/30 flex items-center gap-1.5 group">
                        <span>Get Started</span>
                        <span class="w-4 h-4 rounded-full bg-[#1E0A38] text-[#C8F169] flex items-center justify-center text-[10px] group-hover:translate-x-0.5 transition-transform">→</span>
                    </a>
                @endauth
            </div>

            <!-- Mobile Hamburger Toggle -->
            <div class="flex lg:hidden items-center">
                <button @click="mobileOpen = !mobileOpen" 
                        type="button" 
                        class="p-2.5 rounded-full bg-white/10 text-white hover:text-[#C8F169] hover:bg-white/20 focus:outline-none"
                        aria-label="Toggle navigation">
                    <span x-show="!mobileOpen" class="font-bold text-xs tracking-wider">MENU</span>
                    <span x-show="mobileOpen" x-cloak class="font-bold text-xs tracking-wider">TUTUP</span>
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
        <a @click="mobileOpen = false" href="{{ url('/#beranda') }}" class="block px-4 py-2.5 rounded-xl text-sm font-semibold text-white hover:bg-white/10">Beranda</a>
        <a @click="mobileOpen = false" href="{{ url('/#vision') }}" class="block px-4 py-2.5 rounded-xl text-sm font-semibold text-white hover:bg-white/10">Vision & Mission</a>
        <a @click="mobileOpen = false" href="{{ url('/#layanan') }}" class="block px-4 py-2.5 rounded-xl text-sm font-semibold text-white hover:bg-white/10">Layanan Kami</a>
        <a @click="mobileOpen = false" href="{{ url('/#portofolio') }}" class="block px-4 py-2.5 rounded-xl text-sm font-semibold text-white hover:bg-white/10">Portofolio</a>
        <a @click="mobileOpen = false" href="{{ url('/#paket') }}" class="block px-4 py-2.5 rounded-xl text-sm font-semibold text-white hover:bg-white/10">Paket Harga</a>
        <a @click="mobileOpen = false" href="{{ url('/#kalkulator') }}" class="block px-4 py-2.5 rounded-xl text-sm font-semibold text-[#C8F169] hover:bg-[#C8F169]/10">Cek Biaya (Kalkulator)</a>
        <a @click="mobileOpen = false" href="{{ route('blog.index') }}" class="block px-4 py-2.5 rounded-xl text-sm font-semibold text-white hover:bg-white/10">Wawasan & Blog</a>
        <a @click="mobileOpen = false" href="{{ route('katalog') }}" class="block px-4 py-2.5 rounded-xl text-sm font-semibold text-[#C8F169] hover:bg-white/10">Katalog & Brosur</a>
        <a @click="mobileOpen = false" href="{{ url('/#kontak') }}" class="block px-4 py-2.5 rounded-xl text-sm font-semibold text-white hover:bg-white/10">Contact Us</a>
        
        <!-- Mobile Language Switcher -->
        <div class="px-4 py-2 flex items-center justify-between bg-white/5 rounded-xl">
            <span class="text-xs text-purple-300 font-mono">BAHASA / LANGUAGE:</span>
            <div class="inline-flex items-center rounded-full bg-white/10 border border-white/10 p-0.5 text-xs font-mono">
                <a href="{{ route('lang.switch', 'id') }}" 
                   class="px-3 py-1 rounded-full transition-all {{ app()->getLocale() === 'id' ? 'bg-[#C8F169] text-[#1E0A38] font-bold' : 'text-purple-300 hover:text-white' }}">
                    ID
                </a>
                <a href="{{ route('lang.switch', 'en') }}" 
                   class="px-3 py-1 rounded-full transition-all {{ app()->getLocale() === 'en' ? 'bg-[#C8F169] text-[#1E0A38] font-bold' : 'text-purple-300 hover:text-white' }}">
                    EN
                </a>
            </div>
        </div>

        <div class="pt-4 border-t border-purple-500/20 flex flex-col gap-2.5">
            @auth
                @if (auth()->user()->isAdmin())
                    <a href="{{ route('admin.dashboard') }}" class="lime-pill w-full text-center py-3 rounded-full text-xs font-extrabold">
                        Buka Admin Panel
                    </a>
                @else
                    <a href="{{ route('portal.dashboard') }}" class="lime-pill w-full text-center py-3 rounded-full text-xs font-extrabold">
                        Buka Portal Klien ({{ auth()->user()->name }})
                    </a>
                @endif
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="w-full text-center py-2.5 rounded-full border border-white/20 text-xs font-bold text-purple-200 hover:bg-white/10">
                        Keluar Akun
                    </button>
                </form>
            @else
                <a href="{{ route('login') }}" class="w-full text-center py-3 rounded-full border border-white/20 text-xs font-bold text-white hover:bg-white/10">
                    Masuk ke Akun
                </a>
                <a href="{{ url('/#paket') }}" @click="mobileOpen = false" class="lime-pill w-full text-center py-3 rounded-full text-xs font-extrabold shadow-lg shadow-[#C8F169]/20">
                    Get Started — Pesan Sekarang
                </a>
            @endauth
        </div>
    </div>
</nav>
