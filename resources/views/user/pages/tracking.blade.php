@extends('user.layout.app')

@section('title', 'Tracking - Karma Shop')

@section('content')

    <section class="tracking_box_area py-5">

        <div class="container-fluid px-lg-5">

            <div class="tracking_box_inner" style="margin-top: 90px;">

                <!-- HEADER -->
                <div class="text-center mb-5">
                    <h2 class="fw-bold">Cek Status Pesanan</h2>

                    <p class="text-muted">
                        Masukkan Order ID dan Email yang digunakan saat melakukan pemesanan
                        untuk melihat status pesanan Anda.
                    </p>
                </div>

                <!-- FORM -->
                <form class="tracking_form mb-5" action="#" method="post">
                    @csrf

                    <div class="row">

                        <div class="col-md-5 mb-3">
                            <input type="text" class="form-control tracking-input" placeholder="Masukkan Order ID">
                        </div>

                        <div class="col-md-5 mb-3">
                            <input type="email" class="form-control tracking-input" placeholder="Masukkan Email">
                        </div>

                        <div class="col-md-2 mb-3">
                            <button type="submit" class="tracking-btn">
                                Track Order
                            </button>
                        </div>

                    </div>

                </form>

                <!-- CONTENT -->
                <div class="row">

                    <!-- LEFT -->
                    <div class="col-lg-8">

                        <div class="tracking-wrapper">

                            <!-- ITEM -->
                            <div class="tracking-item completed">

                                <div class="tracking-icon">
                                    ✓
                                </div>

                                <div class="tracking-content">

                                    <h5>Checkout Berhasil</h5>

                                    <p>
                                        Pesanan berhasil dibuat.
                                    </p>

                                    <small>
                                        20 Mei 2026 - 10:00
                                    </small>

                                </div>

                            </div>

                            <!-- ITEM -->
                            <div class="tracking-item completed">

                                <div class="tracking-icon">
                                    ✓
                                </div>

                                <div class="tracking-content">

                                    <h5>Pembayaran Diterima</h5>

                                    <p>
                                        Pembayaran berhasil diverifikasi.
                                    </p>

                                    <small>
                                        20 Mei 2026 - 10:10
                                    </small>

                                </div>

                            </div>

                            <!-- ITEM -->
                            <div class="tracking-item completed">

                                <div class="tracking-icon">
                                    ✓
                                </div>

                                <div class="tracking-content">

                                    <h5>Menyiapkan Barang</h5>

                                    <p>
                                        Penjual sedang menyiapkan pesanan.
                                    </p>

                                    <small>
                                        20 Mei 2026 - 11:00
                                    </small>

                                </div>

                            </div>

                            <!-- ITEM -->
                            <div class="tracking-item active">

                                <div class="tracking-icon">
                                    🚚
                                </div>

                                <div class="tracking-content">

                                    <h5>Paket Sedang Dikirim</h5>

                                    <p>
                                        Kurir sedang mengantar paket ke kota tujuan.
                                    </p>

                                    <small>
                                        21 Mei 2026 - 08:00
                                    </small>

                                </div>

                            </div>

                            <!-- ITEM -->
                            <div class="tracking-item">

                                <div class="tracking-icon">
                                    📦
                                </div>

                                <div class="tracking-content">

                                    <h5>Paket Diterima</h5>

                                    <p>
                                        Menunggu konfirmasi penerimaan.
                                    </p>

                                </div>

                            </div>

                        </div>

                    </div>

                    <!-- RIGHT -->
                    <div class="col-lg-4">

                        <!-- ADDRESS -->
                        <div class="shipping-card mb-4">

                            <div class="shipping-header">
                                <h5>
                                    <i class="fa fa-map-marker"></i>
                                    Alamat Pengiriman
                                </h5>
                            </div>

                            <div class="shipping-body">

                                <h6>Muhil</h6>

                                <p>
                                    Jl. Barabaraya No. 123,
                                    Makassar, Sulawesi Selatan
                                </p>

                                <small>
                                    +62 812-3456-7890
                                </small>

                            </div>

                        </div>

                        <!-- PRODUCT -->
                        <div class="shipping-card">

                            <div class="shipping-header">
                                <h5>
                                    <i class="fa fa-shopping-bag"></i>
                                    Detail Produk
                                </h5>
                            </div>

                            <!-- ITEM -->
                            <div class="product-item">

                                <img src="https://via.placeholder.com/90" alt="product">

                                <div class="product-info">

                                    <h6>Sepatu Sneakers</h6>

                                    <small>
                                        Variasi: Putih / 42
                                    </small>

                                    <div class="product-meta">

                                        <span>
                                            Qty: 1
                                        </span>

                                        <strong>
                                            Rp 350.000
                                        </strong>

                                    </div>

                                </div>

                            </div>

                            <!-- ITEM -->
                            <div class="product-item">

                                <img src="https://via.placeholder.com/90" alt="product">

                                <div class="product-info">

                                    <h6>Kaos Oversize</h6>

                                    <small>
                                        Variasi: XL
                                    </small>

                                    <div class="product-meta">

                                        <span>
                                            Qty: 2
                                        </span>

                                        <strong>
                                            Rp 120.000
                                        </strong>

                                    </div>

                                </div>

                            </div>

                            <!-- TOTAL -->
                            <div class="shipping-total">

                                <span>Total</span>

                                <h5>Rp 590.000</h5>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>

    <style>
        .tracking-input {
            height: 55px;
            border-radius: 10px;
        }

        .tracking-btn {
            width: 100%;
            height: 55px;
            border: none;
            border-radius: 10px;
            background: #ff9800;
            color: white;
            font-weight: 600;
        }

        /* TRACKING */

        .tracking-wrapper {
            position: relative;
        }

        .tracking-item {
            display: flex;
            gap: 20px;
            position: relative;
            padding-bottom: 35px;
        }

        .tracking-item:not(:last-child)::before {
            content: '';
            position: absolute;
            left: 19px;
            top: 45px;
            width: 3px;
            height: 100%;
            background: #e5e5e5;
        }

        .tracking-icon {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: #dcdcdc;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
            z-index: 2;
            flex-shrink: 0;
        }

        .tracking-item.completed .tracking-icon {
            background: #28a745;
        }

        .tracking-item.active .tracking-icon {
            background: #ff9800;
        }

        .tracking-content {
            width: 100%;
            background: #fff;
            padding: 25px;
            border-radius: 15px;
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.06);
        }

        .tracking-content h5 {
            font-weight: 600;
            margin-bottom: 10px;
        }

        .tracking-content p {
            color: #666;
            margin-bottom: 10px;
        }

        /* RIGHT SIDE */

        .shipping-card {
            background: #fff;
            border-radius: 15px;
            padding: 25px;
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.06);
        }

        .shipping-header {
            margin-bottom: 20px;
        }

        .shipping-header h5 {
            font-weight: 600;
        }

        .shipping-header i {
            color: #28a745;
            margin-right: 8px;
        }

        .product-item {
            display: flex;
            gap: 15px;
            padding: 15px 0;
            border-bottom: 1px solid #eee;
        }

        .product-item img {
            width: 90px;
            height: 90px;
            border-radius: 12px;
            object-fit: cover;
        }

        .product-info {
            flex: 1;
        }

        .product-info h6 {
            font-weight: 600;
            margin-bottom: 5px;
        }

        .product-meta {
            display: flex;
            justify-content: space-between;
            margin-top: 10px;
        }

        .shipping-total {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 20px;
        }

        .shipping-total h5 {
            color: #28a745;
            font-weight: 700;
        }

        @media(max-width:991px) {

            .tracking_box_inner {
                margin-top: 40px !important;
            }

            .shipping-card {
                margin-top: 30px;
            }

        }
    </style>

@endsection
