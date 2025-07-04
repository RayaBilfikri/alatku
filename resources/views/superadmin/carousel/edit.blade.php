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
                    <input type="text" id="judul" name="judul"
                        value="{{ old('judul', $carousel->judul) }}"
                        class="form-control @error('judul') is-invalid @enderror" placeholder="Masukkan judul carousel">
                    @error('judul')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="gambar" class="form-label">Gambar Carousel</label>
                    <input type="file" id="gambar" name="gambar" accept="image/*"
                        class="form-control @error('gambar') is-invalid @enderror">
                    @if ($carousel->gambar)
                    <div class="mt-2">
                        <img src="{{ asset('storage/' . $carousel->gambar) }}" alt="Gambar" style="height: 60px;">
                    </div>
                    @endif
                    @error('gambar')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="link" class="form-label">Link (Opsional)</label>
                    <input type="url" id="link" name="link"
                        value="{{ old('link', $carousel->link) }}"
                        class="form-control @error('link') is-invalid @enderror" placeholder="https://example.com">
                    @error('link')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="status" class="form-label">Status</label>
                    <select id="status" name="status" class="form-control @error('status') is-invalid @enderror">
                        <option value="aktif" {{ old('status', $carousel->status) === 'aktif' ? 'selected' : '' }}>Aktif</option>
                        <option value="nonaktif" {{ old('status', $carousel->status) === 'nonaktif' ? 'selected' : '' }}>Nonaktif</option>
                    </select>
                    @error('status')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex justify-content-start gap-2">
                    <button type="submit" class="shadow btn btn-success btn-sm">Simpan</button>
                    <a href="{{ route('superadmin.carousel.index') }}" class="shadow btn btn-danger btn-sm">Batal</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection