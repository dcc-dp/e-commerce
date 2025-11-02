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


        <!-- Start Header Area -->
        <header class="header_area sticky-header">
            <div class="main_menu">
                <nav class="navbar navbar-expand-lg navbar-light main_box">
                    <div class="container">
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <a class="navbar-brand logo_h" href="index.html"><img src="{{ asset('assets/img/user/logo.png') }}"
                                alt=""></a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                            <ul class="nav navbar-nav menu_nav ml-auto">
                                <li class="nav-item"><a class="nav-link" href="index.html">Home</a></li>
                                <li class="nav-item submenu dropdown">
                                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button"
                                        aria-haspopup="true" aria-expanded="false">Shop</a>
                                    <ul class="dropdown-menu">
                                        <li class="nav-item"><a class="nav-link" href="category.html">Shop Category</a></li>
                                        <li class="nav-item"><a class="nav-link" href="single-product.html">Product
                                                Details</a></li>
                                        <li class="nav-item"><a class="nav-link" href="checkout.html">Product Checkout</a>
                                        </li>
                                        <li class="nav-item"><a class="nav-link" href="cart.html">Shopping Cart</a></li>
                                        <li class="nav-item"><a class="nav-link" href="confirmation.html">Confirmation</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-item submenu dropdown">
                                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button"
                                        aria-haspopup="true" aria-expanded="false">Blog</a>
                                    <ul class="dropdown-menu">
                                        <li class="nav-item"><a class="nav-link" href="blog.html">Blog</a></li>
                                        <li class="nav-item"><a class="nav-link" href="single-blog.html">Blog Details</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-item submenu dropdown active">
                                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button"
                                        aria-haspopup="true" aria-expanded="false">Pages</a>
                                    <ul class="dropdown-menu">
                                        <li class="nav-item active"><a class="nav-link" href="login.html">Login</a></li>
                                        <li class="nav-item"><a class="nav-link" href="tracking.html">Tracking</a></li>
                                        <li class="nav-item"><a class="nav-link" href="elements.html">Elements</a></li>
                                    </ul>
                                </li>
                                <li class="nav-item"><a class="nav-link" href="contact.html">Contact</a></li>
                            </ul>
                            <ul class="nav navbar-nav navbar-right">
                                <li class="nav-item"><a href="#" class="cart"><span class="ti-bag"></span></a></li>
                                <li class="nav-item">
                                    <button class="search"><span class="lnr lnr-magnifier" id="search"></span></button>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
            <div class="search_input" id="search_input_box">
                <div class="container">
                    <form class="d-flex justify-content-between">
                        <input type="text" class="form-control" id="search_input" placeholder="Search Here">
                        <button type="submit" class="btn"></button>
                        <span class="lnr lnr-cross" id="close_search" title="Close Search"></span>
                    </form>
                </div>
            </div>
        </header>
        <!-- End Header Area -->

        <!--================Login Box Area =================-->
        <section class="login_box_area section_gap" style="width: 100%; margin-top: 100px">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-8">
                    <div class="login_form_inner shadow-lg rounded-3 p-5" style="background: #fff;">
                        <h3 class="text-center mb-4">Register Akun</h3>

                        <form class="row login_form" action="#" method="post" novalidate="novalidate">
                            @csrf
                            <div class="col-md-12 form-group">
                                <input type="text" class="form-control" name="nama" placeholder="Nama Lengkap" required>
                            </div>

                            <div class="col-md-12 form-group">
                                <input type="email" class="form-control" name="email" placeholder="Email" required>
                            </div>

                            <div class="col-md-12 form-group">
                                <input type="text" class="form-control" name="alamat" placeholder="Alamat" required>
                            </div>

                            <div class="col-md-12 form-group">
                                <input type="password" class="form-control" name="password" placeholder="Password" required>
                            </div>

                            <div class="col-md-12 form-group">
                                <select class="form-control" name="jkl" required>
                                    <option value="">Pilih Jenis Kelamin</option>
                                    <option value="L">Laki-laki</option>
                                    <option value="P">Perempuan</option>
                                </select>
                            </div>

                            <div class="col-md-6 form-group">
                                <input type="text" class="form-control" name="tmp_lahir" placeholder="Tempat Lahir" required>
                            </div>

                            <div class="col-md-6 form-group">
                                <input type="date" class="form-control" name="tgl_lahir" placeholder="Tanggal Lahir" required>
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
