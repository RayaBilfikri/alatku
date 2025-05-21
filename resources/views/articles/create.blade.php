@extends('layouts.superadmin')

@section('content')
<div class="flex min-h-screen">
    <!-- Sidebar -->
    <!-- Main content -->
    <main class="flex-1 bg-gray-50 p-6">
        <!-- Form Tambah Artikel -->
        <div class="bg-white p-6 rounded shadow-md w-full lg:max-w-7xl mx-auto">
            <h2 class="text-2xl font-semibold mb-6 text-center">Tambah Artikel</h2>
            <form action="{{ route('articles.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- Judul -->
                <div class="mb-6 flex items-center space-x-6">
                    <label for="judul" class="w-40 text-sm font-medium">Judul</label>
                    <input type="text" id="judul" name="judul" required
                           class="flex-1 border border-gray-300 rounded px-4 py-3 focus:outline-none focus:ring focus:border-blue-300">
                </div>

                <!-- Konten Artikel -->
                <div class="mb-6 flex items-start space-x-6">
                    <label for="konten_artikel" class="w-40 text-sm font-medium pt-2">Konten Artikel</label>
                    <textarea id="konten_artikel" name="konten_artikel" rows="5" required
                              class="flex-1 border border-gray-300 rounded px-4 py-3 focus:outline-none focus:ring focus:border-blue-300"></textarea>
                </div>

                <!-- Gambar -->
                <div class="mb-6">
                    <div class="flex items-center space-x-6">
                        <label for="gambar" class="w-40 text-sm font-medium">Gambar</label>
                        <div class="flex-1">
                            <input type="file" id="gambar" name="gambar"
                                class="w-full border border-gray-300 rounded px-4 py-3 focus:outline-none focus:ring focus:border-blue-300">
                            @error('gambar')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Tanggal Publish -->
                <div class="mb-6 flex items-center space-x-6">
                    <label for="tanggal_publish" class="w-40 text-sm font-medium">Tanggal Publish</label>
                    <input type="date" id="tanggal_publish" name="tanggal_publish"
                        class="flex-1 border border-gray-300 rounded px-4 py-3 focus:outline-none focus:ring focus:border-blue-300">
                        @error('tanggal_publish')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                </div>

                <!-- Tombol -->
                <div class="flex justify-start space-x-4">
                    <button type="submit"
                            class="bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded-md">
                        Tambah
                    </button>
                    <a href="{{ route('articles.index') }}"
                       class="bg-red-500 hover:bg-red-600 text-white px-6 py-3 rounded-md">
                        Batal
                    </a>
                </div>
            </form>
        </div>
    </main>
</div>
@endsection
