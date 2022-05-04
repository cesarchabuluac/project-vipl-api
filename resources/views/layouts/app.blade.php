<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>VIPL</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{asset('assets/css/app.min.css')}}">
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/components.css')}}">
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{asset('assets/bundles/datatables/datatables.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css')}}">
    <!-- Custom style CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/custom.css')}}">
    <link rel='shortcut icon' type='image/x-icon' href="{{asset('assets/img/favicon.ico')}}" />
    <style>
        .modal-backdrop {
            display: none;
            visibility: hidden;
            position: relative
        }

        .modal {
            position: absolute !important;
            /* position: fixed; */

            top: 0;
            left: 0;
            z-index: 1050 !important;
            display: none;
            width: 100%;
            height: 100%;
            overflow: hidden;
            outline: 0;
        }

        .modal-dialog {
            height: 100%;
            width: 100%;
            display: flex;
            align-items: center;
        }

        .modal-content {
            margin: 0 auto;
        }
    </style>
</head>

<body>
    <div class="loader"></div>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar sticky">
                <div class="form-inline mr-auto">
                    <ul class="navbar-nav mr-3">
                        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg
									collapse-btn"> <i data-feather="align-justify"></i></a></li>
                        <li><a href="#" class="nav-link nav-link-lg fullscreen-btn">
                                <i data-feather="maximize"></i>
                            </a></li>
                    </ul>
                </div>
                <ul class="navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                            <figure class="avatar mr-2 avatar-sm" data-initial="{!!avatarInitial(Auth::user()->name)!!}"></figure>
                            <span class="d-sm-none d-lg-inline-block"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right pullDown">
                            <div class="dropdown-title">Hola {{Auth::user()->name}}</div>
                            <a href="#" class="dropdown-item has-icon">
                                <i class="far fa-user"></i> Perfil
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="{{ route('logout') }}" class="dropdown-item has-icon text-danger" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="fas fa-sign-out-alt"></i> Salir
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                </ul>
            </nav>
            <div class="main-sidebar sidebar-style-2">
                <aside id="sidebar-wrapper">
                    <div class="sidebar-brand">
                        <a href="{{route('home')}}">
                            <img alt="image" src="{{asset('assets/img/nfc-moneda.png')}}" width="30" height="30" class="header-logo" />
                            <span class="logo-name">VIPL</span>
                        </a>
                    </div>
                    <ul class="sidebar-menu">
                        <li class="dropdown">
                            <a href="{{route('home')}}" class="nav-link"><i data-feather="monitor"></i><span>Dashboard</span></a>
                        </li>
                        <li class="dropdown">
                            <a href="{{route('banners.index')}}" class="nav-link"><i data-feather="image"></i><span>Banners</span></a>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="pie-chart"></i><span>Advertisements</span></a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link" href="sales_for_date.php">Por fecha</a></li>
                            </ul>

                        </li>
                    </ul>
                </aside>
            </div>

            <!-- <main class="py-4"> -->
            @yield('content')
            <!-- </main> -->
        </div>
        <footer class="main-footer">
            <div class="footer-left">
                <a href="#">Development by SolucionesTPV POS </a></a>
            </div>
            <div class="footer-right">
            </div>
        </footer>
    </div>
    <!-- General JS Scripts -->
    <script src="{{asset('assets/js/app.min.js')}}"></script>
    <!-- JS Libraies -->
    <!-- Page Specific JS File -->
    <script src="{{asset('assets/bundles/datatables/datatables.min.js')}}"></script>
    <script src="{{asset('assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('assets/bundles/datatables/export-tables/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('assets/bundles/datatables/export-tables/buttons.flash.min.js')}}"></script>
    <script src="{{asset('assets/bundles/datatables/export-tables/jszip.min.js')}}"></script>
    <script src="{{asset('assets/bundles/datatables/export-tables/pdfmake.min.js')}}"></script>
    <script src="{{asset('assets/bundles/datatables/export-tables/vfs_fonts.js')}}"></script>
    <script src="{{asset('assets/bundles/datatables/export-tables/buttons.print.min.js')}}"></script>
    <script src="{{asset('assets/js/page/datatables.js')}}"></script>
    <!-- Template JS File -->
    <!-- Page Specific JS File -->
    <!-- Template JS File -->
    <script src="{{asset('assets/js/scripts.js')}}"></script>
    <!-- Custom JS File -->
    <script src="{{asset('assets/js/custom.js')}}"></script>
</body>

<!-- blank.html  21 Nov 2019 03:54:41 GMT -->

</html>