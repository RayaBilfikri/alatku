<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tambah Kontak</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&display=swap" rel="stylesheet">
</head>
<body class="bg-gray-100 font-sans">

<div class="flex min-h-screen">
    <!-- Sidebar -->
    <aside class="w-64 bg-white shadow-md flex flex-col justify-between">
        <div>
            <div class="flex items-center justify-center h-20 border-b">
                <img src="/logo.png" alt="Logo" class="h-12">
                <div class="ml-2">
                    <h1 class="text-xl font-bold text-orange-600">alatKu</h1>
                    <p class="text-xs text-blue-800 leading-tight">Heavy Equipment, Spare Parts,<br>Marine Machinery</p>
                </div>
            </div>

            <nav class="p-4 space-y-2 text-sm">
                <a href="#" class="block py-2 px-3 rounded hover:bg-orange-100">Beranda</a>
                <button class="w-full text-left py-2 px-3 rounded hover:bg-orange-100">Kelola Akses</button>
                <a href="#" class="block py-2 px-3 rounded hover:bg-orange-100">Kelola Kategori</a>
                <a href="#" class="block py-2 px-3 rounded hover:bg-orange-100">Kelola Sub Kategori</a>
                <a href="#" class="block py-2 px-3 rounded hover:bg-orange-100">Kelola Produk</a>
                <a href="#" class="block py-2 px-3 rounded hover:bg-orange-100">Kelola Ulasan</a>
                <a href="#" class="block py-2 px-3 rounded hover:bg-orange-100">Kelola Carousel</a>
                <a href="#" class="block py-2 px-3 rounded bg-orange-100 font-bold">Kelola Kontak</a>
                <a href="#" class="block py-2 px-3 rounded hover:bg-orange-100">Kelola Cara Membeli</a>
                <a href="#" class="block py-2 px-3 rounded hover:bg-orange-100">Kelola Profile Website</a>
            </nav>
        </div>
    </aside>

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

        <!-- Form Tambah Kontak -->
        <div class="bg-white p-6 rounded shadow-md w-full lg:max-w-7xl mx-auto">
            <h2 class="text-2xl font-semibold mb-6 text-center">Tambah Kontak</h2>
            <form action="{{ route('superadmin.contacts.store') }}" method="POST">
                @csrf
                <div class="mb-6 flex items-center space-x-6">
                    <label for="name" class="w-40 text-sm font-medium">Nama</label>
                    <input type="text" id="name" name="name" required
                        class="flex-1 border border-gray-300 rounded px-4 py-3 focus:outline-none focus:ring focus:border-blue-300">
                </div>

                <div class="mb-6 flex items-center space-x-6">
                    <label for="no_wa" class="w-40 text-sm font-medium">Nomor Kontak</label>
                    <input type="text" id="no_wa" name="no_wa" required class="flex-1 border border-gray-300 rounded px-4 py-3 focus:outline-none focus:ring focus:border-blue-300">
                </div>


                <div class="flex justify-start space-x-4">
                    <button type="submit"
                            class="bg-blue-600 hover:bg-grey-500 text-white px-6 py-3 rounded-md">
                        Tambahkan
                    </button>
                    <a href="{{ route('superadmin.contacts.index') }}"
                       class="bg-red-500 hover:bg-grey-500 text-white px-6 py-3 rounded-md">
                        Batal
                    </a>
                </div>
            </form>
        </div>
    </main>
</div>

</body>
</html>
