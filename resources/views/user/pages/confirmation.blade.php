@extends('user.layout.app')

@section('title', 'Confirmation - Karma Shop')

@section('content')
	<!-- Start Banner Area -->
	<section class="banner-area organic-breadcrumb">
		<div class="container">
			<div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
				<div class="col-first">
					<h1>Confirmation</h1>
					<nav class="d-flex align-items-center">
						<a href="index.html">Home<span class="lnr lnr-arrow-right"></span></a>
						<a href="category.html">Confirmation</a>
					</nav>
				</div>
			</div>
		</div>
	</section>
	<!-- End Banner Area -->

	<!--================Order Details Area =================-->
	<section class="order_details section_gap">
		<div class="container">
			<h3 class="title_confirmation text-success">Terima Kasih. Pesanan Anda telah diterima.</h3>
			
            <div class="row mb-5 text-center">
                <div class="col-12">
                    @php
                        $pesan = "Halo, saya ingin memproses pesanan saya (Order #" . $pemesanan->id . ") dengan total Rp " . number_format($pemesanan->total, 0, ',', '.') . ". Mohon info untuk pembayarannya.";
                        $wa_link = "https://wa.me/" . $nomorhp . "?text=" . urlencode($pesan);
                    @endphp
                    <a href="{{ $wa_link }}" target="_blank" class="primary-btn" style="background-color: #25D366; border-color: #25D366; font-size: 18px; padding: 12px 30px;">
                        <i class="fa fa-whatsapp"></i> Hubungi Penjual (WhatsApp)
                    </a>
                    <p class="mt-3 text-muted">Silakan klik tombol di atas untuk melanjutkan proses pembayaran langsung dengan penjual.</p>
                </div>
            </div>

            <div class="row order_d_inner">
				<div class="col-lg-6">
					<div class="details_item">
						<h4>Info Pesanan</h4>
						<ul class="list">
							<li><a href="javascript:void(0);"><span>Nomor Order</span> : #{{ $pemesanan->id }}</a></li>
							<li><a href="javascript:void(0);"><span>Tanggal</span> : {{ $pemesanan->created_at->format('d M Y, H:i') }}</a></li>
							<li><a href="javascript:void(0);"><span>Total</span> : Rp {{ number_format($pemesanan->total, 0, ',', '.') }}</a></li>
							<li><a href="javascript:void(0);"><span>Metode</span> : {{ $pemesanan->metode }}</a></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="details_item">
						<h4>Alamat Pengiriman</h4>
						<ul class="list">
                            @if($pengiriman && $pengiriman->alamat)
                                <li><a href="javascript:void(0);"><span>Jalan</span> : {{ $pengiriman->alamat->detail }}</a></li>
                                <li><a href="javascript:void(0);"><span>Catatan</span> : {{ $pengiriman->alamat->note ?? '-' }}</a></li>
                                <li><a href="javascript:void(0);"><span>Kode POS</span> : {{ $pengiriman->alamat->pos_id }}</a></li>
                                <li><a href="javascript:void(0);"><span>Wilayah</span> : {{ $pengiriman->alamat->kecamatan_id }}, {{ $pengiriman->alamat->kota_id }}</a></li>
                            @else
                                <li><a href="javascript:void(0);">Alamat tidak ditemukan</a></li>
                            @endif
						</ul>
					</div>
				</div>
			</div>
			<div class="order_details_table">
				<h2>Rincian Produk</h2>
				<div class="table-responsive">
					<table class="table">
						<thead>
							<tr>
								<th scope="col">Produk</th>
								<th scope="col">Jumlah</th>
								<th scope="col">Total</th>
							</tr>
						</thead>
						<tbody>
                            @foreach($detailPemesanan as $detail)
							<tr>
								<td>
									<p>{{ $detail->produk->nama ?? 'Produk Dihapus' }}</p>
								</td>
								<td>
									<h5>x {{ $detail->jumlah }}</h5>
								</td>
								<td>
									<p>Rp {{ number_format($detail->total, 0, ',', '.') }}</p>
								</td>
							</tr>
                            @endforeach
							<tr>
								<td>
									<h4>Total Akhir</h4>
								</td>
								<td>
									<h5></h5>
								</td>
								<td>
									<p>Rp {{ number_format($pemesanan->total, 0, ',', '.') }}</p>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</section>
	<!--================End Order Details Area =================-->
@endsection