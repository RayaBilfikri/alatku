@extends('layouts.app')

@section('title')
    alatKu
@endsection

@push('styles')
<style>
    /* Warna brand */
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


    /* Animasi hover untuk card */
    .feature-card {
        transition: all 0.3s ease;
    }
    .feature-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
    }

    /* SVG Logo Style */
    .logo-svg {
        width: 350px;
        height: auto;
    }
</style>
@endpush

@section('content')
    <section class="bg-gradient-to-b from-[#ed7c59] to-[#FFC107] min-h-screen py-10">
        <div class="container mx-auto px-6 md:px-12 mt-12">
            <div class="bg-white rounded-lg shadow-xl p-8 md:p-10 max-w-4xl mx-auto">
                <!-- Logo alatKu sebagai SVG -->
                <div class="flex justify-center mb-8">
                    <svg class="logo-svg" viewBox="0 0 600 200" xmlns="http://www.w3.org/2000/svg">
                        <!-- Gear Icon -->
                        <path d="M130,70 A60,60 0 1,0 190,130 A60,60 0 1,0 130,70" fill="#F7941D"/>
                        <path d="M160,100 A30,30 0 1,0 190,130 A30,30 0 1,0 160,100" fill="white"/>
                        <path d="M125,55 L135,55 L140,30 L120,30 L125,55" fill="#F7941D"/>
                        <path d="M165,70 L180,55 L200,75 L185,90 L165,70" fill="#F7941D"/>
                        <path d="M195,115 L195,125 L220,130 L220,110 L195,115" fill="#F7941D"/>
                        <path d="M180,165 L165,180 L145,160 L160,145 L180,165" fill="#F7941D"/>
                        <path d="M125,195 L135,195 L140,220 L120,220 L125,195" fill="#F7941D"/>
                        <path d="M85,180 L70,165 L90,145 L105,160 L85,180" fill="#F7941D"/>
                        <path d="M55,125 L55,115 L30,110 L30,130 L55,125" fill="#F7941D"/>
                        <path d="M70,85 L85,70 L105,90 L90,105 L70,85" fill="#F7941D"/>

                        <!-- Ship Icon -->
                        <rect x="130" y="125" width="60" height="30" fill="#0F4C81"/>
                        <path d="M120,125 L200,125 L190,105 L130,105 L120,125" fill="#0F4C81"/>
                        <rect x="145" y="90" width="10" height="15" fill="#0F4C81"/>
                        <rect x="160" y="95" width="5" height="10" fill="#0F4C81"/>

                        <!-- Waves -->
                        <path d="M110,165 C130,155 150,175 170,165 C190,155 210,175 230,165"
                            stroke="#0F4C81" stroke-width="5" fill="none"/>

                        <!-- alatKu text -->
                        <text x="250" y="130" font-family="Montserrat, sans-serif" font-size="70" font-weight="bold" fill="#0F4C81">alat</text>
                        <text x="400" y="130" font-family="Montserrat, sans-serif" font-size="70" font-weight="bold" fill="#F7941D">Ku</text>

                        <!-- Subtitle -->
                        <text x="250" y="160" font-family="Montserrat, sans-serif" font-size="20" fill="#0F4C81">Heavy Equipment, Spare Parts,</text>
                        <text x="250" y="185" font-family="Montserrat, sans-serif" font-size="20" fill="#0F4C81">Marine Machinery</text>
                    </svg>
                </div>

                <!-- Konten Tentang Kami -->
                <div class="text-gray-700 space-y-6">
                    <p class="text-sm">
                        alatKu adalah platform digital terdepan yang menghubungkan kebutuhan alat berat, suku cadang,
                        dan mesin kelautan Anda dengan penyedia terpercaya di seluruh Indonesia.
                    </p>

                    <br>
                    <br>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div>
                            <h3 class="text-sm font-bold text-primary-blue mb-3">Visi Kami</h3>
                            <p>Menjadi platform digital terdepan dalam ekosistem alat berat dan mesin kelautan di Indonesia
                                yang menghubungkan penyedia dengan pengguna secara efisien, transparan, dan terpercaya.</p>
                        </div>

                        <div>
                            <h3 class="text-sm font-bold text-primary-blue mb-3">Misi Kami</h3>
                            <ul class="list-disc pl-5 space-y-2 text-sm">
                                <li>Menyediakan platform yang mudah digunakan untuk mencari, membandingkan, dan membeli alat berat.</li>
                                <li>Membangun jaringan penyedia alat berat dan suku cadang terpercaya di seluruh Indonesia.</li>
                                <li>Meningkatkan efisiensi dan transparansi dalam proses pengadaan alat berat di industri.</li>
                            </ul>
                        </div>
                    </div>

                    <div class="pt-6">
                        <h3 class=" font-bold text-primary-blue mb-5 text-sm text-center">Mengapa Memilih alatKu?</h3>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="bg-gray-50 p-5 rounded-lg shadow feature-card">
                                <div class="text-primary-orange text-3xl mb-3">
                                    <svg class="w-10 h-10" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <h4 class="font-bold text-gray-800 mb-2">Pencarian Mudah</h4>
                                <p class="text-gray-600 text-sm">Temukan alat berat dan suku cadang yang Anda butuhkan dengan cepat melalui sistem pencarian canggih kami.</p>
                            </div>

                            <div class="bg-gray-50 p-5 rounded-lg shadow feature-card">
                                <div class="text-primary-orange text-3xl mb-3">
                                    <svg class="w-10 h-10" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <h4 class="font-bold text-gray-800 mb-2 text-sm">Hemat Waktu & Biaya</h4>
                                <p class="text-gray-600 text-sm">Proses pengadaan alat lebih cepat dan efisien sehingga Anda bisa fokus pada bisnis inti.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
