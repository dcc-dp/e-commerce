@extends('layouts/contentNavbarLayout')

@section('title', 'Admin - Edit Kategori')

@section('content')
    <h4 class="py-3 mb-4"><span class="text-muted fw-light">Admin / Kategori /</span> Edit</h4>

    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Form Edit Kategori</h5>
            <a href="{{ route('admin-kategori') }}" class="btn btn-secondary btn-sm">Kembali</a>
        </div>
        <div class="card-body">
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin-kategori-edit-proses', $kategori->id) }}" method="POST">
                @csrf
                <div class="form-floating form-floating-outline mb-4">
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan nama kategori" value="{{ old('nama', $kategori->nama) }}" required />
                    <label for="nama">Nama Kategori</label>
                </div>
                <button type="submit" class="btn btn-primary">Update Kategori</button>
            </form>
        </div>
    </div>
@endsection
