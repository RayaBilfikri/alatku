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
        <div class="flex justify-end items-center mb-4">
            <span class="text-sm">👤 Nama Akun</span>
        </div>

        <!-- Dynamic content -->
        @yield('content')
    </main>
</div>

</body>
</html>
