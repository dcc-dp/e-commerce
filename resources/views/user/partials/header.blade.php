<header class="header_area sticky-header">
    <div class="main_menu">
        <nav class="navbar navbar-expand-lg navbar-light main_box">
            <div class="container">
                <a class="navbar-brand logo_h" href="{{ url('/') }}">
                    <img src="{{ asset('assets/img/user/logo.png') }}" alt="">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                @php

                    $currentRouteName = Route::currentRouteName();

                @endphp

                <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                    <ul class="nav navbar-nav menu_nav ml-auto">
                        <li class="nav-item  {{ $currentRouteName === 'userHome' ? 'active' : '' }}"><a class="nav-link"
                                href="{{ url('/') }}">Home</a></li>
                        <li class="nav-item {{ $currentRouteName === 'userShop' ? 'active' : '' }}"> <a class="nav-link"
                                href="{{ url('/shop') }}">Shop</a></li>
                        <li class="nav-item  {{ $currentRouteName === 'userBlog' ? 'active' : '' }}"><a class="nav-link"
                                href="{{ url('/blog') }}">Blog</a></li>
                        <li class="nav-item  {{ $currentRouteName === 'userContact' ? 'active' : '' }}"><a
                                class="nav-link" href="{{ url('/contact') }}">Contact</a></li>
                        <li class="nav-item  {{ $currentRouteName === 'userTracking' ? 'active' : '' }}"><a
                                class="nav-link" href="{{ url('/tracking') }}">Tracking</a></li>
                        <li class="nav-item  {{ $currentRouteName === 'userElements' ? 'active' : '' }}"><a
                                class="nav-link" href="{{ url('/elements') }}">Elements</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li class="nav-item"><a href="{{ route('userCart') }}" class="cart"><span class="ti-bag"
                                    style="{{ $currentRouteName === 'userCart' ? 'color: orange' : '' }} "></span></a>
                        </li>
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
            <form class="d-flex justify-content-between" action="{{ route('userSearch') }}">
                @csrf
                <input type="text" name="search" class="form-control" id="search_input" placeholder="Search Here">
                <button type="submit" class="btn"></button>
                <span class="lnr lnr-cross" id="close_search" title="Close Search"></span>
            </form>
        </div>
    </div>
</header>
