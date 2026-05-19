@extends('user.layout.app')

@section('title', 'Home - Karma Shop')

@section('content')

    <!-- start features Area -->
    <section class="features-area section_gap" style="margin-top: 100px">
        <div class="container">
            <div class="row features-inner d-flex justify-content-center">
                <!-- single features -->
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-features">
                        <div class="f-icon">
                            <img  style="width: 40px" src="{{ asset('assets/img/user/features/account.png') }}" alt="">
                        </div>
                        <h6>{{ $user->nama }}</h6>
                        <p>{{ $user->email }}</p>
                    </div>
                </div>
                <!-- single features -->
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-features">
                        <div class="f-icon">
                            <img  style="width: 40px" src="{{ asset('assets/img/user/features/history.png') }}" alt="">
                        </div>
                        <a href="/riwayatbeli" >
                        <h6>Riwayat Pembelian</h6>
                        </a>
                        <p>Free Shipping on all order</p>
                    </div>
                </div>
                <!-- single features -->
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-features">
                        <div class="f-icon">
                            <img style="width: 40px" src="{{ asset('assets/img/user/features/map.png') }}" alt="">
                        </div>
                        <a href="/alamat" >
                        <h6>Alamat</h6>
                        </a> 
                        <p>Free Shipping on all order</p>
                    </div>
                </div>
                <!-- single features -->
            </div> 
        <a href="{{ route('logout') }}" class="genric-btn danger radius d-flex justify-content-center align-items-center">Danger</a>   
        </div>
    </section>
    <!-- end features Area -->
 

@endsection
