<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tambah Produk</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&display=swap" rel="stylesheet">
</head>
<body class="bg-gray-100 font-sans">

<div class="flex min-h-screen">
    <!-- Sidebar -->
    @include('partials.sidebar')

    <!-- Main content -->
    <main class="flex-1 bg-gray-50 p-6">
        <!-- Header -->
        @include('partials.header')

        <!-- Form Tambah Produk -->
        <div class="bg-white p-6 rounded shadow-md w-full lg:max-w-7xl mx-auto">
        <h2 class="text-2xl font-semibold mb-6 text-center">Tambah Produk</h2>
        <form action="{{ route('superadmin.products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- Nama Produk -->
            <div class="mb-4 flex items-center space-x-6">
                <label for="name" class="w-40 text-sm font-medium">Nama Produk</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}" required
                    class="flex-1 border border-gray-300 rounded px-4 py-3 focus:outline-none focus:ring focus:border-blue-300">
            </div>


            <!-- Gambar -->
            <div class="mb-4 flex items-center space-x-6">
                <label for="gambar" class="w-40 text-sm font-medium">Gambar Produk</label>
                <input type="file" id="gambar" name="gambar" accept="image/jpeg, image/png, image/jpg"
                    class="flex-1 border border-gray-300 rounded px-4 py-3">
            </div>

            <!-- Kategori -->
            <div class="mb-4 flex items-center space-x-6">
                <label for="category_id" class="w-40 text-sm font-medium">Kategori</label>
                <select name="category_id" id="category_id" required
                    class="flex-1 border border-gray-300 rounded px-4 py-3 focus:outline-none focus:ring focus:border-blue-300">
                    <option value="">Pilih Kategori</option>
                    @foreach($Categories as $Category)
                        <option value="{{ $Category->id }}">{{ $Category->name }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Sub Kategori -->
            <div class="mb-4 flex items-center space-x-6">
                <label for="sub_category_id" class="w-40 text-sm font-medium">Sub Kategori</label>
                <select name="sub_category_id" id="sub_category_id" required
                    class="flex-1 border border-gray-300 rounded px-4 py-3 focus:outline-none focus:ring focus:border-blue-300">
                    <option value="">Pilih Sub Kategori</option>
                    @foreach($subCategories as $subCategory)
                        <option value="{{ $subCategory->id }}">{{ $subCategory->name }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Kontak -->
            <div class="mb-4 flex items-center space-x-6">
                <label for="contact_id" class="w-40 text-sm font-medium">Kontak</label>
                <select name="contact_id" id="contact_id" required
                    class="flex-1 border border-gray-300 rounded px-4 py-3 focus:outline-none focus:ring focus:border-blue-300">
                    <option value="">Pilih Kontak</option>
                    @foreach($contacts as $contact)
                        <option value="{{ $contact->id }}">{{ $contact->no_wa }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Serial Number -->
            <div class="mb-4 flex items-center space-x-6">
                <label for="serial_number" class="w-40 text-sm font-medium">Serial Number</label>
                <input type="text" id="serial_number" name="serial_number" value="{{ old('serial_number') }}"
                    class="flex-1 border border-gray-300 rounded px-4 py-3">
            </div>

            <!-- Tahun Pembuatan (Custom Dropdown) -->
            <div class="mb-4 flex items-center space-x-6">
                <label class="w-40 text-sm font-medium text-gray-700">Tahun Pembuatan</label>
                <div x-data="{ open: false, selected: '' }" class="relative flex-1">
                    <button @click="open = !open" type="button"
                        class="w-full bg-white border border-gray-300 rounded px-4 py-3 text-left">
                        <span x-text="selected || 'Pilih Tahun'"></span>
                    </button>
                    <ul x-show="open" @click.away="open = false"
                        class="absolute z-10 mt-1 w-full bg-white border border-gray-300 rounded shadow max-h-60 overflow-y-auto">
                        @for ($year = date('Y'); $year >= 1950; $year--)
                            <li @click="selected = '{{ $year }}'; open = false"
                                class="px-4 py-2 hover:bg-blue-100 cursor-pointer">{{ $year }}</li>
                        @endfor
                    </ul>
                    <input type="hidden" name="year_of_build" :value="selected">
                </div>
            </div>

            <!-- Hours Meter -->
            <div class="mb-4 flex items-center space-x-6">
                <label for="hours_meter" class="w-40 text-sm font-medium">Hours Meter</label>
                <input type="number" id="hours_meter" name="hours_meter" value="{{ old('hours_meter') }}"
                    class="flex-1 border border-gray-300 rounded px-4 py-3">
            </div>

            <!-- Stok -->
            <div class="mb-4 flex items-center space-x-6">
                <label for="stock" class="w-40 text-sm font-medium">Stok</label>
                <input type="number" id="stock" name="stock" value="{{ old('stock') }}" required
                    class="flex-1 border border-gray-300 rounded px-4 py-3">
            </div>

            <!-- Harga -->
            <div class="mb-4 flex items-center space-x-6">
                <label for="harga" class="w-40 text-sm font-medium">Harga</label>
                <input type="number" id="harga" name="harga" value="{{ old('harga') }}" required
                    class="flex-1 border border-gray-300 rounded px-4 py-3">
            </div>

            <!-- Deskripsi -->
            <div class="mb-4">
                <label for="description" class="block text-sm font-medium mb-2">Deskripsi</label>
                <textarea id="description" name="description" rows="4"
                    class="w-full border border-gray-300 rounded px-4 py-3">{{ old('description') }}</textarea>
            </div>

            <!-- Brosur -->
            <div class="mb-4 flex items-center space-x-6">
                <label for="brosur" class="w-40 text-sm font-medium">Brosur (PDF)</label>
                <input type="file" id="brosur" name="brosur" accept="application/pdf"
                    class="flex-1 border border-gray-300 rounded px-4 py-3">
            </div>

            <!-- Tombol -->
            <div class="flex justify-start space-x-4 mt-6">
                <button type="submit"
                    class="bg-blue-600 hover:bg-blue-500 text-white px-6 py-3 rounded-md">
                    Tambahkan
                </button>
                <a href="{{ route('superadmin.products.index') }}"
                    class="bg-red-500 hover:bg-red-600 text-white px-6 py-3 rounded-md">
                    Batal
                </a>
            </div>
        </form>
</div>
    </main>
</div>

<!-- CDN Alpine.js -->
<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

</body>
</html>
