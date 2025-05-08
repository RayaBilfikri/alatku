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
    <!-- Sidebar -->
    @include('partials.sidebar')

    <!-- Content Area -->
    <main class="flex-1 bg-gray-50 p-6">
        <!-- Header -->
        @include('partials.header')

        <div class="flex justify-between items-center mb-4">
            <h2 class="text-xl font-bold">Data Produk</h2>
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
                    @foreach($products as $index => $product)
                        <tr class="text-center">
                            <td class="px-4 py-2 border">{{ $index + 1 }}</td>
                            <td class="px-4 py-2 border">{{ $product->name }}</td>
                            <td class="px-4 py-2 border">{{ $product->subCategory->category->name ?? '-' }}</td>
                            <td class="px-4 py-2 border">{{ $product->subCategory->name ?? '-' }}</td>
                            <td class="px-4 py-2 border">{{ $product->contact->no_wa ?? '-' }}</td>
                            <td class="px-4 py-2 border">
                                <div class="flex justify-center gap-2">
                                    <a href="{{ route('superadmin.products.edit', $product->id) }}" class="bg-green-600 hover:bg-green-700 text-white px-3 py-1 rounded">Edit</a>
                                    <form action="{{ route('superadmin.products.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus produk ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded">Hapus</button>
                                    </form>

                                    @if($product->gambar)
                                    <button onclick="showModal('{{ asset($product->gambar) }}')" class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded flex items-center justify-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                        </svg>
                                    </button>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @endforeach

                    @if($products->isEmpty())
                        <tr>
                            <td colspan="11" class="text-center py-4">Belum ada data produk.</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </main>
</div>

<!-- Modal untuk melihat gambar -->
<div id="gambarModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
    <div class="bg-white p-6 rounded">
        <button onclick="closeModal()" class="text-gray-500">X</button>
        <img id="gambarLogo" src="" alt="product" class="max-w-xs mx-auto mt-4">
    </div>
</div>

<script>
    // Fungsi untuk membuka modal dan menampilkan gambar
    function showModal(gambarUrl) {
        const modal = document.getElementById('gambarModal');
        const modalImage = document.getElementById('gambarLogo');
        modalImage.src = gambarUrl;
        modal.classList.remove('hidden'); // Menampilkan modal
    }

    // Fungsi untuk menutup modal
    function closeModal() {
        const modal = document.getElementById('gambarModal');
        modal.classList.add('hidden'); // Menyembunyikan modal
    }
</script>



</body>
</html>
