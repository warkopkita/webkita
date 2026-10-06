@extends('layouts.app')

@section('title', 'Edit Artikel Blog — Admin Webkita')

@section('content')
<div class="min-h-screen bg-[#381867] text-white pt-28 pb-24 px-4 sm:px-6 lg:px-8">
    <div class="max-w-4xl mx-auto space-y-8">
        
        <!-- Breadcrumb Navigation -->
        <div class="flex items-center gap-2 text-xs font-mono text-purple-300">
            <a href="{{ route('admin.dashboard') }}" class="hover:text-white">&larr; Kembali ke Dashboard Admin</a>
            <span>/</span>
            <span class="text-[#C8F169]">Edit Artikel</span>
        </div>

        <!-- Header Card -->
        <div class="studio-card-dark p-6 sm:p-8 rounded-3xl border border-purple-400/20 shadow-2xl relative overflow-hidden">
            <div class="frame-corner frame-corner-tl"></div>
            <div class="frame-corner frame-corner-tr"></div>
            <div class="frame-corner frame-corner-bl"></div>
            <div class="frame-corner frame-corner-br"></div>

            <span class="text-xs font-mono font-bold tracking-widest text-[#C8F169] uppercase">PERBARUI KONTEN</span>
            <h1 class="text-2xl sm:text-3xl font-black text-white mt-1">
                Edit Artikel: {{ Str::limit($post->title, 40) }}
            </h1>
            <p class="text-xs text-purple-200/80 mt-1">
                Perbarui isi artikel, ringkasan, atau status publikasi artikel.
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
        <form action="{{ route('admin.blog.update', $post) }}" method="POST" class="studio-card-dark p-6 sm:p-8 rounded-3xl border border-purple-400/20 shadow-2xl space-y-6">
            @csrf
            @method('PUT')

            <div class="space-y-2">
                <label for="title" class="text-xs font-mono text-purple-200 uppercase font-bold block">Judul Artikel *</label>
                <input type="text" 
                       id="title" 
                       name="title" 
                       value="{{ old('title', $post->title) }}" 
                       required 
                       class="w-full px-4 py-3 rounded-xl bg-[#1A0630] border border-purple-500/30 text-sm text-white placeholder-purple-300/40 focus:outline-none focus:border-[#C8F169]">
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                <div class="space-y-2">
                    <label for="category_id" class="text-xs font-mono text-purple-200 uppercase font-bold block">Kategori *</label>
                    <select id="category_id" 
                            name="category_id" 
                            required 
                            class="w-full px-4 py-3 rounded-xl bg-[#1A0630] border border-purple-500/30 text-sm text-white focus:outline-none focus:border-[#C8F169]">
                        @foreach ($categories as $cat)
                            <option value="{{ $cat->id }}" {{ old('category_id', $post->category_id) == $cat->id ? 'selected' : '' }}>
                                {{ $cat->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="space-y-2">
                    <label for="author" class="text-xs font-mono text-purple-200 uppercase font-bold block">Penulis *</label>
                    <input type="text" 
                       id="author" 
                       name="author" 
                       value="{{ old('author', $post->author) }}" 
                       required 
                       class="w-full px-4 py-3 rounded-xl bg-[#1A0630] border border-purple-500/30 text-sm text-white focus:outline-none focus:border-[#C8F169]">
                </div>

                <div class="space-y-2">
                    <label for="reading_time_minutes" class="text-xs font-mono text-purple-200 uppercase font-bold block">Waktu Baca (Menit) *</label>
                    <input type="number" 
                           id="reading_time_minutes" 
                           name="reading_time_minutes" 
                           value="{{ old('reading_time_minutes', $post->reading_time_minutes) }}" 
                           min="1" 
                           max="60" 
                           required 
                           class="w-full px-4 py-3 rounded-xl bg-[#1A0630] border border-purple-500/30 text-sm text-white focus:outline-none focus:border-[#C8F169]">
                </div>
            </div>

            <div class="space-y-2">
                <label for="excerpt" class="text-xs font-mono text-purple-200 uppercase font-bold block">Ringkasan Singkat (Excerpt) *</label>
                <textarea id="excerpt" 
                          name="excerpt" 
                          rows="3" 
                          required 
                          class="w-full px-4 py-3 rounded-xl bg-[#1A0630] border border-purple-500/30 text-sm text-white placeholder-purple-300/40 focus:outline-none focus:border-[#C8F169]">{{ old('excerpt', $post->excerpt) }}</textarea>
            </div>

            <div class="space-y-2">
                <label for="content" class="text-xs font-mono text-purple-200 uppercase font-bold block">Isi Konten Lengkap (Format HTML / Teks) *</label>
                <textarea id="content" 
                          name="content" 
                          rows="12" 
                          required 
                          class="w-full px-4 py-3 rounded-xl bg-[#1A0630] border border-purple-500/30 text-sm text-white font-mono placeholder-purple-300/40 focus:outline-none focus:border-[#C8F169] leading-relaxed">{{ old('content', $post->content) }}</textarea>
            </div>

            <div class="pt-2 flex items-center gap-3">
                <input type="checkbox" 
                       id="is_published" 
                       name="is_published" 
                       value="1" 
                       {{ old('is_published', $post->is_published) ? 'checked' : '' }} 
                       class="w-4 h-4 rounded text-[#C8F169] bg-[#1A0630] border-purple-500/40 focus:ring-0">
                <label for="is_published" class="text-xs text-purple-200 select-none cursor-pointer">
                    Artikel aktif dan dapat diakses publik
                </label>
            </div>

            <div class="pt-6 border-t border-purple-500/20 flex items-center justify-between">
                <a href="{{ route('admin.dashboard') }}" class="text-xs text-purple-300 hover:text-white">
                    Batal
                </a>
                <button type="submit" class="lime-pill px-6 py-3 rounded-full text-xs font-bold">
                    Perbarui Artikel
                </button>
            </div>
        </form>

    </div>
</div>
@endsection
