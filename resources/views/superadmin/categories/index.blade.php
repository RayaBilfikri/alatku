@extends('layouts.backend')

@section('content')

<div class="container">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Data Kategori</h4>
        </div>
        <div class="card-body">
            <div class="flex justify-end mb-4">
                <a href="{{ route('superadmin.categories.create') }}" class="shadow btn btn-primary btn-sm">
                    Tambah
                </a>
                <div class="table-responsive">
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
                                <td class="px-4 py-2 border">{{ $categories->firstItem() + $index }}</td>
                                <td class="px-4 py-2 border">{{ $category->name }}</td>
                                <td class="px-4 py-2 border">
                                    @if($category->icon)
                                    <img src="{{ asset('storage/' . $category->icon) }}" alt="Icon" style="height: 50px;">
                                    @else
                                    <span class="text-muted"><i>Gambar tidak tersedia</i></span>

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
                                <td class="px-4 py-2 border">{{  $categories->firstItem() + $index  }}</td>
                                <td class="px-4 py-2 border">{{ $category->name }}</td>
                                <td class="px-4 py-2 border">
                                    @if ($category->icon)
                                        <img src="{{ asset('storage/' . $category->icon) }}" alt="Icon" style="height: 50px;">
                                    @else
                                        <span class="text-muted"><i>Gambar tidak tersedia</i></span>

                                    @endif
                                </td>
                                <td class="px-4 py-2 border text-center">
                                    <div class="d-inline-flex gap-2">
                                        @if ($category->icon)
                                        <button type="button"
                                            class="shadow btn btn-warning btn-sm"
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
                                            class="btn btn-success btn-sm shadow">Edit</a>

                                        <form action="{{ route('superadmin.categories.destroy', $category->id) }}"

                                            method="POST" class="d-inline">

                                              method="POST" class="d-inline delete-form">

                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="shadow btn btn-danger btn-sm btn-delete">
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

                        @endforelse
                    </tbody>
                </table>
                <div class="mt-4">
                    {{ $categories->onEachSide(1)->links('vendor.pagination.bootstrap-4') }}

                </div>
            </div>
        </div>


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
            imageModal.addEventListener('show.bs.modal', function(event) {
                const button = event.relatedTarget;
                const imageSrc = button.getAttribute('data-image');
                const modalImage = imageModal.querySelector('#modalImage');
                modalImage.src = imageSrc;
            });
        </script>
        @endpush
        @endsection

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
        // Sweet Alert untuk konfirmasi hapus
        $(document).ready(function () {
            $('.delete-form').on('submit', function (e) {
                e.preventDefault();
                const form = this;

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

        // Modal image handler
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

