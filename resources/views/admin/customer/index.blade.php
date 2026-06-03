@extends('layouts/contentNavbarLayout')

@section('title', 'Admin - Kelola Pembeli')

@section('content')
    <h4 class="py-3 mb-4"><span class="text-muted fw-light">Admin /</span> Kelola Pembeli</h4>

    <div class="card">
        <div class="card-header row">
            <div class="col">
                <h5>Data Pembeli (Customer)</h5>
            </div>
        </div>
        <div class="table-responsive text-nowrap">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Alamat</th>
                        <th>Bergabung Sejak</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @forelse ($customers as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td><span class="fw-medium">{{ $user->name }}</span></td>
                            <td>{{ $user->email }}</td>
                            <td>{{ Str::limit($user->alamat, 30) }}</td>
                            <td>{{ $user->created_at ? $user->created_at->format('d M Y') : '-' }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">Belum ada data pembeli.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
