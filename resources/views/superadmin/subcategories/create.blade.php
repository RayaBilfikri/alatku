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
                        <select id="categories_id" name="categories_id" required class="form-select">
                            <option value="" disabled selected>Pilih Kategori</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="name" class="form-label">Sub Kategori</label>
                        <input type="text" id="name" name="name" required class="form-control" placeholder="Masukkan nama sub kategori">
                    </div>

                    <div class="d-flex justify-content-start gap-2">
                        <button type="submit" class="btn btn-primary btn-sm">Tambah</button>
                        <a href="{{ route('superadmin.subcategories.index') }}" class="btn btn-danger btn-sm">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
