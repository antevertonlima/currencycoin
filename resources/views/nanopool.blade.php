@extends('layouts.app')

@section('content')
<div class="container">
    <!-- Icon Cards-->
    <div class="row">
        <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-primary o-hidden h-100">
                <div class="card-body">
                    <div class="card-body-icon">
                        <span class="coin-icon"></span>
                    </div>
                    <div class="mr-5">
                        <div><span class="coin_sigla"></span> Hoje</div>
                        <div>R$ <span class="coin-currency"></span></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-warning o-hidden h-100">
                <div class="card-body">
                    <div class="card-body-icon">
                        <i class="fa fa-fw fa-usd"></i>
                    </div>
                    <div class="mr-5">
                        <div>USD Hoje</div>
                        <div>R$ <span class="usd-currency"></span></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-success o-hidden h-100">
                <div class="card-body">
                    <div class="card-body-icon">
                        <i class="fa fa-fw fa-bank"></i>
                    </div>
                    <div class="mr-5">
                        <div>Saque a cada</div>
                        <div><b><span class="saque_dias"></span></b></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-danger o-hidden h-100">
                <div class="card-body">
                    <div class="card-body-icon">
                        <i class="fa fa-fw fa-money"></i>
                    </div>
                    <div class="mr-5">
                        <div>Próximo saque</div>
                        <div><b><span class="falta_dias"></span></b></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card mb-3">
                <div class="card-header">
                    <span class="coin-icon"></span>
                    A receber: <b><span class="coin-balance"></span></b> - R$ <b><span class="coin-balance-brl"></span></b>
                    /
                    Valor para saque: <b><span class="min_saque"></span></b> - R$ <b><span class="min_saque_brl"></span></b>
                </div>
                <div class="card-body">
                    <div class="progress minerado"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card mb-3">
                <div class="card-header">
                    <span class="coin-icon"></span> Analises
                </div>
                <div class="card-body">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">
                                <span class="coin-icon"></span> Estimativa de ganho
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">
                                <span class="coin-icon"></span> Pagamentos realizados
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">
                                <span class="coin-icon"></span> Trabalhadores
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="table_calc"></div>
                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <div class="table_pay"></div>
                        </div>
                        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                            Em Produção!
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <h4>
                          <span class="hashrates" data-toggle="tooltip" data-html="true">Hashrate</span>
                    </h4>

                    Placas: <b><span class="poder_placas"></span></b> - Média: <b><span class="media_hash"></span></b> - 24h: <b><span class="hash24"></span></b>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
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
        var poder_placas_amd = (28.75 * 2) + (30.32 * 1) + (12.3 * 1);
        var poder_placas_nvidia = ((31.1 * 6) * 0) + ((24.3 * 1) * 1) + ((15.03 * 4) * 1);
        var poder_placas = poder_placas_amd + poder_placas_nvidia;
        var placas = 0;
        var coin_icon = '<i class="cc ETH-alt" title="ETH"></i>';
        var coin_sigla = 'ETH';

        if(coin == 'zec'){
            wallet = 't1LFzpH46orZNPR5d9dSyENeYJqb2sysvYu';
            min_saque = 0.01000000;
            coin_currency = 1250;
            poder_placas_amd = (282 * 2) + (303 * 1) + (133 * 3);
            poder_placas_nvidia = ((281 * 1) * 1) + ((191 * 4) * 1);
            poder_placas = poder_placas_amd + poder_placas_nvidia;
            url_nool_general = "https://api.nanopool.org/v1/"+coin+"/user/"+wallet;
            url_nool_payment = "https://api.nanopool.org/v1/"+coin+"/payments/"+wallet;
            coin_icon = '<i class="cc ZEC-alt" title="ZEC"></i>';
            coin_sigla = 'ZEC';
        }

        if(coin == 'etc'){
            wallet = '0x1932A6a770185F9b2b5B50Ee1ea97B44DAf00953';
            min_saque = 0.35000000;
            coin_currency = 113;
            poder_placas_amd = (28.75 * 2) + (30.32 * 1) + (12.3 * 1);
            poder_placas_nvidia = ((31.1 * 6) * 0) + ((24.3 * 1) * 1) + ((15.03 * 4) * 1);
            poder_placas = poder_placas_amd + poder_placas_nvidia;
            url_nool_general = "https://api.nanopool.org/v1/"+coin+"/user/"+wallet;
            url_nool_payment = "https://api.nanopool.org/v1/"+coin+"/payments/"+wallet;
            coin_icon = '<i class="cc ETC-alt" title="ETC"></i>';
            coin_sigla = 'ETC';
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
@endsection
