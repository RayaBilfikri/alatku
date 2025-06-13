<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="description" content="Alatku, platform sewa alat berat terpercaya.">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Alatku</title>

  <!-- Google Font: Montserrat -->
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100..900&display=swap" rel="stylesheet">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- AOS Animation Scroll -->
  <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">

  <!-- Tailwind CSS -->
  @vite('resources/css/app.css')
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
    <header class="fixed top-0 w-full z-50 bg-white/20 backdrop-blur-md">
        <nav class="container mx-auto px-6 py-4 flex justify-between items-center">
            <div class="flex items-center px-4 md:px-6 w-full max-w-screen-xl mx-auto">
                <!-- Logo kiri -->
                <a href="{{ route('home') }}" class="font-bold text-xl z-20 flex items-center flex-shrink-0">
                    <span class="text-blue-800">alat</span><span class="text-orange-400">Ku</span>
                </a>

                <!-- Navbar tengah - Desktop (1024px+) -->
                <div id="desktop-nav" class="flex-1 justify-center">
                    <div class="flex space-x-6 xl:space-x-8 font-montserrat font-bold">
                        <a href="{{ route('home') }}" 
                        class="hover:text-orange-600 text-sm xl:text-sm whitespace-nowrap px-2 py-1 rounded transition-colors">
                            Beranda
                        </a>
                        <a href="/tentang-kami" 
                        class="hover:text-orange-600 text-sm xl:text-sm whitespace-nowrap px-2 py-1 rounded transition-colors">
                            Tentang Kami
                        </a>
                        <a href="/caramembeli" 
                        class="hover:text-orange-600 text-sm xl:text-sm whitespace-nowrap px-2 py-1 rounded transition-colors">
                            Bagaimana cara membeli?
                        </a>
                        <a href="/artikel" 
                        class="hover:text-orange-600 text-sm xl:text-sm whitespace-nowrap px-2 py-1 rounded transition-colors">
                            Artikel
                        </a>
                    </div>
                </div>

                <!-- Auth buttons desktop - Desktop (1024px+) -->
                <div id="desktop-auth" class="ml-auto flex-shrink-0">
                    @guest
                        <div class="flex items-center space-x-4 font-semibold">
                            <a href="{{ route('login') }}"
                            class="px-6 py-2 xl:px-7 xl:py-2 rounded-full border-2 border-black bg-white hover:bg-gray-300 transition-transform duration-200 hover:scale-110 text-sm xl:text-base">
                                Login
                            </a>
                            <a href="{{ route('register') }}"
                            class="px-6 py-2 xl:px-7 xl:py-2 rounded-full bg-[#F86F03] text-white hover:bg-[#e56703] transition-transform duration-200 hover:scale-110 text-sm xl:text-base">
                                Register
                            </a>
                        </div>
                    @else
                        <div class="relative">
                            <!-- Profile toggle button -->
                            <div id="profileDropdownToggle" class="flex items-center space-x-2 xl:space-x-3 cursor-pointer hover:bg-gray-100 hover:h-12 hover:shadow-md rounded-md transition duration-200 px-3 py-2">
                                <div class="w-9 h-9 xl:w-10 xl:h-10 rounded-full bg-gray-300 flex items-center justify-center overflow-hidden">
                                    <img src="{{ '/images/user.webp' }}" alt="Profile" class="w-full h-full object-contain">
                                </div>
                                <span class="font-medium text-sm xl:text-base truncate max-w-[120px] xl:max-w-none">{{ Auth::user()->name }}</span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500 flex-shrink-0" viewBox="0 0 20 20" fill="currentColor">
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

                <!-- Hamburger Menu - HANYA untuk Mobile (max 1023px) -->
                <button id="hamburger-button" class="block lg:hidden ml-auto z-20">
                    <span class="hamburger-line block w-6 h-0.5 bg-black mb-1.5 transition-all duration-300"></span>
                    <span class="hamburger-line block w-6 h-0.5 bg-black mb-1.5 transition-all duration-300"></span>
                    <span class="hamburger-line block w-6 h-0.5 bg-black transition-all duration-300"></span>
                </button>
            </div>

            <!-- Mobile Menu - HANYA untuk Mobile (max 1023px) -->
            <div id="mobile-menu" class="fixed top-0 left-0 w-full h-0 overflow-hidden bg-white z-10 transition-all duration-300 lg:hidden">
                <div class="pt-20 pb-5 px-6 flex flex-col items-center space-y-5 font-montserrat font-bold">
                    <!-- Navigation Links -->
                    <a href="{{ route('home') }}" 
                    class="hover:text-orange-600 text-lg border-b border-gray-200 pb-2 text-center w-full transition-colors">
                        Beranda
                    </a>
                    <a href="/tentang-kami" 
                    class="hover:text-orange-600 text-lg border-b border-gray-200 pb-2 text-center w-full transition-colors">
                        Tentang Kami
                    </a>
                    <a href="/caramembeli" 
                    class="hover:text-orange-600 text-lg border-b border-gray-200 pb-2 text-center w-full transition-colors">
                        Bagaimana cara membeli?
                    </a>
                    <a href="/artikel" 
                    class="hover:text-orange-600 text-lg border-b border-gray-200 pb-2 text-center w-full transition-colors">
                        Artikel
                    </a>
                    
                    <!-- Auth Section -->
                    @guest
                        <div class="flex flex-col items-center space-y-3 pt-4 w-full border-t border-gray-200">
                            <a href="{{ route('login') }}"
                            class="w-full max-w-xs px-6 py-3 rounded-full border-2 border-black bg-white hover:bg-gray-300 transition-all duration-200 text-center font-semibold">
                                Login
                            </a>
                            <a href="{{ route('register') }}"
                            class="w-full max-w-xs px-6 py-3 rounded-full bg-[#F86F03] text-white hover:bg-[#e56703] transition-all duration-200 text-center font-semibold">
                                Register
                            </a>
                        </div>
                    @else
                        <div class="flex flex-col items-center space-y-3 pt-4 w-full border-t border-gray-200">
                            <!-- User Info -->
                            <div class="flex items-center space-x-3">
                                <div class="w-10 h-10 rounded-full bg-gray-300 flex items-center justify-center overflow-hidden">
                                    <img src="{{ '/images/user.webp' }}" alt="Profile" class="w-full h-full object-contain">
                                </div>
                                <span class="font-medium text-lg">{{ Auth::user()->name }}</span>
                            </div>
                            
                            <!-- User Actions -->
                            <a href="{{ route('ulasan.index') }}"
                            class="flex items-center justify-center w-full max-w-xs px-6 py-3 rounded-full bg-blue-50 text-blue-600 hover:bg-blue-100 transition-all duration-200 font-semibold">
                                <i class="fa-duotone fa-solid fa-comments mr-2"></i> Ulasan
                            </a>
                            
                            <form method="POST" action="{{ route('logout') }}" class="w-full max-w-xs">
                                @csrf
                                <button type="submit"
                                        class="flex items-center justify-center w-full px-6 py-3 rounded-full bg-red-50 text-red-600 hover:bg-red-100 transition-all duration-200 font-semibold">
                                    <i class="fas fa-sign-out-alt mr-2"></i> Logout
                                </button>
                            </form>
                        </div>
                    @endguest
                </div>
            </div>
        </nav>
    </header>


    <main>
        @yield('content')
    </main>

    <!-- Hover Dropdown for Account in Navbar-->
    <style>
        /* Surface Pro 7 Specific Adjustments */
        @media (min-width: 912px) and (max-width: 1368px) {
            /* Keep existing structure with slight adjustments */
            .container {
                max-width: 98%;
            }
            
            /* Adjust spacing specifically for Surface Pro 7 */
            .md\:ml-16 {
                margin-left: 2rem;
            }
            
            .space-x-6 > * + * {
                margin-left: 1rem;
            }
            
            /* Fix for auth buttons on Surface Pro 7 */
            .md\:block.ml-auto.pr-6 {
                padding-right: 0.75rem;
            }
            
            /* Fix for profile dropdown */
            #profileDropdownToggle .space-x-3 > * + * {
                margin-left: 0.5rem;
            }
        }

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
        /* Force hide hamburger on desktop */
        @media (min-width: 1024px) {
            #hamburger-button {
                display: none !important;
            }
            #desktop-nav {
                display: flex !important;
            }
            #desktop-auth {
                display: flex !important;
            }
        }

        /* Hide desktop nav on mobile */
        @media (max-width: 1023px) {
            #desktop-nav {
                display: none !important;
            }
            #desktop-auth {
                display: none !important;
            }
        }
    </style>

    <!-- JS Dropdown logic for desktop -->
    <script>
        // Surface Pro 7 specific adjustments
        function handleSurfacePro() {
            const isSurfacePro = window.matchMedia('(min-width: 912px) and (max-width: 1368px)').matches;
            
            if (isSurfacePro) {
                // Apply Surface Pro specific adjustments without changing structure
                const navLinks = document.querySelectorAll('.md\\:flex .space-x-6 a');
                navLinks.forEach(link => {
                    link.style.fontSize = '0.8rem'; // Slightly smaller font on Surface Pro
                });
                
                // Fix buttons if necessary
                const buttons = document.querySelectorAll('.md\\:block.ml-auto a');
                if (buttons) {
                    buttons.forEach(button => {
                        if (button.classList.contains('px-7')) {
                            button.classList.replace('px-7', 'px-5');
                        }
                    });
                }
            }
        }
        
        // Call once on load
        document.addEventListener('DOMContentLoaded', handleSurfacePro);
        
        // Call on resize
        window.addEventListener('resize', handleSurfacePro);

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
                    // Menu sedang terbuka, akan ditutup
                    mobileMenu.classList.remove('active');

                    // Aktifkan scroll halaman setelah menu tutup
                    document.body.classList.remove('overflow-hidden');

                    setTimeout(() => {
                        mobileMenu.classList.add('h-0');
                    }, 10);
                } else {
                    // Menu sedang tertutup, akan dibuka
                    mobileMenu.classList.remove('h-0');

                    setTimeout(() => {
                        mobileMenu.classList.add('active');

                        // Non-scroll halaman saat menu dibuka
                        document.body.classList.add('overflow-hidden');
                    }, 10);
                }
            });

            // Close mobile menu when clicking on menu items
            const mobileMenuItems = mobileMenu.querySelectorAll('a');
            mobileMenuItems.forEach(item => {
                item.addEventListener('click', () => {
                    hamburgerButton.classList.remove('active');
                    mobileMenu.classList.remove('active');
                    document.body.classList.remove('overflow-hidden'); // Enable scroll

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