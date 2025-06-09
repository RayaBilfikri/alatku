@extends('layouts.backend')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Edit Cara Membeli</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('superadmin.howtobuys.update', $howtobuy->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="judul" class="form-label">Judul</label>
                    <input type="text" id="judul" name="judul" value="{{ old('judul', $howtobuy->judul) }}"
                        class="form-control @error('judul') is-invalid @enderror" placeholder="Masukkan judul langkah">
                    @error('judul')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="deskripsi" class="form-label">Deskripsi</label>
                    <input type="text" id="deskripsi" name="deskripsi" value="{{ old('deskripsi', $howtobuy->deskripsi) }}"
                        class="form-control @error('deskripsi') is-invalid @enderror" placeholder="Masukkan deskripsi">
                    @error('deskripsi')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="step_number" class="form-label">Step Number</label>
                    <input type="number" id="step_number" name="step_number" value="{{ old('step_number', $howtobuy->step_number) }}"
                        class="form-control @error('step_number') is-invalid @enderror" placeholder="Masukkan urutan langkah">
                    @error('step_number')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex justify-content-start gap-2">
                    <button type="submit" class="shadow btn btn-success btn-sm">Simpan</button>
                    <a href="{{ route('superadmin.howtobuys.index') }}" class="shadow btn btn-danger btn-sm">Batal</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection