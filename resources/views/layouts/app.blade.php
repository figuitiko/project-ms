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
    <link href="{{ asset('css/all.min.css') }}" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    <link href="{{ asset('css/dataTables.bootstrap4.css') }}" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('css/sb-admin.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    {{--    <script src="{{ asset('js/chart.js') }}"></script>--}}
    @stack('style')
</head>
<body id="page-top">

<nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1" href="#">Norma 35</a>

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
        <i class="fas fa-bars"></i>
    </button>
    <!-- Navbar -->
    <ul class="navbar-nav ml-auto ml-md-0">
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                @auth <i class="fas fa-user-circle fa-fw">  {{ '   '. Auth::user()->name }} </i>@endauth
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                {{-- <a class="dropdown-item" href="#">Settings</a>
                 <a class="dropdown-item" href="#">Activity Log</a>--}}
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{route('logout')}}" data-toggle="modal" data-target="#logoutModal">Cerrar sesión
                    <i class="fas fa-fw fa-sign-out-alt"></i></a>
            </div>
        </li>
    </ul>
</nav>
<div id="app">
    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="sidebar navbar-nav">
{{--            <li class="nav-item active">--}}
{{--                <a class="nav-link" href="{{route('guide.index')}}">--}}
{{--                    <i class="fas fa-fw fa-cogs"></i>--}}
{{--                    <span>Guias</span>--}}
{{--                </a>--}}
{{--            </li>--}}

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="pagesDropdown" role="button" data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-fw fa-glasses"></i>
                    <span>Guias</span>
                </a>
                <div class="dropdown-menu" aria-labelledby="pagesDropdown">
                    <h6 class="dropdown-header">Modelos</h6>
                    <a class="dropdown-item" href="{{route('guide.index')}}">Guias
                        <i class="fas fa-fw fa-glasses"></i></a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{route('applied.index')}}">Guias Aplicadas
                        <i class="fas fa-fw fa-chart-bar"></i></a>
                </div>
            </li>


            <li class="nav-item">
                <a class="nav-link" href="{{route('enterprise.index')}}">
                    <i class="fas fa-fw fa-building"></i>
                    <span>Empresas</span></a>
            </li>

{{--            <li class="nav-item dropdown">--}}
{{--                <a class="nav-link dropdown-toggle" id="pagesDropdown" role="button" data-toggle="dropdown"--}}
{{--                   aria-haspopup="true" aria-expanded="false">--}}
{{--                    <i class="fas fa-fw fa-glasses"></i>--}}
{{--                    <span>Productos</span>--}}
{{--                </a>--}}
{{--                <div class="dropdown-menu" aria-labelledby="pagesDropdown">--}}
{{--                    <h6 class="dropdown-header">Modelos</h6>--}}
{{--                    <a class="dropdown-item" href="{{route('producto.index')}}ye">Productos--}}
{{--                        <i class="fas fa-fw fa-glasses"></i></a>--}}
{{--                    <div class="dropdown-divider"></div>--}}
{{--                                        <a class="dropdown-item" href="{{route('modelo.index')}}">Modelos--}}
{{--                                        <i class="fas fa-fw fa-glasses"></i></a>--}}
{{--                    <a class="dropdown-item" href="{{route('almacen.index')}}">En almacén--}}
{{--                        <i class="fas fa-fw fa-archive"></i></a>--}}
{{--                </div>--}}
{{--            </li>--}}
{{--            <li class="nav-item dropdown">--}}
{{--                <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown"--}}
{{--                   aria-haspopup="true" aria-expanded="false">--}}
{{--                    <i class="fas fa-fw fa-eye-dropper"></i>--}}
{{--                    <span>Examen laboratorio</span>--}}
{{--                </a>--}}
{{--                <div class="dropdown-menu" aria-labelledby="pagesDropdown">--}}
{{--                    <a class="dropdown-item" href="{{route('optometria.index')}}">Examen laboratorio--}}
{{--                        <i class="fas fa-fw fa-eye-dropper"></i></a>--}}
{{--                    <div class="dropdown-divider"></div>--}}
{{--                    <a class="dropdown-item" href="{{route('optometrista.index')}}">Optometristas--}}
{{--                        <i class="fas fa-fw fa-user-clock"></i></a>--}}

{{--                </div>--}}
{{--            </li>--}}
{{--            <li class="nav-item">--}}
{{--                <a class="nav-link" href="{{route('vendedor.index')}}">--}}
{{--                    <i class="fas fa-fw fa-user-astronaut"></i>--}}
{{--                    <span>Vendedores</span></a>--}}
{{--            </li>--}}
{{--            <li class="nav-item">--}}
{{--                <a class="nav-link" href="{{route('proveedor.index')}}">--}}
{{--                    <i class="fas fa-fw fa-user-clock"></i>--}}
{{--                    <span>Proveedores</span></a>--}}
{{--            </li>--}}
{{--            <li class="nav-item">--}}
{{--                <a class="nav-link" href="{{route('sucursal.index')}}">--}}
{{--                    <i class="fas fa-fw fa-home"></i>--}}
{{--                    <span>Sucursales</span></a>--}}
{{--            </li>--}}

{{--            <li class="nav-item dropdown">--}}
{{--                <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown"--}}
{{--                   aria-haspopup="true" aria-expanded="false">--}}
{{--                    <i class="fas fa-user-shield"></i>--}}
{{--                    <span>Administración</span>--}}
{{--                </a>--}}
{{--                <div class="dropdown-menu" aria-labelledby="pagesDropdown">--}}
{{--                    <a class="dropdown-item" href="{{route('register')}}">Registrar usuario--}}
{{--                        <i class="fas fa-user"></i></a>--}}
{{--                    <a class="dropdown-item" href="{{route('guide.index')}}"> Categorías--}}
{{--                        <i class="fas fa-table"></i></a>--}}
{{--                    <a class="dropdown-item" href="{{route('marca.index')}}"> Marcas--}}
{{--                        <i class="fas fa-tag"></i></a>--}}
{{--                    <a class="dropdown-item" href="{{route('modelo.index')}}"> Modelos--}}
{{--                        <i class="fas fa-tag"></i></a>--}}
{{--                    <a class="dropdown-item" href="{{route('color.index')}}"> Colores--}}
{{--                        <i class="fas fa-tag"></i></a>--}}
{{--                    <a class="dropdown-item" href="{{route('materialar.index')}}"> Material Armazon--}}
{{--                        <i class="fas fa-tag"></i></a>--}}
{{--                    <a class="dropdown-item" href="{{route('forma_marco.index')}}"> Forma de Marco--}}
{{--                        <i class="fas fa-tag"></i></a>--}}
{{--                    <a class="dropdown-item" href="{{route('estilo_armazon.index')}}"> Estilo Armazon--}}
{{--                        <i class="fas fa-tag"></i></a>--}}
{{--                </div>--}}

{{--            </li>--}}

        </ul>
        <div id="content-wrapper">

            <div class="container-fluid">
                <main class="py-4">
                @yield('content')
                <!-- Sticky Footer -->
                    {{--<footer class="sticky-footer">
                        <div class="container my-auto">
                            <div class="copyright text-center my-auto">
                                <span>Copyright © Óptica 2019</span>
                            </div>
                        </div>
                    </footer>--}}
                </main>
            </div>
        </div>
    </div>
</div>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">¿Listo para salir?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Seleccione "Cerrar sesión" a continuación si está listo para finalizar su sesión actual.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="{{route('logout')}}">Cerrar sesión</a>
            </div>
        </div>
    </div>
</div>
<!-- Bootstrap core JavaScript-->
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>

<!-- Core plugin JavaScript-->
<script src="{{ asset('js/jquery.easing.min.js') }}"></script>

<!-- Page level plugin JavaScript-->
{{--<script src="{{ asset('js/Chart.min.js') }}"></script>--}}
<script src="{{ asset('js/jquery.dataTables.js') }}"></script>
<script src="{{ asset('js/dataTables.bootstrap4.js') }}"></script>

<!-- Custom scripts for all pages-->
<script src="{{ asset('js/sb-admin.min.js') }}"></script>

<!-- Demo scripts for this page-->
<script src="{{ asset('js/datatables-demo.js') }}"></script>
{{--<script src="{{ asset('js/chart-area-demo.js') }}"></script>--}}

<script src="{{ asset('js/jquery-validator.js') }}"></script>


@stack('scripts')
</body>
</html>
