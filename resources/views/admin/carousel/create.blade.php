@extends('admin.layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Carousel</h1>
    <form action="{{ route('carousel.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="judul" class="form-label">Judul</label>
            <input type="text" class="form-control" name="judul" required>
        </div>

        <div class="mb-3">
            <label for="gambar" class="form-label">Gambar</label>
            <input type="file" class="form-control" name="gambar" required>
        </div>

        <div class="mb-3">
            <label for="link" class="form-label">Link (opsional)</label>
            <input type="text" class="form-control" name="link">
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select name="status" class="form-control" required>
                <option value="aktif">Aktif</option>
                <option value="nonaktif">Nonaktif</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('carousel.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
