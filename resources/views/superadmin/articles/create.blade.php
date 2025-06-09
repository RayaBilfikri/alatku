@extends('layouts.backend')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Tambah Artikel</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('superadmin.articles.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label for="judul" class="form-label">Judul</label>
                    <input type="text" id="judul" name="judul" class="form-control @error('judul') is-invalid @enderror" placeholder="Masukkan judul artikel" value="{{ old('judul') }}">
                    @error('judul')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="konten_artikel" class="form-label">Konten</label>
                    <textarea id="konten_artikel" name="konten_artikel" rows="5"
                        class="form-control @error('konten_artikel') is-invalid @enderror"
                        placeholder="Masukkan konten artikel">{{ old('konten_artikel') }}</textarea>
                    @error('konten_artikel')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="gambar" class="form-label">Gambar</label>
                    <input type="file" id="gambar" name="gambar"
                        class="form-control @error('gambar') is-invalid @enderror"
                        accept="image/*"> @error('gambar')
                    <div class=" invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="tanggal_publish" class="form-label">Tanggal Publish</label>
                    <input type="date" id="tanggal_publish" name="tanggal_publish" class="form-control @error('tanggal_publish') is-invalid @enderror" value="{{ old('tanggal_publish') }}">
                    @error('tanggal_publish')
                    <div class=" invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex justify-content-start gap-2">
                    <button type="submit" class="shadow btn btn-primary btn-sm">Tambah</button>
                    <a href="{{ route('superadmin.articles.index') }}" class="shadow btn btn-danger btn-sm">Batal</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection