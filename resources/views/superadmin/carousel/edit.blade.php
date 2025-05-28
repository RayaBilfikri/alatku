@extends('layouts.backend')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Edit Carousel</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('superadmin.carousel.update', $carousel->id_carousel) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="judul" class="form-label">Judul Carousel</label>
                        <input type="text" id="judul" name="judul" required
                               value="{{ old('judul', $carousel->judul) }}"
                               class="form-control" placeholder="Masukkan judul carousel">
                    </div>

                    <div class="mb-3">
                        <label for="gambar" class="form-label">Gambar Carousel</label>
                        <input type="file" id="gambar" name="gambar" accept="image/*"
                               class="form-control">
                        @if ($carousel->gambar)
                            <div class="mt-2">
                                <img src="{{ asset('storage/' . $carousel->gambar) }}" alt="Gambar" style="height: 60px;">
                            </div>
                        @endif
                    </div>

                    <div class="mb-3">
                        <label for="link" class="form-label">Link (Opsional)</label>
                        <input type="url" id="link" name="link"
                               value="{{ old('link', $carousel->link) }}"
                               class="form-control" placeholder="https://example.com">
                    </div>

                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select id="status" name="status" class="form-control">
                            <option value="aktif" {{ old('status', $carousel->status) === 'aktif' ? 'selected' : '' }}>Aktif</option>
                            <option value="nonaktif" {{ old('status', $carousel->status) === 'nonaktif' ? 'selected' : '' }}>Nonaktif</option>
                        </select>
                    </div>

                    <div class="d-flex justify-content-start gap-2">
                        <button type="submit" class="btn btn-success btn-sm">Simpan</button>
                        <a href="{{ route('superadmin.carousel.index') }}" class="btn btn-danger btn-sm">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
