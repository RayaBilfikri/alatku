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
                        <input type="text" id="name" name="name" required
                               value="{{ old('name', $contact->name) }}"
                               class="form-control" placeholder="Masukkan nama kontak">
                    </div>

                    <div class="mb-3">
                        <label for="no_wa" class="form-label">Nomor</label>
                        <input type="text" id="no_wa" name="no_wa" required
                               value="{{ old('no_wa', $contact->no_wa) }}"
                               class="form-control" placeholder="08xxxxxx">
                    </div>

                    <div class="d-flex justify-content-start gap-2">
                        <button type="submit" class="btn btn-success btn-sm">Simpan</button>
                        <a href="{{ route('superadmin.contacts.index') }}" class="btn btn-danger btn-sm">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
