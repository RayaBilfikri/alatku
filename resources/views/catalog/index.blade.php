<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Katalog Alat</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-white text-gray-800">

    <!-- Header -->
    <div class="bg-cover bg-center relative" style="background-image: url('/images/46fffdf7a99c6deffc8cdd6190b26e1c43346a0e.png'); height: 300px;">
        <div class="absolute inset-0 bg-gray-700 bg-opacity-70 flex flex-col justify-center items-center text-white text-center px-4">
            <h1 class="text-3xl md:text-4xl font-bold mb-2">Langsung Temukan, Langsung Kerja!</h1>
            <p class="mb-4">Cari alat yang anda butuhkan dengan cepat dan mulai proyek Anda tanpa hambatan.</p>
            
            <!-- Form untuk search -->
            <form action="{{ route('search') }}" method="GET" class="flex w-full max-w-xl">
                <div class="relative flex-1 flex items-center bg-[#D9D9D9] rounded-l-full">
                    <div class="absolute left-3 text-gray-500">
                        <!-- Ikon search -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                            <circle cx="11" cy="11" r="8"></circle>
                            <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                        </svg>
                    </div>
                    <input 
                        type="text" 
                        name="q" 
                        class="w-full bg-transparent p-3 pl-10 focus:outline-none text-gray-700" 
                        placeholder="Apa yang anda butuhkan untuk proyek ini?"
                        autocomplete="off"
                    >
                </div>
                <button type="submit" class="bg-orange-500 hover:bg-orange-600 text-white px-6 py-3 rounded-r-full">Cari</button>
            </form>
        </div>
    </div>

    <!-- Kategori -->
    <div class="bg-indigo-600 py-10 px-4 text-white">
        <div class="max-w-screen-xl mx-auto">
            <h2 class="text-xl md:text-2xl font-semibold mb-4">Jelajahi Kategori Alat Siap Pakai</h2>
            <p class="mb-6">Jelajahi koleksi peralatan industri dan konstruksi berkualitas untuk menunjang pekerjaan Anda</p>
            
            <div class="overflow-x-auto">
                <div class="flex gap-4 w-max px-1">
                    @foreach ([
                        ['src' => 'tugboat.png', 'label' => 'Tugboats', 'link' => '#'],
                        ['src' => 'barge.png', 'label' => 'Barge', 'link' => '#'],
                        ['src' => 'heavy-equipment.png', 'label' => 'Heavy Equipment', 'link' => '#'],
                        ['src' => 'material-handling.png', 'label' => 'Material Handling', 'link' => '#'],
                        ['src' => 'genset.png', 'label' => 'Generating Set', 'link' => '#'],
                        ['src' => 'heavy-construction.png', 'label' => 'Heavy Construction Equipment', 'link' => '#']
                    ] as $item)
                        <a href="{{ $item['link'] }}"
                            class="bg-white text-gray-800 rounded-2xl shadow-md flex flex-col items-center justify-center px-4 py-4 w-[140px] text-center transition-all duration-300 hover:bg-yellow-200 hover:ring-1 hover:ring-orange-400">
                            <img src="/images/{{ $item['src'] }}" class="h-30 mb-2" alt="{{ $item['label'] }}">
                            <span class="text-sm font-medium break-words leading-tight">{{ $item['label'] }}</span>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>


    <!-- Produk -->
    <div class="py-10 px-4 bg-[#EEF1FF]">
        <div class="max-w-screen-xl mx-auto">
            <h2 class="text-xl md:text-2xl font-semibold mb-4 text-gray-800">Jelajahi Produk Terbaru</h2>
            <p class="mb-6 text-gray-600">Koleksi alat terbaru kami siap membantu proyek Anda lebih efisien.</p>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @for ($i = 0; $i < 8; $i++)
                <div class="bg-white rounded-3xl shadow-lg overflow-hidden">
                    <div class="px-4 pt-4">
                        <img src="/images/46fffdf7a99c6deffc8cdd6190b26e1c43346a0e.png"
                            alt="Komatsu PC135F-10MO"
                            class="w-full h-48 object-cover rounded-2xl shadow-sm" />
                    </div>
                    <div class="p-4 space-y-3">
                        <h3 class="font-semibold text-md text-gray-800">Komatsu Excavator PC135F-10MO</h3>
                        <p class="text-sm text-gray-600 flex items-center">
                            <svg xmlns="" class="w-4 h-4 mr-1 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 12.414M5.586 8.586A2 2 0 015.586 5.586L5.586 5.586a2 2 0 010-2.828L6.172 2H3a1 1 0 00-1 1v3.172l.758.758a2 2 0 012.828 0l.758.758z" />
                            </svg>
                            Tangerang, Indonesia
                        </p>

                        <div class="flex justify-between gap-2 text-sm font-medium">
                            <div class="bg-[#596DFF] text-white px-3 py-1 rounded-xl w-1/2 text-center shadow-sm">
                                <p class="text-xs">Tahun</p>
                                <p class="text-sm font-semibold">2023</p>
                            </div>
                            <div class="bg-[#596DFF] text-white px-3 py-1 rounded-xl w-1/2 text-center shadow-sm">
                                <p class="text-xs">Jam operasi</p>
                                <p class="text-sm font-semibold">2.824 jam</p>
                            </div>
                        </div>

                        <div class="bg-gradient-to-r from-orange-500 to-orange-400 text-white text-center font-bold text-lg py-2 rounded-xl mt-2 shadow-md">
                            Rp430.000.000
                        </div>
                    </div>
                </div>
                @endfor
            </div>
        </div>
    </div>



</body>
</html>
