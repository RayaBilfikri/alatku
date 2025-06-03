@extends('layouts.backend')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Edit Sub Kategori</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('superadmin.subcategories.update', $subcategory->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="categories_id" class="form-label">Kategori</label>
                        <select id="categories_id" name="categories_id" required class="form-select">
                            <option value="" disabled>Pilih Kategori</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ $subcategory->categories_id == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="name" class="form-label">Sub Kategori</label>
                        <input type="text" id="name" name="name" required
                            class="form-control" value="{{ $subcategory->name }}"
                            placeholder="Masukkan nama sub kategori">
                    </div>

                    <div class="d-flex justify-content-start gap-2">
                        <button type="submit" class="btn btn-success btn-sm">Simpan</button>
                        <a href="{{ route('superadmin.subcategories.index') }}" class="btn btn-danger btn-sm">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
