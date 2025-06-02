@extends('layouts.backend')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Dashboard</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <!-- Total Produk -->
                <div class="col-md-6 col-xl-3 mb-3">
                    <div class="border rounded p-3 bg-primary">
                        <h6 class="mb-2 fw-normal text-white "><b>Total Produk</b></h6>
                        <h4 class="mb-3 text-white">
                            {{ $totalProductCount }}
                        </h4>
                        <p class="mb-0 text-white text-sm">Jumlah produk saat ini di sistem</p>
                    </div>
                </div>

                <!-- Ulasan Menunggu -->
                <div class="col-md-6 col-xl-3 mb-3">
                    <div class="border rounded p-3 bg-success">
                        <h6 class="mb-2 fw-normal text-white"><b>Ulasan Menunggu</b></h6>
                        <h4 class="mb-3 text-white">
                            {{ $pendingReviewCount }}
                        </h4>
                        <p class="mb-0 text-white text-sm">Ulasan yang belum ditinjau</p>
                    </div>
                </div>
            </div>  
        </div>
    </div>
</div>
@endsection
