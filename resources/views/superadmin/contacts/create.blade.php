@extends('layouts.backend')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Tambah Kontak</h4>
        </div>
        <div class="card-body">

            <form action="{{ route('superadmin.contacts.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="name" class="form-label">Nama</label>
                    <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Masukkan nama kontak" value="{{ old('name') }}">
                    @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="no_wa" class="form-label">Nomor</label>
                    <input type="text" id="no_wa" name="no_wa" class="form-control @error('no_wa') is-invalid @enderror" placeholder="08xxxxxx" value="{{ old('no_wa') }}">
                    @error('no_wa')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex justify-content-start gap-2">
                    <button type="submit" class="shadow btn btn-primary btn-sm">Tambah</button>
                    <a href="{{ route('superadmin.contacts.index') }}" class="shadow btn btn-danger btn-sm">Batal</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection