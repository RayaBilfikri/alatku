<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Superadmin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;900&display=swap" rel="stylesheet">
</head>
<body class="bg-gray-100 font-sans">

<div class="flex h-screen">
    <!-- ✅ Sidebar -->
    @include('partials.sidebar')

    <!-- ✅ Main Content -->
    <main class="flex-1 p-6 overflow-y-auto">
        <!-- Header atau user info -->
    <div class="bg-white z-10 flex justify-end items-center h-20 border-b mb-4 px-6">
        <div class="flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 15c2.485 0 4.797.654 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0z" />
            </svg>
            <span>Super Admin</span>
        </div>
    </div>

        <!-- Dynamic content -->
        @yield('content')
    </main>
</div>

</body>
</html>
