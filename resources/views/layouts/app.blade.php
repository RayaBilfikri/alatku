<!DOCTYPE html>
<html lang="id">
<head>
    

    {{-- Inject konten tambahan di <head> seperti Tailwind CSS --}}
    @yield('head')

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('resources/app.css') }}">

    <!-- Bisa juga menambahkan file JavaScript di sini -->
</head>
<body>
    <!-- Header (optional) -->
    <header>
        <nav class="space-x-6 py-5 px-6 text-right">
                <a href="{{ route('home') }}" class="hover:text-orange-600">Home</a>
                <a href="{{ route('about-us') }}" class="hover:text-orange-600">About us</a>
                <a href="{{ route('how-to-buy') }}" class="hover:text-orange-600">How to buy?</a>
                <a href="{{ route('article') }}" class="hover:text-orange-600">Article</a>
        </nav>
    </header>

    <!-- Konten utama halaman akan dimuat di sini -->
    <div class="container">
        @yield('content')  <!-- Bagian ini akan digantikan oleh konten dari halaman lain -->
    </div>

</body>
</html>
