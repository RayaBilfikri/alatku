<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Kelola Ulasan</title>
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
        <div class="flex justify-end items-center h-20 border-b mb-4">
            <div class="flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                     viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M5.121 17.804A13.937 13.937 0 0112 15c2.485 0 4.797.654 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0z"/>
                </svg>
                <span>Super Admin</span>
            </div>
        </div>

        <!-- Konten Tabel Ulasan -->
        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-xl font-bold">Data Ulasan</h2>
            </div>

            <div class="overflow-x-auto rounded shadow border">
                <table class="min-w-full bg-white">
                    <thead class="bg-gray-100">
                    <tr>
                        <th class="px-4 py-2 border">No</th>
                        <th class="px-4 py-2 border">Nama Pengirim</th>
                        <th class="px-4 py-2 border">Isi Ulasan</th>
                        <th class="px-4 py-2 border">Status</th>
                        <th class="px-4 py-2 border">Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($ulasans as $index => $ulasan)
                        <tr class="text-center">
                            <td class="px-4 py-2 border">{{ $index + 1 }}</td>
                            <td class="px-4 py-2 border">{{ $ulasan->user->name ?? 'Anonim' }}</td>
                            <td class="px-4 py-2 border text-left">{{ $ulasan->content }}</td>
                            <td class="px-4 py-2 border capitalize">
                                @if($ulasan->status === 'approved')
                                    <span class="text-green-600 font-semibold">Disetujui</span>
                                @elseif($ulasan->status === 'pending')
                                    <span class="text-yellow-500 font-semibold">Menunggu</span>
                                @else
                                    <span class="text-red-600 font-semibold">Ditolak</span>
                                @endif
                            </td>
                            <td class="px-4 py-2 border space-x-2">
                                @if ($ulasan->status === 'pending')
                                    <form action="{{ route('superadmin.ulasans.approve', $ulasan->id) }}" method="POST" class="inline-block">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-3 py-1 rounded">
                                            Setujui
                                        </button>
                                    </form>

                                    <form action="{{ route('superadmin.ulasans.reject', $ulasan->id) }}" method="POST" class="inline-block">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded">
                                            Tolak
                                        </button>
                                    </form>
                                @endif

                                @if ($ulasan->status === 'approved')
                                    <form action="{{ route('superadmin.ulasans.destroy', $ulasan->id) }}" method="POST" class="inline-block"
                                          onsubmit="return confirm('Yakin ingin menghapus ulasan ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded">
                                            Hapus
                                        </button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @endforeach

                    @if ($ulasans->isEmpty())
                        <tr>
                            <td colspan="5" class="text-center py-4">Tidak ada data ulasan.</td>
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
