@extends('user.layout.app')

@section('title', 'Registerasi - Karma Shop')

@section('content')

    <body>
        <style>
            .form-control {
                border: none;
                border-bottom: 1px solid #ddd;
                border-radius: 0;
                box-shadow: none;
                padding-left: 0;
                font-size: 14px;
                height: 45px;
            }

            .form-control:focus {
                border-color: #ff9900;
                box-shadow: none;
            }

            /* Biar <select> sama kayak input lainnya */
            select.form-control {
                appearance: none;
                -webkit-appearance: none;
                -moz-appearance: none;
                background-color: transparent;
                border-bottom: 1px solid #ddd;
                border-radius: 0;
                box-shadow: none;
                height: 45px;
                color: #555;
                padding-left: 0;
            }

            /* Tambahin icon panah custom biar modern */
            select.form-control:focus {
                border-color: #ff9900;
            }

            /* Optional: tambahin icon panah ke kanan */
            select.form-control {
                background-image: url("data:image/svg+xml;utf8,<svg fill='gray' height='20' viewBox='0 0 24 24' width='20' xmlns='http://www.w3.org/2000/svg'><path d='M7 10l5 5 5-5z'/></svg>");
                background-repeat: no-repeat;
                background-position: right 10px center;
                background-size: 16px;
            }
        </style>

        <!--================Login Box Area =================-->
        <section class="login_box_area section_gap" style="width: 100%; margin-top: 100px">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6 col-md-8">
                        <div class="login_form_inner shadow-lg rounded-3 p-5" style="background: #fff;">
                            <h3 class="text-center mb-4">Register Akun</h3>

                            <form class="row login_form" action="{{ route('userRegisterasiProses') }}" method="post"
                                novalidate="novalidate">
                                @csrf
                                <div class="col-md-12 form-group">
                                    <input type="text" class="form-control" name="nama" placeholder="Nama Lengkap"
                                        required>
                                </div>

                                <div class="col-md-12 form-group">
                                    <input type="email" class="form-control" name="email" placeholder="Email"
                                        required>
                                </div>

                                <div class="col-md-12 form-group">
                                    <input type="text" class="form-control" name="alamat" placeholder="Alamat"
                                        required>
                                </div>

                                <div class="col-md-12 form-group">
                                    <input type="password" class="form-control" name="password" placeholder="Password"
                                        required>
                                </div>

                                <div class="col-md-12 form-group">
                                    <select class="form-control" name="jkl" required>
                                        <option value="">Pilih Jenis Kelamin</option>
                                        <option value="L">Laki-laki</option>
                                        <option value="P">Perempuan</option>
                                    </select>
                                </div>

                                <div class="col-md-6 form-group">
                                    <input type="text" class="form-control" name="tmp_lahir"
                                        placeholder="Tempat Lahir" required>
                                </div>

                                <div class="col-md-6 form-group">
                                    <input type="date" class="form-control" name="tgl_lahir"
                                        placeholder="Tanggal Lahir" required>
                                </div>

                                <div class="col-md-12 text-center mt-3">
                                    <button type="submit" class="primary-btn btn-block">Daftar Sekarang</button>
                                </div>

                                <div class="col-md-12 text-center mt-2">
                                    <p>Sudah punya akun? <a href="{{ url('/login') }}">Login di sini</a></p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--================End Login Box Area =================-->

    @endsection
