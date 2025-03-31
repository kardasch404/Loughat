<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('assets/dist/main.css') }}" />
    <link rel="icon" type="image/png" href="{{ asset('dist/images/favicon/favicon.png') }}" />
</head>
<body onload="loader()">
    @include('component.header') 

    <div >
        @yield('content')
    </div>
    
    @include('component.footer') 

    <script src="{{ asset('assets/src/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/src/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/src/scss/vendors/plugin/js/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/src/scss/vendors/plugin/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('assets/src/scss/vendors/plugin/js/slick.min.js') }}"></script>
    <script src="{{ asset('assets/src/scss/vendors/plugin/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('assets/src/js/app.js') }}"></script>
    <script src="{{ asset('assets/dist/main.js') }}"></script>
</body>
</html>