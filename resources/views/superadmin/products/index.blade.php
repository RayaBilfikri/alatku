<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Kelola Produk</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&family=Roboto&display=swap" rel="stylesheet">
</head>

<body class="bg-gray-100 font-sans">
<div class="flex h-screen">
    @include('partials.sidebar')

    <main class="flex-1 bg-gray-50 p-6">
        @include('partials.header')
        
        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-xl font-bold">Data Produk</h2>

                <!-- Form Search -->
                <form method="GET" action="{{ route('superadmin.products.index') }}" class="flex gap-2">
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari produk..."
                        class="border px-3 py-2 rounded-md focus:outline-none focus:ring focus:border-blue-300">
                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                        Cari
                    </button>
                </form>

                <!-- Tombol Tambah -->
                <a href="{{ route('superadmin.products.create') }}" class="bg-blue-700 text-white px-4 py-2 rounded hover:bg-blue-800 flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    Tambah 
                </a>
            </div>

            <div class="overflow-x-auto rounded shadow border">
                <table class="min-w-full bg-white">
                    <thead class="bg-gray-100">
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
                                <td class="px-4 py-2 border">
                                    <div class="flex justify-center gap-2">
                                        <a href="{{ route('superadmin.products.edit', $product->id) }}" class="bg-green-600 hover:bg-green-700 text-white px-3 py-1 rounded">Edit</a>
                                        <form action="{{ route('superadmin.products.destroy', $product->id) }}" method="POST" class="delete-form inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded">
                                                Hapus
                                            </button>
                                        </form>


                                        @if($product->gambar)
                                            <button onclick="showModal('{{ asset('storage/' . $product->gambar) }}', {
                                                name: '{{ $product->name }}',
                                                subCategory: '{{ $product->subCategory->name ?? '-' }}',
                                                category: '{{ $product->subCategory->category->name ?? '-' }}',
                                                serialNumber: '{{ $product->serial_number }}',
                                                yearOfBuild: '{{ $product->year_of_build }}',
                                                stock: '{{ $product->stock }}',
                                                contact: '{{ $product->contact->no_wa ?? '-' }}',
                                                brosur: '{{ asset('storage/' . $product->brosur) }}',
                                                subImages: [
                                                    @foreach ($product->images as $subImage)
                                                        '{{ asset('storage/' . $subImage->image_path) }}',
                                                    @endforeach
                                                ]
                                            })" class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded flex items-center justify-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                </svg>
                                            </button>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center py-4 text-gray-500">
                                    Data tidak ada 
                                    <strong>{{ request('search') }}</strong>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </main>
</div>

<!-- Modal -->
<div id="imageModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden z-50">
    <div class="bg-white p-6 rounded-lg shadow-lg relative max-w-3xl w-full overflow-auto">
        <button onclick="closeModal()" class="absolute top-3 right-3 text-gray-500 hover:text-red-600 transition duration-300 text-2xl">&times;</button>
        <img id="modalImage" src="" alt="Gambar Produk" class="w-[500px] h-[300px] object-contain bg-white mx-auto rounded-md shadow-lg transition-transform duration-300 hover:scale-105" />
        <div id="subImagesContainer" class="flex justify-center gap-4 mt-6 flex-wrap"></div>
        <div class="mt-4 flex justify-center">
            <button onclick="restoreMainImage()" class="bg-blue-600 text-white px-2 py-1 rounded-md hover:bg-blue-700 transition">🔙 Gambar Utama</button>
        </div>
        <div id="productInfo" class="mt-6 space-y-4">
            <h3 class="font-bold text-3xl text-gray-800" id="productName"></h3>
            <div class="grid grid-cols-2 gap-4">
                <p class="text-lg text-gray-700"><span class="font-semibold mr-2">📁 Kategori:</span><span id="category"></span></p>
                <p class="text-lg text-gray-700"><span class="font-semibold mr-2">📂 Sub Kategori:</span><span id="subCategory"></span></p>
                <p class="text-lg text-gray-700"><span class="font-semibold mr-2">🔢 Nomor Seri:</span><span id="serialNumber"></span></p>
                <p class="text-lg text-gray-700"><span class="font-semibold mr-2">📅 Tahun Pembuatan:</span><span id="yearOfBuild"></span></p>
                <p class="text-lg text-gray-700"><span class="font-semibold mr-2">📦 Stok:</span><span id="stock"></span></p>
                <p class="text-lg text-gray-700"><span class="font-semibold mr-2">📞 Kontak:</span><span id="contact"></span></p>
                <p class="text-lg text-gray-700 col-span-2"><span class="font-semibold mr-2">📄 Brosur:</span><a href="#" id="brosurLink" class="text-blue-600 underline hover:text-blue-800">excavator.pdf</a></p>
            </div>
        </div>
    </div>
</div>

<script>
function showModal(imageUrl, product) {
    document.getElementById('modalImage').src = imageUrl;
    window.originalImageSrc = imageUrl;

    document.getElementById('productName').textContent = product.name;
    document.getElementById('subCategory').textContent = product.subCategory;
    document.getElementById('category').textContent = product.category;
    document.getElementById('serialNumber').textContent = product.serialNumber || '-';
    document.getElementById('yearOfBuild').textContent = product.yearOfBuild || 'N/A';
    document.getElementById('stock').textContent = product.stock;
    document.getElementById('contact').textContent = product.contact;

    const brosurLink = document.getElementById('brosurLink');
    if (product.brosur) {
        brosurLink.textContent = product.brosur.split('/').pop();
        brosurLink.href = product.brosur;
    } else {
        brosurLink.textContent = '-';
        brosurLink.removeAttribute('href');
    }

    const subImagesContainer = document.getElementById('subImagesContainer');
    subImagesContainer.innerHTML = '';
    if (product.subImages && product.subImages.length > 0) {
        product.subImages.forEach(subImageUrl => {
            const img = document.createElement('img');
            img.src = subImageUrl;
            img.className = "w-20 h-20 object-cover rounded cursor-pointer border hover:scale-105 transition";
            img.onclick = () => modalImage.src = subImageUrl;
            subImagesContainer.appendChild(img);
        });
    } else {
        const noImageMessage = document.createElement('p');
        noImageMessage.textContent = "Tidak ada sub gambar tersedia.";
        noImageMessage.className = "text-gray-500 text-center w-full mt-4";
        subImagesContainer.appendChild(noImageMessage);
    }

    document.getElementById('imageModal').classList.remove('hidden');
}

function closeModal() {
    document.getElementById('imageModal').classList.add('hidden');
}

function restoreMainImage() {
    document.getElementById('modalImage').src = window.originalImageSrc;
}
</script>

<!-- sweet alert -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready(function () {
        $('.delete-form').on('submit', function (e) {
            e.preventDefault(); // Mencegah form submit langsung

            const form = this; // Simpan referensi form

            Swal.fire({
                title: 'Yakin ingin menghapus?',
                text: "Data yang dihapus tidak dapat dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Ya, hapus!'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    });
</script>

<!-- notif berhasil -->
@if (session('success'))
    <script>
        $(document).ready(function () {
            Swal.fire({
                title: 'Berhasil!',
                text: '{{ session('success') }}',
                icon: 'success',
                confirmButtonColor: '#3085d6',
                timer: 2500,
                showConfirmButton: false
            });
        });
    </script>
@endif

</body>
</html>
