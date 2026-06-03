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
                        <th>Status</th>
                        <th>Aksi</th>

                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach ($produk as $p)
                    <tr>
                        <td> {{ $p->nama }}</td>
                        <td>{{ Str::limit($p->deskripsi, 30) }}</td>
                        <td>Rp {{ number_format($p->harga, 0, ',', '.') }}</td>
                        <td>{{ $p->stok }}</td>
                        <td>{{ $p->berat }}</td>
                        <td>{{ $p->satuan }}</td>
                        <td>{{ optional($p->kategori)->nama ?: '-' }}</td>
                        <td>
                            @if($p->status == 'pending')
                                <span class="badge bg-warning">Pending</span>
                            @elseif($p->status == 'approved')
                                <span class="badge bg-success">Tayang</span>
                            @elseif($p->status == 'rejected')
                                <span class="badge bg-danger">Ditolak</span>
                            @else
                                <span class="badge bg-secondary">{{ $p->status }}</span>
                            @endif
                        </td>
                        <td>
                            <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                    data-bs-toggle="dropdown"><i class="mdi mdi-dots-vertical"></i></button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="{{ route('toko-produk-gambar', $p->id) }}"><i
                                            class="mdi mdi-image-multiple-outline me-1"></i> Kelola Gambar</a>
                                    <a class="dropdown-item" href="{{ route('toko-produk-edit', $p->id) }}"><i
                                            class="mdi mdi-pencil-outline me-1"></i> Edit</a>
                                    <a class="dropdown-item" href="{{ route('toko-produk-delate', $p->id) }}"><i
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
