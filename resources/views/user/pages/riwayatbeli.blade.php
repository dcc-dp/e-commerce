@extends('user.layout.app')

@section('title', 'Home - Karma Shop')

@section('content')

    <!-- start features Area -->
    <section class="features-area section_gap" style="margin-top: 100px">
        <div class="container">
            <div class="row features-inner d-flex justify-content-between">

            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="single-features d-flex align-items-start">

                    <!-- GAMBAR -->
                    <div>
                        <img style="width: 150px" 
                            src="{{ asset('assets/img/user/product/p1.jpg') }}"  
                            alt="">
                    </div>

                    <!-- TEKS -->
                    <div>
                        <a href="">
                            <h3 class="mb-1" style="margin-left: 20px">Meja</h3>
                        </a>
                    </div>

                </div>
            </div>
               <div class="col-lg-3 col-md-6 col-sm-6 d-flex">
                <div class="single-features d-flex flex-column justify-content-end">

                    <p class="mb-0" style="margin-left: 137px">Rp40.000</p>
                    <a href="">
                        <h6 class="mb-1">Total 2 produk: Rp80.000</h6>
                    </a>

                </div>
            </div>
            </div> 
        </div>

        <div class="container">
            <div class="row features-inner d-flex justify-content-between">

            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="single-features d-flex align-items-start">

                    <!-- GAMBAR -->
                    <div>
                        <img style="width: 150px" 
                            src="{{ asset('assets/img/user/product/p1.jpg') }}"  
                            alt="">
                    </div>

                    <!-- TEKS -->
                    <div>
                        <a href="">
                            <h3 class="mb-1" style="margin-left: 20px">Cimol</h3>
                        </a>
                    </div>

                </div>
            </div>
               <div class="col-lg-3 col-md-6 col-sm-6 d-flex">
                <div class="single-features d-flex flex-column justify-content-end">

                    <p class="mb-0" style="margin-left: 137px">Rp25.000</p>
                    <a href="">
                        <h6 class="mb-1">Total 2 produk: Rp50.000</h6>
                    </a>

                </div>
            </div>
            </div> 
        </div>

        <div class="container">
            <div class="row features-inner d-flex justify-content-between">

            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="single-features d-flex align-items-start">

                    <!-- GAMBAR -->
                    <div>
                        <img style="width: 150px" 
                            src="{{ asset('assets/img/user/product/p1.jpg') }}"  
                            alt="">
                    </div>

                    <!-- TEKS -->
                    <div>
                        <a href="">
                            <h3 class="mb-1" style="margin-left: 20px">Kursi</h3>
                        </a>
                    </div>

                </div>
            </div>
               <div class="col-lg-3 col-md-6 col-sm-6 d-flex">
                <div class="single-features d-flex flex-column justify-content-end">

                    <p class="mb-0" style="margin-left: 137px">Rp20.000</p>
                    <a href="">
                        <h6 class="mb-1">Total 2 produk: Rp40.000</h6>
                    </a>

                </div>
            </div>
            </div> 
        </div>

        <div class="container">
            <div class="row features-inner d-flex justify-content-between">

            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="single-features d-flex align-items-start">

                    <!-- GAMBAR -->
                    <div>
                        <img style="width: 150px" 
                            src="{{ asset('assets/img/user/product/p1.jpg') }}"  
                            alt="">
                    </div>

                    <!-- TEKS -->
                    <div>
                        <a href="">
                            <h3 class="mb-1" style="margin-left: 20px">Yupi</h3>
                        </a>
                    </div>

                </div>
            </div>
               <div class="col-lg-3 col-md-6 col-sm-6 d-flex">
                <div class="single-features d-flex flex-column justify-content-end">

                    <p class="mb-0" style="margin-left: 137px">Rp5.000</p>
                    <a href="">
                        <h6 class="mb-1">Total 2 produk: Rp10.000</h6>
                    </a>

                </div>
            </div>
            </div> 
        </div>
    </section>

    <!-- end features Area -->
 

@endsection
