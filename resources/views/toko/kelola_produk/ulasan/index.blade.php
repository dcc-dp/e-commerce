@extends('layouts/contentNavbarLayout')

@section('title', 'Tables - Basic Tables')

@section('content')
    <h4 class="py-3 mb-4"><span class="text-muted fw-light">Toko /</span> Ulasan
    </h4>

    <!-- Basic Bootstrap Table -->
    <div class="card">
        <div class="card-header row">
            <div class="col">
                <h5>Data Ulasan</h5>
            </div>
            <div class="col d-flex justify-content-end">
                <form class="mx-3">
                    <div class="input-group">
                        <span class="input-group-text"><i class="tf-icons mdi mdi-magnify"></i></span>
                        <input type="text" class="form-control" placeholder="Search..." />
                    </div>
                </form>
                {{-- <button type="button" class="btn rounded-pill btn-primary"
                    onclick="window.location.href='{{ route('toko-ulasan-tambah') }}'">Tambah</button> --}}

            </div>

        </div>

        <div class="table-responsive
                    text-nowrap">
            <table class="table">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Produk</th>
                        <th>Ulasan</th>
                        <th>Rating</th>
                        <th>Foto</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach ($ulasan as $u)
                        <tr>

                            <td> {{ $u->userr->nama ?? '' }}</td>
                            <td> {{ $u->produk->nama }}</td>
                            <td> {{ $u->ulasan }}</td>
                            <td> {{ $u->rating }}</td>
                            <td> {{ $u->foto }}</td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
    <!--/ Basic Bootstrap Table -->

    <hr class="my-5">









@endsection
