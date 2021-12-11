<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        @yield('title')
    </title>

    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">

    <link href="{{ asset('frontend/css/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/bootstrap5.css') }}" rel="stylesheet">

    <link href="{{ asset('frontend/css/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/owl.theme.default.min.css') }}" rel="stylesheet">
    {{-- <link href="{{ asset('frontend/css/owl.carousel.css') }}" rel="stylesheet">
     <link href="{{ asset('frontend/css/owl.theme.default.css') }}" rel="stylesheet"> --}}

    <link rel="shortcut icon" type="image/jpg" href="https://image.flaticon.com/icons/png/512/64/64431.png" />

    <style>
        a {
            text-decoration: none !important;
            color: black;

        }

        body {
            background-image: url(https://i.pinimg.com/originals/c5/83/d7/c583d701b9ac889796d5dcf2b9b67886.jpg);

            /* Full height */
            /* height: 100%; */

            /* Center and scale the image nicely */
            background-position: center;

            background-size: cover;


        }

    </style>



</head>

<body>
    @include('layouts.inc.frontnavbar')

    <div class="content">
        @yield('content')
    </div>

    <script src="{{ asset('frontend/js/jquery-3.6.0.min.js') }}" defer></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}

    <script src="{{ asset('frontend/js/bootstrap.bundle.min.js') }}" defer></script>
    <script src="{{ asset('frontend/js/owl.carousel.min.js') }}" defer></script>
    {{-- <script src="{{ asset('frontend/js/owl.carousel.js') }}" defer></script> --}}

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    @if (session('status'))

        <script>
            swal("{{ session('status') }}");
        </script>
    @endif

    @yield('scripts')

</body>

</html>
