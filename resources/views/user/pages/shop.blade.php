@extends('user.layout.app')

@section('title', 'Home - Karma Shop')

@section('content')



    <!-- start product Area -->
    <section style="margin-top: 170px">
        <!-- single product slide -->
        <div class="container">
            <div class="row">
                
                @if ($dataProduk->isEmpty())
                    <div class="alert alert-warning" style="width: 100%; justify-items: center; height: 70px;">
                        <h1>Produk Tidak DI Temukan.</h1><br>
                    </div>
                @else
                    @foreach ($dataProduk as $produk)
                        <div class="col-lg-3 col-md-6">
                            <div class="single-product">
                                <img class="img-fluid" src="{{ asset('assets/img/user/product/p1.jpg') }}" alt="">
                                <div class="product-details">
                                    <h6>{{ $produk->nama }}</h6>
                                    <div class="price">
                                        <h6>Rp.{{ $produk->harga }}</h6>
                                        <h6 class="l-through">$210.00</h6>
                                    </div>
                                    <div class="prd-bottom">

                                        <a href="{{ url('/singleproduct', $produk->id) }}" class="social-info">
                                            <span class="ti-bag"></span>
                                            <p class="hover-text">add to bag</p>
                                        </a>

                                        <form action="{{ route('userTambahFavorit') }}" class="social-info" method="POST">
                                            @csrf
                                            <input type="text" name="produk_id" value="{{ $produk->id }}" hidden>
                                            <input type="hidden" name="fromShop"  value="1">
                                            <span class="lnr lnr-heart"></span>
                                            <button style="background: transparent; border: none; width: 0%" class="hover-text">Wishlist</button>
                                        </form>
                                        
                                        <a href="{{ url('/singleproduct', $produk->id) }}" class="social-info">
                                            <span class="lnr lnr-move"></span>
                                            <p class="hover-text">view more</p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <!-- single product -->
                @endif
            </div>
        </div>
    </section>
    <!-- end product Area -->


@endsection
