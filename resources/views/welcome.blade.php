<!-- resources/views/welcome.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Alatku, platform sewa alat berat terpercaya.">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <title>alatKu</title>
    @vite('resources/css/app.css')
    <link rel="preload" href="/fonts/AkiraExpanded.woff2" as="font" type="font/woff2" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&family=Roboto&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <script src="//unpkg.com/alpinejs" defer></script>

    <style>
        .logo-alatku {
            height: 120px;          
            width: auto;
            max-width: 320px;       
            transition: height 0.3s, max-width 0.3s;
        }

        @media (max-width: 1024px) {
            .logo-alatku {
                height: 80px;         /* Ukuran sedang di tablet */
                max-width: 200px;
            }
        }
        @media (max-width: 640px) {
            .logo-alatku {
                height: 48px;         /* Ukuran kecil di mobile */
                max-width: 120px;
            }
        }
        @media screen and (min-width: 1024px) and (max-width: 1112px) {
            .hide-on-ipad {
            display: none !important;
            }
        }
        @media (max-width: 380px) {
            .logo-alatku {
                height: 32px;         
                max-width: 80px;
            }
        }

        /* Khusus untuk Galaxy Z Fold 5 dan perangkat sejenisnya */
        @media (max-width: 350px) {
            .logo-alatku {
                height: 28px;         
                max-width: 70px;
            }
            
            .auth-buttons a {
                padding: 0.25rem 0.75rem;
                font-size: 0.75rem;
            }
        }
        .shadow-text {
            text-shadow: 1px 1px 4px rgba(0, 0, 0, 0.7); /* Horizontal, Vertical, Blur Radius, Color */
        }

        @keyframes slideDown {
            from { opacity: 0; transform: translateY(-10px); }
            to   { opacity: 1; transform: translateY(0); }
        }
        @keyframes slideUp {
            from { opacity: 1; transform: translateY(0); }
            to   { opacity: 0; transform: translateY(-10px); }
        }

        .animate-slide-down {
            animation: slideDown 0.3s ease forwards;
        }
        .animate-slide-up {
            animation: slideUp 0.3s ease forwards;
        }

        .line {
            transition: all 0.3s ease;
        }
        .menu-open .line1 {
            transform: translateY(6px) rotate(45deg);
        }
        .menu-open .line2 {
            opacity: 0;
        }
        .menu-open .line3 {
            transform: translateY(-6px) rotate(-45deg);
        }

        @layer utilities {
            .shadow-right-only {
                box-shadow: 10px 0 20px -5px rgba(0, 0, 0, 0.3);
            }

            .shadow-left-only {
                box-shadow: -10px 0 15px -5px rgba(0, 0, 0, 0.3);
            }
        }

        .icon-position {
            transform: translateY(10%);
        }

        @font-face {
            font-family: 'Akira Expanded';
            src: url('/fonts/AkiraExpanded.woff2') format('woff2'),
                 url('/fonts/AkiraExpanded.woff') format('woff');
            font-weight: normal;
            font-style: normal;
            font-display: swap; /* fallback text */
        }

        .absolute.bottom-8.right-6.z-20 {
            contain: layout;
            will-change: transform;
        }

        [x-cloak] { display: none !important; }

        /* Hide scrollbar */
        .hide-scrollbar::-webkit-scrollbar {
            display: none;
        }
        .hide-scrollbar {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }

        .hero-container {
            contain: layout style paint;
        }

        .hero-slide {
            will-change: auto;
            transform: translateZ(0);
        }

        .transitioning {
            pointer-events: none;
        }
        .carousel-wrapper {
            position: relative;
            padding: 10px;
            margin: -10px;
            overflow: visible;
            min-height: 350px;
        }
        
        .carousel-item {
            will-change: transform;
            transform: scale(0.85);
            opacity: 0.85;
            transition: all 0.4s ease;
            transform-origin: center;
            box-shadow: 4px 4px 10px rgba(0, 0, 0, 0.1); 
        }
        .carousel-item.active {
            transform: scale(1);
            opacity: 1;
            z-index: 10;
            box-shadow: 8px 8px 20px rgba(0, 0, 0, 0.2);
        }

        
        .btn-special {
            position: relative;
            overflow: hidden;
            z-index: 1;
            transition: all 0.4s cubic-bezier(0.2, 0.8, 0.2, 1);
        }

        .btn-special:before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 0%;
            height: 100%;
            background: linear-gradient(90deg, #333333 0%, #000000 100%);
            transition: all 0.5s cubic-bezier(0.7, 0, 0.3, 1);
            z-index: -1;
        }

        .btn-special:hover:before {
            width: 100%;
        }

        .btn-special:hover {
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3);
            transform: translateY(-2px);
        }

        .btn-special:active {
            transform: translateY(1px);
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
        }

        .arrow-icon {
            transition: transform 0.3s ease;
        }

        .btn-special:hover .arrow-icon {
            transform: translateX(5px);
        }
            
        .testimonial-section {
            width: 100%;
            position: relative; 
            z-index: 10;
            overflow: visible; 
        }

        section {
            overflow-x: clip;
            overflow-clip-margin: 0px;
        }

        .equipment-sale-bg::before,
        .equipment-sale-bg::after {
            content: '';
            position: absolute;
            width: 12rem;
            height: 12rem;
            border-radius: 50%;
            background: linear-gradient(to right, #f86f03, #ffa41b);
            opacity: 0.9;
        }

        .equipment-sale-bg::before {
            left: -4rem;
            top: 0;
        }

        .equipment-sale-bg::after {
            right: -4rem;
            top: 0;
        }

        @media (min-width: 640px) {
            .equipment-sale-bg::before,
            .equipment-sale-bg::after {
                width: 18rem;
                height: 18rem;
            }
            
            .equipment-sale-bg::before {
                left: -6rem;
            }
            
            .equipment-sale-bg::after {
                right: -6rem;
            }
        }

        /* Left eclipse */
        .left-eclipse {
            width: 500px;
            height: 500px;
            border-radius: 50%;
            background: linear-gradient(to bottom, #F86F03, #FFA41B);
            box-shadow: 10px 0 15px -5px rgba(0, 0, 0, 0.3);
            top: -100px;
            left: -250px;
            z-index: 6;
        }

        /* Right multi-layer eclipse */
        .right-eclipse-back {
            width: 1051px;
            height: 1051px;
            border-radius: 50%;
            background: linear-gradient(to bottom, #FFA41B, #F86F03);
            top: 50%;
            right: -525px;
            transform: translateY(-50%);

        }

        .right-eclipse-middle {
            width: 938px;
            height: 938px;
            border-radius: 50%;
            background: #FFA41B;
            top: 50%;
            right: -469px;
            transform: translateY(-50%);

        }

        .right-eclipse-front {
            width: 353px;
            height: 353px;
            border-radius: 50%;
            background: #F86F03;
            top: 50%;
            right: -176px;
            transform: translateY(-50%);
            box-shadow: -10px 0 15px -5px rgba(0, 0, 0, 0.3);

        }

        .testimonial-section .text-center {
            position: relative;
            z-index: 10; 
        }

        #profileDropdown a:hover, 
        #profileDropdown button:hover {
            font-weight: 500;
            transform: translateX(2px);
            transition: transform 0.2s ease;
        }

        /* Tambahan efek bayangan saat dropdown muncul */
        #profileDropdown:not(.hidden) {
            animation: fadeIn 0.2s ease-out;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes slideUpFade {
        0% {
            opacity: 0;
            transform: translateY(20px) scale(1.3);
        }
        100% {
            opacity: 1;
            transform: translateY(-6%) scale(1.3);
        }
        }

        .animate-slideUpFade {
        animation: slideUpFade 0.8s ease-out forwards;
        }

        /* Mobile (hingga 576px) */
        @media (max-width: 576px) { /* aturan CSS */ }

        /* Tablet (577px - 768px) */
        @media (min-width: 577px) and (max-width: 768px) { /* aturan CSS */ }

        /* Desktop (769px keatas) */
        @media (min-width: 769px) { /* aturan CSS */ }

        @media screen and (min-device-width: 280px) and (max-device-width: 2800px) and (orientation: portrait) {
            /* Atur ulang padding, margin, atau ukuran elemen khusus untuk foldable */
            .container {
                padding-left: 12px;
                padding-right: 12px;
            }
        }

        .container {
            width: -webkit-fill-available;
            max-width: 100%;
            padding-left: 1rem;  /* 16px */
            padding-right: 1rem;
            margin-left: auto;
            margin-right: auto;
            box-sizing: border-box;
        }


    </style>

    @if($carousels->count() > 0)
        {{-- Jika slide pertama dari database --}}
        <link rel="preload" as="image" href="{{ asset('storage/' . $carousels->first()->gambar) }}" />
    @else
        {{-- Jika slide pertama adalah gambar statis --}}
        <link rel="preload" as="image" href="/images/46fffdf7a99c6deffc8cdd6190b26e1c43346a0e.webp" />
    @endif
</head>
<body class="bg-gray-100 text-gray-800">

    <!-- Header lengkap dengan dropdown klikable -->
    <header x-data="{ open: false }" class="flex justify-between items-center px-6 py-4 bg-gray-100">
        <div class="container mx-auto px-2 sm:px-4 md:px-6">
            <div class="flex items-center justify-between px-2 sm:px-4 py-3 lg:px-8">
                <!-- Logo -->
                <div class="flex items-center">
                    <img loading="eager" src="/images/alatku.webp" alt="alatKu Logo" class="logo-alatku object-contain max-w-full h-auto"/>
                </div>
                
                <!-- Navigation menu - sekarang akan ditaruh di tengah -->
                <div class="hidden md:flex flex-1 justify-center space-x-6 font-montserrat font-bold overflow-hidden">
                    <a href="{{ route('home') }}" class="hover:text-orange-600 text-xs sm:text-sm md:text-sm lg:text-sm">Beranda</a>
                    <a href="{{ route('tentang-kami') }}" class="hover:text-orange-600 text-xs sm:text-sm md:text-sm lg:text-sm">Tentang Kami</a>
                    <a href="{{ route('caramembeli') }}" class="hover:text-orange-600 text-xs sm:text-sm md:text-sm lg:text-sm">Bagaimana cara membeli?</a>
                    <a href="{{ route('artikel') }}" class="hover:text-orange-600 text-xs sm:text-sm md:text-sm lg:text-sm">Artikel</a>
                </div>

                <!-- Mobile menu button -->
                <button @click="open = !open"
                    :class="{ 'menu-open': open }"
                    class="block md:hidden text-gray-500 hover:text-gray-800 focus:outline-none mobile-menu-btn flex-shrink-0"
                    aria-label="Toggle menu">
                    <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                        <path class="line line1" d="M4 6h16" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                        <path class="line line2" d="M4 12h16" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                        <path class="line line3" d="M4 18h16" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                    </svg>
                </button>
            </div>
            
            <!-- Mobile menu (toggle via Alpine) -->
            <div x-show="open"
                x-transition:enter="transition ease-out duration-200"
                x-transition:enter-start="opacity-0 -translate-y-2"
                x-transition:enter-end="opacity-100 translate-y-0"
                x-transition:leave="transition ease-in duration-150"
                x-transition:leave-start="opacity-100 translate-y-0"
                x-transition:leave-end="opacity-0 -translate-y-2"
                class="md:hidden mt-2 font-bold space-y-4"
                @click.away="open = false">
                <a href="{{ route('home') }}" class="block hover:text-orange-600 font-montserrat text-sm">Beranda</a>
                <a href="{{ route('tentang-kami') }}" class="block hover:text-orange-600 font-montserrat text-sm">Tentang Kami</a>
                <a href="{{ route('caramembeli') }}" class="block hover:text-orange-600 font-montserrat text-sm">Bagaimana cara membeli?</a>
                <a href="{{ route('artikel') }}" class="block hover:text-orange-600 font-montserrat text-sm">Artikel</a>
            </div>
        </div>
        
       <!-- Profile atau Login/Register section -->
        <div id="authStatus" data-logged-in="{{ auth()->check() ? 'true' : 'false' }}" class="flex-shrink-0">
            @guest
                <div class="flex items-center space-x-2 sm:space-x-4 auth-buttons font-semibold font-montserrat">
                    <a href="{{ route('login') }}" class="px-7 py-2 rounded-full border-2 border-black bg-white hover:bg-gray-300 transition-transform duration-200 hover:scale-110">Login</a>
                    <a href="{{ route('register') }}" class="px-7 py-2 rounded-full bg-[#F86F03] text-white hover:bg-[#e56703] transition-transform duration-200 hover:scale-110">Register</a>
                </div>
            @else
                <div class="relative">
                    <!-- Profile toggle button -->
                    <div id="profileDropdownToggle" class="flex items-center space-x-2 sm:space-x-3 cursor-pointer hover:bg-gray-100 h-10 hover:h-12 hover:shadow-md rounded-md transition duration-200">                        <div class="w-10 h-10 rounded-full bg-gray-300 flex items-center justify-center overflow-hidden">
                        <img src="{{ '/images/user.webp' }}" alt="Profile" class="w-full h-full object-cover">
                        </div>
                        <span class="font-medium">{{ Auth::user()->name }}</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    
                    <div id="profileDropdown" class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-50 hidden">
                        <a href="{{ route('ulasan.index') }}" class="px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-blue-600 transition-colors duration-200 flex items-center">
                            <i class="fa-duotone fa-solid fa-comments mr-2 text-gray-500"></i> Ulasan
                        </a>
                        <hr class="my-1">
                        <form id="logoutForm" method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-red-50 hover:text-red-600 transition-colors duration-200 flex items-center">
                                <i class="fas fa-sign-out-alt mr-2 text-gray-500"></i> Logout
                            </button>
                        </form>
                    </div>
                </div>
            @endguest
        </div>
    </header>


    <!-- Logout Confirmation Modal -->
    <div id="logoutModal" class="fixed inset-0 z-50 flex items-center justify-center hidden">
        <!-- Backdrop/Overlay -->
        <div class="absolute inset-0 bg-black bg-opacity-50 transition-opacity duration-300" id="logoutModalBackdrop"></div>
        
        <!-- Modal Content -->
        <div class="relative bg-white rounded-lg shadow-xl w-full max-w-md mx-4 transform transition-all duration-300 scale-95 opacity-0" id="logoutModalContent">
            <!-- Modal Header -->
            <div class="flex items-center justify-between p-4 border-b rounded-t">
                <h3 class="text-xl font-semibold text-gray-900">
                    Konfirmasi Logout
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center" id="closeLogoutModal">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
            
            <!-- Modal Body -->
            <div class="p-6">
                <div class="flex items-center mb-4">
                    <div class="flex-shrink-0 w-12 h-12 rounded-full bg-red-100 flex items-center justify-center">
                        <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                        </svg>
                    </div>
                    <div class="ml-4">
                        <p class="text-gray-700">Apakah Anda yakin ingin keluar dari sistem?</p>
                        <p class="text-sm text-gray-500 mt-1">Anda perlu login kembali untuk mengakses fitur ulasan.</p>
                    </div>
                </div>
            </div>
            
            <!-- Modal Footer -->
            <div class="flex items-center justify-end p-4 space-x-3 border-t border-gray-200 rounded-b">
                <button type="button" class="px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-800 font-medium rounded-lg text-sm transition-colors duration-200" id="cancelLogout">
                    Batal
                </button>
                <button type="button" class="px-4 py-2 bg-red-600 hover:bg-red-700 text-white font-medium rounded-lg text-sm transition-colors duration-200" id="confirmLogout">
                    Logout
                </button>
            </div>
        </div>
    </div>


    <!-- Hero Section Carousel -->
    <section 
        x-data="{ 
            activeSlide: 0,
            isTransitioning: false,
            slides: [
                {
                    id: 0,
                    is_static: true,
                    judul: 'DARI DARAT KE LAUT, KAMI SIAP MENDUKUNG ANDA!',
                    gambar: '/images/46fffdf7a99c6deffc8cdd6190b26e1c43346a0e.webp',
                    link: '{{ route('catalog.index') }}'
                },
                @if($carousels->count() > 0)
                    {
                        id: 1,
                        is_static: false,
                        judul: '{{ $carousels->first()->judul }}',
                        gambar: '{{ asset('storage/' . $carousels->first()->gambar) }}',
                        link: '{{ $carousels->first()->link }}'
                    }
                @endif
            ],
            next() { 
                if (this.isTransitioning) return; // ← TAMBAHAN BARU
                this.isTransitioning = true; // ← TAMBAHAN BARU
                this.activeSlide = (this.activeSlide + 1) % this.slides.length;
                setTimeout(() => { // ← TAMBAHAN BARU
                    this.isTransitioning = false;
                }, 500);
            },
            prev() { 
                if (this.isTransitioning) return; // ← TAMBAHAN BARU
                this.isTransitioning = true; // ← TAMBAHAN BARU
                this.activeSlide = (this.activeSlide - 1 + this.slides.length) % this.slides.length;
                setTimeout(() => { // ← TAMBAHAN BARU
                    this.isTransitioning = false;
                }, 500);
            },
            autoplayInterval: null,
            isHovered: false,
            startAutoplay() {
                if (this.slides.length <= 1) return; // ← TAMBAHAN BARU
                this.stopAutoplay(); // ← TAMBAHAN BARU
                this.autoplayInterval = setInterval(() => {
                    if (!this.isHovered && !this.isTransitioning) { // ← LOGIKA BARU
                        this.next();
                    }
                }, 10000);
            },
            stopAutoplay() {
                if (this.autoplayInterval) { // ← TAMBAHAN BARU
                    clearInterval(this.autoplayInterval);
                    this.autoplayInterval = null; // ← TAMBAHAN BARU
                }
            },
            handleMouseEnter() { // ← FUNGSI BARU
                this.isHovered = true;
                this.stopAutoplay();
            },
            handleMouseLeave() { // ← FUNGSI BARU
                this.isHovered = false;
                this.startAutoplay();
            }
        }"
        x-init="
            $nextTick(() => {
                if (slides.length > 1) { // ← KONDISI BARU
                    startAutoplay();
                }
            });
            
            // Cleanup on component destroy ← TAMBAHAN BARU
            $watch('$el', () => {
                return () => stopAutoplay();
            });
        "
        @mouseenter="handleMouseEnter()"
        @mouseleave="handleMouseLeave()"
        x-cloak
        class="hero-carousel relative bg-gray-100 py-12 px-4 sm:px-6 md:px-8 overflow-visible min-h-[400px] mx-auto my-8 rounded-3xl max-w-[90%]"
    >
        <!-- Slide Container -->
        <div class="relative w-full h-full min-h-[400px]">
            <template x-for="(slide, index) in slides" :key="index">
                <div 
                    x-show="activeSlide === index" 
                    x-transition:enter="transition ease-out duration-500"
                    x-transition:enter-start="opacity-0 transform translate-x-full"
                    x-transition:enter-end="opacity-100 transform translate-x-0"
                    x-transition:leave="transition ease-in duration-300"
                    x-transition:leave-start="opacity-100 transform translate-x-0"
                    x-transition:leave-end="opacity-0 transform -translate-x-full"
                    class="hero-slide absolute inset-0 w-full h-full rounded-3xl"
                     :class="{ 'transitioning': isTransitioning }"
                >
                    <!-- Background -->
                    <img :src="slide.gambar" loading="eager" alt="Alatku Banner" class="absolute inset-0 w-full h-full max-w-full max-h-full object-cover z-0 rounded-3xl">
                    <div class="absolute inset-0 bg-[#FFA41B]/60 z-0 rounded-3xl"></div>

                    <!-- Content -->
                    <div class="container mx-auto relative z-10 h-full flex items-center px-4 sm:px-6 md:px-10">
                        <template x-if="slide.is_static">
                            <div class="flex flex-col md:flex-row items-center gap-x-7 md:items-start w-full">
                                <div class="order-1 md:order-none relative rounded-full w-48 h-48 sm:w-56 sm:h-56 md:w-72 md:h-72 bg-orange-500 overflow-hidden flex items-center justify-center mx-auto md:mx-0 ml-0 mb-6 md:mb-0 md:ml-4 shrink-0 -mt-16 sm:-mt-20 md:mt-0 left-1/2 md:left-auto transform -translate-x-1/2 md:-translate-x-0">                                   
                                    <img src="/images/icon.webp" loading="eager" alt="Icon" class="w-full h-full object-contain mt-28 animate-slideUpFade">
                                    <div class="absolute inset-0 bg-orange-500/10"></div>
                                </div>
                                <div class="order-2 md:order-none md:ml-10 text-center md:text-left md:max-w-xl flex-grow mt-2 md:mt-0">
                                    <h1 class="text-xl sm:text-2xl md:text-3xl font-akira font-bold uppercase tracking-wide text-white mb-3 drop-shadow-md leading-tight">          
                                        DARI DARAT KE LAUT,<br>
                                        KAMI SIAP MENDUKUNG ANDA!
                                    </h1>
                                    <p class="hidden xl:block lg:block text-white text-lg font-medium font-montserrat drop-shadow-xl hide-on-ipad leading-relaxed">
                                        Jelajahi beragam peralatan industri dan konstruksi<br>
                                        untuk berbagai kebutuhan proyek.<br>
                                        Efisiensi dan ketepatan dimulai dari pilihan alat yang tepat.
                                    </p>


                                    <div class="absolute bottom-8 right-6 z-20">
                                        <button
                                            @click="document.querySelector('#equipment-sale')?.scrollIntoView({ behavior: 'smooth' })"
                                            class="inline-block bg-orange-500 hover:bg-orange-600 text-white font-semibold py-2 px-6 rounded-full text-base sm:text-lg transition-all font-montserrat duration-300 shadow-lg"
                                        >
                                            Cari Solusi Industri Anda
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </template>

                        <template x-if="!slide.is_static">
                            <div class="w-full text-center text-white px-4 sm:px-8 md:px-0">
                                <h2 class="text-xl sm:text-3xl md:text-4xl font-akira font-bold mb-4 leading-tight" x-text="slide.judul"></h2>
                                <template x-if="slide.link">
                                    <a :href="slide.link" class="bg-orange-500 hover:bg-orange-600 text-white font-semibold py-2 px-6 rounded-full text-base sm:text-lg transition-all font-montserrat duration-300 inline-block shadow-lg">
                                        Kunjungi
                                    </a>
                                </template>
                            </div>
                        </template>
                    </div>
                </div>
            </template>
        </div>

        <template x-if="slides.length > 1">
            <!-- Touch/Mouse Swipe Area -->
            <div 
                class="absolute inset-0 z-10 pointer-events-auto"
                  :class="{ 'pointer-events-auto': isDragging, 'pointer-events-none': !isDragging }"
                x-data="{ startX: 0, endX: 0, touchStartX: 0, touchEndX: 0, isDragging: false }"
                @mousedown.prevent="isDragging = true; startX = $event.clientX;"
                @mouseup="if (!isDragging) return;"
                style="touch-action: pan-y;"

                x-on:touchstart="touchStartX = $event.changedTouches[0].screenX"
                x-on:touchend="
                    touchEndX = $event.changedTouches[0].screenX;
                    if (touchStartX - touchEndX > 50) {
                        next();
                    } else if (touchEndX - touchStartX > 50) {
                        prev();
                    }
                "
                x-data="{
                    startX: 0,
                    endX: 0,
                    touchStartX: 0,
                    touchEndX: 0
                }"
            ></div>
        </template>

        <!-- Navigation Buttons -->
        <div class="absolute bottom-6 right-6 flex space-x-2 z-20">
            <button 
                @click="prev()" 
                :disabled="isTransitioning"
                class="bg-white/90 hover:bg-white text-gray-800 font-bold px-4 py-3 rounded-full shadow-lg transition duration-300 ease-in-out focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-400 disabled:opacity-50 disabled:cursor-not-allowed"
                aria-label="Previous Slide"
            >
                ‹
            </button>
            <button 
                @click="next()" 
                :disabled="isTransitioning"
                class="bg-white/90 hover:bg-white text-gray-800 font-bold px-4 py-3 rounded-full shadow-lg transition duration-300 ease-in-out focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-400 disabled:opacity-50 disabled:cursor-not-allowed"
                aria-label="Next Slide"
            >
                ›
            </button>
        </div>

        <!-- Carousel Indicators -->
        <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2 flex space-x-2 z-20">
            <template x-for="(slide, index) in slides" :key="index">
                <button 
                    @click="activeSlide = index"
                    :class="{'bg-orange-500': activeSlide === index, 'bg-white': activeSlide !== index}"
                    class="w-4 h-4 rounded-full shadow-md transition focus:outline-none focus:ring-2 focus:ring-offset-1 focus:ring-orange-400"
                    :aria-current="activeSlide === index ? 'true' : 'false'"
                    :aria-label="'Go to slide ' + (index + 1)"
                ></button>
            </template>
        </div>
    </section>



    <!-- Equipment Sale with Product Card Section -->
    <section id="equipment-sale" class="bg-gray-100 py-10 px-4 md:py-16 lg:py-20 md:px-8 lg:px-10 relative z-6">
        <!-- Background circles - adjusted for better mobile appearance -->
        <div class="absolute -left-16 sm:-left-24 top-0 w-48 sm:w-72 h-48 sm:h-72 rounded-full bg-gradient-to-r from-[#f86f03] to-[#ffa41b] shadow-right-only opacity-90"></div>
        <div class="absolute -right-16 sm:-right-24 top-0 w-48 sm:w-72 h-48 sm:h-72 rounded-full bg-gradient-to-r from-[#f86f03] to-[#ffa41b] shadow-left-only opacity-90"></div>
        
        <div class="container mx-auto relative z-10">
            <div class="flex flex-col lg:flex-row justify-between items-center gap-6 lg:gap-8">
                <!-- Left side content - improved mobile spacing -->
                <div class="text-black mb-6 md:mb-0 w-full md:w-full lg:w-1/3 text-center lg:text-left">
                    <h2 class="text-2xl sm:text-3xl font-bold mb-2 font-montserrat">Alat Siap Pakai,<br>Proyek Siap Jalan</h2>
                    <p class="text-sm sm:text-base mb-6 lg:mb-8 opacity-90 font-montserrat font-semibold">
                        Lihat koleksi alat berat dan kapal siap kerja 
                        yang cocok untuk semua kebutuhan lapangan Anda.
                    </p>

                <a href="{{ route('catalog.index') }}"
                        class="btn-special inline-flex items-center bg-black text-white px-6 py-3 rounded-full font-medium text-base shadow-md hover:bg-gray-800 transition-colors">
                        <span>Lihat produk selengkapnya</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="arrow-icon h-5 w-5 sm:h-6 sm:w-6 ml-2" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </a>
                </div>
                
                <!-- Right side carousel with improved mobile responsiveness -->
                <div class="w-full lg:w-2/3 relative">
                    <!-- Container with padding to accommodate scale effect -->
                    <div class="carousel-wrapper overflow-hidden">
                        <div class="flex overflow-x-auto gap-3 sm:gap-4 pb-4 snap-x snap-mandatory hide-scrollbar carousel-container px-1 sm:px-2 md:px-4 py-2 md:text-base font-montserrat ml-0 md:ml-0 lg:ml-14" id="carousel">
                            @forelse ($ProductCard as $index => $product)
                                <a href="{{ route('catalog.detailproduct', ['id' => $product->id, 'from' => 'home']) }}" class="snap-start min-w-[240px] sm:min-w-[280px] bg-white rounded-xl shadow-sm overflow-hidden carousel-item {{ $loop->first ? 'active' : '' }}" data-index="{{ $index }}">
                                    <img src="{{ asset('storage/' . $product->gambar) }}" loading="lazy" alt="{{ $product->name }}" class="w-full aspect-[4/3]  object-cover">
                                    <div class="p-3 sm:p-4">
                                        <h3 class="font-semibold text-sm sm:text-base text-gray-800">{{ $product->name }}</h3>
                                        <p class="text-xs sm:text-sm text-gray-600 mb-2 sm:mb-3">Kategori: {{ $product->subCategory?->category?->name ?? '-' }}</p>
                                        
                                        <div class="flex justify-between gap-1 sm:gap-2 mb-2 sm:mb-3">
                                            <div class="bg-[#525FE1] text-white text-xs font-medium px-2 sm:px-4 py-1 sm:py-2 rounded-full min-w-[90px] sm:min-w-[110px] flex flex-col items-center">
                                                <span class="text-[10px] sm:text-xs">Tahun</span>
                                                <span class="font-bold text-xs sm:text-sm">{{ $product->year_of_build }}</span>
                                            </div>
                                            <div class="bg-[#525FE1] text-white text-xs font-medium px-2 sm:px-4 py-1 sm:py-2 rounded-full min-w-[120px] sm:min-w-[140px] flex flex-col items-center">
                                                <span class="text-[10px] sm:text-xs">Jam operasional</span>
                                                <span class="font-bold text-xs sm:text-sm">{{ $product->hours_meter }} jam</span>
                                            </div>
                                        </div>

                                        <div class="text-center font-bold text-sm sm:text-lg bg-gradient-to-r from-[#F86F03] to-[#FFA41B] text-white px-3 sm:px-4 py-1 sm:py-2 rounded-lg mt-2 sm:mt-3">
                                            Rp{{ number_format($product->harga, 0, ',', '.') }}
                                        </div>
                                    </div>
                                </a>
                            @empty
                                <div class="min-w-full flex flex-col items-center justify-center py-8 sm:py-12 text-gray-500">
                                    <!-- Ilustrasi SVG keranjang kosong -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-24 h-24 sm:w-32 sm:h-32 mb-3 sm:mb-4 text-[#FFA41B]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-1.35 2.7A1 1 0 007.5 17h9a1 1 0 00.85-1.47L17 13M10 21a1 1 0 100-2 1 1 0 000 2zm6 0a1 1 0 100-2 1 1 0 000 2z"/>
                                    </svg>
                                    <p class="text-base sm:text-lg font-semibold text-black">Belum ada produk saat ini</p>
                                    <p class="text-xs sm:text-sm text-black">Yuk tambahkan produk agar tampil di sini!</p>
                                </div>
                            @endforelse
                        </div>
                    </div>

                    <!-- Navigation buttons - improved mobile positioning -->
                    @if ($ProductCard->isNotEmpty())
                        <link rel="preload" as="image" href="{{ asset('storage/' . $ProductCard->first()->gambar) }}">
                        <!-- Tombol Prev -->
                        <button class="carousel-prev absolute left-2 sm:left-2 top-1/2 transform -translate-y-1/2 bg-[#FFA41B] rounded-full p-1 sm:p-2 shadow-lg z-10 hover:opacity-100 transition-opacity">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 sm:h-6 sm:w-6 text-[#525fe1]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                            </svg>
                        </button>

                        <!-- Tombol Next -->
                        <button class="carousel-next absolute right-2 sm:right-2 top-1/2 transform -translate-y-1/2 bg-[#FFA41B] rounded-full p-1 sm:p-2 shadow-lg z-10 hover:opacity-100 transition-opacity">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 sm:h-6 sm:w-6 text-[#525fe1]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </button>
                    @endif
                </div>
            </div>
        </div>
    </section>

    
    <!-- Ulasan / Pendapat Section -->
    <section class="bg-gradient-to-b from-[#F86F03] to-[#FFA41B] py-12">
        <div class="testimonial-section relative overflow-hidden">
        <!-- Background gradient layer -->
        <div class="bg-gradient absolute inset-0"></div>
        
        <!-- Left eclipse layer -->
        <div class="left-eclipse absolute"></div>
        
        <!-- Right multi-layer eclipse -->
        <div class="right-eclipse-back absolute"></div>
        <div class="right-eclipse-middle absolute"></div>
        <div class="right-eclipse-front absolute"></div>
        
        <!-- Content layer -->
        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
            <!-- Testimonial heading -->
            <div class="text-center mb-12 relative">
                <a href="javascript:void(0)" id="selengkapnyaBtn"
                    data-logged-in="{{ auth()->check() ? 'true' : 'false' }}"
                    class="absolute right-0 
                            top-[-3.5rem] sm:top-[-4.5rem] md:top-[-2rem] 
                            group inline-flex items-center px-5 py-2.5 
                            rounded-full text-white font-medium 
                            bg-[#F86F03] hover:bg-[#e56703] 
                            transition-all duration-300 shadow-lg 
                            transform hover:-translate-y-1">
                    Selengkapnya
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2 transition-transform duration-300 ease-in-out group-hover:translate-x-1" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </a>
                <h2 class="text-4xl font-bold font-montserrat text-white">Pendapat Mereka, Bukti Kami</h2>
                <p class="text-white text-lg mt-12 font-montserrat">
                    Dengarkan pengalaman langsung dari pelanggan kami yang telah menggunakan alat 
                    terpercaya untuk menyelesaikan proyek mereka dengan sukses.
                </p>
            </div>
            
            <!-- Testimonial cards - top row -->
            <div class="grid grid-cols-1 md:grid-cols-3 drop-shadow-lg gap-8 mb-6 mt-8">
                <!-- Testimonial 1 -->
                <div class="bg-white rounded-xl testimonial-card p-6 transform transition duration-300 ease-in-out hover:-translate-y-1 hover:scale-105 hover:shadow-xl cursor-pointer">
                    <div class="text-3xl text-gray-300 mb-4">“</div>
                    <p class="text-gray-700 text-sm leading-relaxed mb-6 md:text-base">
                        Dulu sulit cari alat berat yang terpercaya. Sekarang dengan Alatku, tinggal buka website dan semua solusi ada di satu tempat.
                    </p>
                    <div class="flex items-center">
                        <img src="{{ asset('images/kobel.jpg') }}" class="w-10 h-10 rounded-full mr-4" alt="Andy Herman">
                        <div>
                            <p class="text-sm font-semibold text-gray-800">Kobel</p>
                            <p class="text-xs text-gray-500 md:text-base">user</p>
                        </div>
                    </div>
                </div>
                
                <!-- Testimonial 2 -->
                <div class="bg-white rounded-xl shadow-lg p-6 transform transition duration-300 ease-in-out hover:-translate-y-1 hover:scale-105 hover:shadow-xl cursor-pointer">
                    <div class="text-3xl text-gray-300 mb-4">“</div>
                    <p class="text-gray-700 text-sm leading-relaxed mb-6 md:text-base">
                        "Saya suka karena tampilannya sederhana dan datanya lengkap. Tinggal klik, semua alat langsung muncul sesuai kebutuhan proyek.
                    </p>
                    <div class="flex items-center">
                        <img src="{{ asset('images/alisson.jpg') }}" class="w-10 h-10 rounded-full mr-4" alt="Zendaya">
                        <div>
                            <p class="text-sm font-semibold text-gray-800">Alisson</p>
                            <p class="text-xs text-gray-500 md:text-base">user</p>
                        </div>
                    </div>
                </div>
                
                <!-- Testimonial 3 -->
                <div class="bg-white rounded-xl shadow-lg p-6 flex flex-col justify-between h-full transform transition duration-300 ease-in-out hover:-translate-y-1 hover:scale-105 hover:shadow-xl cursor-pointer">
                    <div class="text-3xl text-gray-300 mb-4">“</div>
                    <p class="text-gray-700 text-sm leading-relaxed md:text-base">
                        Terbantu sekali dengan adanya website ini.
                    </p>
                    <div class="flex items-center mt-auto">
                        <img src="{{ asset('images/onana.jpg') }}" class="w-10 h-10 rounded-full mr-4" alt="Onana">
                        <div>
                            <p class="text-sm font-semibold text-gray-800">Onana</p>
                            <p class="text-xs text-gray-500 md:text-base">user</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Testimonial cards - bottom DYNAMIC -->
            <div class="grid grid-cols-1 md:grid-cols-3 drop-shadow-lg gap-8">
                @foreach ($Testimonials as $testimonial)
                    <div class="bg-white rounded-xl shadow-lg p-6 h-full transform transition duration-300 ease-in-out hover:-translate-y-1 hover:scale-105 hover:shadow-xl cursor-pointer">
                        <div class="flex flex-col h-full">
                            <!-- Kutipan + Konten -->
                            <div class="min-h-[100px]"> <!-- atau sesuaikan tinggi minimal -->
                                <div class="text-2xl text-gray-300 mb-2 leading-none">“</div>
                                <p class="text-gray-700 text-sm leading-relaxed md:text-base">
                                    {{ $testimonial->content }}
                                </p>
                            </div>
                            <!-- Profil -->
                            <div class="flex items-center mt-auto pt-4">
                                <img src="{{ asset('images/user.webp') }}" class="w-10 h-10 rounded-full mr-4" alt="{{ $testimonial->user->name }}">
                                <div class="flex flex-col justify-end">
                                    <p class="text-sm font-semibold text-gray-800 md:text-base">{{ $testimonial->user->name }}</p>
                                    <p class="text-xs text-gray-500 md:text-base">{{ $testimonial->user->usertype }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Modal Register-->
            <div id="registerModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-[9999] opacity-0 pointer-events-none transition-all duration-300">
                <div class="bg-white rounded-lg p-8 max-w-md w-full transform scale-95 transition-all duration-300 shadow-2xl relative z-[10000]">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-xl font-bold text-gray-800">Pemberitahuan</h3>
                        <button id="closeModal" class="text-gray-400 hover:text-gray-600 focus:outline-none">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>
                    <div class="text-center mb-6">
                        <div class="mb-4 flex justify-center">
                            <svg class="w-12 h-12 text-[#F86F03]" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <p class="text-lg text-gray-700 md:text-lg">Daftar untuk melanjutkan.</p>
                    </div>
                    <div class="flex justify-center">
                        <a href="{{ route('register') }}" class="px-6 py-2 bg-[#F86F03] text-white font-medium rounded-lg md:text-base hover:bg-[#e56703] transition-all duration-300 transform hover:-translate-y-1">
                            Daftar Sekarang
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>


   <!--Article Section-->
    <section class="article-section relative bg-[#FFA41B] overflow-hidden pt-6 z-0">
        <!-- Background gradient layer (matching testimonial section) -->

        <!-- Content layer -->
        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
            <div class="w-full mx-auto" style="max-width: 1440px;">
                <div class="text-center mb-12">
                    <h2 class="text-4xl font-bold font-montserrat text-white">Artikel</h2>
                    <p class="text-white text-lg mt-4 font-montserrat">
                        Temukan tips dan informasi terbaru tentang alat konstruksi
                    </p>
                </div>
                
                <!-- Article cards using the dynamic data from the database -->
                <div class="grid grid-cols-1 md:grid-cols-4 gap-6 relative mt-8">
                    @if($latestArticles->count() > 0)
                        @foreach ($latestArticles as $article)
                        <div class="bg-orange-200 rounded-xl shadow-lg overflow-hidden relative flex flex-col">
                            <!-- Gambar -->
                            <img src="{{ asset('storage/' . $article->gambar) }}" loading="lazy" class="w-full h-40 object-cover" alt="{{ $article->judul }}">

                            <!-- Konten -->
                            <div class="p-4 flex flex-col flex-grow">
                            <h3 class="text-black font-bold text-lg mb-2 mt-4 md:text-base">{{ $article->judul }}</h3>

                            <p class="text-black text-sm mb-4 flex-grow md:text-base">
                                {{ \Illuminate\Support\Str::limit($article->konten_artikel, 70) }}
                            </p>

                            <!-- Tombol di posisi bawah -->
                            <a href="{{ route('artikel.show', $article->id_articles) }}" class="mt-auto flex justify-center bg-orange-400 text-white py-2 px-4 rounded-full text-sm font-medium hover:bg-orange-600 transition md:text-base">
                                Baca Selengkapnya
                            </a>
                            </div>
                        </div>
                        @endforeach
                    @else
                        <div class="col-span-1 md:col-span-4 bg-orange-200 rounded-xl shadow-lg p-8 text-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mx-auto text-orange-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <h3 class="text-black font-bold text-xl mt-4 mb-2 md:text-base">Tidak Ada Artikel</h3>
                            <p class="text-black md:text-base">Maaf, saat ini belum ada artikel yang tersedia. Silakan kembali lagi nanti.</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>


    <!-- Footer Section -->
    <footer class="bg-gray-900 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Brand and Company Info -->
                <div class="flex flex-col items-center md:items-start">
                    <h2 class="text-3xl font-bold font-montserrat text-[#FFA41B] mb-4">ALATKU</h2>
                    <p class="text-gray-300 text-center md:text-left">
                       Solusi terpercaya untuk kebutuhan alat konstruksi Anda
                    </p>
                </div>
                
                <!-- Contact Information -->
                <div class="flex flex-col items-center md:items-start">
                    <h3 class="text-xl font-semibold font-montserrat text-[#FFA41B] mb-4">Kontak Kami</h3>
                    <div class="flex items-center mb-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-[#FFA41B]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        <p class="text-gray-300">Jl. Dr. Hadari Nawawi, Bansir Laut, Kota Pontianak</p>
                    </div>
                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-[#FFA41B]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                        </svg>
                        <p class="text-gray-300">+62 813 4886 9922</p>
                    </div>
                </div>
                
                <!-- Website and Social Media -->
                <div class="flex flex-col items-center md:items-start">
                    <h3 class="text-xl font-semibold font-montserrat text-[#FFA41B] mb-4">Kunjungi Kami</h3>
                    <a href="https://www.alatku.com" class="flex items-center mb-3 hover:text-[#FFA41B] transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-[#FFA41B]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9" />
                        </svg>
                        <span>alatku.com</span>
                    </a>
                </div>
            </div>
            
            <!-- Copyright Section -->
            <div class="border-t border-gray-800 mt-8 pt-8 text-center">
                <p class="text-gray-400">© 2025 alatKu. Hak Cipta Dilindungi di bawah naungan PT. Inti Teknologi Berdikari.</p>
            </div>
        </div>
    </footer>

</body>
</html>

<script>
    document.querySelectorAll('#carousel').forEach(carousel => {
        const activeItem = carousel.querySelector('.carousel-item.active');
        if (activeItem) {
            activeItem.scrollIntoView({ behavior: 'auto', inline: 'center', block: 'nearest' });
        }
    });
    
    document.addEventListener("DOMContentLoaded", function () {
        const authStatus = document.getElementById('authStatus');
        const isLoggedIn = authStatus?.dataset.loggedIn === 'true';
        const prevButtons = document.querySelectorAll('.carousel-prev');
        const nextButtons = document.querySelectorAll('.carousel-next');
        const modalBtn = document.getElementById('selengkapnyaBtn');
        const modal = document.getElementById('registerModal');
        const closeBtn = document.getElementById('closeModal');
        const profileDropdownToggle = document.getElementById('profileDropdownToggle');
        const profileDropdown = document.getElementById('profileDropdown');
        const logoutForm = document.getElementById('logoutForm');

        if (logoutForm) {
            const logoutButton = logoutForm.querySelector('button[type="submit"]');
            const logoutModal = document.getElementById('logoutModal');
            const logoutModalContent = document.getElementById('logoutModalContent');
            const logoutModalBackdrop = document.getElementById('logoutModalBackdrop');
            const closeLogoutModal = document.getElementById('closeLogoutModal');
            const cancelLogout = document.getElementById('cancelLogout');
            const confirmLogout = document.getElementById('confirmLogout');
            
            // Prevent the default form submission
            logoutButton.addEventListener('click', function(e) {
                e.preventDefault();
                openModal();
            });
            
            // Function to open the modal with animation
            function openModal() {
                logoutModal.classList.remove('hidden');
                // Trigger animation after a small delay to ensure the display change has applied
                setTimeout(() => {
                    logoutModalBackdrop.classList.add('opacity-100');
                    logoutModalContent.classList.remove('scale-95', 'opacity-0');
                    logoutModalContent.classList.add('scale-100', 'opacity-100');
                    
                }, 10);
            }
            
            // Function to close the modal with animation
            function closeModal() {
                logoutModalContent.classList.remove('scale-100', 'opacity-100');
                logoutModalContent.classList.add('scale-95', 'opacity-0');
                logoutModalBackdrop.classList.remove('opacity-100');
                
                // Wait for animation to finish before hiding the modal
                setTimeout(() => {
                    logoutModal.classList.add('hidden');
                }, 300);
            }
            
            // Close modal when clicking close button or cancel button
            closeLogoutModal.addEventListener('click', closeModal);
            cancelLogout.addEventListener('click', closeModal);
            
            // Close modal when clicking outside
            logoutModal.addEventListener('click', function(e) {
                if (e.target === logoutModal || e.target === logoutModalBackdrop) {
                    closeModal();
                }
            });
            
            // Handle the confirmation button - submit the form
            confirmLogout.addEventListener('click', function() {
                logoutForm.submit();
            });
            
            // Handle escape key to close the modal
            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape' && !logoutModal.classList.contains('hidden')) {
                    closeModal();
                }
            });
        }

        function updateActiveItem(carousel, direction) {
            const items = carousel.querySelectorAll('.carousel-item');
            const activeItem = carousel.querySelector('.carousel-item.active');
            let currentIndex = Array.from(items).indexOf(activeItem);
            
            let newIndex = direction === 'next' ? currentIndex + 1 : currentIndex - 1;
            if (newIndex < 0 || newIndex >= items.length) return;

            activeItem.classList.remove('active', 'scale-105', 'z-10');
            activeItem.classList.add('scale-100');

            const newItem = items[newIndex];
            newItem.classList.add('active', 'scale-105', 'z-10');
            newItem.classList.remove('scale-100');
  
            const itemWidth = newItem.offsetWidth;
            carousel.scrollBy({
                left: direction === 'next' ? itemWidth : -itemWidth,
                behavior: 'smooth'
            });
            
            const prevButton = carousel.closest('.relative').querySelector('.carousel-prev');
            const nextButton = carousel.closest('.relative').querySelector('.carousel-next');

            prevButton.style.display = newIndex === 0 ? 'none' : 'block';
            nextButton.style.display = newIndex === items.length - 1 ? 'none' : 'block';
        }

        if (modalBtn && modal && closeBtn) {
        // Fungsi untuk membuka modal dengan animasi
            
            function openModal() {
                modal.classList.remove('opacity-0', 'pointer-events-none');
                modal.classList.add('opacity-100');
                
                // Animasi untuk konten modal
                const modalContent = modal.querySelector('div');
                setTimeout(() => {
                    modalContent.classList.remove('scale-95');
                    modalContent.classList.add('scale-100');
                }, 50);
            }
            
            // Fungsi untuk menutup modal dengan animasi
            function closeModal() {
                const modalContent = modal.querySelector('div');
                modalContent.classList.remove('scale-100');
                modalContent.classList.add('scale-95');
                
                setTimeout(() => {
                    modal.classList.remove('opacity-100');
                    modal.classList.add('opacity-0', 'pointer-events-none');
                }, 200);
            }
            
            // Event listener untuk tombol
            if (selengkapnyaBtn) {
                const isLoggedIn = selengkapnyaBtn.dataset.loggedIn === 'true';

                selengkapnyaBtn.addEventListener('click', function () {
                    if (isLoggedIn) {
                        window.location.href = "{{ route('ulasan.index') }}";
                    } else {
                        modal.classList.remove('opacity-0', 'pointer-events-none');
                        modal.classList.add('opacity-100');
                    }
                });
            }

            
            closeBtn.addEventListener('click', closeModal);
            
            // Tutup modal saat klik di luar modal
            modal.addEventListener('click', function(e) {
                if (e.target === modal) {
                    closeModal();
                }
            });
            
            // Tutup modal dengan tombol ESC
            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape' && !modal.classList.contains('opacity-0')) {
                    closeModal();
                }
            });
        }

        if (profileDropdownToggle && profileDropdown) {
            let isDropdownOpen = false;
            
            // Toggle dropdown saat tombol profil diklik
            profileDropdownToggle.addEventListener('click', function(e) {
                e.stopPropagation();
                if (isDropdownOpen) {
                    profileDropdown.classList.add('hidden');
                } else {
                    profileDropdown.classList.remove('hidden');
                }
                isDropdownOpen = !isDropdownOpen;
            });
            
            // Tutup dropdown ketika mengklik di luar dropdown
            document.addEventListener('click', function(event) {
                if (!profileDropdownToggle.contains(event.target) && !profileDropdown.contains(event.target)) {
                    profileDropdown.classList.add('hidden');
                    isDropdownOpen = false;
                }
            });
            
            // Mencegah dropdown tertutup saat mengklik pada dropdown itu sendiri
            profileDropdown.addEventListener('click', function(e) {
                // Jangan tutup dropdown jika mengklik di dalam menu dropdown
                // kecuali jika itu tombol submit (logout)
                if (!e.target.matches('button[type="submit"]')) {
                    e.stopPropagation();
                }
            });
        }
        

        prevButtons.forEach(button => {
            button.addEventListener('click', function () {
                const carousel = this.closest('.relative').querySelector('#carousel');
                updateActiveItem(carousel, 'prev');
            });
        });

        nextButtons.forEach(button => {
            button.addEventListener('click', function () {
                const carousel = this.closest('.relative').querySelector('#carousel');
                updateActiveItem(carousel, 'next');
            });
        });
        // Set kondisi tombol saat halaman pertama kali dimuat
        document.querySelectorAll('#carousel').forEach(carousel => {
            const items = carousel.querySelectorAll('.carousel-item');
            const activeItem = carousel.querySelector('.carousel-item.active');
            const currentIndex = Array.from(items).indexOf(activeItem);

            const prevButton = carousel.closest('.relative').querySelector('.carousel-prev');
            const nextButton = carousel.closest('.relative').querySelector('.carousel-next');

            prevButton.style.display = currentIndex === 0 ? 'none' : 'block';
            nextButton.style.display = currentIndex === items.length - 1 ? 'none' : 'block';
        });

        document.addEventListener('DOMContentLoaded', function() {
            const tombolMenuMobile = document.getElementById('mobile-menu-button');
            if (tombolMenuMobile) {
                tombolMenuMobile.addEventListener('click', function() {
                    const menuMobile = document.getElementById('mobile-menu');
                    if (menuMobile) {
                        menuMobile.classList.toggle('hidden');
                    }
                });
            }
        });

    });
</script>