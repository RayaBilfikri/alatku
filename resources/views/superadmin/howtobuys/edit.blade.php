<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit How to Buy</title>
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

        <!-- Form Edit How to Buy -->
        <div class="bg-white p-6 rounded shadow-md w-full lg:max-w-7xl mx-auto">
            <h2 class="text-2xl font-semibold mb-6 text-center">Edit How to Buy</h2>
            <form action="{{ route('superadmin.howtobuys.update', $howtobuy->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-6 flex items-center space-x-6">
                    <label for="judul" class="w-40 text-sm font-medium">Judul</label>
                    <input type="text" id="judul" name="judul" required
                           value="{{ old('judul', $howtobuy->judul) }}"
                           class="flex-1 border border-gray-300 rounded px-4 py-3 focus:outline-none focus:ring focus:border-blue-300">
                </div>

                <div class="mb-6 flex items-center space-x-6">
                    <label for="deskripsi" class="w-40 text-sm font-medium">Deskripsi</label>
                    <input type="text" id="deskripsi" name="deskripsi" required
                           value="{{ old('deskripsi', $howtobuy->deskripsi) }}"
                           class="flex-1 border border-gray-300 rounded px-4 py-3 focus:outline-none focus:ring focus:border-blue-300">
                </div>

                <div class="mb-6 flex items-center space-x-6">
                    <label for="step_number" class="w-40 text-sm font-medium">Step Number</label>
                    <input type="text" id="step_number" name="step_number" required
                           value="{{ old('step_number', $howtobuy->step_number) }}"
                           class="flex-1 border border-gray-300 rounded px-4 py-3 focus:outline-none focus:ring focus:border-blue-300">
                </div>

                <div class="flex justify-start space-x-4">
                    <button type="submit"
                            class="bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded-md">
                        Perbarui
                    </button>
                    <a href="{{ route('superadmin.howtobuys.index') }}"
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
