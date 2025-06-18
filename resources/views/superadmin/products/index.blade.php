@extends('layouts.backend')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Data Produk</h4>
        </div>
        <div class="card-body">
            <div class="flex justify-end mb-4">
                @role('superadmin')
                <a href="{{ route('superadmin.products.create') }}" class="shadow btn btn-primary btn-sm">Tambah</a>
                @elserole('admin')
                <a href="{{ route('admin.products.create') }}" class="shadow btn btn-primary btn-sm">Tambah</a>
                @endrole
                <div class="table-responsive">
                    <table class="table table-bordered" id="table">
                        <thead>
                            <tr>
                                <th class="px-4 py-2 border">No</th>
                                <th class="px-4 py-2 border">Nama Produk</th>
                                <th class="px-4 py-2 border">Kategori</th>
                                <th class="px-4 py-2 border">Sub Kategori</th>
                                <th class="px-4 py-2 border">Kontak</th>
                                <th class="px-4 py-2 border">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($products as $index => $product)
                            <tr class="text-center">
                                <td class="px-4 py-2 border">{{ $index + 1 }}</td>
                                <td class="px-4 py-2 border">{{ $product->name }}</td>
                                <td class="px-4 py-2 border">{{ $product->subCategory->category->name ?? '-' }}</td>
                                <td class="px-4 py-2 border">{{ $product->subCategory->name ?? '-' }}</td>
                                <td class="px-4 py-2 border">{{ $product->contact->no_wa ?? '-' }}</td>
                                <td class="px-4 py-2 border text-center">
                                    <div class="d-inline-flex gap-2">
                                        @if ($product->gambar)
                                        <button type="button"
                                            class="shadow btn btn-warning btn-sm"
                                            data-bs-toggle="modal"
                                            data-bs-target="#productDetailModal"
                                            data-name="{{ $product->name }}"
                                            data-serial_number="{{ $product->serial_number }}"
                                            data-year_of_build="{{ $product->year_of_build ?? '-' }}"
                                            data-hours_meter="{{ $product->hours_meter ?? '-' }}"
                                            data-stock="{{ $product->stock }}"
                                            data-harga="{{ number_format($product->harga, 2, ',', '.') }}"
                                            data-description="{{ $product->description ?? '-' }}"
                                            data-gambar="{{ asset('storage/' . $product->gambar) }}"
                                            data-brosur="{{ $product->brosur ? asset('storage/' . $product->brosur) : '' }}"
                                            data-sub_images='@json($product->images->map(fn($img) => asset("storage/".$img->image_path)))'
                                            data-category="{{ $product->subCategory->category->name ?? '-' }}"
                                            data-sub_category="{{ $product->subCategory->name ?? '-' }}"
                                            data-contact="{{ $product->contact->no_wa ?? '-' }}">
                                            Lihat
                                        </button>
                                        @else
                                        <button type="button" class="btn btn-secondary btn-sm" disabled>
                                            Lihat
                                        </button>
                                        @endif

                                        @role('superadmin')
                                        <a href="{{ route('superadmin.products.edit', $product->id) }}"
                                            class="shadow btn btn-success btn-sm">Edit</a>
                                        @else
                                        <a href="{{ route('superadmin.products.edit', $product->id) }}"
                                            class="btn btn-success btn-sm" disabled style="pointer-events: none; opacity: 0.6;">Edit</a>
                                        @endrole

                                        <form action="{{ route('superadmin.products.destroy', $product->id) }}"
                                            method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')

                                            @role('superadmin')
                                            <button type="submit" class="shadow btn btn-danger btn-sm btn-delete">
                                                Hapus
                                            </button>
                                            @else
                                            <button type="submit" class="shadow btn btn-danger btn-sm btn-delete" disabled style="pointer-events: none; opacity: 0.6;">
                                                Hapus
                                            </button>
                                            @endrole
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan=" 6" class="text-center py-4">Data tidak ada
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="modal fade" id="productDetailModal" tabindex="-1" aria-labelledby="productDetailModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="productDetailModalLabel">Detail Produk</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                    </div>
                    <div class="modal-body d-flex gap-3">
                        <div style="flex: 1;">
                            <img id="modalGambar" src="" alt="Gambar Produk" class="img-fluid" style="max-height: 300px;">
                            <div id="modalSubImages" class="d-flex gap-2 mt-3 flex-wrap"></div>
                        </div>
                        <div style="flex: 2;">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <th>Nama Produk</th>
                                        <td id="modalName"></td>
                                    </tr>
                                    <tr>
                                        <th>Kategori</th>
                                        <td id="modalCategory"></td>
                                    </tr>
                                    <tr>
                                        <th>Sub Kategori</th>
                                        <td id="modalSubCategory"></td>
                                    </tr>
                                    <tr>
                                        <th>Kontak WA</th>
                                        <td id="modalContact"></td>
                                    </tr>
                                    <tr>
                                        <th>Serial Number</th>
                                        <td id="modalSerialNumber"></td>
                                    </tr>
                                    <tr>
                                        <th>Tahun Buat</th>
                                        <td id="modalYearOfBuild"></td>
                                    </tr>
                                    <tr>
                                        <th>Jam Meter</th>
                                        <td id="modalHoursMeter"></td>
                                    </tr>
                                    <tr>
                                        <th>Stok</th>
                                        <td id="modalStock"></td>
                                    </tr>
                                    <tr>
                                        <th>Harga</th>
                                        <td id="modalHarga"></td>
                                    </tr>
                                    <tr>
                                        <th>Deskripsi</th>
                                        <td id="modalDescription" class="text-break"></td>
                                    </tr>
                                    <tr>
                                        <th>Brosur</th>
                                        <td id="modalBrosur"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @push('scripts')
        <script>
            const productDetailModal = document.getElementById('productDetailModal');
            productDetailModal.addEventListener('show.bs.modal', function(event) {
                const button = event.relatedTarget;

                const name = button.getAttribute('data-name');
                const category = button.getAttribute('data-category');
                const subCategory = button.getAttribute('data-sub_category');
                const contact = button.getAttribute('data-contact');
                const serialNumber = button.getAttribute('data-serial_number');
                const yearOfBuild = button.getAttribute('data-year_of_build');
                const hoursMeter = button.getAttribute('data-hours_meter');
                const stock = button.getAttribute('data-stock');
                const harga = button.getAttribute('data-harga');
                const description = button.getAttribute('data-description');
                const gambar = button.getAttribute('data-gambar');
                const brosur = button.getAttribute('data-brosur');
                const subImagesJson = button.getAttribute('data-sub_images');

                productDetailModal.querySelector('#modalName').textContent = name;
                productDetailModal.querySelector('#modalCategory').textContent = category;
                productDetailModal.querySelector('#modalSubCategory').textContent = subCategory;
                productDetailModal.querySelector('#modalContact').textContent = contact;
                productDetailModal.querySelector('#modalSerialNumber').textContent = serialNumber;
                productDetailModal.querySelector('#modalYearOfBuild').textContent = yearOfBuild;
                productDetailModal.querySelector('#modalHoursMeter').textContent = hoursMeter;
                productDetailModal.querySelector('#modalStock').textContent = stock;
                productDetailModal.querySelector('#modalHarga').textContent = harga;
                productDetailModal.querySelector('#modalDescription').textContent = description;

                const modalGambar = productDetailModal.querySelector('#modalGambar');
                if (gambar) {
                    modalGambar.src = gambar;
                    modalGambar.style.display = 'block';
                } else {
                    modalGambar.style.display = 'none';
                }

                const brosurTd = productDetailModal.querySelector('#modalBrosur');
                if (brosur) {
                    brosurTd.innerHTML = `<a href="${brosur}" target="_blank" rel="noopener noreferrer">Lihat Brosur</a>`;
                } else {
                    brosurTd.textContent = '-';
                }

                const modalSubImages = productDetailModal.querySelector('#modalSubImages');
                modalSubImages.innerHTML = '';

                if (subImagesJson) {
                    try {
                        const subImages = JSON.parse(subImagesJson);
                        if (Array.isArray(subImages)) {
                            subImages.forEach(src => {
                                const img = document.createElement('img');
                                img.src = src;
                                img.alt = 'Sub Image';
                                img.style.width = '70px';
                                img.style.height = '70px';
                                img.style.objectFit = 'cover';
                                img.style.border = '1px solid #ccc';
                                img.style.borderRadius = '4px';
                                modalSubImages.appendChild(img);
                            });
                        }
                    } catch (error) {
                        console.error('Gagal parsing sub_images JSON:', error);
                    }
                }
            });
        </script>
        @endpush
        @endsection