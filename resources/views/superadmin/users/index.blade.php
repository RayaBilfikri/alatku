<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Kelola User</title>
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
                <h2 class="text-xl font-bold">Data User</h2>
                <a href="{{ route('users.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
                    + Tambah
                </a>
            </div>

            {{-- Notifikasi --}}
            @if (session('success'))
                <div class="mb-4 bg-green-100 text-green-800 px-4 py-2 rounded shadow">
                    {{ session('success') }}
                </div>
            @endif

            <div class="overflow-x-auto rounded shadow border">
                <table class="min-w-full bg-white">
                    <thead class="bg-gray-100">
                    <tr>
                        <th class="px-4 py-2 border">No</th>
                        <th class="px-4 py-2 border">Nama</th>
                        <th class="px-4 py-2 border">Email</th>
                        <th class="px-4 py-2 border">Role</th>
                        <th class="px-4 py-2 border">Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $index => $user)
                        <tr class="text-center">
                            <td class="px-4 py-2 border">{{ $index + 1 }}</td>
                            <td class="px-4 py-2 border">{{ $user->name }}</td>
                            <td class="px-4 py-2 border">{{ $user->email }}</td>
                            <td class="px-4 py-2 border">
                                {{ $user->roles->pluck('name')->join(', ') ?: 'Belum ada' }}
                            </td>
                            <td class="px-4 py-2 border">
                                <div class="flex justify-center items-center space-x-2">
                                    {{-- Edit --}}
                                    <a href="{{ route('users.edit', $user->id) }}"
                                    class="bg-green-600 hover:bg-green-700 text-white px-3 py-1 rounded shadow text-sm">
                                        Edit
                                    </a>

                                    {{-- Hapus --}}
                                    <form action="{{ route('users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus user ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded shadow text-sm">
                                            Hapus
                                        </button>
                                    </form>

                                    {{-- Lihat --}}
                                    <a href="{{ route('users.show', $user->id) }}"
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

                    @if ($users->isEmpty())
                        <tr>
                            <td colspan="5" class="text-center py-4 text-gray-600">Belum ada data user.</td>
                        </tr>
                    @endif
                    </tbody>
                </table>
                <div class="mt-4">
                    {{ $subcategories->onEachSide(1)->links('vendor.pagination.tailwind') }}
                </div>
            </div>
        </div>
    </main>
</div>

</body>
</html>
