<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Role User</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&display=swap" rel="stylesheet">
</head>
<body class="bg-gray-100 font-sans">

<div class="flex min-h-screen">
    @include('partials.sidebar')

    <main class="flex-1 bg-gray-50 p-6">
        @include('partials.header')

        <div class="bg-white shadow-md rounded-lg p-6 mx-auto">
            <h2 class="text-2xl font-bold text-gray-800 mb-6">Edit Role User</h2>

            <form action="{{ route('users.update', $user->id) }}" method="POST">
                @csrf
                @method('PUT')


                <!-- Nama -->
                <div class="mb-6 flex items-center space-x-6">
                    <label class="w-40 text-sm font-medium">Nama</label>
                    <input type="text" value="{{ $user->name }}" disabled
                        class="flex-1 bg-gray-100 border border-gray-300 rounded px-4 py-3 text-gray-700">
                </div>

                <!-- Email -->
                <div class="mb-6 flex items-center space-x-6">
                    <label class="w-40 text-sm font-medium">Email</label>
                    <input type="text" value="{{ $user->email }}" disabled
                        class="flex-1 bg-gray-100 border border-gray-300 rounded px-4 py-3 text-gray-700">
                </div>

                <!-- Pilih Role -->
                <div class="mb-6 flex items-center space-x-6">
                    <label for="roles" class="w-40 text-sm font-medium">Pilih Role</label>
                    <select name="roles[]" id="roles" multiple
                        class="flex-1 h-28 px-4 py-3 border border-gray-300 rounded bg-gray-100 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        @foreach($roles as $role)
                            <option value="{{ $role->id }}" @if(collect(old('roles', $user->roles->pluck('id')))->contains($role->id)) selected @endif>
                                {{ $role->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('roles')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>



                {{-- Action Buttons --}}
                <div class="flex justify-end space-x-2">
                    <a href="{{ route('users.index') }}"
                        class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-4 py-2 rounded-lg transition">
                        Batal
                    </a>
                    <button type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg transition font-semibold">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </main>
</div>

</body>
</html>
