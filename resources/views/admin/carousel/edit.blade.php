@extends('admin.layouts.app')

@section('content')
<div class="container">
    <h1>Edit Carousel</h1>
    <form action="{{ route('carousel.update', $carousel->id_carousel) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="judul" class="form-label">Judul</label>
            <input type="text" class="form-control" name="judul" value="{{ $carousel->judul }}" required>
        </div>

        <div class="mb-3">
            <label for="gambar" class="form-label">Ganti Gambar (opsional)</label><br>
            <img src="{{ asset('storage/' . $carousel->gambar) }}" width="150" class="mb-2"><br>
            <input type="file" class="form-control" name="gambar">
        </div>

        <div class="mb-3">
            <label for="link" class="form-label">Link</label>
            <input type="text" class="form-control" name="link" value="{{ $carousel->link }}">
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select name="status" class="form-control" required>
                <option value="aktif" {{ $carousel->status == 'aktif' ? 'selected' : '' }}>Aktif</option>
                <option value="nonaktif" {{ $carousel->status == 'nonaktif' ? 'selected' : '' }}>Nonaktif</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('carousel.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
