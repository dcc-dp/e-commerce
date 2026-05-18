@extends('user.layout.app')

@section('title', 'Contact - Karma Shop')

@section('content')
    <!-- Start Banner Area -->
    <section class="banner-area organic-breadcrumb">
        <div class="container">
            <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                <div class="col-first">
                    <h1>Contact Us</h1>
                    <nav class="d-flex align-items-center">
                        <a href="index.html">Home<span class="lnr lnr-arrow-right"></span></a>
                        <a href="category.html">Contact</a>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <section class="contact_area section_gap_bottom">

        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="single-defination">
                        <h4 class="mb-20">Definition 01</h4>
                        @foreach ($dataAlamat as $y)
                            <p>Provinsi: {{ $y->provinsi_nama }}</p>
                            <p>Kota: {{ $y->kota_nama }}</p>
                            <p>Kecamatan: {{ $y->kecamatan_nama }}</p>
                            <p>Kelurahan: {{ $y->kelurahan_nama }}</p>
                            <p>Kode Pos: {{ $y->kode_pos }}</p>
                            <p>Catatan: {{ $y->catatan }}</p>
                        @endforeach
{{-- 
                        @foreach ($dataAlamat as $y)
                            <p>Provinsi: {{ $y->provinsi->nama }}</p>
                            <p>Kota: {{ $y->kota->nama }}</p>
                            <p>Kecamatan: {{ $y->kecamatan->nama }}</p>
                            <p>Kelurahan: {{ $y->desa->nama }}</p>
                            <p>Detail: {{ $y->detail }}</p>
                            <p>Catatan: {{ $y->note }}</p>
                        @endforeach --}}

                    </div>
                </div>
                <div class="col-md-4">
                    <div class="single-defination">
                        <h4 class="mb-20">Definition 02</h4>
                        <p>Recently, the US Federal government banned online casinos from operating in America by making
                            it illegal to
                            transfer money to them through any US bank or payment system. As a result of this law, most
                            of the popular
                            online casino networks</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="single-defination">
                        <h4 class="mb-20">Definition 03</h4>
                        <p>Recently, the US Federal government banned online casinos from operating in America by making
                            it illegal to
                            transfer money to them through any US bank or payment system. As a result of this law, most
                            of the popular
                            online casino networks</p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 text-left mb-3">
                    <button type="submit" value="submit" class="primary-btn"
                        onclick="location.href='{{ route('UserAlamatTambah') }}'">Tambah Alamat</button>
                </div>
            </div>
        </div>
    </section>
    <!--================Contact Area =================-->
@endsection
