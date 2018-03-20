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
                    <i class="cc ETH-alt"></i>
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
                    <i class="cc ETH-alt"></i> Analises
                </div>
                <div class="card-body">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">
                                <i class="cc ETH-alt"></i> Estimativa de ganho
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">
                                <i class="cc ETH-alt"></i> Pagamentos realizados
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">
                                <i class="cc ETH-alt"></i> Trabalhadores
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
