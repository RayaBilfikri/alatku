{{-- resources/views/catalog/index.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="bg-cover bg-center relative" style="background-image: url('/images/header-bg.jpg'); height: 300px;">
    <div class="absolute inset-0 bg-gray-700 bg-opacity-70 flex flex-col justify-center items-center text-white text-center px-4">
        <h1 class="text-3xl md:text-4xl font-bold mb-2">Langsung Temukan, Langsung Kerja!</h1>
        <p class="mb-4">Cari alat yang anda butuhkan dengan cepat dan mulai proyek Anda tanpa hambatan.</p>
        
        <!-- Form untuk search -->
        <form action="{{ route('search') }}" method="GET" class="flex w-full max-w-xl">
            <div class="relative flex-1 flex items-center bg-[#D9D9D9] rounded-l-full">
                <!-- Ikon search di sebelah kiri -->
                <div class="absolute left-3 text-gray-500">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
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

<div class="bg-indigo-600 py-10 px-4 text-white">
    <h2 class="text-xl md:text-2xl font-semibold mb-4">Jelajahi Kategori Alat Siap Pakai</h2>
    <p class="mb-6">Jelajahi koleksi peralatan industri dan konstruksi berkualitas untuk menunjang pekerjaan Anda</p>
    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-6 gap-4 text-center">
        <div class="flex flex-col items-center">
            <img src="/icons/tugboat.png" class="h-12 mb-2" alt="Tugboats">
            <span>Tugboats</span>
        </div>
        <div class="flex flex-col items-center">
            <img src="/icons/barge.png" class="h-12 mb-2" alt="Barge">
            <span>Barge</span>
        </div>
        <div class="flex flex-col items-center">
            <img src="/icons/heavy-equipment.png" class="h-12 mb-2" alt="Heavy Equipment">
            <span>Heavy Equipment</span>
        </div>
        <div class="flex flex-col items-center">
            <img src="/icons/material-handling.png" class="h-12 mb-2" alt="Material Handling">
            <span>Material Handling</span>
        </div>
        <div class="flex flex-col items-center">
            <img src="/icons/genset.png" class="h-12 mb-2" alt="Generating Set">
            <span>Generating Set</span>
        </div>
        <div class="flex flex-col items-center">
            <img src="/icons/heavy-construction.png" class="h-12 mb-2" alt="Heavy Construction Equipment">
            <span>Heavy Construction</span>
        </div>
    </div>
</div>

<div class="py-10 px-4 bg-gray-100">
    <h2 class="text-xl md:text-2xl font-semibold mb-4">Jelajahi Kategori Alat Siap Pakai</h2>
    <p class="mb-6">Jelajahi koleksi peralatan industri dan konstruksi berkualitas untuk menunjang pekerjaan Anda</p>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @for ($i = 0; $i < 8; $i++)
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <img src="/images/excavator.jpg" alt="Komatsu PC135F-10MO" class="w-full h-40 object-cover">
            <div class="p-4">
                <h3 class="font-semibold text-md mb-1">Komatsu Excavator PC135F-10MO</h3>
                <p class="text-sm text-gray-600 mb-2">📍 Tangerang, Indonesia</p>
                <div class="flex items-center text-sm text-gray-700 mb-2">
                    <span class="mr-2 bg-blue-100 text-blue-700 px-2 py-1 rounded-full text-xs">2023</span>
                    <span class="mr-2 bg-blue-100 text-blue-700 px-2 py-1 rounded-full text-xs">2.226 jam</span>
                </div>
                <div class="text-orange-500 font-bold text-lg">
                    Rp430.000.000
                </div>
            </div>
        </div>
        @endfor
    </div>
</div>
@endsection
