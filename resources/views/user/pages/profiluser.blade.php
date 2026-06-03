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
                        <h6>{{ $user->name }}</h6>
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
        <div class="row justify-content-center mt-4">
            <div class="col-lg-3 col-md-6 text-center">
                <a href="{{ route('ProfilUserEdit') }}" class="primary-btn w-100" style="border: none; border-radius: 30px; padding: 12px 30px;">Update Profile</a>
            </div>
            <div class="col-lg-3 col-md-6 text-center mt-3 mt-md-0">
                <a href="{{ route('logout') }}" class="genric-btn danger radius w-100" style="padding: 12px 30px; border-radius: 30px; font-size: 14px;">Logout</a>   
            </div>
        </div>
        </div>
    </section>
    <!-- end features Area -->
 

@endsection
