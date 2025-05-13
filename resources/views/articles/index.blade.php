@extends('layouts.superadmin')

@section('content')
<div class="flex h-screen">
    <main class="flex-1 bg-gray-50 p-6 overflow-y-auto">
        <div class="bg-white p-6 rounded shadow">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-xl font-bold">Data Artikel</h2>
                <a href="{{ route('articles.create') }}"
                   class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                         viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M12 4v16m8-8H4"/>
                    </svg>
                    Tambah
                </a>
            </div>

            <div class="overflow-x-auto rounded border">
                <table class="min-w-full bg-white border">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-4 py-2 border text-left">Judul</th>
                            <th class="px-4 py-2 border text-left">Konten</th>
                            <th class="px-4 py-2 border text-left">Gambar</th>
                            <th class="px-4 py-2 border text-left">Tanggal</th>
                            <th class="px-4 py-2 border text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($articles as $article)
                            <tr>
                                <td class="px-4 py-2 border">{{ $article->judul }}</td>
                                <td class="px-4 py-2 border">
                                    {{ Str::limit(strip_tags($article->konten_artikel), 100) }}
                                </td>
                                <td class="px-4 py-2 border">
                                    @if($article->gambar)
                                        <img src="{{ asset('storage/'.$article->gambar) }}" alt="Gambar" class="w-16 h-16 object-cover rounded shadow">
                                    @else
                                        <span class="text-gray-400 italic">Tidak ada gambar</span>
                                    @endif
                                </td>
                                <td class="px-4 py-2 border">{{ $article->tanggal_publish }}</td>
                                <td class="px-4 py-2 border text-center space-x-1">
                                    <a href="{{ route('articles.edit', $article->id_articles) }}"
                                    class="bg-green-600 hover:bg-green-700 text-white px-3 py-1 rounded">Edit</a>
                                    <form action="{{ route('articles.destroy', $article->id_articles) }}"
                                        method="POST"
                                        class="delete-article-form inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded show-confirm-delete">
                                            Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center py-4 text-gray-500">Data tidak ada</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </main>
</div>
@endsection

<!-- sweet alert -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready(function () {
        $('.delete-article-form').on('submit', function (e) {
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
