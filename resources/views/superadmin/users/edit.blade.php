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

        <div class="bg-white p-6 rounded shadow-md w-full lg:max-w-3xl mx-auto">
            <h2 class="text-2xl font-semibold mb-6 text-center">Edit Role User</h2>

            <form action="{{ route('superadmin.users.edit', $user->id) }}" method="POST">
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
                <div class="mb-6 flex items-start space-x-6">
                    <label for="roles" class="w-40 text-sm font-medium mt-2">Pilih Role</label>
                    <div class="flex-1">
                        @foreach($roles as $role)
                            <div class="flex items-center mb-2">
                                <input type="checkbox" name="roles[]" id="role-{{ $role->id }}" value="{{ $role->id }}"
                                    {{ (is_array(old('roles')) && in_array($role->id, old('roles'))) || $user->roles->contains('id', $role->id) ? 'checked' : '' }}
                                    class="mr-2">
                                <label for="role-{{ $role->id }}">{{ $role->name }}</label>
                            </div>
                        @endforeach

                        @error('roles')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Tombol -->
                <div class="flex justify-start space-x-4">
                    <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded-md">
                        Perbarui
                    </button>
                    <a href="{{ route('users.index') }}"
                       class="bg-red-500 hover:bg-red-600 text-white px-6 py-3 rounded-md">
                        Batal
                    </a>
                </div>
            </form>
        </div>
    </main>
</div>

</body>
</html>
