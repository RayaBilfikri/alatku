<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <title>
        Register Page
    </title>
    <script src="https://cdn.tailwindcss.com">
    </script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&amp;display=swap" rel="stylesheet" />
    <style>
        body {
            font-family: "Poppins", sans-serif;
        }
    </style>
</head>

<body>
    <div class="min-h-screen flex items-center justify-center bg-orange-500">
        <img alt="" class="fixed inset-0 w-full h-full object-cover -z-10" height="1080" width="1920" />
        <div class="flex flex-col md:flex-row bg-white rounded-xl overflow-hidden max-w-4xl w-full mx-4 md:mx-0 shadow-xl ">
            <div class="md:w-1/2">
                <img alt="Yellow construction machine with dirt and blue sky background" class="w-full h-full object-cover" height="600" src="\images\excavator.jpg" width="600" />
            </div>
            <div class="md:w-1/2 p-8 flex flex-col justify-center">
                <div class="flex justify-center">
                    <img alt="" class="h-19 object-contain" height="60" src="/images/alatku.webp" width="140" />
                </div>
                <h2 class="text-center font-bold text-lg">
                    Selamat datang!
                </h2>
                <form method="POST" action="{{ route('login') }}" class="space-y-4">
                    @csrf
                    <div>
                        <input aria-label="Email" autocomplete="username" autofocus class="block w-full rounded-full border border-gray-400 py-2 px-4 text-sm focus:outline-none focus:ring-2 focus:ring-orange-500" id="email" name="email" placeholder="Nama" required="" type="email" value="{{ old('email') }}" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>
                    <div>
                        <input aria-label="Password" autocomplete="current-password" class="block w-full rounded-full border border-gray-400 py-2 px-4 text-sm focus:outline-none focus:ring-2 focus:ring-orange-500" id="password" name="password" placeholder="Email" required="" type="password" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <div>
                        <input aria-label="Password" autocomplete="current-password" class="block w-full rounded-full border border-gray-400 py-2 px-4 text-sm focus:outline-none focus:ring-2 focus:ring-orange-500" id="password" name="password" placeholder="Password" required="" type="password" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <div>
                        <input aria-label="Password" autocomplete="current-password" class="block w-full rounded-full border border-gray-400 py-2 px-4 text-sm focus:outline-none focus:ring-2 focus:ring-orange-500" id="password" name="password" placeholder="Konfirmasi Password" required="" type="password" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <button class="w-full rounded-full bg-orange-600 py-2 text-sm font-medium text-black transition hover:bg-orange-700" type="submit">
                        Register
                    </button>
                </form>
                <p class="text-center text-xs mt-6">
                    Sudah punya akun?
                    <a class="font-bold" href="{{ route('login') }}">
                        Login
                    </a>
                </p>
            </div>
        </div>
    </div>
</body>

</html>