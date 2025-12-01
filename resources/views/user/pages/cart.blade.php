@extends('user.layout.app')

@section('title', 'Cart - Karma Shop')

@section('content')

    <section class="cart_area mt-5">
        <div class="container">
            <div class="cart_inner">

                {{-- CEK USER LOGIN --}}
                @if (!Auth::check())
                    <div class="alert alert-warning text-center">
                        <strong>Anda belum login.</strong><br>
                        Silakan <a href="{{ route('userLogin') }}">login</a> untuk melihat isi keranjang.
                    </div>
                @else
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
                                                <input type="text" name="qty" id="sst" maxlength="12"
                                                    value="{{ $keranjang->jumlah }}" title="Quantity:"
                                                    class="input-text qty">

                                                <button
                                                    onclick="var result = document.getElementById('sst'); 
                                                    var sst = result.value; if(!isNaN(sst)) result.value++; return false;"
                                                    class="increase items-count" type="button">
                                                    <i class="lnr lnr-chevron-up"></i>
                                                </button>

                                                <button
                                                    onclick="var result = document.getElementById('sst'); 
                                                    var sst = result.value; if(!isNaN(sst) && sst > 0) result.value--; return false;"
                                                    class="reduced items-count" type="button">
                                                    <i class="lnr lnr-chevron-down"></i>
                                                </button>
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
                @endif
            </div>
        </div>
    </section>

@endsection
