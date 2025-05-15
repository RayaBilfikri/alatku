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
    <header class="bg-gray-100 shadow-md">
        <nav class="container mx-auto px-5 py-5 flex items-center relative">
            <div class="font-bold text-xl ml-0 md:ml-6 z-20">
                <span class="text-blue-800">alat</span><span class="text-orange-400">Ku</span>
            </div>

            <!-- Hamburger Menu untuk Mobile -->
            <button id="hamburger-button" class="md:hidden block ml-auto mr-2 z-20">
                <span class="hamburger-line block w-6 h-0.5 bg-black mb-1.5"></span>
                <span class="hamburger-line block w-6 h-0.5 bg-black mb-1.5"></span>
                <span class="hamburger-line block w-6 h-0.5 bg-black"></span>
            </button>

            <!-- Desktop Menu -->
            <div class="hidden md:block absolute left-1/2 transform -translate-x-1/2 space-x-6 font-montserrat font-bold">
                <a href="/" class="hover:text-orange-600 text-sm">Beranda</a>
                <a href="/tentang-kami" class="hover:text-orange-600 text-sm">Tentang Kami</a>
                <a href="/caramembeli" class="hover:text-orange-600 text-sm">Bagaimana cara membeli?</a>
                <a href="/artikel" class="hover:text-orange-600 text-sm">Artikel</a>
            </div>

            <!-- Mobile Menu -->
            <div id="mobile-menu" class="fixed top-0 left-0 w-full h-0 overflow-hidden bg-white z-10 transition-all duration-300 md:hidden">
                <div class="pt-20 pb-5 px-6 flex flex-col space-y-5 font-montserrat font-bold">
                    <a href="/" class="hover:text-orange-600 text-lg border-b border-gray-200 pb-2">Beranda</a>
                    <a href="/tentang-kami" class="hover:text-orange-600 text-lg border-b border-gray-200 pb-2">Tentang Kami</a>
                    <a href="/caramembeli" class="hover:text-orange-600 text-lg border-b border-gray-200 pb-2">Bagaimana cara membeli?</a>
                    <a href="/artikel" class="hover:text-orange-600 text-lg border-b border-gray-200 pb-2">Artikel</a>
                </div>
            </div>
                    
            <div class="hidden md:block ml-auto pr-6">
                @guest
                    <div class="flex items-center space-x-4">
                        <a href="{{ route('login') }}" class="px-7 py-2 rounded-full border-2 border-black bg-white hover:bg-gray-300 transition-transform duration-200 hover:scale-110">Login</a>
                        <a href="{{ route('register') }}" class="px-7 py-2 rounded-full bg-[#F86F03] text-white hover:bg-[#e56703] transition-transform duration-200 hover:scale-110">Register</a>
                    </div>
                @else
                    <div class="relative">
                        <!-- Profile toggle button -->
                        <div id="profileDropdownToggle" class="flex items-center space-x-3 cursor-pointer">
                            <div class="w-10 h-10 rounded-full bg-gray-300 flex items-center justify-center overflow-hidden">
                                <img src="{{ '/images/user.png' }}" alt="Profile" class="w-full h-full object-cover">
                            </div>
                            <span class="font-medium">{{ Auth::user()->name }}</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        
                        <div id="profileDropdown" class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-50 hidden">
                            <a href="{{ route('ulasan.index') }}"
                            class="flex items-center w-full px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-blue-600 transition-all duration-200 rounded-md">
                                <i class="fa-duotone fa-solid fa-comments mr-2 text-gray-500"></i> Ulasan
                            </a>

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit"
                                    class="flex items-center w-full px-4 py-2 text-sm text-gray-700 hover:bg-red-50 hover:text-red-600 transition-all duration-200 rounded-md text-left">
                                    <i class="fas fa-sign-out-alt mr-2 text-gray-500"></i> Logout
                                </button>
                            </form>
                        </div>
                    </div>
                @endguest
            </div>

            <!-- Mobile Auth Buttons -->
            <div class="md:hidden flex ml-auto z-20">
                @guest
                    <a href="{{ route('login') }}" class="px-4 py-1 mr-2 text-sm rounded-full border border-black bg-white hover:bg-gray-300 transition-transform duration-200">Login</a>
                    <a href="{{ route('register') }}" class="px-4 py-1 text-sm rounded-full bg-[#F86F03] text-white hover:bg-[#e56703] transition-transform duration-200">Register</a>
                @else
                    <div id="mobileProfileToggle" class="relative">
                        <div class="flex items-center space-x-1 cursor-pointer">
                            <div class="w-8 h-8 rounded-full bg-gray-300 flex items-center justify-center overflow-hidden">
                                <img src="{{ '/images/user.png' }}" alt="Profile" class="w-full h-full object-cover">
                            </div>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-500" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        
                        <div id="mobileProfileDropdown" class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-50 hidden">
                            <span class="block px-4 py-2 text-sm font-medium border-b border-gray-100">{{ Auth::user()->name }}</span>
                            <a href="{{ route('ulasan.index') }}"
                            class="flex items-center w-full px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-blue-600 transition-all duration-200 rounded-md">
                                <i class="fa-duotone fa-solid fa-comments mr-2 text-gray-500"></i> Ulasan
                            </a>

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit"
                                    class="flex items-center w-full px-4 py-2 text-sm text-gray-700 hover:bg-red-50 hover:text-red-600 transition-all duration-200 rounded-md text-left">
                                    <i class="fas fa-sign-out-alt mr-2 text-gray-500"></i> Logout
                                </button>
                            </form>
                        </div>
                    </div>
                @endguest
            </div>
        </nav>
    </header>


    <main>
        @yield('content')
    </main>

    <!-- Hover Dropdown for Account in Navbar-->
    <style>
        #profileDropdown a:hover, 
        #profileDropdown button:hover,
        #mobileProfileDropdown a:hover,
        #mobileProfileDropdown button:hover {
            font-weight: 500;
            transform: translateX(2px);
            transition: transform 0.2s ease;
        }

        /* Tambahan efek bayangan saat dropdown muncul */
        #profileDropdown:not(.hidden),
        #mobileProfileDropdown:not(.hidden) {
            animation: fadeIn 0.2s ease-out;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }

        /* Mobile menu styling */
        #mobile-menu.active {
            height: 100vh;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        /* Hamburger menu animation */
        #hamburger-button.active .hamburger-line:nth-child(1) {
            transform: translateY(8px) rotate(45deg);
        }
        
        #hamburger-button.active .hamburger-line:nth-child(2) {
            opacity: 0;
        }
        
        #hamburger-button.active .hamburger-line:nth-child(3) {
            transform: translateY(-8px) rotate(-45deg);
        }
        
        .hamburger-line {
            transition: transform 0.3s ease, opacity 0.3s ease;
        }
    </style>

    <!-- JS Dropdown logic for desktop -->
    <script>
        const profileDropdownToggle = document.getElementById('profileDropdownToggle');
        const profileDropdown = document.getElementById('profileDropdown');

        if (profileDropdownToggle && profileDropdown) {
            let isDropdownOpen = false;

            profileDropdownToggle.addEventListener('click', function(e) {
                e.stopPropagation();
                profileDropdown.classList.toggle('hidden');
                isDropdownOpen = !isDropdownOpen;
            });

            document.addEventListener('click', function(event) {
                if (!profileDropdownToggle.contains(event.target) && !profileDropdown.contains(event.target)) {
                    profileDropdown.classList.add('hidden');
                    isDropdownOpen = false;
                }
            });

            profileDropdown.addEventListener('click', function(e) {
                if (!e.target.matches('button[type="submit"]')) {
                    e.stopPropagation();
                }
            });
        }

        // Mobile dropdown logic
        const mobileProfileToggle = document.getElementById('mobileProfileToggle');
        const mobileProfileDropdown = document.getElementById('mobileProfileDropdown');

        if (mobileProfileToggle && mobileProfileDropdown) {
            mobileProfileToggle.addEventListener('click', function(e) {
                e.stopPropagation();
                mobileProfileDropdown.classList.toggle('hidden');
            });

            document.addEventListener('click', function(event) {
                if (!mobileProfileToggle.contains(event.target) && !mobileProfileDropdown.contains(event.target)) {
                    mobileProfileDropdown.classList.add('hidden');
                }
            });
        }

        // Hamburger menu logic
        const hamburgerButton = document.getElementById('hamburger-button');
        const mobileMenu = document.getElementById('mobile-menu');

        if (hamburgerButton && mobileMenu) {
            hamburgerButton.addEventListener('click', function() {
                hamburgerButton.classList.toggle('active');
                if (mobileMenu.classList.contains('active')) {
                    mobileMenu.classList.remove('active');
                    setTimeout(() => {
                        mobileMenu.classList.add('h-0');
                    }, 10);
                } else {
                    mobileMenu.classList.remove('h-0');
                    setTimeout(() => {
                        mobileMenu.classList.add('active');
                    }, 10);
                }
            });

            // Close mobile menu when clicking on menu items
            const mobileMenuItems = mobileMenu.querySelectorAll('a');
            mobileMenuItems.forEach(item => {
                item.addEventListener('click', () => {
                    hamburgerButton.classList.remove('active');
                    mobileMenu.classList.remove('active');
                    setTimeout(() => {
                        mobileMenu.classList.add('h-0');
                    }, 10);
                });
            });
        }
    </script>

    @yield('footer')
</body>
</html>