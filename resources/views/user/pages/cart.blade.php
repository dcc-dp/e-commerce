@extends('user.layout.app')

@section('title', 'Cart - Karma Shop')

@section('content')

    <section class="cart_area mt-5">
        <div class="container">
            <div class="cart_inner">
                @if(session('error'))
                    <div class="alert alert-danger" style="border-radius: 10px;">{{ session('error') }}</div>
                @endif
                @if(session('success'))
                    <div class="alert alert-success" style="border-radius: 10px;">{{ session('success') }}</div>
                @endif

                {{-- CEK USER LOGIN --}}
                @if (!Auth::check())
                    <div class="alert alert-warning text-center">
                        <strong>Anda belum login.</strong><br>
                        Silakan <a href="{{ route('userLogin') }}">login</a> untuk melihat isi keranjang.
                    </div>
                @elseif (empty($groupedCart) || (is_object($groupedCart) && $groupedCart->isEmpty()))
                    <div class="text-center py-5" style="background: #fff; border-radius: 15px; box-shadow: 0 5px 20px rgba(0,0,0,0.05);">
                        <img src="{{ asset('assets/img/user/features/f-icon3.png') }}" alt="Empty Cart" style="width: 120px; opacity: 0.6; margin-bottom: 20px;">
                        <h3 style="font-weight: 700; color: #333;">Keranjang Belanja Kosong</h3>
                        <p class="text-muted mb-4">Sepertinya Anda belum memilih produk apa pun.<br>Ayo mulai belanja dan temukan barang impian Anda!</p>
                        <a href="{{ route('userShop') }}" class="primary-btn" style="border-radius: 30px; padding: 12px 40px; font-weight: 600;">Belanja Sekarang</a>
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
                                    <th scope="col">Jumlah</th>
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
                                            <td>
                                                <input type="checkbox" class="cek-produk"
                                                    data-total="{{ $keranjang->total }}" data-id="{{ $keranjang->id }}">
                                            </td>

                                            <td>
                                                <div class="media">
                                                    <div class="d-flex">
                                                        @if($keranjang->produk->batch_foto && $keranjang->produk->batch_foto->fotos->count() > 0)
                                                            <img src="{{ asset('assets/img/user/product/' . $keranjang->produk->batch_foto->fotos->first()->foto) }}" alt="" style="width:120px; height: 120px; object-fit: cover; border-radius: 5px;">
                                                        @else
                                                            <img src="{{ asset('assets/img/user/cart.jpg') }}" alt="" style="width:120px; height: 120px; object-fit: cover; border-radius: 5px;">
                                                        @endif
                                                    </div>
                                                    <div class="media-body">
                                                        <p class="mb-0">{{ $keranjang->produk->nama }}</p>
                                                    </div>
                                                </div>
                                            </td>

                                            <td>
                                                <h5 class="mb-0">
                                                    Rp.{{ number_format($keranjang->produk->harga, 0, ',', '.') }}</h5>
                                            </td>

                                            <td>
                                                <div class="product_count">
                                                    <input type="text" value="{{ $keranjang->jumlah }}" class="qty">
                                                </div>
                                            </td>

                                            <td>
                                                <h5 class="mb-0">Rp.{{ number_format($keranjang->total, 0, ',', '.') }}
                                                </h5>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <section class="tracking_box_area section_gap">
                        <div class="container">
                            <div class="tracking_box_inner">
                                <p>Total Harga</p>

                                <h3 class="text-primary" id="total-harga">
                                    Rp 0
                                </h3>
                                <form action="{{ route('userCheckout') }}" method="get">
                                    @csrf

                                    <input type="hidden" name="total" id="input-total">
                                    <input type="hidden" name="produk_ids" id="input-produk-ids">

                                    <button type="submit" class="primary-btn">Checkout</button>
                                </form>
                                {{-- <div class="col-md-12 form-group">
                                    <a href="{{ route('userCheckout') }}">
                                        <button type="submit" value="submit" class="primary-btn">Checkout</button>
                                </div> --}}
                            </div>
                        </div>
                    </section>
                @endif
            </div>
        </div>
    </section>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
    $(document).ready(function() {

        function hitungTotal() {
            let total = 0;
            let produkIds = [];

            $('.cek-produk:checked').each(function() {
                total += parseInt($(this).data('total'));
                produkIds.push($(this).data('id'));
            });

            // tampilkan total
            $('#total-harga').text(
                'Rp ' + total.toLocaleString('id-ID')
            );

            // kirim ke input hidden
            $('#input-total').val(total);
            $('#input-produk-ids').val(JSON.stringify(produkIds));
        }

        $('.cek-produk').on('change', function() {
            hitungTotal();
        });

    });
</script>

    {{-- <script>
        $(document).ready(function() {

            function hitungTotal() {
                let total = 0;
                let produkIds = [];

                $('.cek-produk:checked').each(function() {
                    total = total + parseInt($(this).data('total'));
                    produkIds.push($(this).data('id'));
                    console.log(produkIds);
                });

                $('#total-harga').text(
                    'Rp ' + total.toLocaleString('id-ID')
                );

            }





            // Saat checkbox dicentang / dilepas
            $('.cek-produk').on('change', function() {
                hitungTotal();

            });

        });
    </script> --}}


@endsection
