<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'CurrencyCoin') }}</title>

    <!-- Bootstrap core CSS-->
    <link href="{{ asset('assets/sb-admin/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Custom fonts for this template-->
    <link href="{{ asset('assets/sb-admin/vendor/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
    <!-- Custom styles for this template-->
    <link href="{{ asset('assets/sb-admin/css/sb-admin.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('assets/sb-admin/vendor/cryptocoins/webfont/cryptocoins.css') }}">

    <!-- CSS defining icon/coin colors (optional) -->
    <link rel="stylesheet" href="{{ asset('assets/sb-admin/vendor/cryptocoins/webfont/cryptocoins-colors.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/sb-admin/css/custom.css') }}">
</head>

<body class="fixed-nav sticky-footer bg-dark sidenav-toggled" id="page-top">
<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="{{ url('/') }}">{{ config('app.name', 'CurrencyCoin') }}</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
                <a class="nav-link" href="{{ route('pool') }}">
                    <i class="fa fa-fw fa-dashboard"></i>
                    <span class="nav-link-text">Dashboard</span>
                </a>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Gerenciar Criptomedas">
                    <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#managerCoins" data-parent="#exampleAccordion">
                        <i class="fa fa-fw fa-sitemap"></i>
                        <span class="nav-link-text">Criptomedas</span>
                    </a>
                    <ul class="sidenav-second-level collapse" id="managerCoins">
                        <li>
                        <a href="{{ route('algo.index') }}">Algoritimos</a>
                        </li>
                        <li>
                        <a href="{{ route('coin.index') }}">Moedas</a>
                        </li>
                    </ul>
                    </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Gerenciar Placas de Video">
            <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#managerGraphics" data-parent="#exampleAccordion">
                <i class="fa fa-fw fa-sitemap"></i>
                <span class="nav-link-text">Placas de Video</span>
            </a>
            <ul class="sidenav-second-level collapse" id="managerGraphics">
                <li>
                <a href="{{ route('brand.index') }}">Marcas</a>
                </li>
                <li>
                <a href="{{ route('gtype.index') }}">Tipos</a>
                </li>
                <li>
                <a href="{{ route('gserie.index') }}">Series</a>
                </li>
                <li>
                <a href="{{ route('gcard.index') }}">Placas</a>
                </li>
                <li>
                <a href="{{ route('ghash.index') }}">Hashrate</a>
                </li>
            </ul>
            </li>
        </ul>
        <ul class="navbar-nav sidenav-toggler">
            <li class="nav-item">
                <a class="nav-link text-center" id="sidenavToggler">
                    <i class="fa fa-fw fa-angle-left"></i>
                </a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto" id="currency_coins">
            
        </ul>
    </div>
</nav>
<div class="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <!--
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.html">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Blank Page</li>
        </ol>
        -->
        <div class="row">
            <div class="col-12">
                @yield('content')
            </div>
        </div>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <footer class="sticky-footer">
        <div class="container">
            <div class="text-center">
                <small>Copyright © Your Website 2018</small>
            </div>
        </div>
    </footer>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fa fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('assets/sb-admin/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/sb-admin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- Core plugin JavaScript-->
    <script src="{{ asset('assets/sb-admin/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    <!-- Custom scripts for all pages-->
    <script src="{{ asset('assets/sb-admin/js/sb-admin.min.js') }}"></script>

    @yield('scripts')
</div>
</body>

</html>