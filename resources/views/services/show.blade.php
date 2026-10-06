@extends('layouts.app')

@section('title', $service->name . ' — Solusi Webkita Studio')
@section('meta_description', $service->description)

@section('content')
<div class="relative overflow-hidden bg-[#381867] text-white pt-28 pb-24 px-4 sm:px-6 lg:px-8">
    <!-- Ambient Glow -->
    <div class="absolute -top-24 -left-24 w-96 h-96 bg-[#C8F169]/10 rounded-full blur-3xl pointer-events-none"></div>
    <div class="absolute bottom-10 right-10 w-96 h-96 bg-purple-500/15 rounded-full blur-3xl pointer-events-none"></div>

    <div class="max-w-5xl mx-auto relative z-10 space-y-12">

        <!-- Breadcrumbs -->
        <div class="flex items-center gap-2 text-xs font-mono text-purple-300">
            <a href="{{ route('home') }}" class="hover:text-white">Beranda</a>
            <span>/</span>
            <a href="{{ route('services.index') }}" class="hover:text-white">Layanan</a>
            <span>/</span>
            <span class="text-[#C8F169]">{{ $service->name }}</span>
        </div>

        <!-- Service Main Header Presentation -->
        <div class="relative rounded-3xl bg-gradient-to-br from-[#451C7E] via-[#351563] to-[#240B4D] border border-white/15 p-8 sm:p-12 shadow-2xl overflow-hidden">
            <div class="frame-corner frame-corner-tl"></div>
            <div class="frame-corner frame-corner-tr"></div>
            <div class="frame-corner frame-corner-bl"></div>
            <div class="frame-corner frame-corner-br"></div>

            <div class="space-y-4">
                <div class="flex items-center gap-3">
                    <span class="px-3 py-1 rounded-full text-[10px] font-bold uppercase tracking-wider bg-white/10 text-[#C8F169] border border-white/15">
                        {{ $service->badge_text ?? 'Layanan Unggulan' }}
                    </span>
                    <span class="text-xs font-mono text-purple-300">
                        {{ $service->tagline }}
                    </span>
                </div>

                <h1 class="text-3xl sm:text-5xl font-black text-white tracking-tight leading-tight">
                    {{ $service->name }}
                </h1>

                <p class="text-sm sm:text-base text-purple-200/90 leading-relaxed max-w-3xl">
                    {{ $service->description }}
                </p>
            </div>
        </div>

        <!-- Specifications & Deliverables Grid -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="p-6 rounded-2xl bg-[#270D52] border border-white/10 space-y-3">
                <span class="text-xs font-mono font-bold text-[#C8F169] uppercase">01. PERFORMA &amp; TEKNOLOGI</span>
                <h3 class="text-base font-bold text-white">Kecepatan &amp; Responsivitas</h3>
                <p class="text-xs text-purple-200/80 leading-relaxed">
                    Dibangun dengan arsitektur modern berstandar Google PageSpeed 90+. Halaman termuat dalam hitungan detik di jaringan seluler 4G/5G.
                </p>
            </div>

            <div class="p-6 rounded-2xl bg-[#270D52] border border-white/10 space-y-3">
                <span class="text-xs font-mono font-bold text-[#C8F169] uppercase">02. DAYA KONVERSI &amp; UI</span>
                <h3 class="text-base font-bold text-white">Desain Berorientasi Aksi</h3>
                <p class="text-xs text-purple-200/80 leading-relaxed">
                    Setiap penempatan tombol Call-to-Action (CTA), judul penawaran, dan navigasi dioptimasi secara psikologis untuk menghasilkan prospek pelanggan.
                </p>
            </div>

            <div class="p-6 rounded-2xl bg-[#270D52] border border-white/10 space-y-3">
                <span class="text-xs font-mono font-bold text-[#C8F169] uppercase">03. KEPEMILIKAN &amp; KEAMANAN</span>
                <h3 class="text-base font-bold text-white">100% Milik Anda</h3>
                <p class="text-xs text-purple-200/80 leading-relaxed">
                    Akses kode sumber dan database sepenuhnya diserahkan kepada Anda tanpa biaya tersembunyi. Dilengkapi sertifikat SSL dan proteksi data.
                </p>
            </div>
        </div>

        <!-- Packages Section for this Service -->
        @if ($service->packages->isNotEmpty())
            <div class="space-y-6 pt-4">
                <div class="flex items-center justify-between border-b border-white/10 pb-4">
                    <div>
                        <span class="text-xs font-mono text-[#C8F169] uppercase tracking-wider">PAKET TERSEDIA</span>
                        <h2 class="text-2xl font-black text-white">Pilih Paket untuk {{ $service->name }}</h2>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-{{ min(3, count($service->packages)) }} gap-6">
                    @foreach ($service->packages as $pkg)
                        <div class="relative rounded-3xl bg-[#240B4D] border {{ $pkg->is_popular ? 'border-[#C8F169] ring-2 ring-[#C8F169]/30' : 'border-white/15' }} p-8 flex flex-col justify-between shadow-xl">
                            @if ($pkg->is_popular)
                                <div class="absolute -top-3 right-6 bg-[#C8F169] text-[#1E0A38] text-[10px] font-black tracking-widest uppercase px-3 py-1 rounded-full shadow-lg">
                                    PALING BANYAK DIPILIH
                                </div>
                            @endif

                            <div class="space-y-6">
                                <div>
                                    <h3 class="text-xl font-black text-white">{{ $pkg->name }}</h3>
                                    <p class="text-xs text-purple-300 mt-1">{{ $pkg->tagline }}</p>
                                </div>

                                <div class="pt-2">
                                    @if ($pkg->original_price)
                                        <div class="text-xs text-purple-400 line-through">
                                            Rp {{ number_format($pkg->original_price, 0, ',', '.') }}
                                        </div>
                                    @endif
                                    <div class="text-3xl font-black text-white font-mono">
                                        Rp {{ number_format($pkg->price, 0, ',', '.') }}
                                    </div>
                                    <span class="text-[11px] text-purple-300">Biaya transparan sekali bayar</span>
                                </div>

                                @if (is_array($pkg->features))
                                    <div class="space-y-2 pt-2 border-t border-white/10">
                                        @foreach ($pkg->features as $feat)
                                            <div class="flex items-start gap-2 text-xs text-purple-200">
                                                <span class="w-1.5 h-1.5 rounded-full bg-[#C8F169] mt-1.5 shrink-0"></span>
                                                <span>{{ $feat }}</span>
                                            </div>
                                        @endforeach
                                    </div>
                                @endif
                            </div>

                            <div class="pt-8">
                                <a href="{{ route('checkout.show', $pkg->slug) }}" class="lime-pill w-full block text-center py-3 rounded-full text-xs font-bold">
                                    {{ $pkg->cta_text ?? 'Pilih Paket Ini' }}
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

        <!-- Other Services Navigator -->
        @if ($otherServices->isNotEmpty())
            <div class="pt-8 space-y-4 border-t border-white/10">
                <span class="text-xs font-mono text-purple-400 uppercase tracking-wider block">LAYANAN LAINNYA:</span>
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                    @foreach ($otherServices as $other)
                        <a href="{{ route('services.show', $other->slug) }}" class="p-4 rounded-2xl bg-[#200A44] border border-white/10 hover:border-[#C8F169]/40 transition-all block">
                            <span class="text-[10px] font-mono text-[#C8F169] uppercase block">{{ $other->badge_text }}</span>
                            <span class="text-sm font-bold text-white block mt-1">{{ $other->name }}</span>
                            <span class="text-xs text-purple-300 line-clamp-1 mt-1">{{ $other->tagline }}</span>
                        </a>
                    @endforeach
                </div>
            </div>
        @endif

        <!-- Back Link & Consultation CTA -->
        <div class="pt-6 flex flex-col sm:flex-row items-center justify-between gap-4">
            <a href="{{ route('services.index') }}" class="text-xs text-purple-300 hover:text-white flex items-center gap-2">
                <span>&larr;</span>
                <span>Kembali ke Semua Layanan</span>
            </a>
            <a href="https://wa.me/6281234567890?text={{ urlencode('Halo Webkita, saya ingin konsultasi mengenai layanan ' . $service->name) }}" 
               target="_blank" 
               class="glass-pill px-6 py-2.5 rounded-full text-xs font-bold text-white">
                Konsultasikan Layanan Ini via WhatsApp
            </a>
        </div>

    </div>
</div>
@endsection
