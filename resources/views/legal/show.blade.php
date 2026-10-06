@extends('layouts.app')

@section('title', $page->title . ' — Webkita')
@section('meta_description', 'Halaman resmi ' . $page->title . ' dari Webkita Studio Indonesia.')

@section('content')
<div class="relative min-h-screen bg-[#381867] text-white pt-28 pb-24 px-4 sm:px-6 lg:px-8">
    <!-- Ambient Glow -->
    <div class="absolute top-20 left-1/2 -translate-x-1/2 w-96 h-96 bg-[#C8F169]/10 rounded-full blur-3xl pointer-events-none"></div>

    <div class="max-w-4xl mx-auto relative z-10">
        
        <!-- Back Navigation -->
        <div class="mb-8">
            <a href="{{ url('/') }}" class="glass-pill inline-flex items-center gap-2 px-4 py-2 rounded-full text-xs font-semibold hover:text-[#C8F169] transition-all">
                <span>←</span>
                <span>Kembali ke Beranda</span>
            </a>
        </div>

        <!-- Document Card -->
        <div class="studio-card-dark p-8 sm:p-12 rounded-3xl border border-purple-400/20 shadow-2xl">
            <!-- Header -->
            <div class="pb-6 mb-8 border-b border-purple-500/20">
                <span class="text-xs font-mono font-bold tracking-widest text-[#C8F169] uppercase">DOKUMEN RESMI</span>
                <h1 class="text-3xl sm:text-4xl font-black text-white mt-2 mb-3">
                    {{ $page->title }}
                </h1>
                <p class="text-xs text-purple-300">
                    Terakhir Diperbarui: {{ $page->updated_at ? $page->updated_at->format('d F Y') : date('d F Y') }} • Webkita Studio Indonesia
                </p>
            </div>

            <!-- Content Area -->
            <div class="prose prose-invert prose-purple max-w-none text-purple-100 text-sm leading-relaxed space-y-6">
                {!! $page->content !!}
            </div>

            <!-- Footer Help Note -->
            <div class="mt-12 pt-6 border-t border-purple-500/20 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 text-xs text-purple-300">
                <div>
                    Ada pertanyaan hukum atau privasi? Hubungi tim kami di <a href="mailto:legal@webkita.id" class="text-[#C8F169] font-bold hover:underline">legal@webkita.id</a>
                </div>
                <a href="https://wa.me/6281234567890?text=Halo%20Webkita,%20saya%20memiliki%20pertanyaan%20mengenai%20syarat%20atau%20kebijakan%20layanan." target="_blank" class="lime-pill px-4 py-2 rounded-xl text-xs font-bold text-center">
                    Hubungi Konsultan WA
                </a>
            </div>
        </div>

    </div>
</div>
@endsection
