@extends('user.layout.app')

@section('title', 'Contact - Karma Shop')

@section('content')
    <!-- Start Banner Area -->
    <section class="banner-area organic-breadcrumb">
        <div class="container">
            <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                <div class="col-first">
                    <h1>Alamat</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="contact_area section_gap_bottom">

        <div class="container">
            <div class="row">
                @forelse ($dataAlamat as $y)
                    <div class="col-md-4 mb-4">
                        <div class="single-defination"
                            style="border: 1px solid #ddd; padding: 20px; border-radius: 8px; height: 100%;">
                            <h4 class="mb-20">Alamat Tersimpan</h4>
                            <p><strong>Provinsi:</strong> {{ $y->provinsi_id }}</p>
                            <p><strong>Kota:</strong> {{ $y->kota_id }}</p>
                            <p><strong>Kecamatan:</strong> {{ $y->kecamatan_id }}</p>
                            <p><strong>Kode Pos:</strong> {{ $y->pos_id }}</p>
                            <p><strong>Detail:</strong> {{ $y->detail }}</p>
                            <p><strong>Catatan:</strong> {{ $y->note }}</p>
                        </div>
                    </div>
                @empty
                    <div class="col-md-12">
                        <div class="alert alert-warning text-center">
                            Belum ada alamat yang tersimpan. Silakan tambah alamat baru.
                        </div>
                    </div>
                @endforelse
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
