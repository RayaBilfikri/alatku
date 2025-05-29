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
                    <!-- Kolom 1 -->
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama Produk</label>
                            <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $product->name) }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="gambar" class="form-label">Gambar Produk</label>
                            <input type="file" id="gambar" name="gambar" class="form-control" accept="image/*">
                            @if($product->gambar)
                                <p class="mt-2">
                                    Gambar saat ini: <br>
                                    <img src="{{ Storage::url($product->gambar) }}" alt="Gambar Produk" class="img-fluid" style="max-width: 200px;">
                                </p>
                            @endif
                        </div>

                        <div class="mb-3">
                            <label for="sub_images" class="form-label">Sub Gambar (Max 3)</label>
                            <input type="file" name="sub_images[]" id="sub_images" class="form-control" accept="image/*" multiple onchange="limitFiles(this)">
                        </div>

                        <div class="mb-3">
                            <label for="serial_number" class="form-label">Serial Number</label>
                            <input type="text" id="serial_number" name="serial_number" class="form-control" value="{{ old('serial_number', $product->serial_number) }}">
                        </div>

                        <div class="mb-3">
                            <label for="brosur" class="form-label">Brosur (PDF)</label>
                            <input type="file" id="brosur" name="brosur" class="form-control" accept="application/pdf">
                            @if($product->brosur)
                                <p class="text-muted mt-2">
                                    Brosur yang sudah diunggah: <a href="{{ Storage::url($product->brosur) }}" target="_blank" class="text-primary">Lihat</a>
                                </p>
                            @endif
                        </div>
                    </div>

                    <!-- Kolom 2 -->
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="category_id" class="form-label">Kategori</label>
                            <select name="category_id" id="category_id" class="form-control" required>
                                <option value="">Pilih Kategori</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ (old('category_id', $product->category_id) == $category->id) ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="sub_category_id" class="form-label">Sub Kategori</label>
                            <select name="sub_category_id" id="sub_category_id" class="form-control" required>
                                <option value="">Pilih Sub Kategori</option>
                                @foreach($subCategories as $subCategory)
                                    <option value="{{ $subCategory->id }}" {{ (old('sub_category_id', $product->sub_category_id) == $subCategory->id) ? 'selected' : '' }}>
                                        {{ $subCategory->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="contact_id" class="form-label">Kontak</label>
                            <select name="contact_id" id="contact_id" class="form-control" required>
                                <option value="">Pilih Kontak</option>
                                @foreach($contacts as $contact)
                                    <option value="{{ $contact->id }}" {{ (old('contact_id', $product->contact_id) == $contact->id) ? 'selected' : '' }}>
                                        {{ $contact->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="year_of_build" class="form-label">Tahun Pembuatan</label>
                            <select name="year_of_build" id="year_of_build" class="form-select" required>
                                <option value="">Pilih Tahun</option>
                                @for ($year = date('Y'); $year >= 1950; $year--)
                                    <option value="{{ $year }}" {{ (old('year_of_build', $product->year_of_build) == $year) ? 'selected' : '' }}>
                                        {{ $year }}
                                    </option>
                                @endfor
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="hours_meter" class="form-label">Hours Meter</label>
                            <input type="number" id="hours_meter" name="hours_meter" class="form-control" value="{{ old('hours_meter', $product->hours_meter) }}">
                        </div>
                    </div>

                    <!-- Kolom 3 -->
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="stock" class="form-label">Stok</label>
                            <input type="number" id="stock" name="stock" class="form-control" value="{{ old('stock', $product->stock) }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="harga" class="form-label">Harga</label>
                            <input type="text" id="harga" name="harga" class="form-control" value="{{ old('harga', number_format($product->harga, 0, ',', '.')) }}" required oninput="formatRupiah(this)">
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Deskripsi</label>
                            <textarea id="description" name="description" class="form-control" rows="6">{{ old('description', $product->description) }}</textarea>
                        </div>
                    </div>
                </div>

                <!-- Tombol -->
                <div class="d-flex justify-content-start gap-2 mt-3">
                    <button type="submit" class="btn btn-success btn-sm">Simpan</button>
                    <a href="{{ route('superadmin.products.index') }}" class="btn btn-danger btn-sm">Batal</a>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function limitFiles(input) {
        if (input.files.length > 3) {
            alert('Maksimal 3 gambar yang boleh diunggah.');
            input.value = ''; // reset input
        }
    }

    function formatRupiah(el) {
        let value = el.value.replace(/[^,\d]/g, '').toString();
        let split = value.split(',');
        let sisa = split[0].length % 3;
        let rupiah = split[0].substr(0, sisa);
        let ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        if (ribuan) {
            let separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        rupiah = split[1] !== undefined ? rupiah + ',' + split[1] : rupiah;
        el.value = 'Rp ' + rupiah;
    }

    // Saat submit form, hapus "Rp " dan titik dari input harga supaya backend dapat nilai murni
    document.querySelector('form').addEventListener('submit', function(e) {
        let hargaInput = document.getElementById('harga');
        let val = hargaInput.value;

        val = val.replace(/Rp\s?/g, '').replace(/\./g, '');
        hargaInput.value = val;
    });
</script>
@endsection
