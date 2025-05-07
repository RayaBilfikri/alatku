<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Sub Kategori</title>
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
        <div class="flex justify-end items-center h-20 border-b mb-4">
            <div class="flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                     viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M5.121 17.804A13.937 13.937 0 0112 15c2.485 0 4.797.654 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0z"/>
                </svg>
                <span>Sub Kategori</span>
            </div>
        </div>

        <!-- Form Edit Sub Kategori -->
        <div class="bg-white p-6 rounded shadow-md w-full lg:max-w-7xl mx-auto">
            <h2 class="text-2xl font-semibold mb-6 text-center">Edit Sub Kategori</h2>
            <form action="{{ route('superadmin.subcategories.update', $subcategory->id_sub_categories) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- Pilih Kategori Induk -->
                <div class="mb-6 flex items-center space-x-6">
                    <label for="category_id" class="w-40 text-sm font-medium">Kategori</label>
                    <select id="categories_id" name="categories_id" required
                        class="flex-1 border border-gray-300 rounded px-4 py-3 focus:outline-none focus:ring focus:border-blue-300">
                        @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ $subcategory->categories_id == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                        </option>
                        @endforeach
                    </select>
                </div>

                <!-- Input Nama Sub Kategori -->
                <div class="mb-6 flex items-center space-x-6">
                    <label for="name" class="w-40 text-sm font-medium">Sub Kategori</label>
                    <input type="text" id="name" name="name" required
                           value="{{ old('name', $subcategory->name) }}"
                           class="flex-1 border border-gray-300 rounded px-4 py-3 focus:outline-none focus:ring focus:border-blue-300">
                </div>

                <div class="flex justify-start space-x-4">
                    <button type="submit"
                            class="bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded-md">
                        Perbarui
                    </button>
                    <a href="{{ route('superadmin.subcategories.index') }}"
                       class="bg-red-500 hover:bg-red-600 text-white px-6 py-3 rounded-md">
                        Batal
                    </a>
                </div>
            </form>
        </div>
    </main>
</div>
</body>
</html>
