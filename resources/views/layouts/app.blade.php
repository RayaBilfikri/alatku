<!DOCTYPE html>
<html lang="id">
<head>
    

    {{-- Inject konten tambahan di <head> seperti Tailwind CSS --}}
    @yield('head')

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alatku</title>
    
    <!-- Link ke file CSS -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Bisa juga menambahkan file JavaScript di sini -->
</head>
<body>
    <!-- Header (optional) -->
    <header>
        <nav>
            <ul>
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><a href="{{ route('about-us') }}">About us</a></li>
                <li><a href="{{ route('how-to-buy') }}">How to buy?</a></li>
                <li><a href="{{ route('article') }}">Article</a></li>

                <!-- Tambahkan link navigasi lainnya -->
            </ul>
        </nav>
    </header>

    <!-- Konten utama halaman akan dimuat di sini -->
    <div class="container">
        @yield('content')  <!-- Bagian ini akan digantikan oleh konten dari halaman lain -->
    </div>

    <!-- Footer (optional) -->
    <footer>
        <p>&copy; {{ date('Y') }} Your Company</p>
    </footer>

    <!-- Link ke file JS -->
    <script src="{{ asset('js/app.js') }}"></script>

    {{-- Inject footer scripts seperti JS Vite --}}
    @yield('footer')
</body>
</html>
