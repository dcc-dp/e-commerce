@extends('layouts.contentNavbarLayout')

@section('title', 'Detail Produk')

@section('content')
<h4 class="py-3 mb-4">
    <span class="text-muted fw-light">Produk /</span> Detail
</h4>

<div class="row">
    <!-- Informasi Utama Produk -->
    <div class="col-md-6 mb-4">
        <div class="card h-100">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Informasi Produk</h5>
                <div>
                    @if($produk->status == 'pending')
                        <span class="badge bg-warning">Pending</span>
                    @elseif($produk->status == 'approved')
                        <span class="badge bg-success">Approved</span>
                    @else
                        <span class="badge bg-danger">Rejected</span>
                    @endif
                </div>
            </div>
            <div class="card-body">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item px-0">
                        <strong>Nama Produk:</strong><br>
                        {{ $produk->nama }}
                    </li>
                    <li class="list-group-item px-0">
                        <strong>Toko / Penjual:</strong><br>
                        {{ optional($produk->umkm)->nama ?? 'Toko Tidak Ditemukan' }}
                    </li>
                    <li class="list-group-item px-0">
                        <strong>Kategori:</strong><br>
                        {{ optional($produk->kategori)->nama ?? 'Tanpa Kategori' }}
                    </li>
                    <li class="list-group-item px-0">
                        <strong>Harga:</strong><br>
                        Rp {{ number_format($produk->harga, 0, ',', '.') }}
                    </li>
                    <li class="list-group-item px-0">
                        <strong>Stok:</strong><br>
                        {{ $produk->stok }}
                    </li>
                    <li class="list-group-item px-0">
                        <strong>Deskripsi:</strong><br>
                        <p class="mb-0 mt-2 text-justify" style="white-space: pre-line;">{{ $produk->deskripsi }}</p>
                    </li>
                </ul>
                <div class="mt-4">
                    <a href="{{ route('admin-produk') }}" class="btn btn-outline-secondary">Kembali</a>
                    @if($produk->status == 'pending' || $produk->status == 'rejected')
                        <a href="{{ route('admin-produk-approve', $produk->id) }}" class="btn btn-success ms-2">Approve</a>
                    @endif
                    @if($produk->status == 'pending' || $produk->status == 'approved')
                        <a href="{{ route('admin-produk-reject', $produk->id) }}" class="btn btn-danger ms-2">Reject / Takedown</a>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Galeri Foto Produk -->
    <div class="col-md-6 mb-4">
        <div class="card h-100">
            <div class="card-header">
                <h5 class="mb-0">Galeri Foto Produk</h5>
            </div>
            <div class="card-body">
                <div class="row g-3">
                    @if($produk->batch_foto && $produk->batch_foto->fotos->count() > 0)
                        @foreach($produk->batch_foto->fotos as $f)
                            <div class="col-md-6 col-lg-4 text-center">
                                <div class="border rounded p-1" style="box-shadow: 0 2px 4px rgba(0,0,0,0.05);">
                                    <a href="{{ asset('assets/img/user/product/' . $f->foto) }}" target="_blank">
                                        <img src="{{ asset('assets/img/user/product/' . $f->foto) }}" alt="Foto Produk" class="img-fluid rounded" style="height: 120px; object-fit: cover; width: 100%;">
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="col-12 text-center py-5">
                            <i class="mdi mdi-image-off-outline text-muted" style="font-size: 4rem;"></i>
                            <h6 class="text-muted mt-3">Tidak ada foto produk yang dilampirkan oleh penjual.</h6>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
