@extends('layouts.superadmin')


@section('content')
<main class="flex-1 bg-gray-50 p-6">
    <div class="bg-white p-6 rounded shadow-md w-full lg:max-w-4xl mx-auto">
        <h2 class="text-2xl font-semibold mb-6 text-center">Edit Artikel</h2>

        <form action="{{ route('articles.update', $article->id_articles) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Judul -->
            <div class="mb-6">
                <label for="judul" class="block text-sm font-medium mb-1">Judul</label>
                <input type="text" name="judul" id="judul" value="{{ old('judul', $article->judul) }}" required
                    class="w-full border border-gray-300 rounded px-4 py-3 focus:outline-none focus:ring focus:border-blue-300">
                @error('judul')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Konten Artikel -->
            <div class="mb-6">
                <label for="konten_artikel" class="block text-sm font-medium mb-1">Konten Artikel</label>
                <textarea name="konten_artikel" id="konten_artikel" rows="5" required
                    class="w-full border border-gray-300 rounded px-4 py-3 focus:outline-none focus:ring focus:border-blue-300">{{ old('konten_artikel', $article->konten_artikel) }}</textarea>
                @error('konten_artikel')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Gambar -->
            <div class="mb-6">
                <label for="gambar" class="block text-sm font-medium mb-1">Gambar</label>
                @if($article->gambar)
                    <img src="{{ asset('storage/'.$article->gambar) }}" class="w-32 mb-2 rounded shadow" alt="gambar">
                @endif
                <input type="file" name="gambar"
                    class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring focus:border-blue-300">
                @error('gambar')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <!-- Tanggal Publish -->
            <div class="mb-6">
                <label for="tanggal_publish" class="block text-sm font-medium mb-1">Tanggal Publish</label>
                <input type="date" name="tanggal_publish" id="tanggal_publish" value="{{ old('tanggal_publish', $article->tanggal_publish) }}" required
                    class="w-full border border-gray-300 rounded px-4 py-3 focus:outline-none focus:ring focus:border-blue-300">

                <!-- Error Message -->
                @error('tanggal_publish')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
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
