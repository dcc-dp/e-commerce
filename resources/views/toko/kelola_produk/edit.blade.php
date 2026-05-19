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

        <form action="{{ route('toko-pemesanan-edit-proses') }}" method="POST">
            @csrf
            <div class="input-group input-group-merge mb-4">
                <span id="basic-icon-default-fullname2" class="input-group-text"><i
                        class="mdi mdi-account-outline"></i></span>
                    <input type="text"value={{$pemesanan->id}} hidden name="id">
                <select class="form-select" id="exampleFormControlSelect1" aria-label="Default select example"
                    name="status">
                    <option value="proses" @if ($pemesanan->status == 'proses') selected @endif>Proses</option>
                    <option value="kemas" @if ($pemesanan->status == 'kemas') selected @endif>DI Kemas</option>
                    <option value="kirim"@if ($pemesanan->status == 'kirim') selected @endif>DI Kirim</option>
                    <option value="selesai"@if ($pemesanan->status == 'selesai') selected @endif>Selesai</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Send</button>
        </form>

    </div>

    <!--/ Basic Bootstrap Table -->

    <hr class="my-5">









@endsection
