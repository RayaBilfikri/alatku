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
                        <input type="text" id="name" name="name" required
                               value="{{ old('name', $category->name) }}"
                               class="form-control" placeholder="Masukkan nama kategori">
                    </div>

                    <div class="mb-3">
                        <label for="icon" class="form-label">Ikon</label>
                        <input type="file" id="icon" name="icon" accept="image/*"
                               class="form-control">
                        @if ($category->icon)
                            <div class="mt-2">
                                <img src="{{ asset('storage/' . $category->icon) }}" alt="Icon" style="height: 60px;">
                            </div>
                        @endif
                    </div>

                    <div class="d-flex justify-content-start gap-2">
                        <button type="submit" class="btn btn-success btn-sm">Simpan</button>
                        <a href="{{ route('superadmin.categories.index') }}" class="btn btn-danger btn-sm">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
