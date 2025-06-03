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
                        <input type="text" id="judul" name="judul" value="{{ old('judul', $howtobuy->judul) }}" required
                               class="form-control" placeholder="Masukkan judul langkah">
                    </div>

                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <input type="text" id="deskripsi" name="deskripsi" value="{{ old('deskripsi', $howtobuy->deskripsi) }}" required
                               class="form-control" placeholder="Masukkan deskripsi">
                    </div>

                    <div class="mb-3">
                        <label for="step_number" class="form-label">Step Number</label>
                        <input type="number" id="step_number" name="step_number" value="{{ old('step_number', $howtobuy->step_number) }}" required
                               class="form-control" placeholder="Masukkan urutan langkah">
                    </div>

                    <div class="d-flex justify-content-start gap-2">
                        <button type="submit" class="btn btn-success btn-sm">Simpan</button>
                        <a href="{{ route('superadmin.howtobuys.index') }}" class="btn btn-danger btn-sm">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
