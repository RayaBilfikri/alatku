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
    <div class="w-full pl-4 mb-6">
        <a href="{{ route('catalog.index') }}" class="flex items-center text-white font-bold text-lg">
        <svg xmlns="http://www.w3.org/2000/svg" 
            viewBox="0 0 122.88 108.06" 
            class="w-5 h-5 text-white fill-current mr-2" 
            aria-hidden="true">
        <path d="M63.94,24.28a14.28,14.28,0,0,0-20.36-20L4.1,44.42a14.27,14.27,0,0,0,0,20l38.69,39.35a14.27,14.27,0,0,0,20.35-20L48.06,68.41l60.66-.29a14.27,14.27,0,1,0-.23-28.54l-59.85.28,15.3-15.58Z"/>
        </svg>
            Kembali ke Katalog
        </a>
    </div>

    <!-- Main Grid -->
    <div class="grid md:grid-cols-3 gap-6 mb-6">
      <!-- Left Box -->
      <div class="md:col-span-2 bg-orange-100 rounded-xl p-4 shadow-md">
        <img src="{{ asset('storage/' . $product->gambar) }}" alt="{{ $product->name }}" class="w-full h-72 object-cover rounded-md mb-4">
        
        @if($product->images && $product->images->count())
          <div class="flex gap-2 overflow-x-auto">
            @foreach($product->images as $image)
              <img src="{{ asset('storage/' . $image->image_path) }}" class="w-24 h-20 object-cover rounded border" alt="">
            @endforeach
          </div>
        @endif
      </div>

      <!-- Right Box -->
      <div class="bg-orange-100 rounded-xl p-6 shadow-md space-y-4">
        <h2 class="text-xl font-bold text-gray-900">{{ $product->name }}</h2>
        <p class="text-sm text-gray-800">Serial number: <span class="font-semibold">{{ $product->serial_number }}</span></p>
        <p class="text-sm text-gray-800">Stok: <span class="font-semibold">{{ $product->stock }}</span></p>

        <div class="flex gap-3 mt-4">
          <!-- Tahun -->
          <div class="flex-1 bg-indigo-600 text-white text-center rounded-lg py-2 text-sm shadow-sm">
            <div class="text-xs opacity-90 flex items-center justify-center gap-1">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
              </svg>
              Tahun
            </div>
            <div class="font-semibold text-base">{{ $product->year_of_build }}</div>
          </div>

          <!-- Jam Operasi -->
          <div class="flex-1 bg-indigo-600 text-white text-center rounded-lg py-2 text-sm shadow-sm">
            <div class="text-xs opacity-90 flex items-center justify-center gap-1">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
              </svg>
              Jam Operasi
            </div>
            <div class="font-semibold text-base">{{ number_format($product->hours_meter, 0, ',', '.') }} jam</div>
          </div>
        </div>


        <div class="bg-orange-500 text-white font-bold text-center py-3 rounded-lg text-lg shadow-md">
          Rp{{ number_format($product->harga, 0, ',', '.') }}
        </div>

        @php
            $waNumber = preg_replace('/[^0-9]/', '', $product->contact->no_wa); // Hapus karakter non-digit
            $waMessage = urlencode("Halo, saya tertarik dengan produk {$product->name}. Boleh minta info lebih lanjut?");
        @endphp
        <a href="https://wa.me/{{ $waNumber }}?text={{ $waMessage }}" target="_blank" class="mt-4 block">
          <button class="w-full flex items-center justify-center gap-2 border border-green-600 text-green-600 font-semibold py-2 rounded-lg bg-white shadow-sm hover:bg-green-50 transition">
            <img src="https://img.icons8.com/fluency/24/000000/whatsapp.png" class="w-5 h-5" />
            Hubungi via WhatsApp
          </button>
        </a>
      </div>
    </div>

    <!-- Description -->
    <div class="bg-orange-100 p-6 rounded-xl shadow-md">
      <h3 class="font-bold text-lg mb-2 text-gray-900">Deskripsi Produk</h3>
      <p class="text-sm text-gray-800 leading-relaxed">
        {{ $product->description }}
      </p>
    </div>
  </div>

</body>
</html>
