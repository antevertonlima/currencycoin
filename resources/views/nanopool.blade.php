@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Monitoramento Jquery</h1>
@stop

@section('css')
    <!-- CSS defining icon/coin colors (optional) -->
    <link rel="stylesheet" href="{{ asset('assets/sb-admin/vendor/cryptocoins/webfont/cryptocoins.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/sb-admin/vendor/cryptocoins/webfont/cryptocoins-colors.css') }}">
@stop

@section('content')
    <div class="row">
        <!-- Icon Cards-->
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box bg-red">
                <span class="info-box-icon coin-icon"></span>

                <div class="info-box-content">
                    <span class="info-box-text"><span class="coin_sigla"></span> Hoje</span>
                    <span class="info-box-number">R$ <span class="coin-currency"></span></span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box bg-green">
                <span class="info-box-icon"><i class="fa fa-fw fa-usd"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">USD Hoje</span>
                    <span class="info-box-number">R$ <span class="usd-currency"></span></span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box bg-aqua">
                <span class="info-box-icon"><i class="fa fa-fw fa-money"></i></span>

                <div class="info-box-content">
                    <span class="info-box-number">Saque a cada</span>
                    <span class="info-box-text saque_dias"></span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box bg-yellow">
                <span class="info-box-icon"><i class="fa fa-fw fa-bank"></i></span>

                <div class="info-box-content">
                    <span class="info-box-number">Próximo saque</span>
                    <span class="info-box-text falta_dias"></span>    
                    <div class="minerado_adminlte">
                        
                    </div>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
    </div>

    <div class="row">

        <div class="col-md-12">
            <div class="box box-danger">
                <div class="box-header with-border">
                    <div class="box-title">
                        <span class="coin-icon"></span> Analises
                    </div>
                </div>
                <div class="box-body">
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="active">
                                <a id="calculate-tab" data-toggle="tab" href="#calculate" role="tab" aria-expanded="true">
                                    <span class="coin-icon"></span> Estimativa de ganho
                                </a>
                            </li>
                            <li>
                                <a  id="payments-tab" data-toggle="tab" href="#payments" role="tab" aria-expanded="false">
                                    <span class="coin-icon"></span> Pagamentos realizados
                                </a>
                            </li>
                            <li>
                                <a id="workers-tab" data-toggle="tab" href="#workers" role="tab" aria-expanded="false">
                                    <span class="coin-icon"></span> Trabalhadores
                                </a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane active" id="calculate">
                                <div class="table_calc"></div>
                            </div>
                            <div class="tab-pane fade" id="payments">
                                <div class="table_pay"></div>
                            </div>
                            <div class="tab-pane fade" id="workers">
                                <div class="table_worker"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3 col-xs-6">
                    <div class="description-block border-right">
                        <span class="description-percentage text-green"><span class="coin-balance"></span></span>
                        <h5 class="description-header">R$ <span class="coin-balance-brl"></span></h5>
                        <span class="description-text">A RECEBER</span>
                    </div>
                <!-- /.description-block -->
                </div>
                <div class="box-footer">
                    <h4><span class="hashrates" data-toggle="tooltip" data-html="true">Hashrate</span></h4>
                    Placas: <b><span class="poder_placas"></span></b> - 
                    Média: <b><span class="media_hash"></span></b> - 
                    24h: <b><span class="hash24"></span></b>
                </div>
            </div>
        </div>
        
    </div>

@stop

@section('js')
<script type="text/javascript">
    $(document).ready(function(){
        $('.hashrates').tooltip({"html":true});

        var coin = "{{request()->route()->coin}}", name_coin = 'ethereum', wallet = '0x89b346710d578679e44a5678a4f7f35472b24814', measure = 'mh/s';
        var url_nool_general = "https://api.nanopool.org/v1/"+coin+"/user/"+wallet;
        var url_nool_payment = "https://api.nanopool.org/v1/"+coin+"/payments/"+wallet;
        var url_dolar = "https://api.fixer.io/latest?base=USD";
        var url_nool_workers = "https://api.nanopool.org/v1/"+coin+"/workers/"+wallet;
        var url_coin = "https://api.cryptonator.com/api/full/"+coin+"-usd";
        var url_coin_mcap = "https://api.coinmarketcap.com/v1/ticker/"+name_coin+"/?convert=BRL";
        var url_coinmarketcap = "https://api.coinmarketcap.com/v1/ticker/?convert=BRL&limit=11";
        var url_coin_braziliex = "https://braziliex.com/api/v1/public/ticker/"+coin+"_brl";
        var hashrates = "Hashrates";
        var hashrate = 0, hashrate_media = 0, h1 = 0, h3 = 0, h6 = 0, h12 = 0, h24 = 0, saque_cada = 0, saque_cada_h = 0, saque_em = 0, saque_em_h = 0;
        var url_nool_calculator = "https://api.nanopool.org/v1/"+coin+"/approximated_earnings/"+hashrate;
        var dolar_currency = 3.20, coin_currency = 3251.21, min_saque = 0.05000000, min_saque = parseFloat(min_saque).toFixed(4), balance = 0;
        var minerado = "", progresso = "", progresso_adminlte = "";
        var poder_placas_amd = (28.03 * 2) + (30.32 * 0) + (14.5 * 0);
        var poder_placas_nvidia = ((31.1 * 1) * 0) + ((24.4 * 0) * 1) + ((15.08 * 5) * 1);
        var poder_placas = poder_placas_amd + poder_placas_nvidia;
        var placas = 0;
        var coin_icon = '<i class="cc ETH-alt" title="ETH"></i>';
        var coin_sigla = 'ETH';

        if(coin == 'zec'){
            wallet = 't1LFzpH46orZNPR5d9dSyENeYJqb2sysvYu';
            measure = 'sol/s';
            min_saque = 0.01000000;
            min_saque = parseFloat(min_saque).toFixed(4);
            coin_currency = 1250;
            poder_placas_amd = (282 * 2) + (303 * 0) + (133 * 0);
            poder_placas_nvidia = ((281 * 1) * 0) + ((191 * 5) * 1);
            poder_placas = poder_placas_amd + poder_placas_nvidia;
            url_nool_general = "https://api.nanopool.org/v1/"+coin+"/user/"+wallet;
            url_nool_payment = "https://api.nanopool.org/v1/"+coin+"/payments/"+wallet;
            url_nool_workers = "https://api.nanopool.org/v1/"+coin+"/workers/"+wallet;
            coin_icon = '<i class="cc ZEC-alt" title="ZEC"></i>';
            coin_sigla = 'ZEC';
        }

        if(coin == 'etc'){
            wallet = '0x1932A6a770185F9b2b5B50Ee1ea97B44DAf00953';
            measure = 'mh/s';
            min_saque = 0.35000000;
            min_saque = parseFloat(min_saque).toFixed(4);
            coin_currency = 113;
            poder_placas_amd = (28.03 * 2) + (30.32 * 0) + (12.3 * 0);
            poder_placas_nvidia = ((31.1 * 6) * 0) + ((24.3 * 1) * 0) + ((15.08 * 5) * 1);
            poder_placas = poder_placas_amd + poder_placas_nvidia;
            url_nool_general = "https://api.nanopool.org/v1/"+coin+"/user/"+wallet;
            url_nool_payment = "https://api.nanopool.org/v1/"+coin+"/payments/"+wallet;
            url_nool_workers = "https://api.nanopool.org/v1/"+coin+"/workers/"+wallet;
            coin_icon = '<i class="cc ETC-alt" title="ETC"></i>';
            coin_sigla = 'ETC';
        }

        if(coin == 'xmr'){
            wallet = '4JcUzZmBTaNRvH6BkoXRuEjd3odbKztEb8e1gVkMNBWuHRRxkbSRqfqQEBrx16GTfmZtF3tUMRWBaWGBDAugkebK3PUs5Q1XViR198xhQz';
            measure = 'h/s';
            min_saque = 0.35000000;
            min_saque = parseFloat(min_saque).toFixed(4);
            coin_currency = 113;
            poder_placas_amd = (650 * 2) + (30.32 * 0) + (12.3 * 0);
            poder_placas_nvidia = ((31.1 * 6) * 0) + ((555.05 * 1) * 0) + ((325 * 5) * 1);
            poder_placas = poder_placas_amd + poder_placas_nvidia;
            url_nool_general = "https://api.nanopool.org/v1/"+coin+"/user/"+wallet;
            url_nool_payment = "https://api.nanopool.org/v1/"+coin+"/payments/"+wallet;
            url_nool_workers = "https://api.nanopool.org/v1/"+coin+"/workers/"+wallet;
            coin_icon = '<i class="cc ETC-alt" title="ETC"></i>';
            coin_sigla = 'XMR';
        }

        if(coin == 'sia'){
            wallet = '7f5fe25ec3c767a892554935054cace7b140fff52082ff3f772aedb1dd00843b7560f4ec7c04';
            measure = 'mh/s';
            min_saque = 1000;
            min_saque = parseFloat(min_saque).toFixed(4);
            coin_currency = 113;
            poder_placas_amd = (585 * 2) + (30.32 * 0) + (12.3 * 0);
            poder_placas_nvidia = ((31.1 * 6) * 0) + ((555.05 * 1) * 0) + ((147 * 5) * 1);
            poder_placas = poder_placas_amd + poder_placas_nvidia;
            url_nool_general = "https://api.nanopool.org/v1/"+coin+"/user/"+wallet;
            url_nool_payment = "https://api.nanopool.org/v1/"+coin+"/payments/"+wallet;
            url_nool_workers = "https://api.nanopool.org/v1/"+coin+"/workers/"+wallet;
            coin_icon = '<i class="cc SIA-alt" title="SIA"></i>';
            coin_sigla = 'SC';
            name_coin = 'siacoin';
            url_coin_mcap = "https://api.coinmarketcap.com/v1/ticker/"+name_coin+"/?convert=BRL";
        }
        
        $(".coin-icon").html(coin_icon);
        $(".coin_sigla").html(coin_sigla);

        if(placas == 1){ poder_placas = poder_placas_amd; }
        if(placas == 2){ poder_placas = poder_placas_nvidia; }
        nanopool_general();

        var intervalo = window.setInterval(nanopool_general, 15000);

        //pegar informacoes gerais sobre a mineracao de cripto moeda
        function nanopool_general(){
            $.ajax({
                type: "GET",
                url: url_coinmarketcap,
                dataType: 'json',
                success: function(data){
                    var list_currency = "";
                    var i;
                    var coinName = 'Bitcoin';
                    var coinSymbol = 'BTC';
                    var coinPrice  = '';
                    var charContador = '';
                    
                    for (i = 0; i < data.length; i++) { 
                        coinName = data[i].name;
                        coinSymbol = data[i].symbol;
                        coinPrice = parseFloat(data[i].price_brl).toFixed(2);
                        
                        list_currency = list_currency + '<li class="nav-item"><a class="nav-link" href="#" title="'+coinName.toString()+'"><i class="cc '+coinSymbol.toString()+'"></i> '+coinPrice.toString()+'</a></li>';
                    }
                    list_currency = list_currency + '<li class="nav-item"><a class="nav-link" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-fw fa-sign-out"></i>Logout</a></li>';                  
                    $("#currency_coins").html(list_currency);                    
            }});

            $.ajax({
                type: "GET",
                url: url_dolar,
                dataType: 'json',
                success: function(data){
                    dolar_currency = parseFloat(data.rates.BRL).toFixed(3);
                    $(".usd-currency").html(dolar_currency);
            }});

            if(coin == "sia"){
                $.ajax({
                    type: "GET",
                    url: url_coin_mcap,
                    dataType: 'json',
                    success: function(data){
                        coin_currency = parseFloat(data[0].price_brl).toFixed(2);
                        if(coin_currency == 0){
                            coin_currency = 0.05;
                        }
                        $(".coin-currency").html(coin_currency);
                }});
            }else{
                $.ajax({
                    type: "GET",
                    url: url_coin_braziliex,
                    dataType: 'json',
                    success: function(data){
                        //console.log(data);
                        //coin_currency = parseFloat(data[0].price_brl).toFixed(2);
                        coin_currency = parseFloat(data.last).toFixed(2);
                        if(coin_currency == 0){
                            if(coin == 'eth'){
                                coin_currency = 3251.21;
                            }

                            if(coin == 'etc'){
                                coin_currency = 100.21;
                            }

                            if(coin == 'zec'){
                                coin_currency = 1400.21;
                            }
                            if(coin == 'xmr'){
                                coin_currency = 900.21;
                            }
                        }
                        $(".coin-currency").html(coin_currency);
                }});
            }
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
                url: url_nool_workers,
                dataType: 'json',
                success: function(workers){
                    var trabalhadores = workers.data;
                    var total_worker = 0;
                    var total_worker_hash = 0;
                    var table_worker = '<table class="table table-bordered table-hover">';
                    table_worker = table_worker + '<thead><th scope="col">ID</th><th scope="col">Hashrate</th><th scope="col">Ultimo Achado</th><th scope="col">Achados</th></thead>';
                    
                    //console.log(trabalhadores);
                    $.each(trabalhadores, function (index, valor) {
                        
                        table_worker = table_worker + '<tr><td>'+ valor.id +'</td><td>'+ valor.hashrate +'</td><td>'+ new Date(valor.lastShare * 1000).toUTCString() +'</td><td>'+ valor.rating +'</td></tr>';
                        total_worker = total_worker + valor.rating;
                        total_worker_hash = total_worker_hash + valor.hashrate;
                        
                    });
                    table_worker = table_worker + '<tr><td align="right"><b>Total</b></td><td align="right"><b>'+total_worker_hash+'</b></td><td colspan="2" align="right"><i class="cc '+coin.toUpperCase()+'"></i> '+ total_worker +'</td></tr>';

                    table_worker = table_worker + '</table>';
                    //console.log(table_worker);
                    $(".table_worker").html(table_worker);
            }});

            $.ajax({
                type: "GET",
                url: url_nool_general,
                dataType: 'json',
                success: function(data){

                    if(data.status === false){
                        balance = 0;
                        h1 = 0;
                        h3 = 0;
                        h6 = 0;
                        h12 = 0;
                        h24 = 0;
                        hashrate = 0;
                    } else {
                        balance = data.data.balance;
                        h1 = Number(data.data.avgHashrate.h1);
                        h3 = Number(data.data.avgHashrate.h3);
                        h6 = Number(data.data.avgHashrate.h6);
                        h12 = Number(data.data.avgHashrate.h12);
                        h24 = Number(data.data.avgHashrate.h24);
                        hashrate = data.data.hashrate;
                        if(balance === undefined){
                            balance = 0;
                            h1 = 0;
                            h3 = 0;
                            h6 = 0;
                            h12 = 0;
                            h24 = 0;
                            hashrate = 0;
                        }
                    }     

                    minerado = parseFloat((balance/min_saque) * 100).toFixed(2) + "%";
                    progresso = '<div class="progress-bar progress-bar-danger progress-bar-striped" role="progressbar" aria-valuenow="'+ minerado +'" aria-valuemin="0" aria-valuemax="100" style="width:'+ minerado +'">'+ minerado +'</div>';
                    progresso_adminlte = '<div class="progress"><div class="progress-bar" style="width: '+minerado+'"></div></div>';
                    progresso_adminlte = progresso_adminlte + '<span class="progress-description">'+minerado+' de '+min_saque+' - R$ '+parseFloat(min_saque * coin_currency).toFixed(2)+'</span>';
                    
                    hashrate_media = (h1 + h3 + h6 + h12 + h24) / 5;

                    //poder_placas = 229.38;

                    if (hashrate <= poder_placas){ hashrate = poder_placas; }
                    if (h24 >= hashrate){ hashrate = h24; }
                    if (hashrate_media >= hashrate){ hashrate = hashrate_media; }

                    hashrate = parseFloat(hashrate).toFixed(2);
                    hashrates = "01 Hora(s) "+ h1 +" "+ measure +
                                "<br>03 Hora(s) "+ h3 +" "+ measure +
                                "<br>06 Hora(s) "+ h6 +" "+ measure +
                                "<br>12 Hora(s) "+ h12 +" "+ measure +
                                "<br>24 Hora(s) " + h24 +" "+ measure;

                    $('.hashrates').attr({
                       "data-original-title": hashrates 
                    });

                    url_nool_calculator = "https://api.nanopool.org/v1/"+coin+"/approximated_earnings/"+hashrate;
                    $(".poder_placas").html(parseFloat(poder_placas).toFixed(2)+" "+ measure);
                    $(".media_hash").html(parseFloat(hashrate_media).toFixed(2)+" "+ measure);
                    $(".hash24").html(parseFloat(h24).toFixed(2)+" "+ measure);
                    $(".min_saque").html(min_saque);
                    $(".min_saque_brl").html(parseFloat(min_saque * coin_currency).toFixed(2));
                    $(".minerado").html(progresso);
                    $(".minerado_adminlte").html(progresso_adminlte);
                    $(".coin-balance").html(balance);
                    $(".coin-balance-brl").html(parseFloat(balance * coin_currency).toFixed(2));

                    if(hashrate > 0){

                        $.ajax({
                            type: "GET",
                            url: url_nool_calculator,
                            dataType: 'json',
                            success: function(datacalc){
                                //console.log(datacalc);
                                var table_calc = '<table class="table table-bordered table-hover">';

                                table_calc = table_calc + '<thead><th scope="col">Frequencia</th><th scope="col">Fração</th><th scope="col">Real</th><th scope="col">Bitcoin</th></thead>';

                                $.each(datacalc.data, function (name, value) {
                                    name = name.replace('minute','Por minuto');
                                    name = name.replace('hour','Por hora');
                                    name = name.replace('day','Por dia');
                                    name = name.replace('week','Por semana');
                                    name = name.replace('month','Por mes');
                                    if (name != 'prices' && name != 'Por minuto' && name != 'Por hora') {
                                        table_calc = table_calc + '<tr><td>'+ name +'</td><td><i class="cc '+coin.toUpperCase()+'"></i> '+ parseFloat(value.coins).toFixed(8) +'</td><td>R$ '+ parseFloat(value.coins * coin_currency).toFixed(2) +'</td><td><i class="cc BTC"></i> '+ parseFloat(value.bitcoins).toFixed(8) +'</td></tr>';                                                                                
                                    }
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
@stop
