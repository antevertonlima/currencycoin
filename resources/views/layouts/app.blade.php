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
    <title>{{ config('app.name', 'Laravel') }}</title>

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
    <a class="navbar-brand" href="{{ url('/') }}">{{ config('app.name', 'Laravel') }}</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
                <a class="nav-link" href="{{ url('/') }}">
                    <i class="fa fa-fw fa-dashboard"></i>
                    <span class="nav-link-text">Dashboard</span>
                </a>
            </li>
        </ul>
        <ul class="navbar-nav sidenav-toggler">
            <li class="nav-item">
                <a class="nav-link text-center" id="sidenavToggler">
                    <i class="fa fa-fw fa-angle-left"></i>
                </a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
                    <i class="fa fa-fw fa-sign-out"></i>Logout</a>
            </li>
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

    <script type="text/javascript">
        $(document).ready(function(){

            $('.hashrates').tooltip({"html":true});

            var coin = 'eth', wallet = '0x89b346710d578679e44a5678a4f7f35472b24814';
            var url_nool_general = "https://api.nanopool.org/v1/"+coin+"/user/"+wallet;
            var url_nool_payment = "https://api.nanopool.org/v1/"+coin+"/payments/"+wallet;
            var url_dolar = "https://api.fixer.io/latest?base=USD";
            var url_coin = "https://api.cryptonator.com/api/full/"+coin+"-usd";
            var hashrates = "Hashrates";
            var hashrate = 0, hashrate_media = 0, h1 = 0, h3 = 0, h6 = 0, h12 = 0, h24 = 0, saque_cada = 0, saque_cada_h = 0, saque_em = 0, saque_em_h = 0;
            var url_nool_calculator = "https://api.nanopool.org/v1/"+coin+"/approximated_earnings/"+hashrate;
            var dolar_currency = 3.20, coin_currency = 3251.21, min_saque = 0.05000000, balance = 0;
            var minerado = "", progresso = "";
            var poder_placas_amd = (28.75 * 2) + (30.52 * 1) + (/*12.25*/15.5 * 3);
            var poder_placas_nvidia = ((31.1 * 6) * 0) + ((25.07 * 1) * 1) + ((15.06 * 5) * 1);
            var poder_placas = poder_placas_amd + poder_placas_nvidia;
            var placas = 0;

            if(coin == 'zec'){
                wallet = 't1LFzpH46orZNPR5d9dSyENeYJqb2sysvYu';
                min_saque = 0.01000000;
                poder_placas_amd = (300 * 2) + (325 * 1) + (114 * 3);
                poder_placas_nvidia = ((295 * 1) * 1) + ((175 * 5) * 1);
                poder_placas = poder_placas_amd + poder_placas_nvidia;
                url_nool_general = "https://api.nanopool.org/v1/"+coin+"/user/"+wallet;
                url_nool_payment = "https://api.nanopool.org/v1/"+coin+"/payments/"+wallet;
            }

            if(placas == 1){ poder_placas = poder_placas_amd; }
            if(placas == 2){ poder_placas = poder_placas_nvidia; }
            nanopool_general();

            var intervalo = window.setInterval(nanopool_general, 15000);

            //pegar informacoes gerais sobre a mineracao de cripto moeda
            function nanopool_general(){
                $.ajax({
                    type: "GET",
                    url: url_dolar,
                    dataType: 'json',
                    success: function(data){
                        dolar_currency = parseFloat(data.rates.BRL).toFixed(3);
                        $(".usd-currency").html(dolar_currency);
                }});

                $.ajax({
                    type: "GET",
                    url: url_coin,
                    dataType: 'json',
                    success: function(data){
                        coin_currency = parseFloat(data.ticker.price * dolar_currency).toFixed(2);
                        if(coin_currency == 0){
                            coin_currency = 3050.80;
                        }
                        $(".coin-currency").html(coin_currency);
                }});
//                $(".coin-currency").html(coin_currency);

                $.ajax({
                    type: "GET",
                    url: url_nool_payment,
                    dataType: 'json',
                    success: function(payments){
                        var pagamentos = payments.data;
                        var total_pay = 0;
                        var table_pay = '<table class="table table-bordered table-hover">';
                        table_pay = table_pay + '<thead><th scope="col">Data</th><th scope="col">Fração</th><th scope="col">Real</th></thead>';

                        $.each(pagamentos, function (index, valor) {
                            table_pay = table_pay + '<tr><td>'+ new Date(valor.date * 1000).toUTCString() +'</td><td><i class="cc '+coin.toUpperCase()+'"></i> '+ parseFloat(valor.amount).toFixed(8) +'</td><td> R$ '+ parseFloat(valor.amount * coin_currency).toFixed(2) +'</td></tr>';
                            total_pay = total_pay + valor.amount;
                        });
                        table_pay = table_pay + '<tr><td align="right"><b>Total</b></td><td><i class="cc '+coin.toUpperCase()+'"></i> '+ parseFloat(total_pay).toFixed(8) +'</td><td> R$ '+ parseFloat(total_pay * coin_currency).toFixed(2) +'</td></tr>';

                        table_pay = table_pay + '</table>';
                        $(".table_pay").html(table_pay);
                }});

                $.ajax({
                    type: "GET",
                    url: url_nool_general,
                    dataType: 'json',
                    success: function(data){
                        minerado = parseFloat((data.data.balance/min_saque) * 100).toFixed(2) + "%";
                        progresso = '<div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="'+ minerado +'" aria-valuemin="0" aria-valuemax="100" style="width:'+ minerado +'">'+ minerado +'</div>';
                        h1 = Number(data.data.avgHashrate.h1);
                        h3 = Number(data.data.avgHashrate.h3);
                        h6 = Number(data.data.avgHashrate.h6);
                        h12 = Number(data.data.avgHashrate.h12);
                        h24 = Number(data.data.avgHashrate.h24);
                        balance = data.data.balance;
                        hashrate = data.data.hashrate;

                        hashrate_media = (h1 + h3 + h6 + h12 + h24) / 5;

                        //poder_placas = 229.38;

                        if (hashrate <= poder_placas){ hashrate = poder_placas; }
                        if (h24 >= hashrate){ hashrate = h24; }
                        if (hashrate_media >= hashrate){ hashrate = hashrate_media; }

                        hashrate = parseFloat(hashrate).toFixed(2);
                        hashrates = "01 Hora "+ h1 +"<br>03 Horas "+ h3 +"<br>06 Horas "+ h6 +"<br>12 Horas "+ h12 +"<br>24 Horas " + h24;

                        $('.hashrates').attr({
                           "data-original-title": hashrates
                        });
                        url_nool_calculator = "https://api.nanopool.org/v1/"+coin+"/approximated_earnings/"+hashrate;
                        $(".poder_placas").html(parseFloat(poder_placas).toFixed(2));
                        $(".media_hash").html(parseFloat(hashrate_media).toFixed(2));
                        $(".hash24").html(parseFloat(h24).toFixed(2));
                        $(".min_saque").html(min_saque);
                        $(".min_saque_brl").html(parseFloat(min_saque * coin_currency).toFixed(2));
                        $(".minerado").html(progresso);
                        $(".coin-balance").html(balance);
                        $(".coin-balance-brl").html(parseFloat(balance * coin_currency).toFixed(2));

                        if(hashrate > 0){

                            $.ajax({
                                type: "GET",
                                url: url_nool_calculator,
                                dataType: 'json',
                                success: function(datacalc){
                                    var table_calc = '<table class="table table-bordered table-hover">';

                                    table_calc = table_calc + '<thead><th scope="col">Frequencia</th><th scope="col">Fração</th><th scope="col">Real</th><th scope="col">Bitcoin</th></thead>';

                                    $.each(datacalc.data, function (name, value) {
                                        name = name.replace('minute','Por minuto');
                                        name = name.replace('hour','Por hora');
                                        name = name.replace('day','Por dia');
                                        name = name.replace('week','Por semana');
                                        name = name.replace('month','Por mes');
                                        table_calc = table_calc + '<tr><td>'+ name +'</td><td><i class="cc '+coin.toUpperCase()+'"></i> '+ parseFloat(value.coins).toFixed(8) +'</td><td>R$ '+ parseFloat(value.coins * coin_currency).toFixed(2) +'</td><td><i class="cc BTC"></i> '+ parseFloat(value.bitcoins).toFixed(8) +'</td></tr>';
                                    });
                                    table_calc = table_calc + '</table>';
                                    $(".table_calc").html(table_calc);

                                    saque_cada = ""+min_saque/datacalc.data.day.coins+"";
                                    saque_em   = ""+(min_saque - balance)/datacalc.data.day.coins+"";

                                    saque_cada_h = ""+(86400 * saque_cada.substr(1,2)) * 0.000278+"";
                                    saque_cada_h = ""+saque_cada_h.substr(0,2)+"";
                                    saque_cada_h = ""+saque_cada_h.replace('.','')+"";
                                    saque_em_h   = ""+(86400 * saque_em.substr(1,2)) * 0.000278+"";
                                    saque_em_h   = ""+saque_em_h.substr(0,2)+"";
                                    saque_em_h   = ""+saque_em_h.replace('.','')+"";

                                    $(".saque_dias").html(saque_cada.substr(0,1) + " dia(s) e "+saque_cada_h+" hora(s)");
                                    $(".falta_dias").html(saque_em.substr(0,1) + " dia(s) e "+saque_em_h+" hora(s)");
                            }});
                        }
                    }});
            }
        });
    </script>
</div>
</body>

</html>