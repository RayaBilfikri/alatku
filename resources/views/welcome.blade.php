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
    <section class="bg-[#525fe1] p-8 md:p-10 relative overflow-hidden">
        <!-- Background circles -->
        <div class="absolute -left-24 top-0 w-72 h-72 rounded-full bg-gradient-to-r from-[#f86f03] to-[#ffa41b] opacity-90"></div>
        <div class="absolute left-1/4 -bottom-32 w-40 h-40 rounded-full bg-gradient-to-r from-[#f86f03] to-[#ffa41b] opacity-80"></div>
        <div class="absolute -right-24 top-0 w-72 h-72 rounded-full bg-gradient-to-r from-[#f86f03] to-[#ffa41b] opacity-90"></div>
        
        <div class="container mx-auto relative z-10">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <!-- Left side content -->
                <div class="text-white mb-8 md:mb-0 md:w-1/3 font montserrat">
                    <h2 class="text-2xl font-bold mb-2">Alat Siap Pakai,<br>Proyek Siap Jalan</h2>
                    <p class="text-lg mb-6 opacity-90 font-montserrat">
                        Lihat koleksi alat berat dan kapal siap kerja yang cocok untuk semua kebutuhan lapangan Anda.
                    </p>
                    <a href="#" class="inline-flex items-center bg-gradient-to-r from-[#f86f03] to-[#ffa41b] text-white px-5 py-2 rounded-full font-medium text-sm">
                        Lihat produk selengkapnya
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </a>
                </div>
                
                <!-- Right side carousel -->
                <div class="md:w-2/3 relative">
                    <div class="flex overflow-x-auto gap-4 pb-4 snap-x snap-mandatory hide-scrollbar carousel-container" id="carousel">
                        <!-- Carousel Item 1 (Active/Featured) -->
                        <div class="snap-start min-w-[280px] bg-white rounded-xl shadow-lg overflow-hidden transform transition-all duration-300 hover:scale-[1.03] carousel-item active">
                            <img src="https://via.placeholder.com/300x200" alt="Komatsu Excavator PC135F-10M0" class="w-full h-48 object-cover">
                            <div class="p-4">
                                <h3 class="font-bold text-gray-800">Komatsu Excavator PC135F-10M0</h3>
                                <div class="flex items-center text-xs text-gray-500 mt-2 mb-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                    Tangerang, Indonesia
                                </div>
                                <div class="flex justify-between mb-3">
                                    <div class="bg-[#525FE1] text-white text-xs font-medium px-3 py-1 rounded">
                                        <div class="text-center">Tahun</div>
                                        <div class="font-bold text-center">2023</div>
                                    </div>
                                    <div class="bg-[#525FE1] text-white text-xs font-medium px-3 py-1 rounded">
                                        <div class="text-center">Jam</div>
                                        <div class="font-bold text-center">2,824 jam</div>
                                    </div>
                                </div>
                                <div class="text-center font-bold text-lg bg-gradient-to-r from-[#F86F03] to-[#FFA41B] text-white px-4 py-2 rounded-lg mt-3">
                                    Rp430.000.000
                                </div>
                            </div>
                        </div>
                        
                        <!-- Carousel Item 2 -->
                        <div class="snap-start min-w-[280px] bg-white rounded-xl shadow-lg overflow-hidden transform transition-all duration-300 hover:scale-[1.03] carousel-item">
                            <img src="https://via.placeholder.com/300x200" alt="Komatsu Excavator PC135F-10M0" class="w-full h-48 object-cover">
                            <div class="p-4">
                                <h3 class="font-bold text-gray-800">Komatsu Excavator PC135F-10M0</h3>
                                <div class="flex items-center text-xs text-gray-500 mt-2 mb-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                    Surabaya, Indonesia
                                </div>
                                <div class="flex justify-between mb-3">
                                    <div class="bg-[#525FE1] text-white text-xs font-medium px-3 py-1 rounded">
                                        <div class="text-center">Tahun</div>
                                        <div class="font-bold text-center">2023</div>
                                    </div>
                                    <div class="bg-[#525FE1] text-white text-xs font-medium px-3 py-1 rounded">
                                        <div class="text-center">Jam</div>
                                        <div class="font-bold text-center">2,824 jam</div>
                                    </div>
                                </div>
                                <div class="text-center font-bold text-lg bg-gradient-to-r from-[#F86F03] to-[#FFA41B] text-white px-4 py-2 rounded-lg mt-3">
                                    Rp450.000.000
                                </div>
                            </div>
                        </div>
                        
                        <!-- Carousel Item 3 -->
                        <div class="snap-start min-w-[280px] bg-white rounded-xl shadow-lg overflow-hidden transform transition-all duration-300 hover:scale-[1.03] carousel-item">
                            <img src="https://via.placeholder.com/300x200" alt="Komatsu Excavator" class="w-full h-48 object-cover">
                            <div class="p-4">
                                <h3 class="font-bold text-gray-800">Komatsu Excavator PC135F</h3>
                                <div class="flex items-center text-xs text-gray-500 mt-2 mb-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                    Jakarta, Indonesia
                                </div>
                                <div class="flex justify-between mb-3">
                                    <div class="bg-[#525FE1] text-white text-xs font-medium px-3 py-1 rounded">
                                        <div class="text-center">Tahun</div>
                                        <div class="font-bold text-center">2021</div>
                                    </div>
                                    <div class="bg-[#525FE1] text-white text-xs font-medium px-3 py-1 rounded">
                                        <div class="text-center">Jam</div>
                                        <div class="font-bold text-center">2,500 jam</div>
                                    </div>
                                </div>
                                <div class="text-center font-bold text-lg bg-gradient-to-r from-[#F86F03] to-[#FFA41B] text-white px-4 py-2 rounded-lg mt-3">
                                    Rp330.000.000
                                </div>
                            </div>
                        </div>
                        
                        <!-- Carousel Item 4 (New) -->
                        <div class="snap-start min-w-[280px] bg-white rounded-xl shadow-lg overflow-hidden transform transition-all duration-300 hover:scale-[1.03] carousel-item">
                            <img src="https://via.placeholder.com/300x200" alt="Komatsu Wheel Loader" class="w-full h-48 object-cover">
                            <div class="p-4">
                                <h3 class="font-bold text-gray-800">Komatsu Wheel Loader WA380</h3>
                                <div class="flex items-center text-xs text-gray-500 mt-2 mb-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                    Bandung, Indonesia
                                </div>
                                <div class="flex justify-between mb-3">
                                    <div class="bg-[#525FE1] text-white text-xs font-medium px-3 py-1 rounded">
                                        <div class="text-center">Tahun</div>
                                        <div class="font-bold text-center">2023</div>
                                    </div>
                                    <div class="bg-[#525FE1] text-white text-xs font-medium px-3 py-1 rounded">
                                        <div class="text-center">Jam</div>
                                        <div class="font-bold text-center">2,824 jam</div>
                                    </div>
                                </div>
                                <div class="text-center font-bold text-lg bg-gradient-to-r from-[#F86F03] to-[#FFA41B] text-white px-4 py-2 rounded-lg mt-3">
                                    Rp500.000.000
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Navigation buttons -->
                    <button class="carousel-prev absolute left-2 top-1/2 transform -translate-y-1/2 bg-[#FFA41B] rounded-full p-2 shadow-lg z-10 hover:opacity-100 transition-opacity hidden md:block">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-[#525fe1]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                        </svg>
                    </button>
                    <button class="carousel-next absolute -right-2 top-1/2 transform -translate-y-1/2 bg-[#FFA41B] rounded-full p-2 shadow-lg z-10 opacity-75 hover:opacity-100 transition-opacity">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-[#525fe1]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </button>
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
    .hide-scrollbar::-webkit-scrollbar {
    display: none;
    }
    .hide-scrollbar {
        -ms-overflow-style: none;
        scrollbar-width: none;
    }

    .carousel-container {
        perspective: 1000px; /* Add perspective for 3D effect */
    }

    .carousel-item {
        transform: scale(0.9); /* Default scale for non-active items */
        transition: transform 0.3s;  /* Smooth transition for all items */
    }

    .carousel-item.active {
        transform: scale(1.05); /* Larger scale for the active item */
    }

</style>
</html>

<script>
document.addEventListener("DOMContentLoaded", function() {
    const items = document.querySelectorAll('.carousel-item');
    const carouselContainer = document.getElementById('carousel');

    let activeIndex = 0;

    const updateCarousel = () => {
        items.forEach((item, index) => {
            item.classList.remove('active');
            if (index === activeIndex) {
                item.classList.add('active'); // Apply active class to current item
            }
        });
    };

    // Add event listeners for swiping (for mobile) or buttons (if added)
    carouselContainer.addEventListener('scroll', () => {
        const scrollPosition = carouselContainer.scrollLeft;
        const itemWidth = items[0].offsetWidth;

        activeIndex = Math.round(scrollPosition / itemWidth);
        activeIndex = Math.max(0, Math.min(activeIndex, items.length - 1)); // Clamp index
        updateCarousel();
    });
});
</script>