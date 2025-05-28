<!-- @extends('layouts.superadmin')

@section('content')
<div class="p-6 max-w-xl mx-auto">
    <h1 class="text-2xl font-semibold mb-4">Detail Carousel</h1>

    <div class="space-y-4">
        <div>
            <label class="font-medium block">Judul:</label>
            <p class="border rounded px-3 py-2">{{ $carousel->judul }}</p>
        </div>

        <div>
            <label class="font-medium block">Gambar:</label>
            <img src="{{ asset('storage/' . $carousel->gambar) }}" alt="Gambar Carousel" class="w-full rounded shadow">
        </div>

        <div>
           <label class="font-medium block">Link:</label>
            @if ($carousel->link)
                <a href="{{ $carousel->link }}" class="text-blue-500 underline" target="_blank">
                    {{ $carousel->link }}
                </a>
            @else
                <p class="text-gray-500">Tidak ada link.</p>
            @endif
        </div>`

        <div class="mt-4">
            <a href="{{ route('superadmin.carousel.index') }}" class="bg-gray-300 hover:bg-gray-400 text-black px-4 py-2 rounded">Kembali</a>
        </div>
    </div>
</div>
@endsection -->
