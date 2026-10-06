@extends('layouts.app')

@section('title', 'Edit Dokumen Legalitas — Admin Webkita')

@section('content')
<div class="min-h-screen bg-[#381867] text-white pt-28 pb-24 px-4 sm:px-6 lg:px-8">
    <div class="max-w-4xl mx-auto space-y-8">
        
        <!-- Breadcrumb Navigation -->
        <div class="flex items-center gap-2 text-xs font-mono text-purple-300">
            <a href="{{ route('admin.dashboard') }}" class="hover:text-white">&larr; Kembali ke Dashboard Admin</a>
            <span>/</span>
            <span class="text-[#C8F169]">Edit Dokumen Legalitas</span>
        </div>

        <!-- Header Card -->
        <div class="studio-card-dark p-6 sm:p-8 rounded-3xl border border-purple-400/20 shadow-2xl relative overflow-hidden">
            <div class="frame-corner frame-corner-tl"></div>
            <div class="frame-corner frame-corner-tr"></div>
            <div class="frame-corner frame-corner-bl"></div>
            <div class="frame-corner frame-corner-br"></div>

            <span class="text-xs font-mono font-bold tracking-widest text-[#C8F169] uppercase">KEPATUHAN HUKUM &amp; KONTRAK</span>
            <h1 class="text-2xl sm:text-3xl font-black text-white mt-1">
                Edit {{ $pageLegal->title }}
            </h1>
            <p class="text-xs text-purple-200/80 mt-1">
                Slug Halaman: <code class="text-[#C8F169] font-mono">/{{ $pageLegal->slug === 'privacy-policy' ? 'kebijakan-privasi' : 'syarat-ketentuan' }}</code> (Kepatuhan UU PDP No. 27/2022).
            </p>
        </div>

        @if ($errors->any())
            <div class="p-4 rounded-2xl bg-red-500/20 border border-red-500/40 text-xs text-red-200 space-y-1">
                <span class="font-bold block">Mohon periksa kesalahan input berikut:</span>
                <ul class="list-disc list-inside space-y-0.5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Form Card -->
        <form action="{{ route('admin.legal.update', $pageLegal) }}" method="POST" class="studio-card-dark p-6 sm:p-8 rounded-3xl border border-purple-400/20 shadow-2xl space-y-6">
            @csrf
            @method('PUT')

            <div class="space-y-2">
                <label for="title" class="text-xs font-mono text-purple-200 uppercase font-bold block">Judul Halaman Legal *</label>
                <input type="text" 
                       id="title" 
                       name="title" 
                       value="{{ old('title', $pageLegal->title) }}" 
                       required 
                       class="w-full px-4 py-3 rounded-xl bg-[#1A0630] border border-purple-500/30 text-sm text-white focus:outline-none focus:border-[#C8F169]">
            </div>

            <div class="space-y-2">
                <label for="content" class="text-xs font-mono text-purple-200 uppercase font-bold block">Isi Klausul Dokumen (Format HTML / Teks Resmi) *</label>
                <textarea id="content" 
                          name="content" 
                          rows="18" 
                          required 
                          class="w-full px-4 py-3 rounded-xl bg-[#1A0630] border border-purple-500/30 text-xs text-white font-mono placeholder-purple-300/40 focus:outline-none focus:border-[#C8F169] leading-relaxed">{{ old('content', $pageLegal->content) }}</textarea>
            </div>

            <div class="pt-6 border-t border-purple-500/20 flex items-center justify-between">
                <a href="{{ route('admin.dashboard') }}" class="text-xs text-purple-300 hover:text-white">
                    Batal
                </a>
                <button type="submit" class="lime-pill px-6 py-3 rounded-full text-xs font-bold">
                    Perbarui Dokumen Legal
                </button>
            </div>
        </form>

    </div>
</div>
@endsection
