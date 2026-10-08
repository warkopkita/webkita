@extends('layouts.app')

@section('title', 'Wawasan & Edukasi Web Development — Webkita Studio')
@section('meta_description', 'Artikel, panduan digitalisasi bisnis, optimasi SEO Google, pemilihan domain, dan strategi UI/UX konversi tinggi dari tim Webkita.')

@section('content')
<div class="relative overflow-hidden bg-[#381867] text-white pt-28 pb-24 px-4 sm:px-6 lg:px-8">
    <!-- Ambient Glow -->
    <div class="absolute -top-24 -left-24 w-96 h-96 bg-[#C8F169]/10 rounded-full blur-3xl pointer-events-none"></div>
    <div class="absolute bottom-10 right-10 w-96 h-96 bg-purple-500/15 rounded-full blur-3xl pointer-events-none"></div>

    <div class="max-w-7xl mx-auto relative z-10 space-y-12">
        
        <!-- Header Banner with Camera Presentation Brackets -->
        <div class="relative rounded-3xl bg-gradient-to-br from-[#451C7E] via-[#351563] to-[#240B4D] border border-white/15 p-8 sm:p-12 shadow-2xl overflow-hidden">
            <div class="frame-corner frame-corner-tl"></div>
            <div class="frame-corner frame-corner-tr"></div>
            <div class="frame-corner frame-corner-bl"></div>
            <div class="frame-corner frame-corner-br"></div>

            <div class="max-w-3xl space-y-4">
                <span class="text-xs font-mono font-bold tracking-widest text-[#C8F169] uppercase">WEBKITA KNOWLEDGE & INSIGHTS</span>
                <h1 class="text-3xl sm:text-5xl font-black text-white tracking-tight leading-tight">
                    Wawasan & Strategi <span class="text-[#C8F169]">Digitalisasi Bisnis</span>
                </h1>
                <p class="text-sm sm:text-base text-purple-200/90 leading-relaxed">
                    Panduan praktis seputar pengembangan website, strategi penamaan domain resmi, optimasi performa kecepatan, dan desain antarmuka berdaya konversi tinggi.
                </p>
            </div>

            <!-- Search and Filter Bar -->
            <div class="mt-8 pt-8 border-t border-purple-500/20 flex flex-col md:flex-row items-stretch md:items-center justify-between gap-4">
                <!-- Search Form -->
                <form action="{{ route('blog.index') }}" method="GET" class="flex items-center gap-2 max-w-md w-full">
                    @if ($selectedCategory)
                        <input type="hidden" name="category" value="{{ $selectedCategory }}">
                    @endif
                    <input type="text" 
                           name="q" 
                           value="{{ $searchKeyword }}" 
                           placeholder="Cari topik atau kata kunci..." 
                           class="w-full px-4 py-2.5 rounded-full bg-[#1A0630] border border-purple-400/30 text-xs text-white placeholder-purple-300/50 focus:outline-none focus:border-[#C8F169] transition-all">
                    <button type="submit" class="lime-pill px-5 py-2.5 rounded-full text-xs font-bold shrink-0">
                        Cari
                    </button>
                    @if ($searchKeyword)
                        <a href="{{ route('blog.index', ['category' => $selectedCategory]) }}" class="px-3 py-2 text-xs text-purple-300 hover:text-white shrink-0">
                            Reset
                        </a>
                    @endif
                </form>

                <!-- Category Filter Pills -->
                <div class="flex flex-wrap items-center gap-2">
                    <a href="{{ route('blog.index', ['q' => $searchKeyword]) }}" 
                       class="{{ empty($selectedCategory) ? 'bg-[#C8F169] text-[#1E0A38] font-black' : 'glass-pill text-purple-200 hover:text-white' }} px-4 py-2 rounded-full text-xs transition-all">
                        Semua Topik
                    </a>
                    @foreach ($categories as $cat)
                        <a href="{{ route('blog.index', ['category' => $cat->slug, 'q' => $searchKeyword]) }}" 
                           class="{{ $selectedCategory === $cat->slug ? 'bg-[#C8F169] text-[#1E0A38] font-black' : 'glass-pill text-purple-200 hover:text-white' }} px-4 py-2 rounded-full text-xs transition-all">
                            {{ $cat->name }} ({{ $cat->posts_count }})
                        </a>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Articles Grid -->
        @if ($posts->isEmpty())
            <div class="studio-card-dark p-12 rounded-3xl border border-purple-400/20 text-center space-y-4">
                <span class="text-xs font-mono font-bold text-[#C8F169] tracking-widest uppercase">HASIL PENCARIAN NIHIL</span>
                <h3 class="text-xl font-bold text-white">Tidak Ada Artikel yang Cocok</h3>
                <p class="text-xs text-purple-200/80 max-w-md mx-auto">
                    Topik atau kata kunci yang Anda masukkan belum tersedia. Coba kata kunci lain atau lihat seluruh arsip artikel kami.
                </p>
                <div class="pt-2">
                    <a href="{{ route('blog.index') }}" class="lime-pill inline-block px-6 py-2.5 rounded-full text-xs font-bold">
                        Lihat Semua Artikel
                    </a>
                </div>
            </div>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($posts as $index => $post)
                    <article class="studio-card-dark p-7 rounded-3xl border border-purple-500/20 hover:border-purple-400/50 flex flex-col justify-between transition-all duration-300 group hover:-translate-y-1">
                        <div>
                            <!-- Header Meta: Category & Reading Time -->
                            <div class="flex items-center justify-between pb-4 border-b border-purple-500/20 text-xs">
                                <span class="font-mono font-bold text-[#C8F169] uppercase tracking-wider text-[11px]">
                                    {{ $post->category ? $post->category->name : 'Wawasan Umum' }}
                                </span>
                                <span class="text-purple-300/80 text-[11px]">
                                    {{ $post->reading_time_minutes }} Menit Baca
                                </span>
                            </div>

                            <!-- Post Title & Excerpt -->
                            <div class="mt-5 space-y-3">
                                <span class="text-xs font-mono font-bold text-purple-400/60 block">
                                    POST — {{ sprintf('%02d', $index + 1) }}
                                </span>
                                <h2 class="text-lg font-bold text-white group-hover:text-[#C8F169] transition-colors leading-snug">
                                    <a href="{{ route('blog.show', $post->slug) }}">
                                        {{ $post->title }}
                                    </a>
                                </h2>
                                <p class="text-xs text-purple-200/80 line-clamp-3 leading-relaxed">
                                    {{ $post->excerpt }}
                                </p>
                            </div>
                        </div>

                        <!-- Footer Meta & Read Link -->
                        <div class="pt-6 mt-6 border-t border-purple-500/20 flex items-center justify-between">
                            <div class="text-[11px] text-purple-300">
                                <span>{{ $post->author }}</span> • <span>{{ $post->published_at ? $post->published_at->format('d M Y') : 'Terbaru' }}</span>
                            </div>

                            <a href="{{ route('blog.show', $post->slug) }}" 
                               class="inline-flex items-center gap-1.5 text-xs font-bold text-[#C8F169] group-hover:underline">
                                <span>Baca</span>
                                <span>→</span>
                            </a>
                        </div>
                    </article>
                @endforeach
            </div>

            <!-- Pagination Links -->
            <div class="pt-6 flex justify-center">
                {{ $posts->links() }}
            </div>
        @endif

        <!-- Newsletter Subscription Box -->
        <div class="relative rounded-3xl bg-gradient-to-br from-[#2D0F5E] via-[#210947] to-[#170533] border border-[#C8F169]/30 p-8 sm:p-10 shadow-2xl overflow-hidden">
            <div class="frame-corner frame-corner-tl"></div>
            <div class="frame-corner frame-corner-tr"></div>
            <div class="frame-corner frame-corner-bl"></div>
            <div class="frame-corner frame-corner-br"></div>

            <div class="max-w-2xl mx-auto text-center space-y-4">
                <span class="text-xs font-mono font-bold tracking-widest text-[#C8F169] uppercase">NEWSLETTER EKSKLUSIF</span>
                <h3 class="text-2xl sm:text-3xl font-black text-white">Dapatkan Wawasan Digital &amp; SEO Gratis</h3>
                <p class="text-xs sm:text-sm text-purple-200/80 leading-relaxed">
                    Panduan praktis melipatgandakan omset lewat website, tips SEO Google terupdate, dan arsitektur landing page konversi tinggi langsung ke email Anda. Tanpa spam.
                </p>

                <form action="{{ route('newsletter.subscribe') }}" method="POST" class="pt-2 max-w-md mx-auto flex flex-col sm:flex-row gap-2">
                    @csrf
                    <input type="hidden" name="source" value="blog_page">
                    <input type="email" 
                           name="email" 
                           required 
                           placeholder="Masukkan alamat email Anda..." 
                           class="w-full px-4 py-3 rounded-full bg-[#1A0630] border border-purple-400/30 text-xs text-white placeholder-purple-300/50 focus:outline-none focus:border-[#C8F169] transition-all">
                    <button type="submit" class="lime-pill px-6 py-3 rounded-full text-xs font-black shrink-0">
                        Berlangganan
                    </button>
                </form>
            </div>
        </div>

        <!-- Call to Action Banner -->
        <div class="studio-card-dark p-8 sm:p-10 rounded-3xl border border-purple-400/20 flex flex-col md:flex-row items-center justify-between gap-6 shadow-2xl">
            <div class="space-y-2 text-center md:text-left">
                <span class="text-xs font-mono font-bold text-[#C8F169] uppercase tracking-wider">KONSULTASI GRATIS</span>
                <h3 class="text-xl sm:text-2xl font-black text-white">Siap Mewujudkan Website Bisnis Anda?</h3>
                <p class="text-xs text-purple-200/80 max-w-xl">
                    Diskusikan kebutuhan landing page, company profile, atau toko online Anda langsung bersama tim arsitek web Webkita.
                </p>
            </div>
            <div class="flex items-center gap-3 shrink-0">
                <a href="https://wa.me/6281288990536?text=Halo%20Webkita,%20saya%20telah%20membaca%20artikel%20dan%20ingin%20konsultasi%20website%20bisnis." 
                   target="_blank" 
                   class="glass-pill px-5 py-3 rounded-full text-xs font-bold text-white hover:text-[#C8F169]">
                    Konsultasi WhatsApp
                </a>
                <a href="{{ url('/#paket') }}" class="lime-pill px-6 py-3 rounded-full text-xs font-black shadow-lg">
                    Lihat Paket Harga →
                </a>
            </div>
        </div>

    </div>
</div>
@endsection
