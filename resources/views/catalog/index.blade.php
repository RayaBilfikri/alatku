@extends('layouts.app')

@section('content')
<body class="bg-white text-gray-800 antialiased" data-products-url="{{ route('products.ajax') }}">
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

<style>
    #scrollContainer::-webkit-scrollbar { height: 8px; }
    #scrollContainer::-webkit-scrollbar-track { background: transparent; }
    #scrollContainer::-webkit-scrollbar-thumb { background-color: rgba(255,255,255,0.3); border-radius: 4px; }
    #scrollContainer::-webkit-scrollbar-thumb:hover { background-color: rgba(255,255,255,0.5); }
    #scrollContainer { scrollbar-color: rgba(255,255,255,0.3) transparent; scrollbar-width: thin; }
    .active-subcategory { background: linear-gradient(90deg, #ff7e00, #ff9f00); color: white; }
    .subkategori-item { color: #374151; } 
</style>
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
@endsection
