@extends('layouts.backend')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Data Kategori</h4>
            </div>
            <div class="card-body">
                <div class="flex justify-end mb-4">
                    <a href="{{ route('superadmin.categories.create') }}" class="btn btn-primary btn-sm">
                        Tambah
                    </a>
                </div>
                <table class="table table-bordered" id="table">
                    <thead>
                        <tr>
                            <th class="px-4 py-2 border">No</th>
                            <th class="px-4 py-2 border">Nama Kategori</th>
                            <th class="px-4 py-2 border">Ikon</th>
                            <th class="px-4 py-2 border">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    
                        @forelse($categories as $index => $category)
                            <tr class="text-center">
                                <td class="px-4 py-2 border">{{ $index + 1 }}</td>
                                <td class="px-4 py-2 border">{{ $category->name }}</td>
                                <td class="px-4 py-2 border">
                                    @if ($category->icon)
                                        <img src="{{ asset('storage/' . $category->icon) }}" alt="Icon" style="height: 50px;">
                                    @else
                                        <span class="text-muted"><i>Gambar tidak tersedia</i></span>

                    @foreach($categories as $index => $category)
                        <tr class="text-center">
                            <td class="px-4 py-2 border">{{ $categories->firstItem() + $index }}</td>
                            <td class="px-4 py-2 border">{{ $category->name }}</td>
                            <td class="px-4 py-2 border">
                                @if($category->icon)
                                    <img src="{{ asset('storage/' . $category->icon) }}" alt="Icon" class="h-20 mx-auto">
                                @else

                                @endif
                            </td>
                            <td class="px-4 py-2 border">
                                <div class="flex justify-center items-center space-x-2">
                                    <a href="{{ route('superadmin.categories.edit', $category->id) }}"
                                       class="bg-green-600 hover:bg-green-700 text-white px-3 py-1 rounded focus:outline-none border-none">Edit</a>

                                    <form action="{{ route('superadmin.categories.destroy', $category->id) }}"
                                        method="POST"
                                        class="delete-form inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded focus:outline-none border-none">
                                            Hapus
                                        </button>
                                    </form>

                                    @if($category->icon)
                                        <button onclick="showModal('{{ asset('storage/' . $category->icon) }}')"
                                                class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded flex items-center justify-center focus:outline-none border-none">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                                 viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                      d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                      d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                            </svg>
                                        </button>

                                    @endif
                                </td>
                                <td class="px-4 py-2 border text-center">
                                    <div class="d-inline-flex gap-2">
                                        <!-- Button lihat gambar -->
                                        @if ($category->icon)
                                            <button type="button"
                                                    class="btn btn-warning btn-sm"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#imageModal"
                                                    data-image="{{ asset('storage/' . $category->icon) }}">
                                                Lihat
                                            </button>
                                        @else
                                            <button type="button"
                                                    class="btn btn-secondary btn-sm"
                                                    disabled>
                                                Lihat
                                            </button>
                                        @endif

                                        <a href="{{ route('superadmin.categories.edit', $category->id) }}"
                                           class="btn btn-success btn-sm">Edit</a>

                                        <form action="{{ route('superadmin.categories.destroy', $category->id) }}"
                                              method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm btn-delete">
                                                Hapus
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center py-4">Data tidak ada</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                <div class="mt-4">
                    {{ $categories->links('pagination::tailwind') }}
                </div>
            </div>
        </div>
    </div>

    <!-- Modal untuk menampilkan gambar -->
    <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="imageModalLabel">Ikon Kategori</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body text-center">
            <img id="modalImage" src="" alt="Ikon" class="img-fluid" style="max-height: 300px;">
        </div>
        </div>
    </div>
    </div>

    @push('scripts')
    <script>
        const imageModal = document.getElementById('imageModal');
        imageModal.addEventListener('show.bs.modal', function (event) {
            const button = event.relatedTarget;
            const imageSrc = button.getAttribute('data-image');
            const modalImage = imageModal.querySelector('#modalImage');
            modalImage.src = imageSrc;
        });
    </script>
    @endpush


@endsection
