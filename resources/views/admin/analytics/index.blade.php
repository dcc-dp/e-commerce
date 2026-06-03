@extends('layouts/contentNavbarLayout')

@section('title', 'Admin - Analytics')

@section('content')
    <h4 class="py-3 mb-4"><span class="text-muted fw-light">Admin /</span> Analytics Dashboard</h4>

    <div class="row">
        <!-- Total Pembeli -->
        <div class="col-md-3 col-sm-6 mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-2 pb-1">
                        <div class="avatar me-2">
                            <span class="avatar-initial rounded bg-label-primary"><i class="mdi mdi-account-outline mdi-20px"></i></span>
                        </div>
                        <h4 class="ms-1 mb-0">{{ $totalPembeli }}</h4>
                    </div>
                    <p class="mb-1">Total Pembeli</p>
                    <p class="mb-0">
                        <span class="fw-medium me-1">Aktif</span>
                        <small class="text-muted">di Platform</small>
                    </p>
                </div>
            </div>
        </div>

        <!-- Total Penjual -->
        <div class="col-md-3 col-sm-6 mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-2 pb-1">
                        <div class="avatar me-2">
                            <span class="avatar-initial rounded bg-label-success"><i class="mdi mdi-store mdi-20px"></i></span>
                        </div>
                        <h4 class="ms-1 mb-0">{{ $totalPenjual }}</h4>
                    </div>
                    <p class="mb-1">Total UMKM</p>
                    <p class="mb-0">
                        <span class="fw-medium me-1">Aktif</span>
                        <small class="text-muted">Terdaftar</small>
                    </p>
                </div>
            </div>
        </div>

        <!-- Total Produk -->
        <div class="col-md-3 col-sm-6 mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-2 pb-1">
                        <div class="avatar me-2">
                            <span class="avatar-initial rounded bg-label-warning"><i class="mdi mdi-cube-outline mdi-20px"></i></span>
                        </div>
                        <h4 class="ms-1 mb-0">{{ $totalProduk }}</h4>
                    </div>
                    <p class="mb-1">Total Produk</p>
                    <p class="mb-0">
                        <span class="fw-medium me-1">Katalog</span>
                        <small class="text-muted">Global</small>
                    </p>
                </div>
            </div>
        </div>

        <!-- Total Transaksi -->
        <div class="col-md-3 col-sm-6 mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-2 pb-1">
                        <div class="avatar me-2">
                            <span class="avatar-initial rounded bg-label-info"><i class="mdi mdi-receipt mdi-20px"></i></span>
                        </div>
                        <h4 class="ms-1 mb-0">{{ $totalTransaksi }}</h4>
                    </div>
                    <p class="mb-1">Total Transaksi</p>
                    <p class="mb-0">
                        <span class="fw-medium me-1">Order</span>
                        <small class="text-muted">Dibuat</small>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Pendapatan Kotor -->
    <div class="row">
        <div class="col-12 mb-4">
            <div class="card h-100">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="card-title m-0 me-2">Pendapatan Kotor Platform</h5>
                </div>
                <div class="card-body">
                    <div class="d-flex align-items-center mb-3">
                        <h1 class="mb-0">Rp {{ number_format($pendapatanKotor, 0, ',', '.') }}</h1>
                    </div>
                    <p class="text-muted mb-0">Total perputaran uang dari transaksi yang berstatus "Selesai" di aplikasi E-Commerce ini.</p>
                </div>
            </div>
        </div>
    </div>
@endsection
