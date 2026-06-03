@extends('layouts/contentNavbarLayout')

@section('title', 'Tables - Basic Tables')

@section('content')
    <h4 class="py-3 mb-4"><span class="text-muted fw-light">Toko /</span> Pemesanan
    </h4>

    <!-- Basic Bootstrap Table -->
    <div class="card">
        <div class="card-header row">
            <div class="col">
                <h5>Data Pemesanan</h5>
            </div>

        </div>

        <div class="card-body">
            <form action="{{ route('toko-pemesanan-edit-proses') }}" method="POST">
                @csrf
                <input type="hidden" value="{{ $pemesanan->id }}" name="id">
                
                <div class="mb-4">
                    <label for="status" class="form-label">Update Status Pesanan</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="mdi mdi-truck-delivery-outline"></i></span>
                        <select class="form-select" id="status" name="status">
                            <option value="pending" @if ($pemesanan->status == 'pending') selected @endif>Menunggu Pembayaran (Pending)</option>
                            <option value="proses" @if ($pemesanan->status == 'proses') selected @endif>Sedang Diproses</option>
                            <option value="kemas" @if ($pemesanan->status == 'kemas') selected @endif>Sedang Dikemas</option>
                            <option value="kirim" @if ($pemesanan->status == 'kirim') selected @endif>Sedang Dikirim</option>
                            <option value="selesai" @if ($pemesanan->status == 'selesai') selected @endif>Selesai Terkirim</option>
                        </select>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                <a href="{{ route('toko-pemesanan') }}" class="btn btn-outline-secondary ms-2">Batal</a>
            </form>
        </div>

    </div>

    <!--/ Basic Bootstrap Table -->

    <hr class="my-5">









@endsection
