@extends('layouts.superadmin')

@section('content')
<div class="p-6">
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-bold">Data Carousel</h1>
        <a href="{{ route('carousel.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Tambah Carousel</a>
    </div>

    @if(session('success'))
        <div class="mb-4 p-4 bg-green-100 text-green-700 rounded">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border rounded shadow">
            <thead class="bg-gray-100">
                <tr>
                    <th class="p-2 border">No</th>
                    <th class="p-2 border text-left">Judul</th>
                    <th class="p-2 border text-left">Gambar</th>
                    <th class="p-2 border text-left">Link</th>
                    <th class="p-2 border text-left">Status</th>
                    <th class="p-2 border text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($carousels as $key => $carousel)
                    <tr class="border-t">
                        <td class="p-2 border text-center">{{ $key + 1 }}</td>
                        <td class="p-2 border">{{ $carousel->judul }}</td>
                        <td class="p-2 border">
                            <img src="{{ asset('storage/' . $carousel->gambar) }}" alt="Gambar" class="h-16 rounded shadow" />
                        </td>
                        <td class="p-2 border">
                            @if ($carousel->link)
                                <a href="{{ $carousel->link }}" target="_blank" class="text-blue-500 underline">Lihat</a>
                            @else
                                <span class="text-gray-400 italic">Tidak ada</span>
                            @endif
                        </td>
                        <td class="p-2 border">
                            @if ($carousel->status === 'aktif')
                                <span class="px-2 py-1 bg-green-200 text-green-800 rounded text-sm">Aktif</span>
                            @else
                                <span class="px-2 py-1 bg-red-200 text-red-800 rounded text-sm">Nonaktif</span>
                            @endif
                        </td>
                        <td class="p-2 border text-center">
                            <div class="flex justify-center space-x-2">
                                <a href="{{ route('carousel.edit', $carousel->id_carousel) }}" class="text-yellow-600 hover:underline">Edit</a>
                                <form action="{{ route('carousel.destroy', $carousel->id_carousel) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="text-red-600 hover:underline">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="p-4 text-center text-gray-500">Tidak ada data carousel.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
