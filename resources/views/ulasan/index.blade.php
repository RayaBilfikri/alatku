@extends('layouts.app')

@section('content')
<div class="bg-gray-100 py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-3xl font-bold text-center mb-12">Traction/testimonial</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
            @foreach($ulasans as $ulasan)
                <div class="bg-white rounded-xl shadow-lg p-6">
                    <div class="text-3xl text-gray-400 mb-4">“</div>
                    <p class="text-gray-700 text-sm leading-relaxed mb-6">
                        {{ $ulasan->content }}
                    </p>
                    <div class="flex items-center border-t pt-4">
                        <img src="{{ $ulasan->user_avatar }}" class="w-10 h-10 rounded-full mr-4" alt="Avatar">
                        <div>
                            <p class="text-sm font-semibold text-gray-800">{{ $ulasan->user_name }}</p>
                            <p class="text-xs text-gray-500">Pelanggan</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection


