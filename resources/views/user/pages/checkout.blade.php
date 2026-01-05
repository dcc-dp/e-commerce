@extends('user.layout.app')

@section('title', 'Checkout - Karma Shop')

@section('content')
    <style>
        /* Matikan nice-select HANYA di halaman ini */
        #provinsi {
            display: block !important;
        }

        #kota {
            display: block !important;
        }

        #kecamatan {
            display: block !important;
        }

        #kelurahan {
            display: block !important;
        }

        .nice-select {
            display: none !important;
        }
    </style>
    <!-- Start Banner Area -->
    <section class="banner-area organic-breadcrumb">
    </section>
    <!-- End Banner Area -->

    <!--================Checkout Area =================-->
    <section class="checkout_area section_gap">
        <div class="container">
            <div class="billing_details">
                <div class="row">
                    <div class="col-lg-8">
                        <h2>Rincian Pemesanan</h2>

                        <form class="row contact_form" action="{{ route('userCheckoutProses') }}" method="POST">
                            @csrf

                            <div class="col-12 form-group">
                                <select id="provinsi" class="form-control">
                                    <option>Pilih Provinsi</option>
                                </select>
                            </div>

                            <div class="col-12 form-group">
                                <select id="kota" class="form-control">
                                    <option>Pilih Kota</option>
                                </select>
                            </div>

                            <div class="col-12 form-group">
                                <select id="kecamatan" class="form-control">
                                    <option>Pilih Kecamatan</option>
                                </select>
                            </div>

                            <div class="col-12 form-group">
                                <select id="kelurahan" class="form-control">
                                    <option>Pilih Kelurahan</option>
                                </select>
                            </div>

                            <div class="col-md-12 form-group">
                                <input type="text" class="form-control" name="kode_pos" placeholder="Kode Pos">
                            </div>

                            <div class="col-md-12 form-group">
                                <input type="text" class="form-control" name="detail" placeholder="Detail Alamat">
                            </div>

                            <div class="col-md-12 form-group">
                                <textarea class="form-control" name="catatan" rows="2" placeholder="Catatan"></textarea>
                            </div>

                            <button type="submit" class="primary-btn">Proceed to Payment</button>
                        </form>

                    </div>
                    <div class="col-lg-4">
                        <div class="order_box">
                            <h2>Ringkasan Pembayaran</h2>

                            <ul class="list list_2">
                                @foreach ($dataDetailKeranjang as $detailKeranjang)
                                    <li class="d-flex justify-content-between align-items-start">
                                        <div>
                                            <strong>{{ $detailKeranjang->produk->nama }}</strong><br>
                                            <p class="text-muted">
                                                {{ $detailKeranjang->jumlah }} ×
                                                Rp {{ number_format($detailKeranjang->produk->harga, 0, ',', '.') }}
                                            </p>
                                        </div>

                                        <span class="font-weight-bold">
                                            Rp {{ number_format($detailKeranjang->total, 0, ',', '.') }}
                                        </span>
                                    </li>
                                @endforeach

                                <li class="border-top pt-3 d-flex justify-content-between">
                                    <strong>Total</strong>
                                    <strong class="text-primary">
                                        Rp {{ number_format($total, 0, ',', '.') }}
                                    </strong>
                                </li>
                            </ul>

                            <div class="creat_account mt-3">
                                <input type="checkbox" id="f-option4" name="selector">
                                <label for="f-option4">
                                    I’ve read and accept the <a href="#">terms & conditions</a>
                                </label>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {

            console.log('JS READY');

            const provinsi = document.getElementById('provinsi');
            const kota = document.getElementById('kota');
            const kecamatan = document.getElementById('kecamatan');
            const kelurahan = document.getElementById('kelurahan');

            // =====================
            // LOAD PROVINSI
            // =====================
            fetch('/api/wilayah/provinsi')
                .then(res => res.json())
                .then(res => {
                    res.data.forEach(item => {
                        provinsi.append(new Option(item.name, item.code));
                    });
                });

            // =====================
            // PROVINSI → KOTA
            // =====================
            provinsi.addEventListener('change', function() {

                kota.innerHTML = '<option value="">Pilih Kota</option>';
                kecamatan.innerHTML = '<option value="">Pilih Kecamatan</option>';
                kelurahan.innerHTML = '<option value="">Pilih Kelurahan</option>';

                kota.disabled = true;
                kecamatan.disabled = true;
                kelurahan.disabled = true;

                if (!this.value) return;

                fetch(`/api/wilayah/kota/${this.value}`)
                    .then(res => res.json())
                    .then(res => {
                        res.data.forEach(item => {
                            kota.append(new Option(item.name, item.code));
                        });
                        kota.disabled = false;
                    });
            });

            // =====================
            // KOTA → KECAMATAN
            // =====================
            kota.addEventListener('change', function() {

                kecamatan.innerHTML = '<option value="">Pilih Kecamatan</option>';
                kelurahan.innerHTML = '<option value="">Pilih Kelurahan</option>';

                kecamatan.disabled = true;
                kelurahan.disabled = true;

                if (!this.value) return;

                fetch(`/api/wilayah/kecamatan/${this.value}`)
                    .then(res => res.json())
                    .then(res => {
                        res.data.forEach(item => {
                            kecamatan.append(new Option(item.name, item.code));
                        });
                        kecamatan.disabled = false;
                    });
            });

            // =====================
            // KECAMATAN → KELURAHAN
            // =====================
            kecamatan.addEventListener('change', function() {

                kelurahan.innerHTML = '<option value="">Pilih Kelurahan</option>';
                kelurahan.disabled = true;

                if (!this.value) return;

                fetch(`/api/wilayah/kelurahan/${this.value}`)
                    .then(res => res.json())
                    .then(res => {
                        res.data.forEach(item => {
                            kelurahan.append(new Option(item.name, item.code));
                        });
                        kelurahan.disabled = false;
                    });
            });

        });
    </script>

@endsection
