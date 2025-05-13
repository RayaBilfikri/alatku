<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Role</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&display=swap" rel="stylesheet">
</head>
<body class="bg-gray-100 font-sans">

<div class="flex min-h-screen">
    <!-- Sidebar -->
    @include('partials.sidebar')

    {{-- Main Content --}}
    <main class="flex-1 bg-gray-50 p-6">
        @include('partials.header')

        <div class="bg-white shadow-md rounded-lg p-6 mx-auto">
            <h2 class="text-2xl font-bold text-gray-800 mb-6">Edit Role</h2>

            {{-- Flash Message --}}
            @if(session('success'))
                <div class="bg-green-100 text-green-800 p-3 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            {{-- Form Start --}}
            <form action="{{ route('roles.store') }}" method="POST">
                @csrf

                <!-- Input Nama Role -->
                <div class="mb-4">
                    <label for="name" class="block text-gray-700 font-semibold mb-2">Nama Role</label>
                    <input type="text" id="name" name="name" required
                           value="{{ old('name', $role->name) }}"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                {{-- Permissions --}}
                <div class="mb-6">
                    <label class="block text-gray-700 font-semibold mb-2">Pilih Hak Akses</label>
                    {{-- Pilih Semua --}}
                    <div class="mb-4">
                        <label class="flex items-centertext-sm font-bold text-gray-700 mb-2">
                            <input type="checkbox" id="select-all" class="form-checkbox h-4 w-4 text-blue-600">
                            <span class="ml-2">Pilih Semua Hak Akses</span>
                        </label>
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-2">
                        @foreach($permissions as $permission)
                            <label class="flex items-center space-x-2 text-sm">
                                <input type="checkbox" name="permissions[]" value="{{ $permission->name }}"
                                    class="permission-checkbox text-blue-600 border-gray-300 rounded">
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

{{-- Script Pilih Semua --}}
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const selectAll = document.getElementById('select-all');
        const checkboxes = document.querySelectorAll('.permission-checkbox');

        selectAll.addEventListener('change', function () {
            checkboxes.forEach(checkbox => {
                checkbox.checked = selectAll.checked;
            });
        });
    });
</script>

</body>
</html>
