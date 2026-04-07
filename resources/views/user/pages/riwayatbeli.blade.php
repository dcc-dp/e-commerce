@extends('user.layout.app')

@section('title', 'Home - Karma Shop')

@section('content')

    <!-- start features Area -->
    <section class="features-area section_gap" style="margin-top: 100px">
        <div class="container">
            <div class="row features-inner d-flex justify-content-center">
                <!-- single features -->
                <!-- single features -->
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-features">
                        <div class="f-icon">
                            <img  style="width: 40px" src="{{ asset('assets/img/user/features/history.png') }}" alt="">
                        </div>
                        <a href="/Riwayat" >
                        <h6>Riwayat Pembelian</h6>
                        </a>
                        <p>Free Shipping on all order</p>
                    </div>
                </div>
                <!-- single features -->

                <!-- single features -->
    </section>
    <!-- end features Area -->
 

@endsection
