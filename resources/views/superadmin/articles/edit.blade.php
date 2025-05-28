@extends('layouts.backend')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Edit Artikel</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('superadmin.articles.update', $article->id_articles) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="judul" class="form-label">Judul</label>
                    <input type="text" id="judul" name="judul" required
                           value="{{ old('judul', $article->judul) }}"
                           class="form-control" placeholder="Masukkan judul artikel">
                </div>

                <div class="mb-3">
                    <label for="konten_artikel" class="form-label">Konten</label>
                    <textarea id="konten_artikel" name="konten_artikel" rows="5" required
                              class="form-control" placeholder="Masukkan konten artikel">{{ old('konten_artikel', $article->konten_artikel) }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="gambar" class="form-label">Gambar</label>
                    <input type="file" id="gambar" name="gambar" accept="image/*"
                           class="form-control">
                    @if ($article->gambar)
                        <div class="mt-2">
                            <img src="{{ asset('storage/' . $article->gambar) }}" alt="Gambar Lama" style="height: 60px;">
                        </div>
                    @endif
                </div>

                <div class="mb-3">
                    <label for="tanggal_publish" class="form-label">Tanggal Publish</label>
                    <input type="date" id="tanggal_publish" name="tanggal_publish" required
                           value="{{ old('tanggal_publish', $article->tanggal_publish) }}"
                           class="form-control">
                </div>

                <div class="d-flex justify-content-start gap-2">
                    <button type="submit" class="btn btn-success btn-sm">Simpan</button>
                    <a href="{{ route('superadmin.articles.index') }}" class="btn btn-danger btn-sm">Batal</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
