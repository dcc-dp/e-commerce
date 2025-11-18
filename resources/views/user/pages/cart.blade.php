@extends('user.layout.app')

@section('title', 'Cart - Karma Shop')

@section('content')

    <!-- Start Banner Area -->
    <section class="banner-area organic-breadcrumb">
        <div class="container">
            <div class="breadcrumb-banner d-flex flex-wrap aliger-n-items-center justify-content-end">
                <div class="col-first">
                    <h1>Shopping Cart</h1>
                    <nav class="d-flex align-items-center">
                        <a href="index.html">Home<span class="lnr lnr-arrow-right"></span></a>
                        <a href="category.html">Cart</a>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- End Banner Area -->

    <!--================Cart Area =================-->
    <section class="cart_area">
        <div class="container">
            <div class="cart_inner">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Product</th>
                                <th scope="col">Price</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dataKeranjang as $keranjang)
                                <tr>
                                <td>
                                    <div class="media">
                                        <div class="d-flex">
                                            <img src="{{ asset('assets/img/user/cart.jpg') }}" alt="">
                                        </div>
                                        <div class="media-body">
                                            <p>{{ $keranjang->produk->nama }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <h5>Rp.{{ $keranjang->produk->harga }}</h5>
                                </td>
                                <td>
                                    <div class="product_count">
                                        <input type="text" name="qty" id="sst" maxlength="12" value="{{ $keranjang->jumlah }}"
                                            title="Quantity:" class="input-text qty">
                                        <button
                                            onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst )) result.value++;return false;"
                                            class="increase items-count" type="button"><i
                                                class="lnr lnr-chevron-up"></i></button>
                                        <button
                                            onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst ) &amp;&amp; sst > 0 ) result.value--;return false;"
                                            class="reduced items-count" type="button"><i
                                                class="lnr lnr-chevron-down"></i></button>
                                    </div>
                                </td>
                                <td>
                                    <h5>Rp.{{ $keranjang->total }}</h5>
                                </td>
                            </tr> 
                            @endforeach
                           
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <!--================End Cart Area =================-->
@endsection