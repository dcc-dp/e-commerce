@extends('layouts/contentNavbarLayout')

@section('title', 'Produk')

@section('content')
<h4 class="py-3 mb-4"><span class="text-muted fw-light">Toko /</span> Produk /</span> Tambah
</h4>

<!-- Basic Layout -->
<div class="row">

<!-- Merged -->
  <div class="col-xl">
    <div class="card mb-4">
      <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Basic with Icons</h5>
        <small class="text-muted float-end">Merged input group</small>
      </div>
      <div class="card-body">
        <form action="{{route('toko-produk-tambah-proses')}}" method="POST">
            @csrf
          <div class="input-group input-group-merge mb-4">
            <span id="basic-icon-default-fullname2" class="input-group-text"><i class="mdi mdi-account-outline"></i></span>
            <input type="text" class="form-control" id="basic-icon-default-fullname" placeholder="Nama" aria-label="Full Name" aria-describedby="basic-icon-default-fullname2" />
          </div>
          <div class="form-floating form-floating-outline mb-4">
            <textarea id="basic-default-message" class="form-control" placeholder="Hi, Do you have a moment to talk Joe?" style="height: 60px;"></textarea>
            <label for="basic-default-message">Deskripsi</label>
          </div>
 <div class="input-group input-group-merge mb-4">
            <span id="basic-icon-default-phone2" class="input-group-text"><i class="mdi mdi-cash-multiple"></i></span>
            <input type="number" id="basic-icon-default-phone" class="form-control phone-mask" placeholder="Harga" aria-label="Phone No" aria-describedby="basic-icon-default-phone2" />
          </div>
          <div class="input-group input-group-merge mb-4">
            <span id="basic-icon-default-phone2" class="input-group-text"><i class="mdi mdi-archive-outline"></i></span>
            <input type="text" id="basic-icon-default-phone" class="form-control phone-mask" placeholder="Stok" aria-label="Phone No" aria-describedby="basic-icon-default-phone2" />
          </div>
          <div class="input-group input-group-merge mb-4">
            <span id="basic-icon-default-fullname2" class="input-group-text"><i class="mdi mdi-weight"></i></span>
            <input type="number" class="form-control" id="basic-icon-default-fullname" placeholder="Berat" aria-label="Full Name" aria-describedby="basic-icon-default-fullname2" />
          </div>
          <div class="input-group input-group-merge mb-4">
            <span id="basic-icon-default-fullname2" class="input-group-text"><i class="mdi mdi-alert-circle-outline"></i></span>
             <select class="form-select" id="exampleFormControlSelect1" aria-label="Default select example">
                <option value="S">Satuan</option>
            <option value="B">Box</option>
            <option value="L">Liter</option>
            <option value="K">Kilogram</option>
            <option value="M">Meter</option>
          </select>
          </div>
          <div class="input-group input-group-merge mb-4">
            <span id="basic-icon-default-fullname2" class="input-group-text"><i class="mdi mdi-dns-outline"></i></span> 
            <select class="form-select" id="exampleFormControlSelect1" aria-label="Default select example">
                <option value="S">Kategori</option>
            <option value="AE">Alat Eletronik</option>
            <option value="MM">Makanan & Minuman</option>
            <option value="B">Barang</option>
          </select>
          </div>
          <small>Foto</small>
          <div class="input-group input-group-merge mb-4">
            
            <span id="basic-icon-default-fullname2" class="input-group-text"><i class="mdi mdi-file-account-outline"></i></span>
            <input type="file" class="form-control" id="basic-icon-default-fullname" placeholder="Foto" aria-label="Full Name" aria-describedby="basic-icon-default-fullname2" />
          </div>
          <button type="submit" class="btn btn-primary">Send</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
