@extends('layouts/contentNavbarLayout')

@section('title', 'Admin - Kelola Produk')

@section('content')
    <h4 class="py-3 mb-4"><span class="text-muted fw-light">Admin /</span> Kelola Produk Global</h4>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card">
        <div class="card-header row">
            <div class="col">
                <h5>Data Seluruh Produk</h5>
            </div>
        </div>
        <div class="table-responsive text-nowrap">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama Produk</th>
                        <th>Kategori</th>
                        <th>Toko / UMKM</th>
                        <th>Harga</th>
                        <th>Stok</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @forelse ($produk as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td><span class="fw-medium">{{ Str::limit($item->nama, 30) }}</span></td>
                            <td>{{ optional($item->kategori)->nama ?: '-' }}</td>
                            <td><span class="badge bg-label-primary">{{ optional($item->umkm)->nama ?: '-' }}</span></td>
                            <td>Rp {{ number_format($item->harga, 0, ',', '.') }}</td>
                            <td>{{ $item->stok }} {{ $item->satuan }}</td>
                            <td>
                                @if($item->status == 'pending')
                                    <span class="badge bg-warning">Pending</span>
                                @elseif($item->status == 'approved')
                                    <span class="badge bg-success">Tayang</span>
                                @elseif($item->status == 'rejected')
                                    <span class="badge bg-danger">Ditolak</span>
                                @else
                                    <span class="badge bg-secondary">{{ $item->status }}</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('admin-produk-detail', $item->id) }}" class="btn btn-sm btn-info mb-1" title="Lihat Detail Produk">
                                    <i class="mdi mdi-eye-outline"></i> Detail
                                </a>

                                @if($item->status == 'pending' || $item->status == 'rejected')
                                    <a href="{{ route('admin-produk-approve', $item->id) }}" class="btn btn-sm btn-success mb-1" title="Setujui Produk">
                                        <i class="mdi mdi-check-circle-outline"></i> Approve
                                    </a>
                                @endif
                                
                                @if($item->status == 'pending' || $item->status == 'approved')
                                    <a href="{{ route('admin-produk-reject', $item->id) }}" class="btn btn-sm btn-warning mb-1" title="Tolak / Takedown Produk" onclick="return confirm('Tolak produk ini agar tidak tampil ke publik?');">
                                        <i class="mdi mdi-cancel"></i> Reject
                                    </a>
                                @endif

                                <a href="{{ route('admin-produk-hapus', $item->id) }}" class="btn btn-sm btn-danger mb-1" onclick="return confirm('Hapus permanen produk ini dari sistem?');" title="Hapus Permanen">
                                    <i class="mdi mdi-trash-can-outline"></i> Delete
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">Belum ada produk di platform.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
