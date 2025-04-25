<!-- resources/views/welcome.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>alatKu</title>
    <script src="https://cdn.tailwindcss.com"></script>
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
    <section class="relative bg-orange-100 p-6">
        <div class="relative z-10 flex flex-col md:flex-row items-center justify-between">
            <img src="/engineer.png" alt="Engineer" class="w-40 md:w-60">
            <p class="text-white text-xl md:text-2xl font-semibold absolute right-10 top-10 max-w-md">
                Ensure your operations run continuously, without any disruptions.
            </p>
        </div>
    </section>

    <!-- Categories -->
    <section class="py-10 text-center">
        <div class="flex justify-center mb-4">
            <div class="w-32 h-1 bg-black"></div>
        </div>
        <div class="flex justify-center gap-8">
            <div class="w-64 h-64 bg-gray-300 rounded-lg flex items-center justify-center text-xl">CAT 1</div>
            <div class="w-64 h-64 bg-gray-300 rounded-lg flex items-center justify-center text-xl">CAT 2</div>
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
</html>