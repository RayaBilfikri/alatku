@extends('layouts.backend')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Data Artikel</h4>
            </div>
            <div class="card-body">
                <div class="flex justify-end mb-4">
                    <a href="{{ route('superadmin.articles.create') }}" class="btn btn-primary btn-sm">
                        Tambah
                    </a>
                </div>
                <table class="table table-bordered" id="table">
                    <thead>
                        <tr>
                            <th class="px-4 py-2 border">No</th>
                            <th class="px-4 py-2 border">Judul</th>
                            <th class="px-4 py-2 border">Konten</th>
                            <th class="px-4 py-2 border">Tanggal Publish</th>
                            <th class="px-4 py-2 border">Gambar</th>
                            <th class="px-4 py-2 border">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($articles as $index => $article)
                            <tr class="text-center">
                                <td class="px-4 py-2 border">{{ $index + 1 }}</td>
                                <td class="px-4 py-2 border">{{ $article->judul }}</td>
                                <td class="px-4 py-2 border">{{ $article->konten_artikel }}</td>
                                <td class="px-4 py-2 border">{{ $article->tanggal_publish }}</td>
                                <td class="px-4 py-2 border">
                                    @if ($article->gambar)
                                        <img src="{{ asset('storage/' . $article->gambar) }}" alt="Gambar" style="height: 50px;">
                                    @else
                                        <span class="text-muted"><i>Gambar tidak tersedia</i></span>
                                    @endif
                                </td>
                                <td class="px-4 py-2 border text-center">
                                    <div class="d-inline-flex gap-2">
                                        @if ($article->gambar)
                                            <button type="button"
                                                    class="btn btn-warning btn-sm"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#imageModal"
                                                    data-image="{{ asset('storage/' . $article->gambar) }}">
                                                Lihat
                                            </button>
                                        @else
                                            <button type="button"
                                                    class="btn btn-secondary btn-sm"
                                                    disabled>
                                                Lihat
                                            </button>
                                        @endif

                                        <a href="{{ route('superadmin.articles.edit', $article->id_articles) }}"
                                           class="btn btn-success btn-sm">Edit</a>

                                        <form action="{{ route('superadmin.articles.destroy', $article->id_articles) }}"
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
                                <td colspan="5" class="text-center py-4">Belum ada artikel.</td>
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
                    <h5 class="modal-title" id="imageModalLabel">Gambar Artikel</h5>
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
        imageModal.addEventListener('show.bs.modal', function (event) {
            const button = event.relatedTarget;
            const imageSrc = button.getAttribute('data-image');
            const modalImage = imageModal.querySelector('#modalImage');
            modalImage.src = imageSrc;
        });
    </script>
    @endpush
@endsection
