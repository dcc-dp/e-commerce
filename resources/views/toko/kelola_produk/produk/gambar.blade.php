@extends('layouts/contentNavbarLayout')

@section('title', 'Kelola Gambar Produk')

@section('content')
    <h4 class="py-3 mb-4"><span class="text-muted fw-light">Toko / Produk /</span> Kelola Gambar</h4>

    <div class="row">
        <!-- Form Upload -->
        <div class="col-md-4">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Unggah Gambar Baru</h5>
                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    @if(session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('toko-produk-gambar-upload') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="produk_id" value="{{ $produk->id }}">
                        
                        <div class="mb-3">
                            <label for="foto" class="form-label">Pilih Gambar (JPEG, PNG, JPG)</label>
                            <input class="form-control" type="file" id="foto" name="foto" required>
                        </div>
                        
                        <button type="submit" class="btn btn-primary w-100">Upload Gambar</button>
                        <a href="{{ route('toko-produk') }}" class="btn btn-outline-secondary w-100 mt-2">Kembali</a>
                    </form>
                </div>
            </div>
        </div>

        <!-- Galeri Gambar -->
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Galeri: {{ $produk->nama }}</h5>
                </div>
                <div class="card-body">
                    <div class="row g-3">
                        @if($produk->batch_foto && $produk->batch_foto->fotos->count() > 0)
                            @foreach($produk->batch_foto->fotos as $f)
                                <div class="col-md-4 col-sm-6 text-center">
                                    <div class="border rounded p-2" style="position: relative;">
                                        <img src="{{ asset('assets/img/user/product/' . $f->foto) }}" alt="Gambar Produk" class="img-fluid rounded" style="height: 150px; object-fit: cover; width: 100%;">
                                        <div class="mt-2">
                                            <a href="{{ route('toko-produk-gambar-hapus', $f->id) }}" class="btn btn-sm btn-danger w-100" onclick="return confirm('Hapus gambar ini?');">
                                                <i class="mdi mdi-trash-can-outline"></i> Hapus
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="col-12 text-center py-5">
                                <h6 class="text-muted">Belum ada gambar untuk produk ini.</h6>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
