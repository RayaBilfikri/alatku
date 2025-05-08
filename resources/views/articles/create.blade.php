@extends('layouts.app')

@section('content')
<div class="container mx-auto">
    <h1 class="text-2xl font-bold mb-4">Tambah Artikel</h1>

    <form action="{{ route('articles.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf
        <div>
            <label>Judul</label>
            <input type="text" name="judul" class="w-full border p-2" required>
        </div>

        <div>
            <label>Konten Artikel</label>
            <textarea name="konten_artikel" class="w-full border p-2" rows="5" required></textarea>
        </div>

        <div>
            <label>Gambar</label>
            <input type="file" name="gambar" class="w-full border p-2">
        </div>

        <div>
            <label>Tanggal Publish</label>
            <input type="date" name="tanggal_publish" class="w-full border p-2">
        </div>

        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">Simpan</button>
    </form>
</div>
@endsection
