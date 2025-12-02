@extends('user.layout.app')

@section('title', 'Home - Karma Shop')

@section('content')



    <!-- start product Area -->
    <section style="margin-top: 170px">
        <!-- single product slide -->
            <h1 style="text-align: center;">FAVORIT</h1>
            <div class="container">
                <div class="row">
                    @foreach ($dataProdukFavorit as $produkFavorit)
                                      <div class="col-lg-3 col-md-6">
                        <div class="single-product">
                            <img class="img-fluid" src="{{ asset('assets/img/user/product/p1.jpg') }}" alt="">
                            <div class="product-details">
                                <h6>{{ $produkFavorit->produk->nama }}</h6>
                                <div class="price">
                                    <h6>Rp.{{ $produkFavorit->produk->harga }}</h6>
                                    <h6 class="l-through">$210.00</h6>
                                </div>
                                <div class="prd-bottom">

                                    <a href="" class="social-info">
                                        <span class="ti-bag"></span>
                                        <p class="hover-text">add to bag</p>
                                    </a>
                                    <form action="{{ route('userTambahFavorit') }}" class="social-info" method="POST">
                                        @csrf
                                        <input type="text" name="produk_id" value="{{ $produkFavorit->produk->id }}" hidden>
                                        <span class="lnr lnr-heart"></span>
                                        <button style="background: transparent; border: none; width: 0%" class="hover-text">Wishlist</button>
                                    </form>
                                    <a href="" class="social-info">
                                        <span class="lnr lnr-sync"></span>
                                        <p class="hover-text">compare</p>
                                    </a>
                                    <a href="{{ url('/singleproduct', $produkFavorit->produk->id) }}" class="social-info">
                                        <span class="lnr lnr-move"></span>
                                        <p class="hover-text">view more</p>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>      
                    @endforeach
                    <!-- single product -->

                </div>
            </div>
    </section>
    <!-- end product Area -->


@endsection