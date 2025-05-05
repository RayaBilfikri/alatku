<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Website Profile</title>
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
                <span>Nama Akun</span>
            </div>
        </div>

        <!-- Form Edit Website Profile -->
        <div class="bg-white p-6 rounded shadow-md w-full lg:max-w-7xl mx-auto">
            <h2 class="text-2xl font-semibold mb-6 text-center">Edit Website Profile</h2>
            <form action="{{ route('superadmin.websiteprofiles.update', $websiteProfile->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-6 flex items-center space-x-6">
                    <label for="nama_website" class="w-40 text-sm font-medium">Nama Website</label>
                    <input type="text" id="nama_website" name="nama_website" required
                           value="{{ old('nama_website', $websiteProfile->nama_website) }}"
                           class="flex-1 border border-gray-300 rounded px-4 py-3 focus:outline-none focus:ring focus:border-blue-300">
                </div>

                <div class="mb-6 flex items-center space-x-6">
                    <label for="logo_website" class="w-40 text-sm font-medium">Logo Website</label>
                    <input type="file" id="logo_website" name="logo_website" accept="image/*"
                           class="flex-1 border border-gray-300 rounded px-4 py-3 focus:outline-none focus:ring focus:border-blue-300">
                </div>

                
                <div class="mb-6">
                    <label for="tentang_kami" class="block text-sm font-medium mb-2">Tentang Kami</label>
                    <textarea id="tentang_kami" name="tentang_kami" required rows="4"
                              class="w-full border border-gray-300 rounded px-4 py-3 focus:outline-none focus:ring focus:border-blue-300">{{ old('tentang_kami', $websiteProfile->tentang_kami) }}</textarea>
                </div>

                <div class="flex justify-start space-x-4">
                    <button type="submit"
                            class="bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded-md">
                        Perbarui
                    </button>
                    <a href="{{ route('superadmin.websiteprofiles.index') }}"
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
