@extends('layouts/contentNavbarLayout')

@section('title', 'Admin - Kelola Penjual')

@section('content')
    <h4 class="py-3 mb-4"><span class="text-muted fw-light">Admin /</span> Kelola Penjual</h4>

    <div class="card">
        <div class="card-header row">
            <div class="col">
                <h5>Data Penjual (Toko/UMKM)</h5>
            </div>
        </div>
        <div class="table-responsive text-nowrap">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama Pemilik</th>
                        <th>Email</th>
                        <th>Nama Toko (UMKM)</th>
                        <th>No HP</th>
                        <th>Bergabung Sejak</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @forelse ($penjual as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td><span class="fw-medium">{{ $user->name }}</span></td>
                            <td>{{ $user->email }}</td>
                            <td>{{ optional($user->umkm)->nama ?: 'Belum diatur' }}</td>
                            <td>{{ optional($user->umkm)->nomorhp ?: '-' }}</td>
                            <td>{{ $user->created_at ? $user->created_at->format('d M Y') : '-' }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">Belum ada data penjual.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
