<!-- resources/views/welcome.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>alatKu</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('resources/app.css') }}">
</head>
<body class="bg-gray-100 text-gray-800">

    <!-- Header -->
    <header class="flex justify-between items-center px-6 py-4 bg-gray-100">
        <div class="flex items-center space-x-2">
            <img src="/images/alatku.png" alt="alatKu Logo" class="h-20 w-auto object-contain">
        </div>
        <nav class="space-x-6">
            <a href="{{ route('home') }}" class="hover:text-orange-600">Home</a>
            <a href="{{ route('about-us') }}" class="hover:text-orange-600">About us</a>
            <a href="{{ route('how-to-buy') }}" class="hover:text-orange-600">How to buy?</a>
            <a href="{{ route('article') }}" class="hover:text-orange-600">Article</a>
            <a href="{{ route('login') }}" class="hover:text-orange-600">Login</a>
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
                    <h1 class="text-2xl md:text-3xl font-akira font-bold uppercase tracking-wide text-white mb-2 drop-shadow-md">
                        DARI DARAT KE LAUT,<br>
                        KAMI SIAP MENDUKUNG ANDA!
                    </h1>
                    <p class="text-base md:text-lg text-white font-medium font-montserrat drop-shadow-xl">
                        Jelajahi beragam peralatan industri dan konstruksi<br>
                        untuk berbagai kebutuhan proyek.<br>
                        Efisiensi dan ketepatan dimulai dari pilihan alat yang tepat.
                    </p>
                    </br>
                    <div class="mt-8 text-right text-lg">
                        <a href="{{ route('catalog') }}" class="inline-block bg-orange-500 hover:bg-orange-600 text-white font-semibold py-2 px-6 rounded-full text-lg transition-all font-montserrat duration-300">
                            Cari Solusi Industri Anda
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Equipment Sale with Carousel Section -->
    <section class="bg-[#525fe1] p-8 md:p-10 relative overflow-hidden z-6">
        <!-- Background circles -->
        <div class="absolute -left-24 top-0 w-72 h-72 rounded-full bg-gradient-to-r from-[#f86f03] to-[#ffa41b] shadow-right-only opacity-90"></div>
        <div class="absolute -right-24 top-0 w-72 h-72 rounded-full bg-gradient-to-r from-[#f86f03] to-[#ffa41b] shadow-left-only opacity-90"></div>
        
        <div class="container mx-auto relative z-10">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <!-- Left side content -->
                <div class="text-white mb-8 md:mb-0 md:w-1/3 font montserrat">
                    <h2 class="text-3xl font-bold mb-2">Alat Siap Pakai,<br>Proyek Siap Jalan</h2>
                    <p class="text-base mb-8 opacity-90 font-montserrat font-semibold">
                        Lihat koleksi alat berat dan kapal siap kerja 
                        yang cocok untuk semua kebutuhan lapangan Anda.
                    </p>

                    <a href="{{ route('catalog') }}"
                        class="relative inline-flex items-center overflow-hidden text-white px-5 py-2 rounded-full font-medium text-sm group">
                        <span class="absolute inset-0 bg-gradient-to-r from-[#f86f03] to-[#ffa41b] transition-transform duration-500 ease-in-out group-hover:from-[#ffa41b] group-hover:to-[#f86f03]"></span>
                        <span class="relative z-10 flex items-center">
                            Lihat produk selengkapnya
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2 transition-transform duration-500 ease-in-out group-hover:translate-x-1" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </span>
                    </a>
                </div>
                
                <!-- Right side carousel with improved animation -->
                <div class="md:w-2/3 relative">
                    <!-- Container with padding to accommodate scale effect -->
                    <div class="carousel-wrapper overflow-hidden">
                        <div class="flex overflow-x-auto gap-4 pb-4 snap-x snap-mandatory hide-scrollbar carousel-container ml-14 px-4 py-2" id="carousel">
                            <!-- Carousel Item 1 (Active/Featured) -->
                            <div class="snap-start min-w-[280px] bg-white rounded-xl shadow-lg overflow-hidden transform transition-all duration-300 carousel-item active" data-index="0">
                                <img src="/images/KOMATSUPC135F-10M0.png" alt="Komatsu Excavator PC135F-10M0" class="w-full h-48 object-cover">
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
                            <div class="snap-start min-w-[280px] bg-white rounded-xl shadow-lg overflow-hidden transform transition-all duration-300 carousel-item" data-index="1">
                                <img src="/images/caterpillar.jpg" alt="Komatsu Excavator PC135F-10M0" class="w-full h-48 object-cover">
                                <div class="p-4">
                                    <h3 class="font-bold text-gray-800">Rigid Hauler 777G</h3>
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
                            <div class="snap-start min-w-[280px] bg-white rounded-xl shadow-lg overflow-hidden transform transition-all duration-300 carousel-item" data-index="2">
                                <img src="/images/komatsu3.png" alt="Komatsu Excavator" class="w-full h-48 object-cover">
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
                            <div class="snap-start min-w-[280px] bg-white rounded-xl shadow-lg overflow-hidden transform transition-all duration-300 carousel-item" data-index="3">
                                <img src="/images/komatsu4.png" alt="Komatsu Wheel Loader" class="w-full h-48 object-cover">
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
                    </div>
                    
                    <!-- Navigation buttons -->
                    <button class="carousel-prev absolute left-2 top-1/2 transform -translate-y-1/2 bg-[#FFA41B] rounded-full p-2 shadow-lg z-10 hover:opacity-100 transition-opacity hidden md:block ml-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-[#525fe1]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                        </svg>
                    </button>
                    <button class="carousel-next absolute -right-2 top-1/2 transform -translate-y-1/2 bg-[#FFA41B] rounded-full p-2 shadow-lg z-10 opacity-100 hover:opacity-100 transition-opacity">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-[#525fe1]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </button>
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
                <a href="{{ route('ulasan.index') }}" class="absolute top-0 right-0 -mt-8 group inline-flex items-center px-5 py-2.5 rounded-full text-white font-medium bg-[#F86F03] hover:bg-[#e56703] transition-all duration-300 shadow-lg transform hover:-translate-y-1">
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
                <div class="bg-white rounded-xl testimonial-card p-6">
                    <div class="text-3xl text-gray-300 mb-4">"</div>
                    <p class="text-gray-700 text-sm leading-relaxed mb-6">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                    </p>
                    <div class="flex items-center">
                        <img src="{{ asset('path/to/andy.jpg') }}" class="w-10 h-10 rounded-full mr-4" alt="Andy Herman">
                        <div>
                            <p class="text-sm font-semibold text-gray-800">Andy Herman</p>
                            <p class="text-xs text-gray-500">Civil Engineer</p>
                        </div>
                    </div>
                </div>
                
                <!-- Testimonial 2 -->
                <div class="bg-white rounded-xl shadow-lg p-6">
                    <div class="text-3xl text-gray-300 mb-4">"</div>
                    <p class="text-gray-700 text-sm leading-relaxed mb-6">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                    </p>
                    <div class="flex items-center">
                        <img src="{{ asset('path/to/zendaya.jpg') }}" class="w-10 h-10 rounded-full mr-4" alt="Zendaya">
                        <div>
                            <p class="text-sm font-semibold text-gray-800">Zendaya</p>
                            <p class="text-xs text-gray-500">Civil Engineer</p>
                        </div>
                    </div>
                </div>
                
                <!-- Testimonial 3 -->
                <div class="bg-white rounded-xl shadow-lg p-6">
                    <div class="text-3xl text-gray-300 mb-4">"</div>
                    <p class="text-gray-700 text-sm leading-relaxed mb-6">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                    </p>
                    <div class="flex items-center">
                        <img src="{{ asset('path/to/chris.jpg') }}" class="w-10 h-10 rounded-full mr-4" alt="Chris Septian">
                        <div>
                            <p class="text-sm font-semibold text-gray-800">Chris Septian</p>
                            <p class="text-xs text-gray-500">Civil Engineer</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Testimonial cards - bottom row -->
            <div class="grid grid-cols-1 md:grid-cols-3 drop-shadow-lg gap-8">
                <!-- Testimonial 4 -->
                <div class="bg-white rounded-xl shadow-lg p-6">
                    <div class="text-3xl text-gray-300 mb-4">"</div>
                    <p class="text-gray-700 text-sm leading-relaxed mb-6">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                    </p>
                    <div class="flex items-center">
                        <img src="{{ asset('path/to/bagas.jpg') }}" class="w-10 h-10 rounded-full mr-4" alt="Bagas Drible">
                        <div>
                            <p class="text-sm font-semibold text-gray-800">Bagas Drible</p>
                            <p class="text-xs text-gray-500">Civil Engineer</p>
                        </div>
                    </div>
                </div>
                
                <!-- Testimonial 5 -->
                <div class="bg-white rounded-xl shadow-lg p-6">
                    <div class="text-3xl text-gray-300 mb-4">"</div>
                    <p class="text-gray-700 text-sm leading-relaxed mb-6">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                    </p>
                    <div class="flex items-center">
                        <img src="{{ asset('path/to/elzio.jpg') }}" class="w-10 h-10 rounded-full mr-4" alt="Elzio">
                        <div>
                            <p class="text-sm font-semibold text-gray-800">Elzio</p>
                            <p class="text-xs text-gray-500">Civil Engineer</p>
                        </div>
                    </div>
                </div>
                
                <!-- Testimonial 6 -->
                <div class="bg-white rounded-xl shadow-lg p-6">
                    <div class="text-3xl text-gray-300 mb-4">"</div>
                    <p class="text-gray-700 text-sm leading-relaxed mb-6">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                    </p>
                    <div class="flex items-center">
                        <img src="{{ asset('path/to/lionel.jpg') }}" class="w-10 h-10 rounded-full mr-4" alt="Leonel Messi">
                        <div>
                            <p class="text-sm font-semibold text-gray-800">Leonel Messi</p>
                            <p class="text-xs text-gray-500">Civil Engineer</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!--Article Section-->
    <section class="article-section relative overflow-hidden bg-[#FFA41B] overflow-hidden">
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
                
                <!-- Article cards using the orange style from the high-fidelity image -->
                <div class="grid grid-cols-1 md:grid-cols-4 gap-6 relative mt-8">
                    <!-- Article Card 1 -->
                    <div class="bg-orange-500 rounded-xl shadow-lg overflow-hidden">
                        <div class="p-4">
                            <img src="{{ asset('images/excavator1.jpg') }}" class="w-full h-40 object-cover rounded-lg mb-4" alt="Artikel Konstruksi">
                            <h3 class="text-white font-bold text-lg mb-2">Solusi Kebutuhan Kontraktor</h3>
                            <p class="text-white text-sm mb-4">
                                Pilihan alat berat terbaik untuk proyek konstruksi jalan raya, bangunan gedung, jembatan dan infrastruktur lainnya.
                            </p>
                            <a href="#" class="inline-block bg-white text-orange-500 py-2 px-4 rounded-full text-sm font-medium hover:bg-orange-100 transition">Baca Selengkapnya</a>
                        </div>
                    </div>
                    
                    <!-- Article Card 2 -->
                    <div class="bg-orange-500 rounded-xl shadow-lg overflow-hidden">
                        <div class="p-4">
                            <img src="{{ asset('images/excavator2.jpg') }}" class="w-full h-40 object-cover rounded-lg mb-4" alt="Artikel Konstruksi">
                            <h3 class="text-white font-bold text-lg mb-2">Tips Pemeliharaan Kontraktor</h3>
                            <p class="text-white text-sm mb-4">
                                Panduan lengkap merawat alat berat untuk memaksimalkan umur dan performa mesin di berbagai kondisi lapangan.
                            </p>
                            <a href="#" class="inline-block bg-white text-orange-500 py-2 px-4 rounded-full text-sm font-medium hover:bg-orange-100 transition">Baca Selengkapnya</a>
                        </div>
                    </div>
                    
                    <!-- Article Card 3 -->
                    <div class="bg-orange-500 rounded-xl shadow-lg overflow-hidden">
                        <div class="p-4">
                            <img src="{{ asset('images/excavator3.jpg') }}" class="w-full h-40 object-cover rounded-lg mb-4" alt="Artikel Konstruksi">
                            <h3 class="text-white font-bold text-lg mb-2">Teknologi Konstruksi Kontraktor</h3>
                            <p class="text-white text-sm mb-4">
                                Inovasi terbaru dalam peralatan konstruksi yang meningkatkan efisiensi, produktivitas, dan keamanan proyek.
                            </p>
                            <a href="#" class="inline-block bg-white text-orange-500 py-2 px-4 rounded-full text-sm font-medium hover:bg-orange-100 transition">Baca Selengkapnya</a>
                        </div>
                    </div>
                    
                    <!-- Article Card 4 -->
                    <div class="bg-orange-500 rounded-xl shadow-lg overflow-hidden">
                        <div class="p-4">
                            <img src="/images/worker.jpg" class="w-full h-60 object-cover rounded-lg mb-4" alt="Artikel Konstruksi">
                            <h3 class="text-white font-bold text-lg mb-2">Solusi Finansial Kontraktor</h3>
                            <p class="text-white text-sm mb-4">
                                Opsi pembiayaan dan sewa alat berat untuk proyek konstruksi dengan berbagai skala dan kebutuhan.
                            </p>
                            <a href="#" class="inline-block bg-white text-orange-500 py-2 px-4 rounded-full text-sm font-medium hover:bg-orange-100 transition">Baca Selengkapnya</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

</body>
<style>
    .shadow-text {
        text-shadow: 1px 1px 4px rgba(0, 0, 0, 0.7); /* Horizontal, Vertical, Blur Radius, Color */
    }

    @layer utilities {
        .shadow-right-only {
            box-shadow: 10px 0 20px -5px rgba(0, 0, 0, 0.3);
        }

        .shadow-left-only {
            box-shadow: -10px 0 15px -5px rgba(0, 0, 0, 0.3);
        }
    }

    @font-face {
        font-family: 'Akira Expanded';
        src: url('/fonts/AkiraExpanded.otf') format('opentype');
        font-weight: normal;
        font-style: normal;
    }

    /* Hide scrollbar */
    .hide-scrollbar::-webkit-scrollbar {
        display: none;
    }
    .hide-scrollbar {
        -ms-overflow-style: none;
        scrollbar-width: none;
    }

    .carousel-wrapper {
        position: relative;
        padding: 10px;
        margin: -10px;
        overflow: visible;
    }

    /* Item styling with scale effect */
    .carousel-item {
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

</style>
</html>

<script>
    
    document.addEventListener("DOMContentLoaded", function () {
        const prevButtons = document.querySelectorAll('.carousel-prev');
        const nextButtons = document.querySelectorAll('.carousel-next');

        function updateActiveItem(carousel, direction) {
            const items = carousel.querySelectorAll('.carousel-item');
            const activeItem = carousel.querySelector('.carousel-item.active');
            let currentIndex = Array.from(items).indexOf(activeItem);

            
            let newIndex = direction === 'next' ? currentIndex + 1 : currentIndex - 1;

            // Batasi indeks agar tidak keluar dari range
            if (newIndex < 0 || newIndex >= items.length) return;

            // Hapus kelas aktif dan animasi dari item lama
            activeItem.classList.remove('active', 'scale-105', 'z-10');
            activeItem.classList.add('scale-100');

            // Tambahkan kelas aktif dan animasi zoom ke item baru
            const newItem = items[newIndex];
            newItem.classList.add('active', 'scale-105', 'z-10');
            newItem.classList.remove('scale-100');

            // Scroll ke item baru
            const itemWidth = newItem.offsetWidth;
            carousel.scrollBy({
                left: direction === 'next' ? itemWidth : -itemWidth,
                behavior: 'smooth'
            });
            // Sembunyikan tombol prev jika di item pertama, next jika di item terakhir
            const prevButton = carousel.closest('.relative').querySelector('.carousel-prev');
            const nextButton = carousel.closest('.relative').querySelector('.carousel-next');

            prevButton.style.display = newIndex === 0 ? 'none' : 'block';
            nextButton.style.display = newIndex === items.length - 1 ? 'none' : 'block';

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

    });


    tailwind.config = {
        theme: {
            extend: {
            fontFamily: {
                montserrat: ['Montserrat', 'sans-serif'],
                akira: ['"Akira Expanded"', 'sans-serif'],
            },
            },
        },
        }
</script>
