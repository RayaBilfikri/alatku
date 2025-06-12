@extends('layouts.backend')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Tambah Produk</h4>
        </div>
        <div class="card-body">
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <form action="{{ auth()->user()->hasRole('admin') 
                ? route('admin.products.store') 
                : route('superadmin.products.store') }}"
                method="POST" enctype="multipart/form-data"> @csrf
                <div class="row">
                    <!-- Kolom 1 -->
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama Produk</label>
                            <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="gambar" class="form-label">Gambar Produk</label>
                            <input type="file" id="gambar" name="gambar" class="form-control" accept="image/*">
                        </div>

                        <div class="mb-3">
                            <label for="sub_images" class="form-label">Sub Gambar (Max 3)</label>
                            <input type="file" name="sub_images[]" class="form-control" accept="image/*" multiple>
                        </div>

                        <div class="mb-3">
                            <label for="serial_number" class="form-label">Serial Number</label>
                            <input type="text" id="serial_number" name="serial_number" class="form-control" value="{{ old('serial_number') }}">
                        </div>

                        <div class="mb-3">
                            <label for="brosur" class="form-label">Brosur (PDF)</label>
                            <input type="file" id="brosur" name="brosur" class="form-control" accept="application/pdf">
                        </div>
                    </div>

                    <!-- Kolom 2 -->
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="category_id" class="form-label">Kategori</label>
                            <select name="category_id" id="category_id" class="form-control" required>
                                <option value="">Pilih Kategori</option>
                                @foreach($Categories as $Category)
                                <option value="{{ $Category->id }}">{{ $Category->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="sub_category_id" class="form-label">Sub Kategori</label>
                            <select name="sub_category_id" id="sub_category_id" class="form-control" required>
                                <option value="">Pilih Sub Kategori</option>
                                @foreach($subCategories as $subCategory)
                                <option value="{{ $subCategory->id }}">{{ $subCategory->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="contact_id" class="form-label">Kontak</label>
                            <select name="contact_id" id="contact_id" class="form-control" required>
                                <option value="">Pilih Kontak</option>
                                @foreach($contacts as $contact)
                                <option value="{{ $contact->id }}">{{ $contact->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="year_of_build" class="form-label">Tahun Pembuatan</label>
                            <select name="year_of_build" id="year_of_build" class="form-select" required>
                                <option value="">Pilih Tahun</option>
                                @for ($year = date('Y'); $year >= 1950; $year--)
                                <option value="{{ $year }}" {{ old('year_of_build') == $year ? 'selected' : '' }}>
                                    {{ $year }}
                                </option>
                                @endfor
                            </select>
                        </div>


                        <div class="mb-3">
                            <label for="hours_meter" class="form-label">Hours Meter</label>
                            <input type="number" id="hours_meter" name="hours_meter" class="form-control" value="{{ old('hours_meter') }}">
                        </div>
                    </div>

                    <!-- Kolom 3 -->
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="stock" class="form-label">Stok</label>
                            <input type="number" id="stock" name="stock" class="form-control" value="{{ old('stock') }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="harga" class="form-label">Harga</label>
                            <input type="text" id="harga" name="harga" class="form-control" required oninput="formatRupiah(this)">
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Deskripsi</label>
                            <textarea id="description" name="description" class="form-control" rows="6">{{ old('description') }}</textarea>
                        </div>
                    </div>
                </div>

                <!-- Tombol -->
                <div class="d-flex justify-content-start gap-2 mt-3">
                    <button type="submit" class="btn btn-primary btn-sm">Tambah</button>
                    @role('superadmin')
                    <a href="{{ route('superadmin.products.index') }}" class="btn btn-danger btn-sm">Batal</a>
                    @elserole('admin')
                    <a href="{{ route('admin.products.index') }}" class="btn btn-danger btn-sm">Batal</a>
                    @endrole
                </div>
            </form>
        </div>
    </div>
</div>

<script>
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
        el.value = rupiah ? 'Rp ' + rupiah : '';
    }
    document.getElementById('harga').addEventListener('input', function(e) {
        formatRupiah(this);
    });

    document.querySelectorAll('form').forEach(function(form) {
        form.addEventListener('submit', function(e) {
            let hargaInput = form.querySelector('#harga');
            if (hargaInput) {
                let val = hargaInput.value;
                val = val.replace(/Rp\s?/g, '').replace(/\./g, '').replace(/,/g, '');
                hargaInput.value = val;
            }
        });
    });
</script>

@endsection