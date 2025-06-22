@extends('layouts.backend')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Edit Produk</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('superadmin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama Produk</label>
                            <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $product->name) }}">
                            @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="gambar" class="form-label">Gambar Produk</label>
                            <input type="file" id="gambar" name="gambar" class="form-control @error('gambar') is-invalid @enderror" accept="image/*">
                            @if($product->gambar)
                            <p class="mt-2">
                                Gambar saat ini: <br>
                                <img src="{{ Storage::url($product->gambar) }}" alt="Gambar Produk" class="img-fluid" style="max-width: 200px;">
                            </p>
                            @endif
                            @error('gambar')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="sub_images" class="form-label">Sub Gambar (Max 3)</label>
                            <input type="file" name="sub_images[]" id="sub_images" class="form-control @error('sub_images') is-invalid @enderror" accept="image/*" multiple onchange="limitFiles(this)">
                            @error('sub_images')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="serial_number" class="form-label">Serial Number</label>
                            <input type="text" id="serial_number" name="serial_number" class="form-control @error('serial_number') is-invalid @enderror" value="{{ old('serial_number', $product->serial_number) }}">
                            @error('serial_number')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="brosur" class="form-label">Brosur (PDF)</label>
                            <input type="file" id="brosur" name="brosur" class="form-control @error('brosur') is-invalid @enderror" accept="application/pdf">
                            @if($product->brosur)
                            <p class="text-muted mt-2">
                                Brosur yang sudah diunggah: <a href="{{ Storage::url($product->brosur) }}" target="_blank" class="text-primary">Lihat</a>
                            </p>
                            @endif
                            @error('brosur')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-4">
                        <!-- <div class="mb-3">
                            <label for="category_id" class="form-label">Kategori</label>
                            <select name="category_id" id="category_id" class="form-control @error('category_id') is-invalid @enderror">
                                <option value="">Pilih Kategori</option>
                                @foreach($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ old('category_id', $product->subCategory->category->id ?? '') == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                                @endforeach
                            </select>
                            @error('category_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div> -->

                        <div class="mb-3">
                            <label for="sub_category_id" class="form-label">Sub Kategori</label>
                            <select name="sub_category_id" id="sub_category_id" class="form-control @error('sub_category_id') is-invalid @enderror">
                                <option value="">Pilih Sub Kategori</option>
                                @foreach($subCategories as $subCategory)
                                <option value="{{ $subCategory->id }}" {{ old('sub_category_id', $product->sub_category_id) == $subCategory->id ? 'selected' : '' }}>
                                    {{ $subCategory->name }}
                                </option>
                                @endforeach
                            </select>
                            @error('sub_category_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="contact_id" class="form-label">Kontak</label>
                            <select name="contact_id" id="contact_id" class="form-control @error('contact_id') is-invalid @enderror">
                                <option value="">Pilih Kontak</option>
                                @foreach($contacts as $contact)
                                <option value="{{ $contact->id }}" {{ old('contact_id', $product->contact_id) == $contact->id ? 'selected' : '' }}>
                                    {{ $contact->name }}
                                </option>
                                @endforeach
                            </select>
                            @error('contact_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="year_of_build" class="form-label">Tahun Pembuatan</label>
                            <select name="year_of_build" id="year_of_build" class="form-select @error('year_of_build') is-invalid @enderror">
                                <option value="">Pilih Tahun</option>
                                @for ($year = date('Y'); $year >= 1950; $year--)
                                <option value="{{ $year }}" {{ old('year_of_build', $product->year_of_build) == $year ? 'selected' : '' }}>
                                    {{ $year }}
                                </option>
                                @endfor
                            </select>
                            @error('year_of_build')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="hours_meter" class="form-label">Hours Meter</label>
                            <input type="number" id="hours_meter" name="hours_meter" class="form-control @error('hours_meter') is-invalid @enderror" value="{{ old('hours_meter', $product->hours_meter) }}">
                            @error('hours_meter')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="stock" class="form-label">Stok</label>
                            <input type="number" id="stock" name="stock" class="form-control @error('stock') is-invalid @enderror" value="{{ old('stock', $product->stock) }}">
                            @error('stock')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="harga" class="form-label">Harga</label>
                            <input type="number" name="harga"
                                value="{{ old('harga', (int) $product->harga ?? '') }}"
                                min="1" step="1"
                                class="form-control @error('harga') is-invalid @enderror">
                            @error('harga')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Deskripsi</label>
                            <textarea id="description" name="description" class="form-control @error('description') is-invalid @enderror" rows="6">{{ old('description', $product->description) }}</textarea>
                            @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-start gap-2 mt-3">
                    <button type="submit" class="shadow btn btn-success btn-sm">Simpan</button>
                    <a href="{{ route('superadmin.products.index') }}" class="shadow btn btn-danger btn-sm">Batal</a>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- <script>
    const hargaInput = document.getElementById('harga');

    hargaInput.addEventListener('input', function(e) {
        // Selalu sanitasi ke angka murni dulu
        let value = this.value.replace(/[^0-9]/g, '');
        // Format hanya jika user mengetik, bukan saat page load
        this.value = value ? 'Rp ' + value.replace(/\B(?=(\d{3})+(?!\d))/g, '.') : '';
    });

    // Bersihkan sebelum submit
    document.querySelector('form').addEventListener('submit', function(e) {
        let hargaInput = document.getElementById('harga');
        if (hargaInput) {
            hargaInput.value = hargaInput.value.replace(/[^0-9]/g, '');
        }
    });
</script> -->


@endsection