<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tambah Role</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
</head>
<body class="bg-gray-100 font-sans">

<div class="flex min-h-screen">
    {{-- Sidebar --}}
    @include('partials.sidebar')

    {{-- Main Content --}}
    <main class="flex-1 p-6">
        @include('partials.header')

        <div class="bg-white shadow-md rounded-lg p-6 max-w-3xl mx-auto">
            <h2 class="text-2xl font-bold text-gray-800 mb-6">Tambah Role Baru</h2>

            {{-- Flash Message --}}
            @if(session('success'))
                <div class="bg-green-100 text-green-800 p-3 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            {{-- Form Start --}}
            <form action="{{ route('roles.store') }}" method="POST">
                @csrf

                {{-- Role Name --}}
                <div class="mb-4">
                    <label for="name" class="block text-gray-700 font-semibold mb-2">Nama Role</label>
                    <input type="text" name="name" id="name" value="{{ old('name') }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                        placeholder="Contoh: Super Admin, Admin, Broker">
                    @error('name')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Permissions --}}
                <div class="mb-6">
                    <label class="block text-gray-700 font-semibold mb-2">Pilih Permissions</label>
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-2">
                        @foreach($permissions as $permission)
                            <label class="flex items-center space-x-2 text-sm">
                                <input type="checkbox" name="permissions[]" value="{{ $permission->name }}"
                                    class="text-blue-600 border-gray-300 rounded">
                                <span>{{ ucwords(str_replace('_', ' ', $permission->name)) }}</span>
                            </label>
                        @endforeach
                    </div>
                    @error('permissions')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Action Buttons --}}
                <div class="flex justify-end space-x-2">
                    <a href="{{ route('roles.index') }}"
                        class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-4 py-2 rounded-lg transition">
                        Batal
                    </a>
                    <button type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg transition font-semibold">
                        Simpan
                    </button>
                </div>
            </form>
            {{-- Form End --}}
        </div>
    </main>
</div>

</body>
</html>
