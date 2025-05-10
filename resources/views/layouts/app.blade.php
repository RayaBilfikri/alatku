<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Alatku</title>

  <!-- Google Font: Montserrat -->
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100..900&display=swap" rel="stylesheet">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!-- Tailwind CSS -->
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          fontFamily: {
            montserrat: ['Montserrat', 'sans-serif'],
            akira: ['"Akira Expanded"', 'sans-serif'], // Aktifkan kalau kamu sudah punya file/font-nya
          }
        }
      }
    }
  </script>
    
    {{-- Inject konten tambahan di head seperti Tailwind CSS --}}
    @yield('head')
</head>
<body class="font-montserrat">
    <!-- Header dengan Font Montserrat -->
    <header class="bg-white shadow-md">
        <nav class="container mx-auto px-5 py-5 flex items-center relative">
            <div class="font-bold text-xl ml-6">
                <span class="text-blue-800">alat</span><span class="text-orange-400">Ku</span>
            </div>
            <div class="absolute left-1/2 transform -translate-x-1/2 space-x-6 font-montserrat">
                <a href="/" class="hover:text-orange-600 text-sm">Beranda</a>
                <a href="/tentang-kami" class="hover:text-orange-600 text-sm">Tentang Kami</a>
                <a href="/cara-membeli" class="hover:text-orange-600 text-sm">Bagaimana cara membeli?</a>
                <a href="/artikel" class="hover:text-orange-600 text-sm">Artikel</a>
            </div>
        </nav>
    </header>


    <main>
        @yield('content')
    </main>

    {{-- Inject footer scripts seperti JS Vite --}}
    @yield('footer')
</body>
</html>
