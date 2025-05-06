<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Kelola How To Buy</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('resources/app.css') }}">
</head>
<body class="bg-gray-100 font-sans">

<div class="flex h-screen">
    <!-- Sidebar -->
    @include('partials.sidebar')

    <!-- Content Area -->
    <main class="flex-1 bg-gray-50 p-6">
        <!-- Header -->
        @include('partials.header')

        <!-- Konten Tabel How To Buy -->
        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-xl font-bold">Data How To Buy</h2>
                <a href="{{ route('superadmin.howtobuys.create') }}"
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
                        <th class="px-4 py-2 border">Judul</th>
                        <th class="px-4 py-2 border">Deskripsi</th>
                        <th class="px-4 py-2 border">Step Number</th>
                        <th class="px-4 py-2 border">Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($howtobuys as $index => $howtobuy)
                        <tr class="text-center">
                            <td class="px-4 py-2 border">{{ $index + 1 }}</td>
                            <td class="px-4 py-2 border">{{ $howtobuy->judul }}</td>
                            <td class="px-4 py-2 border">{{ $howtobuy->deskripsi }}</td>
                            <td class="px-4 py-2 border">{{ $howtobuy->step_number }}</td>
                            <td class="px-4 py-2 border space-x-2">
                                <a href="{{ route('superadmin.howtobuys.edit', $howtobuy->id) }}"
                                   class="bg-green-600 hover:bg-green-700 text-white px-3 py-1 rounded">Edit</a>

                                <form action="{{ route('superadmin.howtobuys.destroy', $howtobuy->id) }}"
                                      method="POST" class="inline-block"
                                      onsubmit="return confirm('Yakin ingin menghapus step ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                    @if ($howtobuys->isEmpty())
                        <tr>
                            <td colspan="5" class="text-center py-4">Tidak ada data How To Buy.</td>
                        </tr>
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </main>
</div>

</body>
</html>
