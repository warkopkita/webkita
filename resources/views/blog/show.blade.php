@extends('layouts.app')

@section('title', $post->title . ' — Webkita Insights')
@section('meta_description', $post->excerpt)

@section('content')
<div class="relative overflow-hidden bg-[#381867] text-white pt-28 pb-24 px-4 sm:px-6 lg:px-8">
    <!-- Ambient Glow -->
    <div class="absolute -top-24 -left-24 w-96 h-96 bg-[#C8F169]/10 rounded-full blur-3xl pointer-events-none"></div>
    <div class="absolute top-1/2 right-10 w-96 h-96 bg-purple-500/15 rounded-full blur-3xl pointer-events-none"></div>

    <div class="max-w-4xl mx-auto relative z-10 space-y-10">
        
        <!-- Breadcrumbs Navigation -->
        <nav class="flex items-center gap-2 text-xs text-purple-300">
            <a href="{{ url('/') }}" class="hover:text-white transition-colors">Beranda</a>
            <span>/</span>
            <a href="{{ route('blog.index') }}" class="hover:text-white transition-colors">Wawasan</a>
            <span>/</span>
            @if ($post->category)
                <a href="{{ route('blog.index', ['category' => $post->category->slug]) }}" class="hover:text-white transition-colors">
                    {{ $post->category->name }}
                </a>
                <span>/</span>
            @endif
            <span class="text-[#C8F169] truncate max-w-xs">{{ $post->title }}</span>
        </nav>

        <!-- Article Presentation Header Frame -->
        <header class="relative rounded-3xl bg-gradient-to-br from-[#451C7E] via-[#351563] to-[#240B4D] border border-white/15 p-8 sm:p-12 shadow-2xl overflow-hidden">
            <div class="frame-corner frame-corner-tl"></div>
            <div class="frame-corner frame-corner-tr"></div>
            <div class="frame-corner frame-corner-bl"></div>
            <div class="frame-corner frame-corner-br"></div>

            <div class="space-y-4">
                <div class="flex flex-wrap items-center gap-3 text-xs">
                    <span class="font-mono font-bold px-3 py-1 rounded-full bg-[#C8F169] text-[#1E0A38] uppercase">
                        {{ $post->category ? $post->category->name : 'EDUKASI' }}
                    </span>
                    <span class="text-purple-200">
                        {{ $post->reading_time_minutes }} Menit Membaca
                    </span>
                    <span class="text-purple-300">•</span>
                    <span class="text-purple-200">
                        {{ $post->views_count }} Kali Dilihat
                    </span>
                </div>

                <h1 class="text-2xl sm:text-4xl lg:text-5xl font-black text-white tracking-tight leading-tight">
                    {{ $post->title }}
                </h1>

                <p class="text-sm sm:text-base text-purple-200/90 leading-relaxed pt-2">
                    {{ $post->excerpt }}
                </p>

                <!-- Author Meta Bar -->
                <div class="pt-6 mt-6 border-t border-purple-500/20 flex flex-wrap items-center justify-between gap-4 text-xs text-purple-300">
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 rounded-full bg-[#C8F169] text-[#1E0A38] font-black flex items-center justify-center text-xs">
                            WK
                        </div>
                        <div>
                            <span class="text-white font-bold block">{{ $post->author }}</span>
                            <span class="text-[11px] text-purple-300">Dipublikasikan pada {{ $post->published_at ? $post->published_at->format('d F Y') : 'Terbaru' }}</span>
                        </div>
                    </div>

                    <div class="flex items-center gap-2">
                        <a href="https://wa.me/?text={{ urlencode($post->title . ' - ' . url()->current()) }}" 
                           target="_blank"
                           class="glass-pill px-3.5 py-1.5 rounded-full text-xs hover:text-[#C8F169]">
                            Bagikan ke WhatsApp
                        </a>
                    </div>
                </div>
            </div>
        </header>

        <!-- Main Article Content Body -->
        <article class="studio-card-dark p-8 sm:p-12 rounded-3xl border border-purple-400/20 shadow-2xl leading-relaxed text-purple-100 text-sm sm:text-base space-y-6">
            <div class="prose-content space-y-6 text-purple-100/90 leading-loose">
                {!! nl2br(e($post->content)) !!}
            </div>

            <!-- Tags & Author Sign-off -->
            <div class="pt-8 mt-10 border-t border-purple-500/20 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
                <div class="space-y-1">
                    <span class="text-xs font-mono font-bold text-[#C8F169] uppercase">PENULIS RESMI</span>
                    <h4 class="text-sm font-bold text-white">{{ $post->author }}</h4>
                    <p class="text-xs text-purple-300">Studio Pengembangan Website & UI/UX Webkita</p>
                </div>

                <a href="{{ route('blog.index') }}" class="glass-pill px-4 py-2 rounded-full text-xs font-semibold text-purple-200 hover:text-white">
                    ← Kembali ke Semua Artikel
                </a>
            </div>
        </article>

        <!-- Conversion In-article CTA Card -->
        <div class="relative rounded-3xl p-1 bg-gradient-to-r from-[#C8F169] via-emerald-400 to-[#5B21B6] shadow-2xl">
            <div class="bg-[#240B4D] p-8 sm:p-10 rounded-[22px] flex flex-col md:flex-row items-center justify-between gap-6">
                <div class="space-y-2 text-center md:text-left">
                    <span class="text-xs font-mono font-bold text-[#C8F169] uppercase tracking-wider">SOLUSI BISNIS TERPERCAYA</span>
                    <h3 class="text-xl sm:text-2xl font-black text-white">Ingin Website Seperti Ini untuk Usaha Anda?</h3>
                    <p class="text-xs text-purple-200/90 max-w-lg leading-relaxed">
                        Kami membangun website berkecepatan tinggi, ramah SEO, dan berorientasi penjualan mulai Rp 499.000 dengan garansi pemeliharaan resmi.
                    </p>
                </div>

                <div class="flex flex-col sm:flex-row items-center gap-3 shrink-0">
                    <a href="https://wa.me/6281288990536?text=Halo%20Webkita,%20saya%20tertarik%20dengan%20layanan%20website%20setelah%20membaca%20artikel%20{{ urlencode($post->title) }}." 
                       target="_blank" 
                       class="glass-pill px-5 py-3 rounded-full text-xs font-bold text-white hover:text-[#C8F169]">
                        Konsultasi via WA
                    </a>
                    <a href="{{ url('/#paket') }}" class="lime-pill px-6 py-3 rounded-full text-xs font-black shadow-lg">
                        Pesan Paket Website →
                    </a>
                </div>
            </div>
        </div>

        <!-- Related Articles Grid -->
        @if ($relatedPosts->isNotEmpty())
            <div class="space-y-6 pt-4">
                <div class="flex items-center justify-between">
                    <h3 class="text-xl font-bold text-white">Artikel Terkait Lainnya</h3>
                    <a href="{{ route('blog.index') }}" class="text-xs font-bold text-[#C8F169] hover:underline">
                        Lihat Semua →
                    </a>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    @foreach ($relatedPosts as $rel)
                        <div class="studio-card-dark p-6 rounded-3xl border border-purple-500/20 hover:border-purple-400/40 flex flex-col justify-between transition-all">
                            <div>
                                <span class="text-[10px] font-mono font-bold text-[#C8F169] uppercase">
                                    {{ $rel->reading_time_minutes }} Menit Baca
                                </span>
                                <h4 class="text-sm font-bold text-white mt-2 leading-snug line-clamp-2">
                                    <a href="{{ route('blog.show', $rel->slug) }}" class="hover:text-[#C8F169] transition-colors">
                                        {{ $rel->title }}
                                    </a>
                                </h4>
                                <p class="text-xs text-purple-300/80 mt-2 line-clamp-2">
                                    {{ $rel->excerpt }}
                                </p>
                            </div>
                            <div class="pt-4 mt-4 border-t border-purple-500/20">
                                <a href="{{ route('blog.show', $rel->slug) }}" class="text-xs font-bold text-[#C8F169] inline-flex items-center gap-1">
                                    <span>Baca</span>
                                    <span>→</span>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

    </div>
</div>
@endsection
