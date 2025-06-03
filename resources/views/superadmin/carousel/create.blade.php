@extends('layouts.backend')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Tambah Carousel</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('superadmin.carousel.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label for="judul" class="form-label">Judul Carousel</label>
                        <input type="text" id="judul" name="judul" required class="form-control" placeholder="Masukkan judul carousel" value="{{ old('judul') }}">
                    </div>

                    <div class="mb-3">
                        <label for="gambar" class="form-label">Gambar Carousel</label>
                        <input type="file" id="gambar" name="gambar" class="form-control" accept="image/*" required>
                    </div>

                    <div class="mb-3">
                        <label for="link" class="form-label">Link (Opsional)</label>
                        <input type="url" id="link" name="link" class="form-control" placeholder="https://example.com" value="{{ old('link') }}">
                    </div>

                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select id="status" name="status" class="form-control">
                            <option value="aktif" {{ old('status') === 'aktif' ? 'selected' : '' }}>Aktif</option>
                            <option value="nonaktif" {{ old('status', 'nonaktif') === 'nonaktif' ? 'selected' : '' }}>Nonaktif</option>
                        </select>
                    </div>

                    <div class="d-flex justify-content-start gap-2">
                        <button type="submit" class="btn btn-primary btn-sm">Tambah</button>
                        <a href="{{ route('superadmin.carousel.index') }}" class="btn btn-danger btn-sm">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
