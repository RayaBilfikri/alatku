<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Katalog Alat</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        #scrollContainer::-webkit-scrollbar { height: 8px; }
        #scrollContainer::-webkit-scrollbar-track { background: transparent; }
        #scrollContainer::-webkit-scrollbar-thumb { background-color: rgba(255,255,255,0.3); border-radius: 4px; }
        #scrollContainer::-webkit-scrollbar-thumb:hover { background-color: rgba(255,255,255,0.5); }
        #scrollContainer { scrollbar-color: rgba(255,255,255,0.3) transparent; scrollbar-width: thin; }
        .active-subcategory { background: linear-gradient(90deg, #ff7e00, #ff9f00); color: white; }
        .subkategori-item { color: #374151; } 
    </style>
</head>
<body class="bg-white text-gray-800 antialiased" data-products-url="{{ route('products.ajax') }}">
        <!-- Header lengkap dengan dropdown klikable -->
    <header class="flex justify-between items-center px-6 py-4 bg-gray-100">
        <div class="flex items-center">
            <img src="/images/alatku.png" alt="alatKu Logo" class="h-20 w-auto object-contain">
            <!-- Navigation menu - diposisikan langsung setelah logo (lebih ke kiri) -->
            <nav class="ml-12 font-bold flex items-center space-x-8" style="transform: translateX(300px);">
                <a href="{{ route('home') }}" class="hover:text-orange-600 font-montserrat text-sm">Beranda</a>
                <a href="{{ route('tentang-kami') }}" class="hover:text-orange-600 font-montserrat text-sm">Tentang Kami</a>
                <a href="{{ route('caramembeli') }}" class="hover:text-orange-600 font-montserrat text-sm">Bagaimana cara membeli?</a>
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

<main>
    <!-- Banner -->
    <section class="bg-cover bg-center relative" style="background-image: url('/images/46fffdf7a99c6deffc8cdd6190b26e1c43346a0e.png'); height: 300px;" aria-label="Banner Pencarian Alat">
        <div class="absolute inset-0 bg-gray-700 bg-opacity-70 flex flex-col justify-center items-center text-white text-center px-4">
            <h1 class="text-3xl md:text-4xl font-bold mb-2">Langsung Temukan, Langsung Kerja!</h1>
            <p class="mb-4">Cari alat yang anda butuhkan dengan cepat dan mulai proyek Anda tanpa hambatan.</p>
            <form action="{{ route('search') }}" method="GET" class="flex w-full max-w-xl" aria-label="Form pencarian alat">
                <div class="relative flex-1 flex items-center bg-[#D9D9D9] rounded-l-full">
                    <div class="absolute left-3 text-gray-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <circle cx="11" cy="11" r="8" stroke="currentColor" stroke-width="2" fill="none" />
                            <line x1="21" y1="21" x2="16.65" y2="16.65" stroke="currentColor" stroke-width="2" />
                        </svg>
                    </div>
                    <input 
                        type="text" 
                        id="enterInput"
                        name="q" 
                        class="w-full bg-transparent p-3 pl-10 focus:outline-none text-gray-700" 
                        placeholder="Apa yang anda butuhkan untuk proyek ini?" 
                        autocomplete="off"
                        aria-label="Pencarian alat"
                    />
                </div>
                <button id="searchBtn" type="submit" class="bg-orange-500 hover:bg-orange-600 text-white px-6 py-3 rounded-r-full">
                    Cari
                </button>
            </form>
        </div>
    </section>

    <!-- Kategori -->
 
    <section class="bg-gradient-to-r from-[#525FE1] to-[#596DFF] py-10 px-4 text-white" aria-label="Kategori Alat">
        <div class="w-full px-4 mx-auto">
            <h2 class="text-xl md:text-2xl font-semibold mb-4">Jelajahi Kategori Alat Siap Pakai</h2>
            <p class="mb-6">Jelajahi koleksi peralatan industri dan konstruksi berkualitas untuk menunjang pekerjaan Anda</p>
            <nav id="scrollContainer" class="overflow-x-auto overflow-y-hidden scroll-smooth pb-5" role="navigation">
                <div class="flex gap-4 w-max px-10">
                    @foreach ($categories as $category)
                        <a 
                            href="#"
                            class="kategori-link bg-white text-gray-800 rounded-2xl shadow-md flex flex-col items-center justify-center px-4 py-4 w-[140px] text-center transition-all duration-300 hover:bg-yellow-200 hover:ring-1 hover:ring-orange-400"
                            data-kategori="{{ $category->name }}"
                            data-subkategori="{{ $category->subCategories->pluck('name') }}"
                            aria-label="Kategori {{ $category->name }}"
                        >
                            <img src="{{ asset('storage/' . $category->icon) }}" alt="{{ $category->name }}" class="h-30 mb-2" loading="lazy" />
                            <span class="text-sm font-medium break-words leading-tight">{{ $category->name }}</span>
                        </a>
                    @endforeach
                </div>
            </nav>
        </div>

        <section id="subCategoryContainer" class="bg-white shadow-md rounded-3xl mx-6 my-6 p-4 hidden" aria-label="Subkategori Alat">
            <h3 class="text-lg font-semibold text-gray-700 mb-3">Subkategori</h3>
            <ul id="subCategoryList" class="flex flex-wrap gap-3"></ul>
        </section>
    </section>

    <!-- Produk -->
    <section id="productContainerWrapper" class="p-6">
        <div class="max-w-7xl mx-auto text-center mb-10">
            <h2 class="text-xl md:text-2xl font-semibold mb-2 text-black">Temukan Alat Siap Pakai Untuk Pekerjaaan Anda</h2>
            <p class="text-black">Jelajahi koleksi peralatan industri dan konstruksi berkualitas untuk menunjang pekerjaan Anda</p>
        </div>
        <section id="productContainer" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4" aria-label="Daftar Produk"></section>
    </section>
</main>


<script>
    document.addEventListener("DOMContentLoaded", () => {
        const kategoriLinks = document.querySelectorAll(".kategori-link");
        const productContainer = document.getElementById("productContainer");
        const searchForm = document.querySelector('form[action*="search"]');
        const searchInput = searchForm.querySelector('input[name="q"]');
        const subContainer = document.getElementById('subCategoryContainer');
        const subList = document.getElementById('subCategoryList');
        const productContainerWrapper = document.getElementById("productContainerWrapper");
        const enterInput = document.getElementById('enterInput');
        

        let currentCategory = null;
        let currentSubcategory = null;
        let currentKeyword = null;

        async function fetchAndRenderProducts() {
            const url = new URL(document.body.dataset.productsUrl);
            if (currentCategory) url.searchParams.set('category', currentCategory);
            if (currentSubcategory) url.searchParams.set('subcategory', currentSubcategory);
            if (currentKeyword) url.searchParams.set('q', currentKeyword);

            const renderEmptyState = (message) => {
                return `
                    <div class="col-span-full flex flex-col items-center justify-center text-center w-full py-12">
                        <img src="/images/notfound.png" alt="Empty" class="w-40 h-40 mb-6 opacity-70" loading="lazy" />
                        <p class="text-lg text-black font-semibold">${message}</p>
                    </div>
                `;
            };

            try {
                const response = await fetch(url);
                const data = await response.json();

                if (!Array.isArray(data)) {
                    console.error("Unexpected data format", data);
                    productContainer.innerHTML = renderEmptyState("Data tidak valid.");
                    return;
                }

                productContainer.innerHTML = data.length
                    ? data.map(renderProduct).join("")
                    : renderEmptyState("Ooops! Kayaknya produk yang Anda cari tidak ada nih:(");

                // Tambahkan justify-center hanya jika produk lebih dari 4
                if (data.length > 4) {
                    productContainerWrapper.classList.add("justify-center");
                } else {
                    productContainerWrapper.classList.remove("justify-center");
                }

            } catch (error) {
                productContainer.innerHTML = renderEmptyState("Gagal memuat produk. Silakan coba lagi nanti.");
                console.error('Fetch error:', error);
            }
        }

        function renderProduct(item) {
            return `
            <div class="flex">
                <a href="/catalog/${item.id}" class="block w-full h-full" aria-label="Lihat detail produk ${item.name}">
                    <div class="bg-white rounded-3xl shadow-lg overflow-hidden transition-transform duration-300 hover:shadow-xl hover:scale-105 flex flex-col">
                        <div class="px-4 pt-4">
                            <img src="/storage/${item.gambar}" alt="${item.name}" class="w-full h-48 object-cover rounded-2xl shadow-sm" loading="lazy" />
                        </div>
                        <div class="p-4 flex flex-col flex-grow">
                            <h3 class="font-semibold text-md text-gray-800 truncate">${item.name}</h3>
                            <p class="text-sm text-gray-600">Kategori: ${item.sub_category?.category?.name ?? '-'}</p>
                    
                            <div class="flex justify-between gap-2 text-sm font-medium mt-3">
                                <div class="bg-[#596DFF] text-white px-3 py-1 rounded-xl w-1/2 text-center shadow-sm">
                                    <p class="text-xs flex justify-center items-center gap-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                        Tahun
                                    </p>
                                    <p class="text-sm font-semibold">${item.year_of_build}</p>
                                </div>
                                <div class="bg-[#596DFF] text-white px-3 py-1 rounded-xl w-1/2 text-center shadow-sm">
                                    <p class="text-xs flex justify-center items-center gap-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        Jam operasi
                                    </p>
                                    <p class="text-sm font-semibold">${item.hours_meter} jam</p>
                                </div>
                            </div>
                        </div>
                        <div class="bg-gradient-to-r from-orange-500 to-orange-400 text-white text-center font-bold text-lg py-2 rounded-xl mt-2 shadow-md mx-4 mb-4">
                            Rp${Number(item.harga).toLocaleString("id-ID")}
                        </div>
                    </div>
                </a>
            </div>
            `;
        }

        function clearActiveSubcategories() {
            document.querySelectorAll('.active-subcategory').forEach(el => el.classList.remove('active-subcategory'));
        }

        kategoriLinks.forEach(link => {
            link.addEventListener('click', (e) => {
                e.preventDefault();
                const label = link.dataset.kategori;
                const subkategoriList = JSON.parse(link.dataset.subkategori.replace(/'/g, '"'));

                subList.innerHTML = "";

                if (currentCategory === label) {
                    currentCategory = null;
                    currentSubcategory = null;
                    subContainer.classList.add('hidden');
                    clearActiveSubcategories();
                    fetchAndRenderProducts();
                    return;
                }

                subkategoriList.forEach(name => {
                    const item = document.createElement('li');
                    item.textContent = name;
                    item.className = "subkategori-item cursor-pointer px-3 py-1 rounded-full bg-gray-100 hover:bg-orange-400 hover:text-white";
                    item.addEventListener('click', () => {
                        clearActiveSubcategories();
                        item.classList.add('active-subcategory');
                        currentSubcategory = name;
                        fetchAndRenderProducts();
                    });
                    subList.appendChild(item);
                });

                subContainer.classList.remove('hidden');
                currentCategory = label;
                currentSubcategory = null;
                clearActiveSubcategories();
                fetchAndRenderProducts();
            });
        });

        searchForm.addEventListener("submit", (e) => {
            e.preventDefault();
            currentKeyword = searchInput.value.trim();
            fetchAndRenderProducts();
        });

        fetchAndRenderProducts();
    });

    document.getElementById('searchBtn').addEventListener('click', function () {
        // Tunggu sebentar agar hasil pencarian sempat dimuat dulu
        setTimeout(function () {
            const pagination = document.getElementById('pagination');
            if (pagination) {
                pagination.scrollIntoView({ behavior: 'smooth' });
            }
        }, 300);
    });
    
    searchInput.addEventListener('keypress', function (e) {
        if (e.key === 'Enter') {
            e.preventDefault();
            searchBtn.click(); // Pencet tombol cari (biar query jalan)
            
            setTimeout(function () {
                const pagination = document.getElementById('pagination');
                if (pagination) {
                    pagination.scrollIntoView({ behavior: 'smooth' });
                }
            }, 300); // Delay untuk nunggu hasil
        }
    });
</script>
</body>

</html>
