@extends('layouts.app')

@section('content')
<div class="container">
    @if (Session::has('message'))
    {!! Html::flashMessages(session()->get('message')) !!}
    @endif
    <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Listagem de Algoritimos
          <a href="{{ route('algo.create') }}" 
              class="btn btn-primary btn-sm pull-right">
               <i class="fa fa-plus-square"></i>
           </a>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                    <th>#ID</th>
                    <th>Nome</th>
                    <th>Unidade</th>
                    <th>Descrição</th>
                    <th>Ações</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                    <th>#ID</th>
                    <th>Nome</th>
                    <th>Unidade</th>
                    <th>Descrição</th>
                    <th>Ações</th>
                </tr>
              </tfoot>
              <tbody>
                
                  @forelse ($algorithms as $algorithm)
                    <tr>
                        <td>{{ $algorithm->id }}</td>
                        <td>{{ $algorithm->name }}</td>
                        <td>{{ $algorithm->measure }}</td>
                        <td>{{ $algorithm->description }}</td>
                        <td>
                            <a href="{{ route('algo.edit', ['id' => $algorithm->id]) }}" 
                                class="btn btn-primary btn-sm">
                                <i class="fa fa-pencil-square"></i> 
                            </a>

                            <a href="{{ route('algo.destroy', ['id' => $algorithm->id]) }}" 
                                class="btn btn-danger btn-sm">
                                <i class="fa fa-minus-square"></i> 
                            </a>
                        </td>
                    </tr>
                  @empty
                    <tr>
                        <td colspan="5"><b>Não existem algoritimos cadastradas no momento!</b></td>
                    </tr>
                  @endforelse
                
              </tbody>
            </table>
            {{ $algorithms->links() }}
          </div>
        </div>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
      </div>
</div>
@endsection

@section('scripts')
<script type="text/javascript">
    $(document).ready(function(){

        var url_coinmarketcap = "https://api.coinmarketcap.com/v1/ticker/?convert=BRL&limit=11";
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

        }
    });
</script>
@endsection