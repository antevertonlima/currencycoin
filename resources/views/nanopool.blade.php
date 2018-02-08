@extends('layouts.app')

@section('content')
<div class="container">
    <!-- Icon Cards-->
    <div class="row">
        <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-primary o-hidden h-100">
                <div class="card-body">
                    <div class="card-body-icon">
                        <i class="cc {{ strtoupper($coin) }}-alt" title="{{ strtoupper($coin) }}"></i>
                    </div>
                    <div class="mr-5">
                        <div>{{ strtoupper($coin) }} Hoje</div>
                        <div>R$ {{ number_format($coin_currency * $dolar_currency,2) }}</div>
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
                        <div>R$ {{ number_format($dolar_currency,2) }}</div>
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
                        <div>{{ $dias_saque }} dia(s)</div>
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
                        <div>{{ $falta_dias_saque }} dia(s)</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-3">
                <div class="card-header">
                    <i class="cc {{ strtoupper($coin) }}-alt"></i>
                    A receber: {{ $general->balance }} - R$ {{ number_format(($general->balance * $coin_currency) * $dolar_currency,2) }}
                    /
                    Valor para saque: {{ $min_saque }} - R$ {{ number_format(($min_saque * $coin_currency) * $dolar_currency,2) }}
                </div>
                <div class="card-body">
                    <div class="progress">
                        <div class="progress-bar progress-bar-success progress-bar-striped"
                             role="progressbar"
                             aria-valuenow="{{ $minerado }}"
                             aria-valuemin="0"
                             aria-valuemax="100"
                             style="width:{{ $minerado }}%">
                            <b>{{ $minerado }}%</b>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="card mb-3">
                <div class="card-header">
                    <i class="cc {{ strtoupper($coin) }}-alt"></i> Estimativa de ganho
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th scope="col">Frequencia</th>
                            <th scope="col">Fração</th>
                            <th scope="col">Bitcoin</th>
                            <th scope="col">Dollar</th>
                            <th scope="col">Real</th>
                        </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $calculator['per_day']['titulo'] }}</td>
                                <td><i class="cc {{ strtoupper($coin) }}"></i> {{ $calculator['per_day']['coins'] }}</td>
                                <td><i class="cc BTC"></i> {{ $calculator['per_day']['btc'] }}</td>
                                <td><i class="fa fa-fw fa-usd"></i> {{ $calculator['per_day']['dolar'] }}</td>
                                <td>{{ $calculator['per_day']['real'] }}</td>
                            </tr>
                            <tr>
                                <td>{{ $calculator['per_week']['titulo'] }}</td>
                                <td><i class="cc {{ strtoupper($coin) }}"></i> {{ $calculator['per_week']['coins'] }}</td>
                                <td><i class="cc BTC"></i> {{ $calculator['per_week']['btc'] }}</td>
                                <td><i class="fa fa-fw fa-usd"></i> {{ $calculator['per_week']['dolar'] }}</td>
                                <td>{{ $calculator['per_week']['real'] }}</td>
                            </tr>
                            <tr>
                                <td>{{ $calculator['per_month']['titulo'] }}</td>
                                <td><i class="cc {{ strtoupper($coin) }}"></i> {{ $calculator['per_month']['coins'] }}</td>
                                <td><i class="cc BTC"></i> {{ $calculator['per_month']['btc'] }}</td>
                                <td><i class="fa fa-fw fa-usd"></i> {{ $calculator['per_month']['dolar'] }}</td>
                                <td>{{ $calculator['per_month']['real'] }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    Hashrate Média: {{ $media_hash }} {{ $sol_mh_hash }} - Hashrate 24h: {{ $general->avgHashrate->h24 }} {{ $sol_mh_hash }}
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card mb-3">
                <div class="card-header">
                    <i class="cc {{ strtoupper($coin) }}-alt"></i> Pagamentos realizados
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th scope="col">Real</th>
                            <th scope="col">Coin</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($pagamentos as $payments)
                            <tr>
                                <td>R$ {{ number_format(($payments->amount * $coin_currency) * $dolar_currency,2) }}</td>
                                <td><i class="cc {{ strtoupper($coin) }}"></i> {{ $payments->amount }}</td>
                            </tr>
                        @empty
                            <p>Não foi efetuado nenhum pagamento para esse mineiro.</p>
                        @endforelse
                        </tbody>
                        <tfooter>
                            <tr>
                                <td colspan="2"><b>Total</b></td>
                            </tr>
                            <tr>
                                <td>R$ {{ number_format(($vl_pagamento_tot * $coin_currency) * $dolar_currency,2) }}</td>
                                <td><i class="cc {{ strtoupper($coin) }}"></i> {{ $vl_pagamento_tot }}</td>
                            </tr>
                        </tfooter>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
