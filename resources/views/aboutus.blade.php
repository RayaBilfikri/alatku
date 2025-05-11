@extends('layouts.app')

@section('title')
    alatKu
@endsection

@push('styles')
<style>
    .bg-primary-orange {
        background-color: #F7941D;
    }
    .text-primary-orange {
        color: #F7941D;
    }
    .bg-primary-blue {
        background-color: #0F4C81;
    }
    .text-primary-blue {
        color: #0F4C81;
    }

    .feature-card {
        transition: all 0.3s ease;
    }
    .feature-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
    }

    .logo-img {
        max-width: 350px;
        height: auto;
    }
</style>
@endpush

@section('content')
    <section class="bg-gray-100 min-h-screen py-10">
        <div class="container mx-auto px-6 md:px-12 mt-12">
            <div class="bg-gray-100 p-8 md:p-10 max-w-4xl mx-auto">
                <!-- Ganti SVG dengan Gambar PNG -->
                <div class="flex justify-center items-center mb-8">
                    <img src="{{ asset('/images/alatku.png') }}" alt="Logo alatKu" class="max-w-xs mx-auto">
                </div>

                <!-- Konten Tentang Kami -->
                <div class="text-gray-700 space-y-6">
                    <p class="text-lg text-center">
                        alatKu adalah platform digital terdepan yang menghubungkan kebutuhan alat berat, suku cadang,
                        dan mesin kelautan Anda dengan penyedia terpercaya di seluruh Indonesia.
                    </p>

                    <br>
                    <br>
                    <br>
                    <br>

                    <div class="mt-12 grid grid-cols-1 md:grid-cols-2 gap-8 text-center">
                        <div>
                            <h3 class="text-xl font-bold text-primary-blue mb-3">Visi Kami</h3>
                            <p>Menjadi platform digital terdepan dalam ekosistem alat berat dan mesin kelautan di Indonesia
                                yang menghubungkan penyedia dengan pengguna secara efisien, transparan, dan terpercaya.</p>
                        </div>

                        <div>
                            <h3 class="text-xl font-bold text-primary-blue mb-3">Misi Kami</h3>
                            <ul class="list-disc pl-5 space-y-2 text-sm">
                                <li>Menyediakan platform yang mudah digunakan untuk mencari, membandingkan, dan membeli alat berat.</li>
                                <li>Membangun jaringan penyedia alat berat dan suku cadang terpercaya di seluruh Indonesia.</li>
                                <li>Meningkatkan efisiensi dan transparansi dalam proses pengadaan alat berat di industri.</li>
                            </ul>
                        </div>
                    </div>

                    <br>
                    <br>
                    <br>

                    <div class="pt-6">
                        <h3 class="font-bold text-primary-blue mb-5 text-xl text-center ">Mengapa Memilih alatKu?</h3>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 text-center">
                            <div class="bg-gray-50 p-5 rounded-lg shadow feature-card">
                                <div class="text-primary-orange text-3xl mb-3 flex justify-center items-center">
                                    <svg class="w-10 h-10" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <h4 class="font-bold text-gray-800 mb-2">Pencarian Mudah</h4>
                                <p class="text-gray-600 text-sm">Temukan alat berat dan suku cadang yang Anda butuhkan dengan cepat melalui sistem pencarian kami.</p>
                            </div>

                            <div class="bg-gray-50 p-5 rounded-lg shadow feature-card">
                                <div class="text-primary-orange text-3xl mb-3 flex justify-center items-center">
                                    <svg class="w-10 h-10" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <h4 class="font-bold text-gray-800 mb-2 text-sm">Hemat Waktu & Biaya</h4>
                                <p class="text-gray-600 text-sm">Proses pengadaan alat lebih cepat dan efisien sehingga Anda bisa fokus pada bisnis inti.</p>
                            </div>

                            <div class="md:col-span-2 flex justify-center">
                                <div class="bg-gray-50 p-5 rounded-lg shadow feature-card w-full md:w-1/2">
                                    <div class="text-primary-orange text-3xl mb-3 flex justify-center items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10" viewBox="0 0 24 24" fill="currentColor">
                                            <path d="M20 6h-4V4a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v2H4a2 2 0 0 0-2 2v2h20V8a2 2 0 0 0-2-2zM10 4h4v2h-4V4zm12 6H2v10a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V10zM7 18H5v-2h2v2zm4 0H9v-2h2v2zm4 0h-2v-2h2v2z"/>
                                        </svg>
                                    </div>
                                    <h4 class="font-bold text-gray-800 mb-2 text-sm">Katalog Lengkap</h4>
                                    <p class="text-gray-600 text-sm">Menjual perlengkapan industri dan konstruksi yang lengkap.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
