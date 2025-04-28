<!-- resources/views/welcome.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>alatKu</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body class="bg-gray-100 text-gray-800">

    <!-- Header -->
    <header class="flex justify-between items-center px-6 py-4 bg-white shadow">
        <div class="flex items-center space-x-2">
            <img src="/logo.png" alt="alatKu Logo" class="h-8">
            <span class="text-xl font-bold text-orange-600">alatKu</span>
        </div>
        <nav class="space-x-6">
            <a href="{{ route('home') }}" class="hover:text-orange-600">Home</a>
            <a href="{{ route('about-us') }}" class="hover:text-orange-600">About us</a>
            <a href="{{ route('how-to-buy') }}" class="hover:text-orange-600">How to buy?</a>
            <a href="{{ route('article') }}" class="hover:text-orange-600">Article</a>
        </nav>

    </header>

    <!-- Hero Section -->
    <section class="relative bg-white py-12 px-4 md:px-8 overflow-hidden min-h-[400px] mx-auto my-8 rounded-3xl max-w-[90%] shadow-lg">
        <img src="/images/46fffdf7a99c6deffc8cdd6190b26e1c43346a0e.png" alt="Background" class="absolute inset-0 w-full h-full object-cover filter blur-sm z-0 rounded-3xl">
        <div class="absolute inset-0 bg-[#FFA41B]/60 z-0 rounded-3xl"></div>

        <div class="container mx-auto relative z-10">
            <div class="flex flex-col md:flex-row items-center justify-between">
                <div class="relative bg-orange-500 rounded-full w-64 h-64 md:w-80 md:h-80 flex items-center justify-center mb-8 md:mb-0">
                    <img src="/images/icon.png" alt="Icon" class="h-auto w-full max-h-[110%] object-contain translate-y-8">
                </div>
                
                <div class="md:ml-8 text-left md:max-w-xl">
                    <h1 class="text-2xl md:text-3xl font-bold uppercase tracking-wide text-white mb-2 drop-shadow-md">
                        DARI DARAT KE LAUT,<br>
                        KAMI SIAP MENDUKUNG ANDA!
                    </h1>
                    <p class="text-base md:text-lg text-white font-thin font-montserrat drop-shadow-xl">
                        Temukan alat berat dan kapal siap kerja. Pilihan terbaik untuk proyek Anda, semua di satu tempat.
                    </p>
                    </br>
                    <div class="mt-8 text-right text-lg">
                        <a href="#" class="inline-block bg-orange-500 hover:bg-orange-600 text-white font-semibold py-2 px-6 rounded-full text-lg transition-all duration-300">
                            Cari Solusi Industri Anda
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Equipment Sale -->
    <section class="bg-white p-10">
        <h2 class="text-xl font-bold mb-6">Equipment Sale</h2>
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
            @for ($i = 0; $i < 4; $i++)
                <div class="bg-white rounded-lg shadow p-4">
                    <div class="bg-gray-300 h-40 mb-4"></div>
                    <p class="font-semibold mb-2">Item Title</p>
                    <div class="flex justify-between">
                        <button class="bg-gray-200 px-4 py-1 rounded">View</button>
                        <button class="bg-gray-200 px-4 py-1 rounded">Buy</button>
                    </div>
                </div>
            @endfor
        </div>
    </section>

    <!-- Artikel -->
    <section class="bg-gray-200 p-10">
        <h2 class="text-xl font-bold mb-6 text-center">artikel</h2>
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
            @for ($i = 0; $i < 4; $i++)
                <div class="bg-white rounded-lg shadow p-4">
                    <div class="bg-gray-300 h-32 mb-4"></div>
                    <p class="font-semibold">Judul Artikel</p>
                    <p class="text-sm text-gray-500">Deskripsi singkat artikel.</p>
                </div>
            @endfor
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-white text-center p-6">
        <p class="font-semibold">Footer</p>
    </footer>

</body>
<style>
    .shadow-text {
        text-shadow: 1px 1px 4px rgba(0, 0, 0, 0.7); /* Horizontal, Vertical, Blur Radius, Color */
    }
    
</style>
</html>