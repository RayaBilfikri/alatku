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
    @include('partials.sidebar')

    <!-- Content Area -->
    <main class="flex-1 bg-gray-50 p-6 overflow-y-auto">
        <!-- Header -->
        <div class="flex justify-end items-center h-20 border-b mb-6">
            <div class="flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                     viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M5.121 17.804A13.937 13.937 0 0112 15c2.485 0 4.797.654 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0z"/>
                </svg>
                <span>Super Admin</span>
            </div>
        </div>

        <!-- Statistik Singkat -->
        <div class="bg-white p-6 rounded-lg shadow border max-w-3xl mx-auto">
            <h2 class="text-lg font-semibold mb-4">Dashboard</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <a href="/products" class="block transform transition duration-200 hover:scale-105 hover:shadow-lg">
                    <div class="border rounded-lg p-6 flex flex-col items-center justify-center bg-white">
                        <span class="text-gray-600 text-center mb-2"> Total Produk</span>
                        <span class="text-4xl font-bold">{{ $totalProductCount }}</span>
                    </div>
                </a>

                <a href="/ulasans" class="block transform transition duration-200 hover:scale-105 hover:shadow-lg">
                    <div class="border rounded-lg p-6 flex flex-col items-center justify-center bg-white">
                        <span class="text-gray-600 text-center mb-2">Ulasan Menunggu</span>
                        <span class="text-4xl font-bold">{{ $pendingReviewCount }}</span>
                    </div>
                </a>
            </div>
        </div>
    </main>
</div>

</body>
</html>
