<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{--    <title>{{ config('app.name', 'Óptica') }}</title>--}}
    <title>Norma 35</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/modal.css') }}" rel="stylesheet" type="text/css">


    <!-- Page level plugin CSS-->
    <link href="{{ asset('css/dataTables.bootstrap4.css') }}" rel="stylesheet">

{{--    <!-- Custom styles for this template-->--}}
{{--    <link href="{{ asset('css/sb-admin.css') }}" rel="stylesheet">--}}
    {{--    <script src="{{ asset('js/chart.js') }}"></script>--}}
    @stack('style')
</head>
<body >

<nav class="navbar navbar-expand-lg navbar-light bg-light shadow fixed-top">
    <div class="container">
        <a class="navbar-brand" href="#">Guias Norma 35</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
{{--            <ul class="navbar-nav ml-auto">--}}
{{--                @if (Route::has('login'))--}}

{{--                        @auth--}}
{{--                        <li class="nav-item active">--}}
{{--                            <a class="nav-link" href="{{ route('admin') }}">administración--}}
{{--                                <span class="sr-only">(current)</span>--}}
{{--                            </a>--}}
{{--                        </li>--}}

{{--                        @else--}}

{{--                        <li class="nav-item active">--}}
{{--                            <a class="nav-link" href="{{ route('login') }}">Entrar--}}
{{--                                <span class="sr-only">(current)</span>--}}
{{--                            </a>--}}
{{--                        </li>--}}

{{--                        @endauth--}}

{{--                @endif--}}



{{--            </ul>--}}
        </div>
    </div>
</nav>

<!-- Full Page Image Header with Vertically Centered Content -->
<header class="masthead">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-12 ">
                @yield('header')

            </div>
        </div>
    </div>
</header>


<!-- Bootstrap core JavaScript-->
<script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
{{--<script src="{{ asset('js/jquery.slim.min.js') }}"></script>--}}
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('js/jquery-validator.js') }}"></script>
<script src="{{ asset('js/jquery.dataTables.js') }}"></script>
<script src="{{ asset('js/dataTables.bootstrap4.js') }}"></script>
<script src="{{ asset('js/datatables-demo.js') }}"></script>





@stack('scripts')
</body>
</html>

