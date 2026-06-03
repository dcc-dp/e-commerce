@extends('layouts/contentNavbarLayout')

@section('title', 'Admin - Semua Transaksi')

@section('content')
    <h4 class="py-3 mb-4"><span class="text-muted fw-light">Admin /</span> Semua Transaksi</h4>

    <div class="card">
        <div class="card-header row">
            <div class="col">
                <h5>Data Transaksi Global</h5>
            </div>
            <div class="col d-flex justify-content-end">
                <form class="mx-3">
                    <div class="input-group">
                        <span class="input-group-text"><i class="tf-icons mdi mdi-magnify"></i></span>
                        <input type="text" class="form-control" placeholder="Cari ID Pesanan..." />
                    </div>
                </form>
            </div>
        </div>
        <div class="table-responsive text-nowrap">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>ID Pesanan</th>
                        <th>Pembeli</th>
                        <th>Total Bayar</th>
                        <th>Status</th>
                        <th>Toko / UMKM</th>
                        <th>Tanggal</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @forelse ($transaksi as $item)
                        <tr>
                            <td><strong>#{{ $item->id }}</strong></td>
                            <td>{{ optional($item->user)->name ?? 'Anonim' }}</td>
                            <td>Rp {{ number_format($item->total, 0, ',', '.') }}</td>
                            <td>
                                @if($item->status == 'pending')
                                    <span class="badge bg-warning text-dark">Pending</span>
                                @elseif($item->status == 'proses')
                                    <span class="badge bg-info">Proses</span>
                                @elseif($item->status == 'kemas')
                                    <span class="badge bg-primary">Kemas</span>
                                @elseif($item->status == 'kirim')
                                    <span class="badge bg-secondary">Dikirim</span>
                                @elseif($item->status == 'selesai')
                                    <span class="badge bg-success">Selesai</span>
                                @else
                                    <span class="badge bg-dark">{{ $item->status }}</span>
                                @endif
                            </td>
                            <td>
                                @php
                                    $shops = collect();
                                    if($item->detailPemesanan) {
                                        foreach($item->detailPemesanan as $dp) {
                                            if($dp->produk && $dp->produk->umkm) {
                                                $shops->push($dp->produk->umkm->nama);
                                            }
                                        }
                                    }
                                    $uniqueShops = $shops->unique()->implode(', ');
                                @endphp
                                {{ $uniqueShops ?: '-' }}
                            </td>
                            <td>{{ $item->created_at ? $item->created_at->format('d M Y') : '-' }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">Belum ada transaksi di platform.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
