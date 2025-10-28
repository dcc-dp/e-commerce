<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="CodePixar">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <title>@yield('title', 'Karma Shop')</title>

    <link rel="shortcut icon" href="{{ asset('assets/img/user/fav.png') }}">

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/linearicons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/nouislider.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/ion.rangeSlider.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/ion.rangeSlider.skinFlat.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
</head>

<body>
    @include('user.partials.header')

    @yield('content')

    @include('user.partials.footer')

    @include('user.partials.scripts')
</body>

</html>
