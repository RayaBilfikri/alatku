<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Carousel</title>
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

            <!-- Form Edit Carousel -->
            <div class="bg-white p-6 rounded shadow-md w-full lg:max-w-4xl mx-auto">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-2xl font-semibold text-center w-full">Edit Carousel</h2>
                </div>

                @if ($errors->any())
                    <div class="bg-red-100 text-red-700 px-4 py-3 rounded mb-6">
                        <ul class="list-disc pl-5">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('superadmin.carousel.update', $carousel->id_carousel) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <!-- Judul -->
                    <div class="mb-4 flex items-center space-x-6">
                        <label for="judul" class="w-40 text-sm font-medium">Judul <span class="text-red-500">*</span></label>
                        <input type="text" id="judul" name="judul" value="{{ old('judul', $carousel->judul) }}" required
                            class="flex-1 border border-gray-300 rounded px-4 py-3 focus:outline-none focus:ring focus:border-blue-300">
                    </div>

                    <!-- Gambar -->
                    <div class="mb-4 flex items-center space-x-6">
                        <label for="gambar" class="w-40 text-sm font-medium">Gambar</label>
                        <input type="file" id="gambar" name="gambar"
                            class="flex-1 border border-gray-300 rounded px-4 py-3">
                    </div>
                    <p class="text-sm text-gray-500 ml-40 mb-4">Format: JPG, JPEG, PNG. Maks: 2MB. Kosongkan jika tidak ingin mengubah gambar.</p>

                    <!-- Gambar Saat Ini -->
                    <div class="mb-4 flex items-start space-x-6">
                        <label class="w-40 text-sm font-medium">Gambar Saat Ini</label>
                        <img src="{{ asset('storage/' . $carousel->gambar) }}" alt="{{ $carousel->judul }}"
                            class="rounded border max-h-48">
                    </div>

                    <!-- Link -->
                    <div class="mb-4 flex items-center space-x-6">
                        <label for="link" class="w-40 text-sm font-medium">Link (Opsional)</label>
                        <input type="text" id="link" name="link" value="{{ old('link', $carousel->link) }}"
                            class="flex-1 border border-gray-300 rounded px-4 py-3">
                    </div>
                    <p class="text-sm text-gray-500 ml-40 mb-4">URL tujuan jika carousel diklik.</p>

                    <!-- Status -->
                    <div class="mb-6 flex items-center space-x-6">
                        <label for="status" class="w-40 text-sm font-medium">Status <span class="text-red-500">*</span></label>
                        <select id="status" name="status" required
                            class="flex-1 border border-gray-300 rounded px-4 py-3 focus:outline-none focus:ring focus:border-blue-300">
                            <option value="aktif" {{ old('status', $carousel->status) == 'aktif' ? 'selected' : '' }}>Aktif</option>
                            <option value="nonaktif" {{ old('status', $carousel->status) == 'nonaktif' ? 'selected' : '' }}>Nonaktif</option>
                        </select>
                    </div>

                    <div class="flex space-x-4 justify-start mt-6">
                        <!-- Tombol Batal -->
                        <a href="{{ route('superadmin.carousel.index') }}" class="bg-red-500 text-white px-6 py-2 rounded hover:bg-red-600 transition">
                            Batal
                        </a>

                        <!-- Tombol Update -->
                        <button type="submit" class="bg-green-600 text-white px-6 py-2 rounded hover:bg-green-700 transition">
                            Perbarui 
                        </button>
                    </div>
                </form>
            </div>
        </main>
    </div>

</body>
</html>
