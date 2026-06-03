@extends('layouts/contentNavbarLayout')

@section('title', 'Admin - Kelola Kategori')

@section('content')
    <h4 class="py-3 mb-4"><span class="text-muted fw-light">Admin /</span> Kelola Kategori</h4>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <div class="card">
        <div class="card-header row">
            <div class="col">
                <h5>Data Kategori</h5>
            </div>
            <div class="col d-flex justify-content-end">
                <a href="{{ route('admin-kategori-tambah') }}" class="btn btn-primary"><i class="mdi mdi-plus me-1"></i> Tambah Kategori</a>
            </div>
        </div>
        <div class="table-responsive text-nowrap">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama Kategori</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @forelse ($kategori as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td><span class="fw-medium">{{ $item->nama }}</span></td>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                        data-bs-toggle="dropdown"><i class="mdi mdi-dots-vertical"></i></button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{ route('admin-kategori-edit', $item->id) }}"><i
                                                class="mdi mdi-pencil-outline me-1"></i> Edit</a>
                                        <a class="dropdown-item text-danger" href="{{ route('admin-kategori-hapus', $item->id) }}" onclick="return confirm('Yakin ingin menghapus kategori ini?');"><i
                                                class="mdi mdi-trash-can-outline me-1"></i> Hapus</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center">Belum ada data kategori</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
