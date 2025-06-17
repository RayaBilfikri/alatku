@extends('layouts.app')

@section('content')
<div class="bg-white min-h-screen w-full px-4 sm:px-6 lg:px-8 py-12 pt-20">

    <div class="max-w-3xl mx-auto">
        <div class="text-center mb-10 pt-20">
            <h1 class="text-3xl sm:text-4xl font-bold text-gray-800 mb-3">Cara Membeli</h1>
            <p class="text-gray-600 sm:text-base text-sm">Ikuti langkah-langkah mudah berikut untuk melakukan pembelian alat berat di platform kami.</p>
        </div>

        <div class="space-y-6">
            @foreach ($steps as $step)
            <div class="bg-white border border-orange-300 rounded-2xl shadow-sm p-5 sm:p-6 flex flex-col sm:flex-row items-center sm:items-start space-y-3 sm:space-y-0 sm:space-x-5 hover:shadow-lg transition-shadow duration-300">
                <div class="flex-shrink-0">
                    <div class="w-12 h-12 rounded-full bg-orange-500 text-white flex items-center justify-center text-lg font-bold shadow-md ring-2 ring-orange-400">
                        {{ $step->step_number }}
                    </div>
                </div>
                <div class="flex-1 text-center sm:text-left">
                    <h2 class="text-lg sm:text-xl font-semibold text-gray-800 mb-1">{{ $step->judul }}</h2>
                    <p class="text-gray-600 sm:text-base text-sm">{{ $step->deskripsi }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection