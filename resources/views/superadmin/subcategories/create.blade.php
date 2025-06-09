@extends('layouts.backend')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Tambah Sub Kategori</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('superadmin.subcategories.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="categories_id" class="form-label">Kategori</label>
                    <select id="categories_id" name="categories_id" class="form-select @error('categories_id') is-invalid @enderror">
                        <option value="" disabled selected>Pilih Kategori</option>
                        @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                    @error('categories_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="name" class="form-label">Sub Kategori</label>
                    <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Masukkan nama sub kategori" value="{{ old('name') }}">
                    @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex justify-content-start gap-2">
                    <button type="submit" class="shadow btn btn-primary btn-sm">Tambah</button>
                    <a href="{{ route('superadmin.subcategories.index') }}" class="shadow btn btn-danger btn-sm">Batal</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection