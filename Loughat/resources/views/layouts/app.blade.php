<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('assets/user/dist/main.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/user/src/scss/vendors/plugin/css/star-rating-svg.css') }}" />
    <link rel="icon" type="image/png" href="{{ asset('assets/user/dist/images/favicon/favicon.png') }}" />
</head>
<body onload="loader()">
    <div class="loader">
        <span class="loader-spinner">Loughat...</span>
    </div>
    @include('component.header') 

    <div >
        @yield('content')
    </div>
    
    @include('component.footer') 
    
    <script src="{{ asset('assets/user/src/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/user/src/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/user/src/scss/vendors/plugin/js/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/user/src/scss/vendors/plugin/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('assets/user/src/scss/vendors/plugin/js/slick.min.js') }}"></script>
    <script src="{{ asset('assets/user/src/scss/vendors/plugin/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('assets/user/src/js/app.js') }}"></script>
    <script src="{{ asset('assets/user/dist/main.js') }}"></script>
</body>
</html>