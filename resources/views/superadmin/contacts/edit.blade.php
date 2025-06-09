@extends('layouts.backend')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Edit Kontak</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('superadmin.contacts.update', $contact->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="name" class="form-label">Nama</label>
                    <input type="text" id="name" name="name"
                        value="{{ old('name', $contact->name) }}"
                        class="form-control @error('name') is-invalid @enderror" placeholder="Masukkan nama kontak">
                    @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="no_wa" class="form-label">Nomor</label>
                    <input type="text" id="no_wa" name="no_wa"
                        value="{{ old('no_wa', $contact->no_wa) }}"
                        class="form-control @error('no_wa') is-invalid @enderror" placeholder="08xxxxxx">
                    @error('no_wa')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex justify-content-start gap-2">
                    <button type="submit" class="shadow btn btn-success btn-sm">Simpan</button>
                    <a href="{{ route('superadmin.contacts.index') }}" class="shadow btn btn-danger btn-sm">Batal</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection