
<div class="min-h-screen px-6 py-6 bg-gradient-to-br from-orange-400 to-orange-600 text-gray-800">
    <!-- Kembali -->
    <div class="text-white font-semibold text-lg mb-4 flex items-center space-x-2">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 cursor-pointer" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
        </svg>
        <span>Detail Produk</span>
    </div>

    <!-- Konten Utama -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Kolom Gambar -->
        <div class="lg:col-span-2 bg-[#fff3e0] rounded-xl p-4 shadow">
            <!-- Gambar Utama -->
            <div class="rounded-xl overflow-hidden">
                <img src="/images/xcmg-main.jpg" alt="XCMG XE215C" class="w-full h-64 object-cover rounded-xl">
            </div>
            <!-- Gambar Galeri -->
            <div class="mt-4 flex gap-2 overflow-x-auto">
                <img src="/images/xcmg-1.jpg" class="w-24 h-16 object-cover rounded-lg border border-gray-300" />
                <img src="/images/xcmg-2.jpg" class="w-24 h-16 object-cover rounded-lg border border-gray-300" />
                <img src="/images/xcmg-3.jpg" class="w-24 h-16 object-cover rounded-lg border border-gray-300" />
                <img src="/images/xcmg-4.jpg" class="w-24 h-16 object-cover rounded-lg border border-gray-300" />
            </div>
        </div>

        <!-- Kolom Detail -->
        <div class="bg-white p-6 rounded-xl shadow space-y-4">
            <h2 class="text-xl font-semibold">XCMG Excavator XE215C</h2>
            <p class="text-sm text-gray-600">Serial number: <span class="font-medium">h1234</span></p>
            <p class="text-sm text-gray-600 mb-4">Stok number: <span class="font-medium">12</span></p>

            <div class="flex justify-between gap-2 text-sm font-medium">
                <div class="bg-blue-100 text-blue-800 px-3 py-1 rounded-xl w-1/2 text-center">
                    <p class="text-xs">Tahun</p>
                    <p class="text-sm font-semibold">2023</p>
                </div>
                <div class="bg-blue-100 text-blue-800 px-3 py-1 rounded-xl w-1/2 text-center">
                    <p class="text-xs">Jam operasi</p>
                    <p class="text-sm font-semibold">2,824 jam</p>
                </div>
            </div>

            <div class="bg-gradient-to-r from-orange-400 to-orange-600 text-white text-center font-bold text-lg py-2 rounded-xl shadow">
                Rp430.000.000
            </div>

            <button class="flex items-center justify-center w-full border border-gray-300 text-green-600 font-semibold py-2 rounded-xl hover:bg-green-50 transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8m-9 4v8" />
                </svg>
                Hubungi
            </button>
        </div>
    </div>

    <!-- Deskripsi -->
    <div class="mt-6 bg-[#fff3e0] p-6 rounded-xl shadow">
        <h3 class="text-lg font-semibold mb-2">Deskripsi Produk</h3>
        <p class="text-sm leading-relaxed text-gray-700">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
        </p>
    </div>
</div>
