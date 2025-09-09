@extends('layouts/contentNavbarLayout')

@section('title', 'Tables - Basic Tables')

@section('content')
    <h4 class="py-3 mb-4"><span class="text-muted fw-light">Toko /</span> Produk
    </h4>

    <!-- Basic Bootstrap Table -->
    <div class="card">
        <div class="card-header row">
            <div class="col">
                <h5>Data Produk</h5>
            </div>
            <div class="col d-flex justify-content-end">
                <form class="mx-3">
                    <div class="input-group">
                        <span class="input-group-text"><i class="tf-icons mdi mdi-magnify"></i></span>
                        <input type="text" class="form-control" placeholder="Search..." />
                    </div>
                </form>
                <button type="button" class="btn rounded-pill btn-primary"
                    onclick="window.location.href='{{ route('toko-produk-tambah') }}'">Tambah</button>

            </div>
        </div>
        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Deskripsi</th>
                        <th>Harga</th>
                        <th>Stok</th>
                        <th>Berat</th>
                        <th>Satuan</th>
                        <th>Kategori</th>
                        <th>Rating</th>
                        <th>Pembelian</th>
                        <th>Aksi</th>

                    </tr>
                    @foreach ($produk as $p)
                </thead>
                <tbody class="table-border-bottom-0">
                    <tr>
                        <td> {{ $p->nama }}</td>
                        <td>{{ $p->deskripsi }}</td>
                        <td>{{ $p->harga }}</td>
                        <td>{{ $p->stok }}</td>
                        <td>{{ $p->berat }}</td>
                        <td>{{ $p->satuan }}</td>
                        <td>{{ $p->kategori_id }}</td>
                        <td>{{ $p->rating }}</td>
                        <td>{{ $p->pembelian }}</td>
                        <td>
                            <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                                <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top"
                                    class="avatar avatar-xs pull-up" title="Lilian Fuller">
                                    <img src="{{ asset('assets/img/avatars/5.png') }}" alt="Avatar"
                                        class="rounded-circle">
                                </li>
                                <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top"
                                    class="avatar avatar-xs pull-up" title="Sophia Wilkerson">
                                    <img src="{{ asset('assets/img/avatars/6.png') }}" alt="Avatar"
                                        class="rounded-circle">
                                </li>
                                <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top"
                                    class="avatar avatar-xs pull-up" title="Christina Parker">
                                    <img src="{{ asset('assets/img/avatars/7.png') }}" alt="Avatar"
                                        class="rounded-circle">
                                </li>
                            </ul>
                        </td>
                        <td>
                            <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                    data-bs-toggle="dropdown"><i class="mdi mdi-dots-vertical"></i></button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="{{route('toko-produk-edit', $p->id)}}"><i
                                            class="mdi mdi-pencil-outline me-1"></i> Edit</a>
                                    <a class="dropdown-item" href="{{ route('toko-produk-delate',$p->id) }}"><i
                                            class="mdi mdi-trash-can-outline me-1"></i> Delete</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!--/ Basic Bootstrap Table -->

    <hr class="my-5">









@endsection
