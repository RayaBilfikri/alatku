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

    <!-- Main content -->
    <main class="flex-1 bg-gray-50 p-6">
        <!-- Header -->
        @include('partials.header')

        <!-- Detail Role -->
        <div class="bg-white p-6 rounded shadow-md w-full lg:max-w-5xl mx-auto">
            <h2 class="text-2xl font-semibold mb-6 text-center">Detail Role</h2>

            <!-- Nama Role -->
            <div class="mb-4">
                <label class="block font-medium text-gray-700">Nama Role:</label>
                <p class="mt-1 text-lg text-gray-900">{{ $role->name }}</p>
            </div>

            <!-- Permissions -->
            <div class="mb-4">
                <label class="block font-medium text-gray-700">Permissions:</label>
                <div class="mt-2 flex flex-wrap gap-2">
                    @forelse ($role->permissions as $permission)
                        <span class="inline-block bg-blue-100 text-blue-800 text-sm px-3 py-1 rounded-full">
                            {{ $permission->name }}
                        </span>
                    @empty
                        <p class="text-gray-500">Tidak ada permissions yang terkait.</p>
                    @endforelse
                </div>
            </div>

            <!-- Tombol Aksi -->
            <div class="mt-6 flex justify-start space-x-4">
                <a href="{{ route('roles.edit', $role->id) }}"
                   class="bg-yellow-500 hover:bg-yellow-600 text-white px-6 py-3 rounded-md">
                    Edit
                </a>
                <a href="{{ route('roles.index') }}"
                   class="bg-gray-500 hover:bg-gray-600 text-white px-6 py-3 rounded-md">
                    Kembali
                </a>
            </div>
        </div>
    </main>
</div>

</body>
</html>
