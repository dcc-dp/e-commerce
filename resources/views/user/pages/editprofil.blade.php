@extends('user.layout.app')

@section('title', 'Update Profile - Karma Shop')

@section('content')
    <section class="update-profile-area section_gap" style="margin-top: 100px;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="login_form_inner shadow-sm p-4" style="border-radius: 10px; background: #fff;">
                        <h4 class="mb-4 text-center">Update Profil</h4>
                        
                        @if(session('success'))
                            <div class="alert alert-success text-center">{{ session('success') }}</div>
                        @endif
                        @if($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0 text-left">
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('ProfilUserUpdate') }}" method="POST" class="row login_form">
                            @csrf
                            <div class="col-md-12 form-group">
                                <label for="name" class="text-left w-100" style="font-size: 14px; font-weight: 600;">Nama Lengkap</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" required>
                            </div>
                            <div class="col-md-12 form-group">
                                <label for="email" class="text-left w-100" style="font-size: 14px; font-weight: 600;">Email</label>
                                <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" required>
                            </div>
                            <div class="col-md-12 form-group">
                                <label for="password" class="text-left w-100" style="font-size: 14px; font-weight: 600;">Password Baru (Opsional)</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Kosongkan jika tidak ingin mengubah password">
                            </div>
                            <div class="col-md-12 form-group mt-4 d-flex justify-content-between">
                                <a href="{{ route('ProfilUser') }}" class="genric-btn default radius" style="padding: 10px 30px;">Batal</a>
                                <button type="submit" class="primary-btn" style="border: none; padding: 10px 30px; border-radius: 30px;">Simpan Perubahan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
