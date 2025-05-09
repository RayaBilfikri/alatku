@extends('layouts.superadmin')

@section('content')
<div class="flex h-screen">
    @include('partials.sidebar')

    <main class="flex-1 bg-gray-50 p-6 overflow-y-auto">
        <div class="bg-white p-6 rounded shadow">
            <h2 class="text-xl font-bold mb-4">Tambah Artikel</h2>
            <form action="{{ route('articles.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                @csrf
                <div>
                    <label class="block font-semibold">Judul</label>
                    <input type="text" name="judul" class="w-full border px-4 py-2 rounded" required>
                </div>
                <div>
                    <label class="block font-semibold">Konten</label>
                    <textarea name="konten_artikel" rows="5" class="w-full border px-4 py-2 rounded" required></textarea>
                </div>
                <div>
                    <label class="block font-semibold">Gambar</label>
                    <input type="file" name="gambar" class="w-full border px-4 py-2 rounded">
                </div>
                <div>
                    <label class="block font-semibold">Tanggal Publish</label>
                    <input type="date" name="tanggal_publish" class="w-full border px-4 py-2 rounded" required>
                </div>
                <div class="flex justify-end">
                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">Simpan</button>
                </div>
            </form>
        </div>
    </main>
</div>
@endsection
