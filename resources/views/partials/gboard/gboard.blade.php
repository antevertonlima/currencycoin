@extends('layouts.app')

@section('content')
<div class="container">
    @if (Session::has('message'))
    {!! Html::flashMessages(session()->get('message')) !!}
    @endif
    <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Listagem de Placas de mineração
          <a href="{{ route('gboard.create') }}" 
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
                    <th>Rig</th>
                    <th>Equipamento</th>
                    <th>Qtd</th>
                    <th>Hashrate</th>
                    <th>Ações</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                    <th>#ID</th>
                    <th>Rig</th>
                    <th>Equipamento</th>
                    <th>Qtd</th>
                    <th>Hashrate</th>
                    <th>Ações</th>
                </tr>
              </tfoot>
              <tbody>
                  
                  @forelse ($gboards as $gboard)                    
                    <tr>
                        <td>{{ $gboard->id }}</td>
                        <td>{{ $gboard->rig->name }}</td>
                        <td>{{ $gboard->graphicsCard->description }}</td>
                        <td>{{ $gboard->amount }}</td>
                        <td>
                            @foreach ($gboard->graphicsCard->hashrash as $item)
                                @if (true)
                                    <div>{{ $item->state }} - {{ $item->hashrate * $gboard->amount }} {{ $item->coin->algorithm->measure }}</div>
                                @endif
                            @endforeach
                        </td>
                        <td>
                            <a href="{{ route('gboard.edit', ['id' => $gboard->id]) }}" 
                                class="btn btn-primary btn-sm">
                                <i class="fa fa-pencil-square"></i> 
                            </a>

                            <a href="{{ route('gboard.destroy', ['id' => $gboard->id]) }}" 
                                class="btn btn-danger btn-sm">
                                <i class="fa fa-minus-square"></i> 
                            </a>
                        </td>
                    </tr>
                  @empty
                    <tr>
                        <td colspan="5"><b>Não existem grupos de mineração cadastrados no momento!</b></td>
                    </tr>
                  @endforelse
                
              </tbody>
            </table>
            {{ $gboards->links() }}
          </div>
        </div>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
      </div>
</div>
@endsection
