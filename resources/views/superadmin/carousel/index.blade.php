@extends('layouts.superadmin')

@section('content')
<div class="p-6">
    <div class="bg-white rounded-lg shadow p-6">
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-bold">Data Carousel</h1>
        <a href="{{ route('superadmin.carousel.create') }}"
            class="bg-blue-700 text-white px-4 py-2 rounded hover:bg-blue-800 flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 4v16m8-8H4"/>
            </svg>
            Tambah 
        </a>
    </div>

    <!-- @if(session('success'))
        <div class="mb-4 p-4 bg-green-100 text-green-700 rounded">
            {{ session('success') }}
        </div>
    @endif -->

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
                                <a href="{{ route('superadmin.carousel.edit', $carousel->id_carousel) }}" class="text-yellow-600 hover:underline">Edit</a>
                                <form action="{{ route('superadmin.carousel.destroy', $carousel->id_carousel) }}" method="POST" class="delete-form inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:underline">Hapus</button>
                                </form>

                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="p-4 text-center text-gray-500">Data tidak ada</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection

<!-- sweet alert -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready(function () {
        $('.delete-form').on('submit', function (e) {
            e.preventDefault(); // Mencegah form submit langsung

            const form = this; // Simpan referensi form

            Swal.fire({
                title: 'Yakin ingin menghapus?',
                text: "Data yang dihapus tidak dapat dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Ya, hapus!'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    });
</script>

<!-- notif berhasil -->
@if (session('success'))
    <script>
        $(document).ready(function () {
            Swal.fire({
                title: 'Berhasil!',
                text: '{{ session('success') }}',
                icon: 'success',
                confirmButtonColor: '#3085d6',
                timer: 2500,
                showConfirmButton: false
            });
        });
    </script>
@endif
