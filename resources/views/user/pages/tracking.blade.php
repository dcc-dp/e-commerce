@extends('user.layout.app')

@section('title', 'Tracking - Karma Shop')

@section('content')

    <section class="tracking_box_area py-5">
        <div class="container-fluid px-lg-5">
            <div class="tracking_box_inner" style="margin-top: 90px;">
                <!-- HEADER -->
                <div class="text-center mb-5">
                    <h2 class="fw-bold">Pelacakan Pesanan #{{ $pemesanan->id }}</h2>
                    <p class="text-muted">
                        Tanggal Pemesanan: {{ $pemesanan->created_at->format('d M Y, H:i') }}
                    </p>
                </div>

                <!-- CONTENT -->
                <div class="row">
                    <!-- LEFT -->
                    <div class="col-lg-8">
                        <div class="tracking-wrapper">
                            @php
                                $status = $pemesanan->status;
                                $levels = ['pending' => 1, 'proses' => 2, 'kemas' => 3, 'kirim' => 4, 'selesai' => 5];
                                $currentLevel = $levels[$status] ?? 1;
                            @endphp

                            <!-- ITEM 1: PENDING -->
                            <div class="tracking-item {{ $currentLevel >= 1 ? 'completed' : '' }}">
                                <div class="tracking-icon">✓</div>
                                <div class="tracking-content">
                                    <h5>Menunggu Pembayaran</h5>
                                    <p>Pesanan berhasil dibuat dan menunggu pembayaran diselesaikan.</p>
                                    @if($currentLevel >= 1)
                                        <small>{{ $pemesanan->updated_at->format('d M Y - H:i') }}</small>
                                    @endif
                                </div>
                            </div>

                            <!-- ITEM 2: PROSES -->
                            <div class="tracking-item {{ $currentLevel >= 2 ? 'completed' : '' }}">
                                <div class="tracking-icon">⚙️</div>
                                <div class="tracking-content">
                                    <h5>Diproses</h5>
                                    <p>Pembayaran diterima. Penjual sedang memverifikasi pesanan Anda.</p>
                                    @if($currentLevel >= 2)
                                        <small>{{ $pemesanan->updated_at->format('d M Y - H:i') }}</small>
                                    @endif
                                </div>
                            </div>

                            <!-- ITEM 3: KEMAS -->
                            <div class="tracking-item {{ $currentLevel >= 3 ? 'completed' : '' }}">
                                <div class="tracking-icon">📦</div>
                                <div class="tracking-content">
                                    <h5>Dikemas</h5>
                                    <p>Penjual sedang menyiapkan dan mengemas barang pesanan Anda.</p>
                                    @if($currentLevel >= 3)
                                        <small>{{ $pemesanan->updated_at->format('d M Y - H:i') }}</small>
                                    @endif
                                </div>
                            </div>

                            <!-- ITEM 4: KIRIM -->
                            <div class="tracking-item {{ $currentLevel >= 4 ? 'completed' : '' }}">
                                <div class="tracking-icon">🚚</div>
                                <div class="tracking-content">
                                    <h5>Dikirim</h5>
                                    <p>Paket telah diserahkan ke kurir dan sedang dalam perjalanan.</p>
                                    @if($currentLevel >= 4)
                                        <small>{{ $pemesanan->updated_at->format('d M Y - H:i') }}</small>
                                    @endif
                                </div>
                            </div>

                            <!-- ITEM 5: SELESAI -->
                            <div class="tracking-item {{ $currentLevel >= 5 ? 'completed' : '' }}">
                                <div class="tracking-icon">🏁</div>
                                <div class="tracking-content">
                                    <h5>Selesai</h5>
                                    <p>Paket telah diterima dengan baik. Terima kasih telah berbelanja!</p>
                                    @if($currentLevel >= 5)
                                        <small>{{ $pemesanan->updated_at->format('d M Y - H:i') }}</small>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- RIGHT -->
                    <div class="col-lg-4">
                        <!-- ADDRESS -->
                        <div class="shipping-card mb-4">
                            <div class="shipping-header">
                                <h5><i class="fa fa-map-marker"></i> Alamat Pengiriman</h5>
                            </div>
                            <div class="shipping-body">
                                <h6>{{ $pemesanan->user->name }}</h6>
                                @if($pengiriman && $pengiriman->alamat)
                                    <p>{{ $pengiriman->alamat->detail }}<br>
                                       Catatan: {{ $pengiriman->alamat->note ?? '-' }}<br>
                                       Kec/Kota: {{ $pengiriman->alamat->kecamatan_id }}, {{ $pengiriman->alamat->kota_id }}
                                    </p>
                                    <small>Kode Pos: {{ $pengiriman->alamat->pos_id }}</small>
                                @else
                                    <p>Alamat tidak ditemukan.</p>
                                @endif
                            </div>
                        </div>

                        <!-- PRODUCT -->
                        <div class="shipping-card">
                            <div class="shipping-header">
                                <h5><i class="fa fa-shopping-bag"></i> Detail Produk</h5>
                            </div>

                            @foreach($detailPemesanan as $detail)
                            <div class="product-item">
                                <img src="{{ asset('assets/img/user/product/p1.jpg') }}" alt="product">
                                <div class="product-info">
                                    <h6>{{ $detail->produk->nama ?? 'Produk Dihapus' }}</h6>
                                    <small><i class="fa fa-store"></i> {{ $detail->produk->umkm->nama ?? 'Toko' }}</small>
                                    <div class="product-meta">
                                        <span>Qty: {{ $detail->jumlah }}</span>
                                        <strong>Rp {{ number_format($detail->total, 0, ',', '.') }}</strong>
                                    </div>
                                </div>
                            </div>
                            @endforeach

                            <div class="shipping-total">
                                <span>Total Belanja</span>
                                <h5>Rp {{ number_format($pemesanan->total, 0, ',', '.') }}</h5>
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
