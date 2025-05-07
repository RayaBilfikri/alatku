@extends('layouts.superadmin')


@section('title', 'Edit Carousel')

@section('content')
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Edit Carousel</h6>
            <a href="{{ route('superadmin.carousel.index') }}" class="btn btn-secondary btn-sm">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('superadmin.carousel.update', $carousel->id_carousel) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
                <div class="form-group">
                    <label for="judul">Judul <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="judul" name="judul" value="{{ old('judul', $carousel->judul) }}" required>
                </div>

                <div class="form-group">
                    <label for="gambar">Gambar</label>
                    <input type="file" class="form-control-file" id="gambar" name="gambar">
                    <small class="form-text text-muted">Format: JPG, JPEG, PNG. Maks: 2MB. Biarkan kosong jika tidak ingin mengubah gambar.</small>
                </div>

                <div class="form-group">
                    <label>Gambar Saat Ini</label>
                    <div class="mt-2">
                        <img src="{{ asset('storage/' . $carousel->gambar) }}" alt="{{ $carousel->judul }}" class="img-thumbnail" style="max-height: 300px;">
                    </div>
                </div>

                <div class="form-group">
                    <label for="link">Link (Opsional)</label>
                    <input type="text" class="form-control" id="link" name="link" value="{{ old('link', $carousel->link) }}">
                    <small class="form-text text-muted">URL yang akan dituju ketika carousel diklik.</small>
                </div>

                <div class="form-group">
                    <label for="status">Status <span class="text-danger">*</span></label>
                    <select class="form-control" id="status" name="status" required>
                        <option value="aktif" {{ (old('status', $carousel->status) == 'aktif') ? 'selected' : '' }}>Aktif</option>
                        <option value="nonaktif" {{ (old('status', $carousel->status) == 'nonaktif') ? 'selected' : '' }}>Nonaktif</option>
                    </select>
                </div>

                <div class="form-group preview-image" style="display: none;">
                    <label>Preview Gambar Baru</label>
                    <div class="mt-2">
                        <img id="image-preview" src="#" alt="Preview" class="img-thumbnail" style="max-height: 300px;">
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        // Image preview
        $('#gambar').change(function() {
            const file = this.files[0];
            if (file) {
                let reader = new FileReader();
                reader.onload = function(event) {
                    $('#image-preview').attr('src', event.target.result);
                    $('.preview-image').show();
                }
                reader.readAsDataURL(file);
            }
        });
    });
</script>
@endpush