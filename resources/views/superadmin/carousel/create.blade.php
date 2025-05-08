@extends('layouts.superadmin')

@section('content')
<div class="p-6 max-w-xl mx-auto">
    <h1 class="text-2xl font-semibold mb-4">Tambah Carousel</h1>

    <form action="{{ route('superadmin.carousel.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf

        <div>
            <label for="judul" class="block font-medium">Judul Carousel</label>
            <input type="text" name="judul" id="judul" required class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-300" value="{{ old('judul') }}">
        </div>

        <div>
            <label for="gambar" class="block font-medium">Gambar Carousel</label>
            <input type="file" name="gambar" id="gambar" accept="image/*" required class="w-full border rounded px-3 py-2">
        </div>

        <div>
            <label for="link">Link (Opsional)</label>
            <input type="url" name="link" id="link" class="form-input">
        </div>

        <div>
            <label for="status">Status</label>
            <select name="status" id="status">
                <option value="aktif">Aktif</option>
                <option value="nonaktif" selected>Nonaktif</option>
            </select>
        </div>


        <div class="flex justify-end space-x-2">
            <a href="{{ route('superadmin.carousel.index') }}" class="bg-gray-300 hover:bg-gray-400 text-black px-4 py-2 rounded">Batal</a>
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">Simpan</button>
        </div>
    </form>
</div>
@endsection
