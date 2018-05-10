@extends('adminlte::page')

@section('title', 'CurrencyCoin - Listagem de Grupos de Mineração')

@section('content_header')
    <h1>Listagem de Grupos de Mineração</h1>
@stop

@section('content')
<div class="row">
    @if (Session::has('message'))
    {!! Html::flashMessages(session()->get('message')) !!}
    @endif
    <div class="col-sm-12">
        <div class="box box-danger">
            <div class="box-header with-border">
              <i class="fa fa-table"></i>  
              <a href="{{ route('grig.create') }}" 
                  class="btn btn-success btn-sm pull-right">
                   <i class="fa fa-plus-square"></i>
               </a>
            </div>
            <div class="box-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                        <th>#ID</th>
                        <th>Nome</th>
                        <th>Descrição</th>
                        <th>Grupo</th>
                        <th>Moeda</th>
                        <th>Hash Stock</th>
                        <th>Hash OverClock</th>
                        <th>Ações</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                        <th>#ID</th>
                        <th>Nome</th>
                        <th>Descrição</th>
                        <th>Grupo</th>
                        <th>Moeda</th>
                        <th>Hash Stock</th>
                        <th>Hash OverClock</th>
                        <th>Ações</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    
                      @forelse ($grigs as $grig)
                        <tr>
                            <td>{{ $grig->id }}</td>
                            <td>{{ $grig->name }}</td>
                            <td>{{ $grig->description }}</td>
                            <td>{{ $grig->miningGroup->name }}</td>
                            <td>{{ $grig->coin->name }}</td>
    
                            @foreach ($grig->boards as $gboard)
                                @foreach ($gboard->graphicsCard->hashrash as $item)
                                    @if ($item->state == 'oc')
                                        <?php $miningPowerOC = $miningPowerOC + ($item->hashrate * $gboard->amount); ?>
                                    @endif  
                                    @if ($item->state == 'stock')
                                        <?php $miningPowerST = $miningPowerST + ($item->hashrate * $gboard->amount); ?>
                                    @endif  
                                @endforeach 
                            @endforeach
    
                            @if ($miningPowerOC != 0 && $miningPowerST != 0)
                                <td>{{$miningPowerST}} {{$grig->coin->algorithm->measure}}</td>
                                <td>{{$miningPowerOC}} {{$grig->coin->algorithm->measure}}</td>
                                <?php $miningPowerOC = 0; $miningPowerST = 0; ?>
                            @else
                                <td colspan="2">
                                    <a href="{{ route('gboard.create', ['id' => $grig->id]) }}" 
                                        class="btn btn-primary btn-sm">
                                        <i class="fa fa-pencil-square"></i> Adicionar Equipamentos
                                    </a>
                                </td>
                            @endif
                            
                            <td>
                                <a href="{{ route('grig.edit', ['id' => $grig->id]) }}" 
                                    class="btn btn-primary btn-sm">
                                    <i class="fa fa-pencil-square"></i> 
                                </a>
    
                                <a href="{{ route('grig.destroy', ['id' => $grig->id]) }}" 
                                    class="btn btn-danger btn-sm">
                                    <i class="fa fa-minus-square"></i> 
                                </a>
                            </td>
                            
                        </tr>
                      @empty
                        <tr>
                            <td colspan="6"><b>Não existem rigs de mineração cadastrados no momento!</b></td>
                        </tr>
                      @endforelse
                    
                  </tbody>
                </table>
                {{ $grigs->links() }}
              </div>
            </div>
            <div class="box-footer">

            </div>
          </div>
    </div>
</div>
@endsection
