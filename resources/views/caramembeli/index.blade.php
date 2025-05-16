@extends('layouts.app')


@section('content')
<div class="bg-gray-100 min-h-screen w-full px-4 sm:px-6 lg:px-8 py-12"> 
    

    <div class="max-w-4xl mx-auto mt-8"> 
        
        <div class="text-center mb-10">
            <h1 class="text-4xl font-bold text-gray-800 mb-4">Cara Membeli</h1>
            <p class="text-gray-600">Ikuti langkah-langkah mudah berikut untuk melakukan pembelian di platform kami.</p>
        </div>

        <div class="space-y-6">
            @foreach ($steps as $step)
            <div class="bg-white rounded-2xl shadow-md p-6 flex items-start space-x-4 hover:shadow-lg transition-shadow duration-300">
                <div class="flex-shrink-0">
                    <div class="w-12 h-12 rounded-full bg-blue-500 text-white flex items-center justify-center text-lg font-semibold shadow">
                        {{ $step->step_number }}
                    </div>
                </div>
                <div>
                    <h2 class="text-xl font-semibold text-gray-800 mb-1">{{ $step->judul }}</h2>
                    <p class="text-gray-600">{{ $step->deskripsi }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
