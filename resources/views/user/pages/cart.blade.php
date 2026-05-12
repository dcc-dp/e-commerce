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
                                    <th scope="col">Select</th>
                                    <th scope="col">Product</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($groupedCart as $toko => $items)

                                    <!-- Header toko sebagai TR valid -->
                                    <tr class="table-group-header">
                                        <td colspan="5" class="py-4">
                                            <h5 class="mb-0">Toko: {{ $toko }}</h5>
                                        </td>
                                    </tr>

                                    @foreach ($items as $keranjang)
                                        <tr>
                                            <td><input type="checkbox"></td>

                                            <td>
                                                <div class="media">
                                                    <div class="d-flex">
                                                        <img src="{{ asset('assets/img/user/cart.jpg') }}" alt="" style="width:120px;">
                                                    </div>
                                                    <div class="media-body">
                                                        <p class="mb-0">{{ $keranjang->produk->nama }}</p>
                                                    </div>
                                                </div>
                                            </td>

                                            <td><h5 class="mb-0">Rp.{{ number_format($keranjang->produk->harga,0,',','.') }}</h5></td>

                                            <td>
                                                <div class="product_count">
                                                    <input type="text" value="{{ $keranjang->jumlah }}" class="qty">
                                                </div>
                                            </td>

                                            <td><h5 class="mb-0">Rp.{{ number_format($keranjang->total,0,',','.') }}</h5></td>
                                        </tr>
                                    @endforeach

                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </div>
    </section>

@endsection
