@extends('layouts.app')

@section('content')
<div class="container">
    <!-- Icon Cards-->
    <div class="row">
        <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-primary o-hidden h-100">
                <div class="card-body">
                    <div class="card-body-icon">
                        <i class="cc ETH-alt" title="ETH"></i>
                    </div>
                    <div class="mr-5">
                        <div>ETH Hoje</div>
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
                        <div>{{ $dias_saque }} dias</div>
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
                        <div>{{ $falta_dias_saque }} dias</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-3">
                <div class="card-header">
                    <i class="cc ETH-alt"></i>
                    A receber: {{ $general->data->balance }} / R$ {{ number_format(($general->data->balance * $coin_currency) * $dolar_currency,2) }}
                </div>
                <div class="card-body">
                    <div class="progress">
                        <div class="progress-bar progress-bar-success progress-bar-striped"
                             role="progressbar"
                             aria-valuenow="{{ $minerado }}"
                             aria-valuemin="0"
                             aria-valuemax="100"
                             style="width:{{ $minerado }}%">
                            <b>{{ $minerado }}% do valor de saque</b>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="card mb-3">
                <div class="card-header">
                    <i class="cc ETH-alt"></i> Estimativa de ganho
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col"></th>
                            <th scope="col">Fração</th>
                            <th scope="col">Bitcoin</th>
                            <th scope="col">Dollar</th>
                            <th scope="col">Real</th>
                        </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $calculator['per_hour']['titulo'] }}</td>
                                <td>{{ $calculator['per_hour']['coins'] }}</td>
                                <td>{{ $calculator['per_hour']['btc'] }}</td>
                                <td>{{ $calculator['per_hour']['dolar'] }}</td>
                                <td>{{ $calculator['per_hour']['real'] }}</td>
                            </tr>
                            <tr>
                                <td>{{ $calculator['per_day']['titulo'] }}</td>
                                <td>{{ $calculator['per_day']['coins'] }}</td>
                                <td>{{ $calculator['per_day']['btc'] }}</td>
                                <td>{{ $calculator['per_day']['dolar'] }}</td>
                                <td>{{ $calculator['per_day']['real'] }}</td>
                            </tr>
                            <tr>
                                <td>{{ $calculator['per_week']['titulo'] }}</td>
                                <td>{{ $calculator['per_week']['coins'] }}</td>
                                <td>{{ $calculator['per_week']['btc'] }}</td>
                                <td>{{ $calculator['per_week']['dolar'] }}</td>
                                <td>{{ $calculator['per_week']['real'] }}</td>
                            </tr>
                            <tr>
                                <td>{{ $calculator['per_month']['titulo'] }}</td>
                                <td>{{ $calculator['per_month']['coins'] }}</td>
                                <td>{{ $calculator['per_month']['btc'] }}</td>
                                <td>{{ $calculator['per_month']['dolar'] }}</td>
                                <td>{{ $calculator['per_month']['real'] }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    <p>Hashrate: {{ $general->data->avgHashrate->h1 }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card mb-3">
                <div class="card-header">
                    <i class="cc ETH-alt"></i> Pagamentos realizados
                </div>
                <div class="card-body">
                    @forelse($pagamentos->data as $payments)
                        <p>{{ $payments->amount }} / R$ {{ number_format(($payments->amount * $coin_currency) * $dolar_currency,2) }}</p>
                    @empty
                        <p>Não foi efetuado nenhum pagamento para esse mineiro.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
