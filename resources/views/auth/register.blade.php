@extends('layouts.app')

@section('title', 'Daftar Akun Klien — Webkita Studio')
@section('meta_description', 'Daftar akun Client Portal Webkita untuk memulai proyek website dan konsultasi intensif.')

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
                <span class="text-xs font-mono font-bold tracking-widest text-[#C8F169] uppercase">REGISTRASI KLIEN</span>
                <h1 class="text-3xl font-black text-white mt-1 mb-2">Buat Akun Webkita</h1>
                <p class="text-xs text-purple-200/80">Akses pelacakan proyek, unggah brief, dan riwayat faktur resmi.</p>
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
            <form action="{{ route('register.post') }}" method="POST" class="space-y-4">
                @csrf

                <div>
                    <label for="name" class="block text-xs font-semibold text-purple-200 mb-1.5">Nama Lengkap / Nama Bisnis *</label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}" required autofocus
                           placeholder="Contoh: Budi Santoso (KopiKita)"
                           class="w-full px-4 py-3 rounded-xl bg-[#1A0630] border border-purple-500/30 text-xs text-white placeholder-purple-400/50 focus:outline-none focus:border-[#C8F169] transition-all">
                </div>

                <div>
                    <label for="email" class="block text-xs font-semibold text-purple-200 mb-1.5">Alamat Email Aktif *</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" required
                           placeholder="nama@email.com"
                           class="w-full px-4 py-3 rounded-xl bg-[#1A0630] border border-purple-500/30 text-xs text-white placeholder-purple-400/50 focus:outline-none focus:border-[#C8F169] transition-all">
                </div>

                <div>
                    <label for="whatsapp" class="block text-xs font-semibold text-purple-200 mb-1.5">Nomor WhatsApp Aktif *</label>
                    <input type="tel" id="whatsapp" name="whatsapp" value="{{ old('whatsapp') }}" required
                           placeholder="Contoh: 081234567890"
                           class="w-full px-4 py-3 rounded-xl bg-[#1A0630] border border-purple-500/30 text-xs text-white placeholder-purple-400/50 focus:outline-none focus:border-[#C8F169] transition-all">
                </div>

                <div>
                    <label for="password" class="block text-xs font-semibold text-purple-200 mb-1.5">Kata Sandi (Min. 6 Karakter) *</label>
                    <input type="password" id="password" name="password" required
                           placeholder="••••••••"
                           class="w-full px-4 py-3 rounded-xl bg-[#1A0630] border border-purple-500/30 text-xs text-white placeholder-purple-400/50 focus:outline-none focus:border-[#C8F169] transition-all">
                </div>

                <div>
                    <label for="password_confirmation" class="block text-xs font-semibold text-purple-200 mb-1.5">Ulangi Kata Sandi *</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" required
                           placeholder="••••••••"
                           class="w-full px-4 py-3 rounded-xl bg-[#1A0630] border border-purple-500/30 text-xs text-white placeholder-purple-400/50 focus:outline-none focus:border-[#C8F169] transition-all">
                </div>

                <div class="pt-2">
                    <button type="submit" class="lime-pill w-full py-3.5 rounded-xl font-black text-xs shadow-lg shadow-[#C8F169]/25 flex items-center justify-center gap-2">
                        <span>Daftar &amp; Masuk ke Portal</span>
                        <span>→</span>
                    </button>
                </div>
            </form>

            <!-- Google OAuth Instant Access -->
            <div class="mt-5 pt-5 border-t border-purple-500/20 text-center">
                <span class="text-[10px] font-mono text-purple-400 block mb-2.5 uppercase tracking-wider">ATAU DAFTAR INSTAN:</span>
                <a href="{{ route('auth.google') }}" class="glass-pill w-full py-3 rounded-xl font-bold text-xs text-white hover:text-[#C8F169] border border-white/20 hover:border-[#C8F169]/40 flex items-center justify-center gap-2 transition-all">
                    <span class="font-mono text-[#C8F169] font-black">[G]</span>
                    <span>Daftar Cepat dengan Akun Google</span>
                </a>
            </div>

            <!-- Bottom Login Link -->
            <div class="mt-6 pt-4 border-t border-purple-500/20 text-center text-xs text-purple-300">
                Sudah memiliki akun? 
                <a href="{{ route('login') }}" class="text-[#C8F169] font-bold hover:underline ml-1">
                    Masuk di Sini
                </a>
            </div>

        </div>

    </div>
</div>
@endsection
