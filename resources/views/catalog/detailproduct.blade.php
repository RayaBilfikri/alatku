<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Detail Produk</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-gradient-to-r from-orange-500 to-orange-600">

  <div class="max-w-6xl mx-auto px-4 py-6">
    <!-- Back button -->
<!-- Tambahkan padding kiri sendiri dan full width -->
    <div class="w-full pl-4 mb-6">
        <a href="{{ route('catalog') }}" class="flex items-center text-white font-bold text-lg">
        <svg xmlns="http://www.w3.org/2000/svg" 
            viewBox="0 0 122.88 108.06" 
            class="w-5 h-5 text-white fill-current mr-2" 
            aria-hidden="true">
        <path d="M63.94,24.28a14.28,14.28,0,0,0-20.36-20L4.1,44.42a14.27,14.27,0,0,0,0,20l38.69,39.35a14.27,14.27,0,0,0,20.35-20L48.06,68.41l60.66-.29a14.27,14.27,0,1,0-.23-28.54l-59.85.28,15.3-15.58Z"/>
        </svg>
            Detail Produk
        </a>
    </div>

    <!-- Main Grid -->
    <div class="grid md:grid-cols-3 gap-6 mb-6">
      <!-- Left Box -->
      <div class="md:col-span-2 bg-orange-100 rounded-xl p-4 shadow-md">
        <img src="images/xcmg-main.jpg" alt="XCMG XE215C" class="w-full h-72 object-cover rounded-md mb-4">
        <div class="flex gap-2 overflow-x-auto">
          <img src="images/xcmg-1.jpg" class="w-24 h-20 object-cover rounded border" alt="">
          <img src="images/xcmg-2.jpg" class="w-24 h-20 object-cover rounded border" alt="">
          <img src="images/xcmg-3.jpg" class="w-24 h-20 object-cover rounded border" alt="">
          <img src="images/xcmg-4.jpg" class="w-24 h-20 object-cover rounded border" alt="">
        </div>
      </div>

      <!-- Right Box -->
      <div class="bg-orange-100 rounded-xl p-6 shadow-md space-y-4">
        <h2 class="text-xl font-bold text-gray-900">XCMG Excavator XE215C</h2>
        <p class="text-sm text-gray-800">Serial number: <span class="font-semibold">h1234</span></p>
        <p class="text-sm text-gray-800">Stok number: <span class="font-semibold">12</span></p>

        <div class="flex gap-3 mt-4">
          <div class="flex-1 bg-indigo-600 text-white text-center rounded-lg py-2 text-sm shadow-sm">
            <div class="text-xs opacity-90">📅 Tahun</div>
            <div class="font-semibold text-base">2023</div>
          </div>
          <div class="flex-1 bg-indigo-600 text-white text-center rounded-lg py-2 text-sm shadow-sm">
            <div class="text-xs opacity-90">⏱️ Jam operasi</div>
            <div class="font-semibold text-base">2,824 jam</div>
          </div>
        </div>

        <div class="bg-orange-500 text-white font-bold text-center py-3 rounded-lg text-lg shadow-md">
          Rp430.000.000
        </div>

        <button class="w-full flex items-center justify-center gap-2 border border-green-600 text-green-600 font-semibold py-2 rounded-lg bg-white shadow-sm hover:bg-green-50 transition">
          <img src="https://img.icons8.com/fluency/24/000000/whatsapp.png" class="w-5 h-5" />
          Hubungi
        </button>
      </div>
    </div>

    <!-- Description -->
    <div class="bg-orange-100 p-6 rounded-xl shadow-md">
      <h3 class="font-bold text-lg mb-2 text-gray-900">Deskripsi Produk</h3>
      <p class="text-sm text-gray-800 leading-relaxed">
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
      </p>
    </div>
  </div>

</body>
</html>
