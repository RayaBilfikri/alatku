@extends('layouts.backend')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Data Carousel</h4>
        </div>
        <div class="card-body">
            <div class="flex justify-end mb-4">
                <a href="{{ route('superadmin.carousel.create') }}" class="shadow btn btn-primary btn-sm">
                    Tambah
                </a>
                <div class="table-responsive">
                    <table class="table table-bordered" id="table">
                        <thead>
                            <tr>
                                <th class="px-4 py-2 border">No</th>
                                <th class="px-4 py-2 border">Judul</th>
                                <th class="px-4 py-2 border">Gambar</th>
                                <th class="px-4 py-2 border">Link</th>
                                <th class="px-4 py-2 border">Status</th>
                                <th class="px-4 py-2 border">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($carousels as $index => $carousel)
                            <tr class="text-center">
                                <td class="px-4 py-2 border">{{ $index + 1 }}</td>
                                <td class="px-4 py-2 border">{{ $carousel->judul }}</td>
                                <td class="px-4 py-2 border">
                                    @if ($carousel->gambar)
                                    <img src="{{ asset('storage/' . $carousel->gambar) }}" alt="Gambar" style="height: 50px;">
                                    @else
                                    <span class="text-muted"><i>Gambar tidak tersedia</i></span>
                                    @endif
                                </td>
                                <td class="px-4 py-2 border">
                                    @if ($carousel->link)
                                    <a href="{{ $carousel->link }}" target="_blank" class="text-primary">Lihat</a>
                                    @else
                                    <span class="text-muted"><i>Tidak ada</i></span>
                                    @endif
                                </td>
                                <td class="px-4 py-2 border">
                                    @if ($carousel->status === 'aktif')
                                    <span class="badge bg-success">Aktif</span>
                                    @else
                                    <span class="badge bg-danger">Nonaktif</span>
                                    @endif
                                </td>
                                <td class="px-4 py-2 border text-center">
                                    <div class="d-inline-flex gap-2">
                                        @if ($carousel->gambar)
                                        <button type="button"
                                            class="shadow btn btn-warning btn-sm"
                                            data-bs-toggle="modal"
                                            data-bs-target="#imageModal"
                                            data-image="{{ asset('storage/' . $carousel->gambar) }}">
                                            Lihat
                                        </button>
                                        @else
                                        <button type="button"
                                            class="btn btn-secondary btn-sm"
                                            disabled>
                                            Lihat
                                        </button>
                                        @endif

                                        <a href="{{ route('superadmin.carousel.edit', $carousel->id_carousel) }}"
                                            class="shadow btn btn-success btn-sm">Edit</a>

                                        <form action="{{ route('superadmin.carousel.destroy', $carousel->id_carousel) }}"
                                            method="POST" class="d-inline">
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
                                <td colspan="6" class="text-center py-4">Data tidak ada</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Modal untuk menampilkan gambar -->
        <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="imageModalLabel">Gambar Carousel</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-center">
                        <img id="modalImage" src="" alt="Gambar" class="img-fluid" style="max-height: 300px;">
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