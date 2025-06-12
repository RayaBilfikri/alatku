@extends('layouts.backend')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Edit Kategori</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('superadmin.categories.update', $category->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="name" class="form-label">Nama Kategori</label>
                    <input type="text" id="name" name="name"
                        value="{{ old('name', $category->name) }}"
                        class="form-control @error('name') is-invalid @enderror" placeholder="Masukkan nama kategori">
                    @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="icon" class="form-label">Ikon</label>
                    <input type="file" id="icon" name="icon" accept="image/*"
                        class="form-control @error('icon') is-invalid @enderror">
                    @if ($category->icon)
                    <div class="mt-2">
                        <img src="{{ asset('storage/' . $category->icon) }}" alt="Icon" style="height: 60px;">
                    </div>
                    @endif
                    @error('icon')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex justify-content-start gap-2">
                    <button type="submit" class="shadow btn btn-success btn-sm">Simpan</button>
                    <a href="{{ route('superadmin.categories.index') }}" class="shadow btn btn-danger btn-sm">Batal</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection