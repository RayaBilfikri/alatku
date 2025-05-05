<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('resources/app.css') }}">
    
</head>
<body class="bg-gray-100 font-sans">

    <div class="flex h-screen">
        <!-- Sidebar -->
        <aside class="w-64 bg-white shadow-md flex flex-col justify-between">
            <div>
                <!-- Logo -->
                <div class="flex items-center justify-center h-20 border-b">
                    <img src="/logo.png" alt="Logo" class="h-12">
                    <div class="ml-2">
                        <h1 class="text-xl font-bold text-orange-600">alatKu</h1>
                        <p class="text-xs text-blue-800 leading-tight">Heavy Equipment, Spare Parts, <br>Marine Machinery</p>
                    </div>
                </div>

                <!-- Navigation -->
                <nav class="p-4 space-y-2 text-sm">
                    <a href="#" class="block py-2 px-3 rounded hover:bg-orange-100">Beranda</a>
                    <div class="relative group">
                        <button class="w-full text-left py-2 px-3 rounded hover:bg-orange-100">Kelola Akses</button>
                        <!-- Tambahkan dropdown jika perlu -->
                    </div>
                    <a href="#" class="block py-2 px-3 rounded hover:bg-orange-100">Kelola Kategori</a>
                    <a href="#" class="block py-2 px-3 rounded hover:bg-orange-100">Kelola Sub Kategori</a>
                    <a href="#" class="block py-2 px-3 rounded hover:bg-orange-100">Kelola Produk</a>
                    <a href="#" class="block py-2 px-3 rounded hover:bg-orange-100">Kelola Ulasan</a>
                    <a href="#" class="block py-2 px-3 rounded hover:bg-orange-100">Kelola Carousel</a>
                    <a href="/contacts" class="block py-2 px-3 rounded hover:bg-orange-100">Kelola Kontak</a>
                    <a href="#" class="block py-2 px-3 rounded hover:bg-orange-100">Kelola Cara Membeli</a>
                    <a href="/websiteprofiles" class="block py-2 px-3 rounded hover:bg-orange-100">Kelola Profile Website</a>
                </nav>
            </div>
            
        </aside>

        <!-- Content Area -->
        <main class="flex-1 bg-gray-50 p-6">
            <!-- Header -->
            <div class="flex justify-end items-center h-20 border-b mb-4">
                <div class="flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                         viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M5.121 17.804A13.937 13.937 0 0112 15c2.485 0 4.797.654 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0z"/>
                    </svg>
                    <span>Super Admin</span>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
