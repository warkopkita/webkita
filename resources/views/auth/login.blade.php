@extends('layouts.app')

@section('title', 'Masuk ke Akun — Webkita Studio')
@section('meta_description', 'Masuk ke akun Client Portal atau Admin Webkita untuk mengelola proyek website Anda.')

@section('content')
<div class="min-h-screen bg-[#381867] text-white pt-28 pb-20 px-4 sm:px-6 lg:px-8 flex items-center justify-center relative overflow-hidden">
    <!-- Ambient Glow -->
    <div class="absolute top-1/4 left-1/2 -translate-x-1/2 w-96 h-96 bg-[#C8F169]/10 rounded-full blur-3xl pointer-events-none"></div>

    <div class="max-w-md w-full relative z-10">
        
        <!-- Presentation Frame Card -->
        <div class="relative rounded-3xl bg-[#270D52]/90 border border-white/15 p-8 sm:p-10 shadow-2xl backdrop-blur-xl">
            <!-- Frame Corner Brackets -->
            <div class="frame-corner frame-corner-tl"></div>
            <div class="frame-corner frame-corner-tr"></div>
            <div class="frame-corner frame-corner-bl"></div>
            <div class="frame-corner frame-corner-br"></div>

            <!-- Header -->
            <div class="text-center mb-8">
                <span class="text-xs font-mono font-bold tracking-widest text-[#C8F169] uppercase">PORTAL AKSES</span>
                <h1 class="text-3xl font-black text-white mt-1 mb-2">Masuk ke Webkita</h1>
                <p class="text-xs text-purple-200/80">Pantau progres pengerjaan website & kelola berkas brief Anda.</p>
            </div>

            <!-- Error Notifications -->
            @if ($errors->any())
                <div class="mb-6 p-4 rounded-2xl bg-red-500/15 border border-red-500/30 text-xs text-red-200">
                    <ul class="space-y-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Form -->
            <form action="{{ route('login.post') }}" method="POST" class="space-y-4">
                @csrf

                <div>
                    <label for="email" class="block text-xs font-semibold text-purple-200 mb-1.5">Alamat Email</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus
                           placeholder="nama@email.com"
                           class="w-full px-4 py-3 rounded-xl bg-[#1A0630] border border-purple-500/30 text-xs text-white placeholder-purple-400/50 focus:outline-none focus:border-[#C8F169] transition-all">
                </div>

                <div>
                    <div class="flex items-center justify-between mb-1.5">
                        <label for="password" class="block text-xs font-semibold text-purple-200">Kata Sandi</label>
                        <a href="https://wa.me/6281234567890?text=Halo%20Webkita,%20saya%20lupa%20kata%20sandi%20akun%20saya." target="_blank" class="text-[11px] text-[#C8F169] hover:underline">
                            Lupa sandi?
                        </a>
                    </div>
                    <input type="password" id="password" name="password" required
                           placeholder="••••••••"
                           class="w-full px-4 py-3 rounded-xl bg-[#1A0630] border border-purple-500/30 text-xs text-white placeholder-purple-400/50 focus:outline-none focus:border-[#C8F169] transition-all">
                </div>

                <div class="flex items-center justify-between pt-1">
                    <label class="flex items-center gap-2 cursor-pointer text-xs text-purple-200/80">
                        <input type="checkbox" name="remember" class="w-4 h-4 rounded text-[#C8F169] accent-[#C8F169]">
                        <span>Ingat saya di perangkat ini</span>
                    </label>
                </div>

                <div class="pt-2">
                    <button type="submit" class="lime-pill w-full py-3.5 rounded-xl font-black text-xs shadow-lg shadow-[#C8F169]/25 flex items-center justify-center gap-2">
                        <span>Masuk ke Dashboard</span>
                        <span>→</span>
                    </button>
                </div>
            </form>

            <!-- Bottom Register Link -->
            <div class="mt-8 pt-6 border-t border-purple-500/20 text-center text-xs text-purple-300">
                Belum memiliki akun? 
                <a href="{{ route('register') }}" class="text-[#C8F169] font-bold hover:underline ml-1">
                    Daftar Klien Baru
                </a>
            </div>

            <!-- Admin Shortcut Credential Hint -->
            <div class="mt-4 p-3 rounded-xl bg-purple-900/40 border border-purple-500/20 text-[11px] text-purple-300/80 text-center">
                Demo Admin: <code class="text-[#C8F169]">admin@webkita.id</code> / <code class="text-[#C8F169]">WebkitaAdmin2026!</code>
            </div>

        </div>

    </div>
</div>
@endsection
