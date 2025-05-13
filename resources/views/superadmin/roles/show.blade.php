<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Detail Role</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&display=swap" rel="stylesheet">
</head>
<body class="bg-gray-100 font-sans">

<div class="flex min-h-screen">
    <!-- Sidebar -->
    @include('partials.sidebar')

    <!-- Main Content -->
    <main class="flex-1 bg-gray-50 p-6">
        @include('partials.header')

        <div class="bg-white shadow-md rounded-lg p-6 mx-auto">
            <h2 class="text-2xl font-bold text-gray-800 mb-6">Detail Role</h2>

            <table class="w-full text-left table-auto border border-gray-200 rounded-lg overflow-hidden">
                <tbody class="divide-y divide-gray-200">
                    <tr>
                        <th class="px-6 py-4 font-medium text-gray-700 w-1/4">
                            <div class="flex justify-between">
                                <span>Nama Role</span>
                                <span>:</span>
                            </div>
                        </th>
                        <td class="px-6 py-4 text-gray-900">{{ $role->name }}</td>
                    </tr>
                    <tr>
                        <th class="px-6 py-4 font-medium text-gray-700 align-top">
                            <div class="flex justify-between">
                                <span>Hak Akses</span>
                                <span>:</span>
                            </div>
                        </th>
                        <td class="px-6 py-4">
                            <div class="flex flex-wrap gap-2">
                                @forelse ($role->permissions as $permission)
                                    <span class="inline-block bg-blue-100 text-blue-800 text-sm px-3 py-1 rounded-full">
                                        {{ $permission->name }}
                                    </span>
                                @empty
                                    <span class="text-gray-500">Tidak ada hak akses yang terkait.</span>
                                @endforelse
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>

            <!-- Tombol Aksi -->
            <div class="flex justify-end space-x-2 mt-6">
                <a href="{{ route('superadmin.roles.index') }}"
                   class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-6 py-2 rounded-lg transition font-semibold">
                    Batal
                </a>

                <a href="{{ route('superadmin.roles.edit', $role->id) }}"
                   class="bg-green-600 hover:bg-green-700 text-white px-6 py-2 rounded-lg transition font-semibold">
                    Edit
                </a>
            </div>
        </div>
    </main>
</div>

</body>
</html>
