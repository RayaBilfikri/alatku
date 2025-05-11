@extends('layouts.superadmin')

@section('content')
<main class="flex-1 bg-gray-50 p-6">
    <div class="bg-white p-6 rounded shadow-md w-full lg:max-w-4xl mx-auto">
        <h2 class="text-2xl font-semibold mb-6 text-center">Edit Artikel</h2>

        <form action="{{ route('articles.update', $article->id_articles) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Judul -->
            <div class="mb-6 flex items-center space-x-6">
                <label for="judul" class="w-40 text-sm font-medium">Judul</label>
                <input type="text" name="judul" id="judul" value="{{ $article->judul }}" required
                       class="flex-1 border border-gray-300 rounded px-4 py-3 focus:outline-none focus:ring focus:border-blue-300">
            </div>

            <!-- Konten Artikel -->
            <div class="mb-6 flex items-start space-x-6">
                <label for="konten_artikel" class="w-40 text-sm font-medium pt-2">Konten Artikel</label>
                <textarea name="konten_artikel" id="konten_artikel" rows="5" required
                          class="flex-1 border border-gray-300 rounded px-4 py-3 focus:outline-none focus:ring focus:border-blue-300">{{ $article->konten_artikel }}</textarea>
            </div>

            <!-- Gambar -->
            <div class="mb-6 flex items-start space-x-6">
                <label for="gambar" class="w-40 text-sm font-medium pt-2">Gambar</label>
                <div class="flex-1 space-y-2">
                    @if($article->gambar)
                        <img src="{{ asset('storage/'.$article->gambar) }}" class="w-32 mb-2 rounded shadow" alt="gambar">
                    @endif
                    <input type="file" name="gambar"
                           class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring focus:border-blue-300">
                </div>
            </div>

            <!-- Tanggal Publish -->
            <div class="mb-6 flex items-center space-x-6">
                <label for="tanggal_publish" class="w-40 text-sm font-medium">Tanggal Publish</label>
                <input type="date" name="tanggal_publish" id="tanggal_publish" value="{{ $article->tanggal_publish }}"
                       class="flex-1 border border-gray-300 rounded px-4 py-3 focus:outline-none focus:ring focus:border-blue-300">
            </div>

            <!-- Tombol -->
            <div class="flex justify-start space-x-4">
                <button type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-md">
                    Update
                </button>
                <a href="{{ route('articles.index') }}"
                   class="bg-red-500 hover:bg-red-600 text-white px-6 py-3 rounded-md">
                    Batal
                </a>
            </div>
        </form>
    </div>
</main>
@endsection
