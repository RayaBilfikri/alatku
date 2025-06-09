@extends('layouts.backend')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Edit Admin</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('superadmin.admins.update', $admin->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="name" class="form-label">Nama Admin</label>
                    <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror"
                        placeholder="Masukkan nama admin" value="{{ old('name', $admin->name) }}">
                    @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email Admin</label>
                    <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror"
                        placeholder="Masukkan email admin" value="{{ old('email', $admin->email) }}">
                    @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="text" id="password" name="password" class="form-control  @error('password') is-invalid @enderror"
                        placeholder="Masukkan password baru (opsional)">
                    @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex justify-content-start gap-2">
                    <button type="submit" class="shadow btn btn-success btn-sm">Simpan</button>
                    <a href="{{ route('superadmin.admins.index') }}" class="shadow btn btn-danger btn-sm">Batal</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection