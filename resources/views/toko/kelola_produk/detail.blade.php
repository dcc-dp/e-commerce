@extends('layouts/contentNavbarLayout')

@section('title', 'Tables - Basic Tables')

@section('content')
    <h4 class="py-3 mb-4"><span class="text-muted fw-light">Toko /</span> Pemesanan /<span> Detail
    </h4>

    <!-- Basic Bootstrap Table -->
    <div class="card">
        <div class="card-header row">
            <div class="col">
                <h5>Detail Pemesanan</h5>
            </div>
            <div class="col d-flex justify-content-end">
                <form class="mx-3">
                    <div class="input-group">
                        <span class="input-group-text"><i class="tf-icons mdi mdi-magnify"></i></span>
                        <input type="text" class="form-control" placeholder="Search..." />
                    </div>
                </form>

            </div>
        </div>
        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead>
                    <tr>
                        <th>Produk</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach ($detail as $d)
                    <tr>
                        <td>{{ $d->produk->nama ?? 'Produk Tidak Ditemukan' }}</td>
                        <td>Rp {{ number_format($d->produk->harga ?? 0, 0, ',', '.') }}</td>
                        <td>{{ $d->jumlah }}</td>
                        <td>Rp {{ number_format($d->total, 0, ',', '.') }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!--/ Basic Bootstrap Table -->

    <hr class="my-5">









@endsection
