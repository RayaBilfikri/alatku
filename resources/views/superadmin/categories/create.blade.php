@extends('layouts.backend')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Tambah Kategori</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('superadmin.categories.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Kategori</label>
                        <input type="text" id="name" name="name" required class="form-control" placeholder="Masukkan nama kategori">
                    </div>

                    <div class="mb-3">
                        <label for="icon" class="form-label">Ikon</label>
                        <input type="file" id="icon" name="icon" class="form-control" accept="image/*">
                    </div>

                    <div class="d-flex justify-content-start gap-2">
                        <button type="submit" class="btn btn-primary btn-sm">Tambah</button>
                        <a href="{{ route('superadmin.categories.index') }}" class="btn btn-danger btn-sm">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
