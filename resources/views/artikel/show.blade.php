@extends('layouts.app')


@section('content')

<div class="w-full min-h-screen bg-gray-100 py-10 px-4">
    <div class="max-w-4xl mx-auto bg-white shadow-md rounded-lg overflow-hidden pt-20">
        <!-- Gambar Artikel -->
        @if($article->gambar)
            <img src="{{ asset('storage/' . $article->gambar) }}" alt="{{ $article->judul }}" class="w-full h-64 object-cover">
        @else
            <div class="w-full h-64 bg-gradient-to-br from-gray-300 to-gray-400"></div>
        @endif

        <div class="p-6">
            <!-- Judul Artikel -->
            <h1 class="text-3xl font-bold font-montserrat mb-4">{{ $article->judul }}</h1>

            <!-- Tanggal Publikasi -->
            <p class="text-sm text-gray-500 mb-6">
                Dipublikasikan pada {{ \Carbon\Carbon::parse($article->tanggal_publish)->translatedFormat('d F Y') }}
            </p>

            <!-- Konten Artikel -->
            <div class="prose max-w-none">
                {!! $article->konten_artikel !!}
            </div>

            <!-- Tombol Kembali -->
            <div class="mt-10">
                <a href="{{ route('artikel') }}" class="inline-block px-4 py-2 bg-gray-800 text-white text-sm rounded hover:bg-gray-700 transition">
                    ← Kembali ke Daftar Artikel
                </a>
            </div>
        </div>
    </div>
</div>
@endsection


@push('styles')
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">
<style>
    .font-montserrat {
        font-family: 'Montserrat', sans-serif;
    }

    /* Untuk styling konten artikel agar rapi */
    .prose {
        font-family: 'Montserrat', sans-serif;
        line-height: 1.8;
        font-size: 1rem;
        color: #333;
    }

    .prose h1, .prose h2, .prose h3 {
        font-weight: 600;
    }

    .prose img {
        max-width: 100%;
        border-radius: 0.5rem;
        margin: 1rem 0;
    }
</style>
@endpush
