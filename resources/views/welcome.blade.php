<!-- resources/views/welcome.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>alatKu</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('resources/app.css') }}">
    <script src="//unpkg.com/alpinejs" defer></script>
</head>
<body class="bg-gray-100 text-gray-800">

    <!-- Header lengkap dengan dropdown klikable -->
    <header class="flex justify-between items-center px-6 py-4 bg-gray-100">
        <div class="flex items-center">
            <img src="/images/alatku.png" alt="alatKu Logo" class="h-20 w-auto object-contain">
            <!-- Navigation menu - diposisikan langsung setelah logo (lebih ke kiri) -->
            <nav class="ml-12 font-bold flex items-center space-x-8" style="transform: translateX(300px);">
                <a href="{{ route('home') }}" class="hover:text-orange-600 font-montserrat text-sm">Beranda</a>
                <a href="{{ route('tentang-kami') }}" class="hover:text-orange-600 font-montserrat text-sm">Tentang Kami</a>
                <a href="{{ route('cara-membeli') }}" class="hover:text-orange-600 font-montserrat text-sm">Bagaimana cara membeli?</a>
                <a href="{{ route('artikel') }}" class="hover:text-orange-600 font-montserrat text-sm">Artikel</a>
            </nav>
        </div>
        
        <!-- Profile atau Login/Register section -->
        <div>
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
                        <a href="{{ route('ulasan.index') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-blue-600 transition-colors duration-200 flex items-center">
                            <i class="fa-duotone fa-solid fa-comments mr-2 text-gray-500"></i> Ulasan
                        </a>
                        <hr class="my-1">
                        <form method="POST" action="{{ route('logout') }}">
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


    <!-- Hero Section Carousel -->
    <section 
        x-data="{ 
            activeSlide: 0,
            // Menggabungkan slide statis dengan carousel dari database
            slides: [
                // Slide statis
                {
                    id: 0,
                    is_static: true,
                    judul: 'DARI DARAT KE LAUT, KAMI SIAP MENDUKUNG ANDA!',
                    gambar: '/images/46fffdf7a99c6deffc8cdd6190b26e1c43346a0e.png',
                    link: '{{ route('catalog') }}'
                },
                // Menambahkan data carousel dari database (jika ada)
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
                this.activeSlide = (this.activeSlide + 1) % this.slides.length;
            },
            
            prev() { 
                this.activeSlide = (this.activeSlide - 1 + this.slides.length) % this.slides.length;
            },
            
            // Autoplay
            autoplayInterval: null,
            
            startAutoplay() {
                this.autoplayInterval = setInterval(() => this.next(), 8000);
            },
            
            stopAutoplay() {
                clearInterval(this.autoplayInterval);
            }
        }"
        x-init="startAutoplay()"
        @mouseover="stopAutoplay()"
        @mouseout="startAutoplay()"
        x-cloak
        class="relative bg-gray-100 py-12 px-4 md:px-8 overflow-hidden min-h-[400px] mx-auto my-8 rounded-3xl max-w-[90%]"
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
                        class="absolute inset-0 w-full h-full rounded-3xl"
                    >
                        <!-- Background -->
                        <img :src="slide.gambar" class="absolute inset-0 w-full h-full max-w-full max-h-full object-cover z-0 rounded-3xl">
                        <div class="absolute inset-0 bg-[#FFA41B]/60 z-0 rounded-3xl"></div>

                        <!-- Content -->
                        <div class="container mx-auto relative z-10 h-full flex items-center">
                            <!-- Static Hero Slide -->
                            <template x-if="slide.is_static">
                                <div class="flex flex-col md:flex-row items-center gap-x-7 md:items-start w-full">
                                    <div class="relative bg-orange-500 rounded-full w-64 h-64 md:w-80 md:h-80 flex items-center justify-center mb-8 md:mb-0">
                                        <img src="/images/icon.png" alt="Icon" class="h-auto w-full max-h-[110%] object-contain mb-4 translate-y-8">
                                    </div>
                                    
                                    <div class="md:ml-8 text-left md:max-w-xl flex-grow">
                                        <h1 class="text-2xl md:text-3xl font-akira font-bold uppercase tracking-wide text-white mb-2 drop-shadow-md">
                                            DARI DARAT KE LAUT,<br>
                                            KAMI SIAP MENDUKUNG ANDA!
                                        </h1>
                                        <p class="text-base md:text-lg text-white font-medium font-montserrat drop-shadow-xl">
                                            Jelajahi beragam peralatan industri dan konstruksi<br>
                                            untuk berbagai kebutuhan proyek.<br>
                                            Efisiensi dan ketepatan dimulai dari pilihan alat yang tepat.
                                        </p>
                                        <div class="flex justify-end w-full absolute bottom-0 right-0 p-6 text-right text-lg" x-data>
                                            <button
                                                @click="document.querySelector('#equipment-sale')?.scrollIntoView({ behavior: 'smooth' })"
                                                class="inline-block bg-orange-500 hover:bg-orange-600 text-white font-semibold mr-6 py-2 px-6 rounded-full text-lg transition-all font-montserrat duration-300"
                                            >
                                                Cari Solusi Industri Anda
                                            </button>
                                        </div>
                                    </div>
                                </div>
                        </template>

                        <!-- Dynamic Slide dari Database -->
                        <template x-if="!slide.is_static">
                            <div class="w-full text-center text-white">
                                <h2 class="text-2xl md:text-4xl font-akira font-bold mb-4" x-text="slide.judul"></h2>
                                <template x-if="slide.link">
                                    <a :href="slide.link" class="bg-orange-500 hover:bg-orange-600 text-white font-semibold py-2 px-6 rounded-full text-lg transition-all font-montserrat duration-300">
                                        Kunjungi
                                    </a>
                                </template>
                            </div>
                        </template>
                    </div>
                </div>
            </template>
        </div>

        <!-- Hanya tampilkan navigasi jika ada lebih dari 1 slide -->
        @if($carousels->count() > 0)
        <!-- Touch/Mouse Swipe Area -->
        <div 
            class="absolute inset-0 z-10 pointer-events-none"

            x-on:mousedown="startX = $event.clientX"
            x-on:mouseup="
                endX = $event.clientX;
                if (startX - endX > 50) {
                    next();
                } else if (endX - startX > 50) {
                    prev();
                }
            "
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

        <!-- Navigation Buttons -->
        <div class="absolute bottom-6 right-6 flex space-x-2 z-20">
            <button @click="prev()" class="bg-white/80 hover:bg-white text-gray-800 font-bold px-3 py-2 rounded-full shadow">
                ‹
            </button>
            <button @click="next()" class="bg-white/80 hover:bg-white text-gray-800 font-bold px-3 py-2 rounded-full shadow">
                ›
            </button>
        </div>

        <!-- Carousel Indicators -->
        <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2 flex space-x-2 z-20">
            <template x-for="(slide, index) in slides" :key="index">
                <button 
                    @click="activeSlide = index"
                    :class="{'bg-orange-500': activeSlide === index, 'bg-white': activeSlide !== index}"
                    class="w-3 h-3 rounded-full shadow-md transition"
                ></button>
            </template>
        </div>
        @endif
    </section>

    <!-- Equipment Sale with Product Card Section -->
    <section id="equipment-sale" class="bg-[#525fe1] p-8 md:p-10 relative overflow-hidden z-6">
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
                            @forelse ($ProductCard as $index => $product)
                                <div class="snap-start min-w-[280px] bg-white rounded-xl shadow-lg overflow-hidden transform transition-all duration-300 carousel-item {{ $loop->first ? 'active' : '' }}" data-index="{{ $index }}">
                                    <img src="{{ asset('storage/' . $product->gambar) }}" alt="{{ $product->name }}" class="w-full h-48 object-cover">
                                    <div class="p-4">
                                        <h3 class="font-bold text-gray-800">{{ $product->name }}</h3>
                                        <div class="flex items-center text-xs text-gray-500 mt-2 mb-3">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                            </svg>
                                            Indonesia
                                        </div>
                                        <div class="flex justify-between mb-3">
                                            <div class="bg-[#525FE1] text-white text-xs font-medium px-7 py-1 rounded-full">
                                                <div class="text-center">Tahun</div>
                                                <div class="font-bold text-center">{{ $product->year_of_build }}</div>
                                            </div>
                                            <div class="bg-[#525FE1] text-white text-xs font-medium px-7 py-1 rounded-full">
                                                <div class="text-center">Jam operasional</div>
                                                <div class="font-bold text-center">{{ $product->hours_meter }} jam</div> 
                                            </div>
                                        </div>
                                        <div class="text-center font-bold text-lg bg-gradient-to-r from-[#F86F03] to-[#FFA41B] text-white px-4 py-2 rounded-lg mt-3">
                                            Rp{{ number_format($product->harga, 0, ',', '.') }}
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="min-w-full flex flex-col items-center justify-center py-12 text-gray-500">
                                    <!-- Ilustrasi SVG keranjang kosong -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-32 h-32 mb-4 text-[#FFA41B]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-1.35 2.7A1 1 0 007.5 17h9a1 1 0 00.85-1.47L17 13M10 21a1 1 0 100-2 1 1 0 000 2zm6 0a1 1 0 100-2 1 1 0 000 2z"/>
                                    </svg>
                                    <p class="text-lg font-semibold text-white">Belum ada produk saat ini</p>
                                    <p class="text-sm text-white">Yuk tambahkan produk agar tampil di sini!</p>
                                </div>
                            @endforelse
                        </div>
                    </div>

                    <!-- Navigation buttons -->
                    @if ($ProductCard->isNotEmpty()) <!-- Only show buttons if there are products -->
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
            <a href="javascript:void(0)" id="selengkapnyaBtn" class="absolute top-0 right-0 -mt-8 group inline-flex items-center px-5 py-2.5 rounded-full text-white font-medium bg-[#F86F03] hover:bg-[#e56703] transition-all duration-300 shadow-lg transform hover:-translate-y-1">
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
                        Dulu sulit cari alat berat yang terpercaya. Sekarang dengan Alatku, tinggal buka website dan semua solusi ada di satu tempat.
                    </p>
                    <div class="flex items-center">
                        <img src="{{ asset('images/kobel.jpg') }}" class="w-10 h-10 rounded-full mr-4" alt="Andy Herman">
                        <div>
                            <p class="text-sm font-semibold text-gray-800">Kobel</p>
                            <p class="text-xs text-gray-500">user</p>
                        </div>
                    </div>
                </div>
                
                <!-- Testimonial 2 -->
                <div class="bg-white rounded-xl shadow-lg p-6">
                    <div class="text-3xl text-gray-300 mb-4">"</div>
                    <p class="text-gray-700 text-sm leading-relaxed mb-6">
                        "Saya suka karena tampilannya sederhana dan datanya lengkap. Tinggal klik, semua alat langsung muncul sesuai kebutuhan proyek.
                    </p>
                    <div class="flex items-center">
                        <img src="{{ asset('images/alisson.jpg') }}" class="w-10 h-10 rounded-full mr-4" alt="Zendaya">
                        <div>
                            <p class="text-sm font-semibold text-gray-800">Alisson</p>
                            <p class="text-xs text-gray-500">user</p>
                        </div>
                    </div>
                </div>
                
                <!-- Testimonial 3 -->
                <div class="bg-white rounded-xl shadow-lg p-6">
                    <div class="text-3xl text-gray-300 mb-4">"</div>
                    <p class="text-gray-700 text-sm leading-relaxed mb-6">
                        Dulu sulit cari alat berat yang terpercaya. Sekarang dengan Alatku, tinggal buka website dan semua solusi ada di satu tempat.
                    </p>
                    <div class="flex items-center">
                        <img src="{{ asset('images/onana.jpg') }}" class="w-10 h-10 rounded-full mr-4" alt="Chris Septian">
                        <div>
                            <p class="text-sm font-semibold text-gray-800">Onana</p>
                            <p class="text-xs text-gray-500">user</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Testimonial cards - bottom row -->
            <div class="grid grid-cols-1 md:grid-cols-3 drop-shadow-lg gap-8">
                @foreach ($Testimonials as $testimonial)
                    <div class="bg-white rounded-xl shadow-lg p-6">
                        <div class="text-3xl text-gray-300 mb-4">"</div>
                        <p class="text-gray-700 text-sm leading-relaxed mb-6">
                            {{ $testimonial->content }}
                        </p>
                        <div class="flex items-center">
                            <img src="{{ asset('images/user.png') }}" class="w-10 h-10 rounded-full mr-4" alt="{{ $testimonial->user->name }}">
                            <div>
                                <p class="text-sm font-semibold text-gray-800">{{ $testimonial->user->name }}</p>
                                <p class="text-xs text-gray-500">{{ $testimonial->user->usertype }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>


            <!-- Modal Register-->
            <div id="registerModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 opacity-0 pointer-events-none transition-all duration-300">
                <div class="bg-white rounded-lg p-8 max-w-md w-full transform scale-95 transition-all duration-300 shadow-2xl">
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
                        <p class="text-lg text-gray-700">Daftar untuk melanjutkan.</p>
                    </div>
                    <div class="flex justify-center">
                        <a href="{{ route('register') }}" class="px-6 py-2 bg-[#F86F03] text-white font-medium rounded-lg hover:bg-[#e56703] transition-all duration-300 transform hover:-translate-y-1">
                            Daftar Sekarang
                        </a>
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

    [x-cloak] { display: none !important; }

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

</style>
</html>

<script>
    
    document.addEventListener("DOMContentLoaded", function () {
        const isLoggedIn = {{ auth()->check() ? 'true' : 'false' }};
        const prevButtons = document.querySelectorAll('.carousel-prev');
        const nextButtons = document.querySelectorAll('.carousel-next');
        const modalBtn = document.getElementById('selengkapnyaBtn');
        const modal = document.getElementById('registerModal');
        const closeBtn = document.getElementById('closeModal');
        const profileDropdownToggle = document.getElementById('profileDropdownToggle');
        const profileDropdown = document.getElementById('profileDropdown');
        
        
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
            modalBtn.addEventListener('click', function(e) {
                @auth
                    // Jika user sudah login, arahkan langsung ke halaman ulasan
                    window.location.href = "{{ route('ulasan.index') }}";
                @else
                    // Jika belum login, tampilkan modal
                    openModal();
                @endauth
            });
            
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
