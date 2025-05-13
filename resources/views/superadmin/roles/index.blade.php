<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Kelola Role</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('resources/app.css') }}">
</head>
<body class="bg-gray-100 font-sans">

<div class="flex h-screen">
    @include('partials.sidebar')

    <main class="flex-1 bg-gray-50 p-6">
        @include('partials.header')

        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-xl font-bold">Data Role</h2>
                <a href="{{ route('superadmin.roles.create') }}"
                   class="bg-blue-700 text-white px-4 py-2 rounded hover:bg-blue-800 flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                         viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M12 4v16m8-8H4"/>
                    </svg>
                    Tambah
                </a>
            </div>

            <div class="overflow-x-auto rounded shadow border">
                <table class="min-w-full bg-white">
                    <thead class="bg-gray-100">
                    <tr>
                        <th class="px-4 py-2 border">No</th>
                        <th class="px-4 py-2 border">Nama Role</th>
                        <th class="px-4 py-2 border">Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($roles as $index => $role)
                        <tr class="text-center">
                            <td class="px-4 py-2 border">{{ $index + 1 }}</td>
                            <td class="px-4 py-2 border">{{ $role->name }}</td>
                            <td class="px-4 py-2 border">
                            <div class="flex justify-center items-center space-x-2">
                                <!-- Tombol Edit -->
                                <a href="{{ route('superadmin.roles.edit', $role->id) }}"
                                class="bg-green-600 hover:bg-green-700 text-white px-3 py-1 rounded focus:outline-none border-none">
                                    Edit
                                </a>

                                <!-- Tombol Hapus -->
                                <form action="{{ route('superadmin.roles.destroy', $role->id) }}"
                                    method="POST" class="inline-block"
                                    onsubmit="return confirm('Yakin ingin menghapus role ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded focus:outline-none border-none">
                                        Hapus
                                    </button>
                                </form>

                                <!-- Tombol Lihat -->
                                <a href="{{ route('superadmin.roles.show', $role->id) }}"
                                class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded flex items-center justify-center focus:outline-none border-none"
                                title="Lihat Role">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                    </svg>
                                </a>
                            </div>
                        </td>
                        </tr>
                    @endforeach

                    @if ($roles->isEmpty())
                        <tr>
                            <td colspan="3" class="text-center py-4">Belum ada role.</td>
                        </tr>
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </main>
</div>
<!-- Modal for viewing icon -->
<div id="iconModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
    <div class="bg-white p-6 rounded">
        <button onclick="closeModal()" class="text-gray-500 hover:text-red-500">X</button>
        <img id="modalIcon" src="" alt="Icon" class="max-w-md mx-auto mt-4">
    </div>
</div>

<script>
    function showModal(iconUrl) {
        const modal = document.getElementById('iconModal');
        const modalImage = document.getElementById('modalIcon');
        modalImage.src = iconUrl;
        modal.classList.remove('hidden');
    }

    function closeModal() {
        const modal = document.getElementById('iconModal');
        modal.classList.add('hidden');
    }
</script>
</body>
</html>
