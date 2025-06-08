<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Detail Produk</title>
  @vite('resources/css/app.css')
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300;400;500;700&display=swap" rel="stylesheet">

  <style>
    /* Custom class untuk lebar 60% dan 40% pada breakpoint md ke atas */
    @media (min-width: 768px) {
      .md-w-70 {
        width: 70% !important;
      }
      .md-w-30 {
        width: 30% !important;
      }
    }
    
  </style>
</head>
<body class="min-h-screen bg-gradient-to-b from-white to-orange-50 text-gray-800 font-sans">

  <div class="max-w-6xl mx-auto px-4 py-6">

    <!-- Tombol Kembali -->
    <div class="w-full pl-4 mb-12">
      @if (request('from') === 'home')
        <a href="{{ route('home') }}" class="inline-flex items-center text-white bg-orange-600 hover:bg-orange-700 px-4 py-2 rounded-lg shadow-md transition font-semibold">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 122.88 108.06" class="w-5 h-5 fill-current mr-2" aria-hidden="true">
            <path d="M63.94,24.28a14.28,14.28,0,0,0-20.36-20L4.1,44.42a14.27,14.27,0,0,0,0,20l38.69,39.35a14.27,14.27,0,0,0,20.35-20L48.06,68.41l60.66-.29a14.27,14.27,0,1,0-.23-28.54l-59.85.28,15.3-15.58Z"/>
          </svg>
          Kembali ke Beranda
        </a>
      @else
        <a href="{{ route('catalog.index') }}" class="inline-flex items-center text-white bg-orange-600 hover:bg-orange-700 px-4 py-2 rounded-lg shadow-md transition font-semibold">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 122.88 108.06" class="w-5 h-5 fill-current mr-2" aria-hidden="true">
            <path d="M63.94,24.28a14.28,14.28,0,0,0-20.36-20L4.1,44.42a14.27,14.27,0,0,0,0,20l38.69,39.35a14.27,14.27,0,0,0,20.35-20L48.06,68.41l60.66-.29a14.27,14.27,0,1,0-.23-28.54l-59.85.28,15.3-15.58Z"/>
          </svg>
          Kembali ke Katalog
        </a>
      @endif
    </div>

    <!-- Wrapper Flexbox Responsive -->
    <div class="flex flex-col md:flex-row gap-6 mb-6 w-full max-w-screen-lg mx-auto">
      <!-- Kiri (Gambar Produk) - 60% di md ke atas -->
      <div class="w-full md-w-70 bg-orange-100 rounded-xl p-4 shadow-md">
        <img src="{{ asset('storage/' . $product->gambar) }}" alt="{{ $product->name }}"
            class="w-full h-72 object-cover rounded-md mb-4">

        @if($product->images && $product->images->count())
          <div class="flex gap-2 overflow-x-auto">
            @foreach($product->images as $image)
              <img src="{{ asset('storage/' . $image->image_path) }}"
                  class="w-24 h-20 object-cover rounded border" alt="">
            @endforeach
          </div>
        @endif
      </div>

      <!-- Kanan (Info Produk) - 40% di md ke atas -->
      <div class="w-full md-w-30 bg-white rounded-xl p-6 shadow-lg border border-orange-200 space-y-4 flex flex-col
            hover:shadow-xl hover:scale-[1.02] transition-transform duration-300 ease-in-out">
        <h2 class="text-2xl font-bold text-gray-900 font-montserrat">{{ $product->name }}</h2>

        <p class="text-sm text-gray-700 font-montserrat">Serial number:
          <span class="font-semibold text-gray-900 font-montserrat">{{ $product->serial_number }}</span>
        </p>
        <p class="text-sm text-gray-700 font-montserrat">Stok:
          <span class="font-semibold text-gray-900 font-montserrat">{{ $product->stock }}</span>
        </p>

        <div class="grid grid-cols-2 gap-3 mt-4">
          <!-- Tahun -->
          <div class="bg-indigo-600 text-white text-center rounded-lg py-3 text-sm shadow-sm font-montserrat">
            <div class="text-xs opacity-90 flex items-center font-semibold justify-center gap-1">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                  stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
              </svg>
              Tahun
            </div>
            <div class="font-medium text-base">{{ $product->year_of_build }}</div>
          </div>

          <!-- Jam Operasi -->
          <div class="bg-indigo-600 text-white text-center rounded-lg py-3 text-sm shadow-sm font-montserrat">
            <div class="text-xs opacity-90 flex items-center justify-center font-semibold gap-1">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                  stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
              </svg>
              Jam Operasi
            </div>
            <div class="font-semibold text-base">{{ number_format($product->hours_meter, 0, ',', '.') }} jam</div>
          </div>
        </div>

        <div class="flex-grow"></div>

        <!-- Harga -->
        <div class="bg-orange-500 text-white font-semibold text-center py-3 rounded-lg text-xl font-montserrat shadow hover:shadow-md transition">
          Rp{{ number_format($product->harga, 0, ',', '.') }}
        </div>

        <!-- Tombol WhatsApp -->
        @php
          $rawNumber = preg_replace('/[^0-9]/', '', $product->contact->no_wa);
          $waNumber = str_starts_with($rawNumber, '0') ? '+62' . substr($rawNumber, 1) : $rawNumber;
          $waMessage = urlencode("Halo, saya tertarik dengan produk {$product->name}. Boleh minta info lebih lanjut?");
        @endphp

        <a href="https://wa.me/{{ $waNumber }}?text={{ $waMessage }}" target="_blank" class="mt-4 block">
          <button class="w-full flex items-center justify-center gap-2 border border-green-600 text-green-600 font-medium py-2 rounded-lg bg-white hover:bg-green-50 shadow transition duration-150">
            <img src="https://img.icons8.com/fluency/24/000000/whatsapp.png" class="w-5 h-5" />
            Hubungi via WhatsApp
          </button>
        </a>
      </div>
    </div>

    <!-- Deskripsi Produk (Full Width di Bawah) -->
    <div class="bg-white p-6 rounded-xl shadow-lg border border-orange-200">
      <h3 class="font-bold text-lg mb-4 text-gray-900 font-montserrat">Deskripsi Produk</h3>
      <p class="text-sm text-gray-700 leading-relaxed font-montserrat mb-4">
        {{ $product->description }}
      </p>
      @if ($product->brosur)
        <a href="{{ asset('storage/' . $product->brosur) }}"
          download="brosur-{{ Str::slug($product->name) }}.pdf"
          class="inline-flex items-center text-white bg-orange-500 hover:bg-indigo-600 px-4 py-2 rounded-md font-semibold">
          <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M4 16v2a2 2 0 002 2h12a2 2 0 002-2v-2M7 10l5 5m0 0l5-5m-5 5V4" />
          </svg>
          Download Brosur
        </a>
      @endif
    </div>

  </div>

</body>
</html>