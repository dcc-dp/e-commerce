@extends('user.layout.app')

@section('title', 'Home - Karma Shop')

@section('content')

    <!-- start features Area -->
    <section class="features-area section_gap" style="margin-top: 100px">

        @foreach ($detailkeranjang as $produk)
              <div class="container">
            <div class="row features-inner d-flex justify-content-between">
            

                <div class="col-lg-12 col-md-12 col-sm-12">

                    <!-- TOKO -->
                    <div class="single-features d-flex align-items-start mb-4">

                        <div>
                            <img style="width: 40px; margin-bottom: 20px;"
                                src="{{ asset('assets/img/user/features/tokoicon.png') }}"
                                alt="">
                        </div>

                        <div>
                            <a href="">
                                <h3 class="mb-1" style="margin-left: 10px; margin-top: 9px">
                                    {{ $produk->produk->umkm->nama }}
                                </h3>
                            </a>
                        </div>

                    </div>

                    <!-- PRODUK MEJA -->
                    <div class="single-features d-flex justify-content-between align-items-start mb-4">

                        <!-- KIRI -->
                        <div class="d-flex align-items-start">

                            <div>
                                <img style="width: 100px"
                                    src="{{ asset('assets/img/user/product/p1.jpg') }}"
                                    alt="">
                            </div>

                            <div>
                                <a href="">
                                    <h3 class="mb-1" style="margin-left: 20px">
                                        {{ $produk->produk->nama }}
                                    </h3>
                                </a>
                            </div>

                        </div>

                        <!-- KANAN -->
                        <div class="text-end">
                            <p class="mb-0">x2</p>
                            <p class="mb-0">{{ $produk->produk->harga }}</p>
                        </div>

                    </div>

                <!-- TOTAL -->
                    <div class="d-flex justify-content-end">
                        <div class="text-end">
                            <a href="">
                                <h6 class="mb-1">Total Harga: {{ $total }}</h6>
                            </a>
                        </div>
                    </div>

                </div>

            </div>
        </div>  
            @endforeach
    </section>

    <!-- end features Area -->
 

@endsection
