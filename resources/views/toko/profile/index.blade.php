@extends('layouts/contentNavbarLayout')

@section('title', 'Account settings - Account')

@section('page-script')
<script src="{{asset('assets/js/pages-account-settings-account.js')}}"></script>
@endsection

@section('content')
<h4 class="py-3 mb-4">
  <span class="text-muted fw-light">Kelola Toko /</span> Deskripsi
</h4>

<div class="row">
  <div class="col-md-12">w
    <div class="card mb-4">
      <h4 class="card-header">Profile Toko</h4>
      <!-- Account -->
      <div class="card-body">
        <div class="d-flex align-items-start align-items-sm-center gap-4">
          <img src="{{asset('assets/img/avatars/1.png')}}" alt="user-avatar" class="d-block w-px-120 h-px-120 rounded" id="uploadedAvatar" />
          <div class="button-wrapper">
            <label for="upload" class="btn btn-primary me-2 mb-3" tabindex="0">
              <span class="d-none d-sm-block">Upload new photo</span>
              <i class="mdi mdi-tray-arrow-up d-block d-sm-none"></i>
              <input type="file" id="upload" class="account-file-input" hidden accept="image/png, image/jpeg" />
            </label>
            <button type="button" class="btn btn-outline-danger account-image-reset mb-3">
              <i class="mdi mdi-reload d-block d-sm-none"></i>
              <span class="d-none d-sm-block">Reset</span>
            </button>

            <div class="text-muted small">Allowed JPG, GIF or PNG. Max size of 800K</div>
          </div>
        </div>
      </div>
      <div class="card-body pt-2 mt-1">
        <form id="formAccountSettings" action="{{ route('update_profile') }}" method="POST">
          @csrf
          <input type="hidden" name="id" value="{{ $data->id }}"/>
          <div class="row mt-2 gy-4">
            <div class="col-md-6">
              <div class="form-floating form-floating-outline">
                <input class="form-control" name="nama" type="text" required value="{{ $data->nama}}" autofocus />
                <label>Nama</label>
              </div>
            </div>
            
            <div class="col-md-6">
              <div class="form-floating form-floating-outline">
                <input class="form-control" name="alamat" type="text" autofocus required value="{{ $data->alamat}}"/>
                <label>Alamat</label>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-floating form-floating-outline">
                <input class="form-control" value="{{ $data->deskripsi }}" name="deskripsi" type="text" autofocus style="height: 100px" required ></input>
                <label>Deskripsi</label>
              </div>
            </div>
          </div>
          <div class="mt-4">
            <button type="submit" class="btn btn-primary me-2">Save changes</button>
          </div>
        </form>
      </div>
      <!-- /Account -->
    </div>
    <div class="card">
      <div class="card-header">
        <div class="d-flex align-items-center justify-content-between">
          <h5 class="card-title m-0 me-2">Detail Toko</h5>
        </div>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col">
            <div class="d-flex align-items-center">
              <div class="avatar">
                <div class="avatar-initial bg-primary rounded shadow">
                  <i class="mdi mdi-database mdi-24px"></i>
                </div>
              </div>
              <div class="ms-3">
                <div class="small mb-1">Produk</div>
                <h5 class="mb-0">{{ $produk }}</h5>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="d-flex align-items-center">
              <div class="avatar">
                <div class="avatar-initial bg-success rounded shadow">
                  <i class="mdi mdi-star mdi-24px"></i>
                </div>
              </div>
              <div class="ms-3">
                <div class="small mb-1">Penilaian</div>
                <h5 class="mb-0">{{ $penilaian }} dari 5 ({{ $banyaknyapenilaian }} Penilaian)</h5>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="d-flex align-items-center">
              <div class="avatar">
                <div class="avatar-initial bg-info rounded shadow">
                  <i class="mdi mdi-account-check mdi-24px"></i>
                </div>
              </div>
              <div class="ms-3">
                <div class="small mb-1">Bergabung</div>
                <h5 class="mb-0">{{ $tglbergabung }}</h5>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="card mt-4">
      <h5 class="card-header fw-normal">Hapus Toko</h5>
      <div class="card-body">
        <div class="mb-3 col-12 mb-0">
          <div class="alert alert-warning">
            <h6 class="alert-heading mb-1">Apakah kamu ingin menghapus akun?</h6>
            <p class="mb-0">Ketika kamu menghapus akun, tindakan tersebut tidak dapat dibatalkan. Mohon untuk konfirmasi.</p>
          </div>
        </div>
        <form id="formAccountDeactivation" onsubmit="return false">
          <div class="form-check mb-3 ms-3">
            <input class="form-check-input" type="checkbox" name="accountActivation" id="accountActivation" />
            <label class="form-check-label" for="accountActivation">Saya menyetujui penghapusan akun</label>
          </div>
          <button type="submit" class="btn btn-danger">Hapus Akun</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection