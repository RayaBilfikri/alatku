<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Kelola Profil Website</title>
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

            <div class="bg-white rounded-lg shadow p-6">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-xl font-bold">Data Profil Website</h2>
                <a href="{{ route('superadmin.websiteprofiles.create') }}" class="bg-blue-700 text-white px-4 py-2 rounded hover:bg-blue-800 flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    Tambah 
                </a>
            </div>

            <div class="overflow-x-auto rounded shadow border">
                <table class="min-w-full bg-white">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-4 py-2 border">No</th>
                            <th class="px-4 py-2 border">Nama Website</th>
                            <th class="px-4 py-2 border">Logo</th>
                            <th class="px-4 py-2 border">Tentang Kami</th>
                            <th class="px-4 py-2 border">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($websiteProfiles as $index => $profile)
                        <tr class="text-center">
                            <td class="px-4 py-2 border">{{ $index + 1 }}</td>
                            <td class="px-4 py-2 border">{{ $profile->nama_website }}</td>
                            <td class="px-4 py-2 border">
                                @if($profile->logo_website)
                                <img src="{{ asset('storage/' . $profile->logo_website) }}" alt="Logo" class="h-20 mx-auto">
                                @else
                                -
                                @endif
                            </td>
                            <td class="px-4 py-2 border text-left">{{ Str::limit(strip_tags($profile->tentang_kami), 100) }}</td>
                            <td class="px-4 py-2 border">
                                <div class="flex justify-center gap-2">
                                    <a href="{{ route('superadmin.websiteprofiles.edit', $profile->id) }}" class="bg-green-600 hover:bg-green-700 text-white px-3 py-1 rounded">
                                        Edit
                                    </a>

                                    <form action="{{ route('superadmin.websiteprofiles.destroy', $profile->id) }}" method="POST" class="delete-form inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded">
                                            Hapus
                                        </button>
                                    </form>


                                    @if($profile->logo_website)
                                        <button onclick="showModal('{{ asset('storage/' . $profile->logo_website) }}')"
                                                class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded flex items-center justify-center focus:outline-none border-none">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                            </svg>
                                        </button>
                                    @endif

                                </div>
                            </td>
                        </tr>
                        @endforeach

                        @if ($websiteProfiles->isEmpty())
                        <tr>
                            <td colspan="5" class="text-center py-4">Data tidak ada</td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>

        </main>
    </div>

    <!-- Modal for viewing logo -->
    <div id="logoModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-[9999] hidden">
        <div class="bg-white p-6 rounded relative z-[10000] max-w-md w-full">
            <button onclick="closeModal()" class="absolute top-2 right-2 text-gray-500 hover:text-red-500 text-xl font-bold">×</button>
            <img id="modalLogo" src="" alt="Logo" class="w-full h-auto mt-6">
        </div>
    </div>

    <script>
        // Function to open the modal and display the logo
        function showModal(logoUrl) {
            const modal = document.getElementById('logoModal');
            const modalImage = document.getElementById('modalLogo');
            modalImage.src = logoUrl;
            modal.classList.remove('hidden');
        }

        // Function to close the modal
        function closeModal() {
            const modal = document.getElementById('logoModal');
            modal.classList.add('hidden');
        }
    </script>

    <!-- sweet alert -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function () {
            $('.delete-form').on('submit', function (e) {
                e.preventDefault(); // Mencegah form submit langsung

                const form = this; // Simpan referensi form

                Swal.fire({
                    title: 'Yakin ingin menghapus?',
                    text: "Data yang dihapus tidak dapat dikembalikan!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#6c757d',
                    confirmButtonText: 'Ya, hapus!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });
    </script>

    <!-- notif berhasil -->
    @if (session('message'))
        <script>
            $(document).ready(function () {
                Swal.fire({
                    title: 'Berhasil!',
                    text: '{{ session('message') }}',
                    icon: 'success',
                    confirmButtonColor: '#3085d6',
                    timer: 2500,
                    showConfirmButton: false
                });
            });
        </script>
    @endif

</body>

</html>
