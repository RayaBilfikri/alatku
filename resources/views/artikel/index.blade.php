@extends('layouts.app')


@section('content')
<div class="min-h-screen bg-gray-100 py-8 px-4 sm:px-6 lg:px-8">


    <div class="max-w-6xl mx-auto mt-8">
        <!-- Judul -->
        <h1 class="text-4xl font-bold text-center mb-10 font-montserrat pt-6">Artikel Terbaru</h1>

        <!-- Grid artikel -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($latestArticles as $article)
                <div class="bg-white rounded-lg shadow-md overflow-hidden transition-all duration-300 hover:shadow-lg">
                    <div class="relative overflow-hidden h-48">
                        @if($article->gambar)
                            <img src="{{ asset('storage/' . $article->gambar) }}" alt="{{ $article->judul }}" 
                                class="w-full h-full object-cover transition-transform duration-300 hover:scale-110">
                        @else
                            <div class="w-full h-full bg-gradient-to-br from-gray-300 to-gray-400 transition-transform duration-300 hover:scale-110"></div>
                        @endif
                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent"></div>
                        <div class="absolute bottom-0 left-0 right-0 p-3 z-10">
                            <h2 class="text-white font-semibold font-montserrat line-clamp-2 text-lg">{{ $article->judul }}</h2>
                            <div class="text-xs text-gray-200 mt-1">
                                {{ \Carbon\Carbon::parse($article->tanggal_publish)->format('d M Y') }}
                            </div>
                        </div>
                    </div>
                    <div class="p-4">
                        <div class="text-sm text-gray-700 mb-4 line-clamp-3">
                            {!! Str::limit(strip_tags($article->konten_artikel), 80) !!}
                        </div>
                        <div class="flex justify-end">
                            <a href="{{ route('artikel.show', $article->id_articles) }}" class="inline-block px-4 py-2 text-sm text-white bg-gray-800 rounded-full hover:bg-gray-700 transition-colors">
                                Baca Selengkapnya
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-full text-center py-12 bg-white rounded-lg shadow-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mx-auto text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                    </svg>
                    <p class="text-gray-500 text-lg mt-4">Belum ada artikel yang dipublikasikan</p>
                    <p class="text-gray-400 mt-2">Silakan kembali lagi nanti untuk melihat artikel terbaru</p>
                </div>
            @endforelse
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
    .line-clamp-2 {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
    .line-clamp-3 {
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
</style>
@endpush
