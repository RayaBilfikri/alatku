@extends('layouts.app')

@section('content')
<div class="container mx-auto">
    <h1 class="text-2xl font-bold mb-4">Edit Artikel</h1>

    <form action="{{ route('articles.update', $article->id_articles) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label>Judul</label>
            <input type="text" name="judul" class="w-full border p-2" value="{{ $article->judul }}" required>
        </div>

        <div>
            <label>Konten Artikel</label>
            <textarea name="konten_artikel" class="w-full border p-2" rows="5" required>{{ $article->konten_artikel }}</textarea>
        </div>

        <div>
            <label>Gambar</label><br>
            @if($article->gambar)
                <img src="{{ asset('storage/'.$article->gambar) }}" class="w-32 mb-2" alt="gambar">
            @endif
            <input type="file" name="gambar" class="w-full border p-2">
        </div>

        <div>
            <label>Tanggal Publish</label>
            <input type="date" name="tanggal_publish" class="w-full border p-2" value="{{ $article->tanggal_publish }}">
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Update</button>
    </form>
</div>
@endsection
