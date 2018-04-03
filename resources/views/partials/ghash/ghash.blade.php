@extends('layouts.app')

@section('content')
<div class="container">
    @if (Session::has('message'))
    {!! Html::flashMessages(session()->get('message')) !!}
    @endif
    <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Listagem de Taxas de Hash
          <a href="{{ route('ghash.create') }}" 
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
                    <th>Placa de Video</th>
                    <th>Tipo</th>
                    <th>Marca</th>
                    <th>Moeda</th>
                    <th>Hashrate</th>
                    <th>Estado</th>
                    <th>Ações</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                    <th>#ID</th>
                    <th>Placa de Video</th>
                    <th>Tipo</th>
                    <th>Marca</th>
                    <th>Moeda</th>
                    <th>Hashrate</th>
                    <th>Estado</th>
                    <th>Ações</th>
                </tr>
              </tfoot>
              <tbody>
                
                  @forelse ($ghashs as $ghash)
                    <tr>
                        <td>{{ $ghash->id }}</td>                        
                        <td>{{ $ghash->graphicsCard->description }}</td>
                        <td>{{ $ghash->graphicsCard->graphicSerie->graphicType->name }}</td>
                        <td>{{ $ghash->graphicsCard->graphicSerie->graphicType->brand->name }}</td>
                        <td>{{ $ghash->coin->name }}</td>
                        <td>{{ $ghash->hashrate }} {{ $ghash->coin->algorithm->measure }}</td>
                        <td>{{ $ghash->state }}</td>
                        <td>
                            <a href="{{ route('ghash.edit', ['id' => $ghash->id]) }}" 
                                class="btn btn-primary btn-sm">
                                <i class="fa fa-pencil-square"></i> 
                            </a>

                            <a href="{{ route('ghash.destroy', ['id' => $ghash->id]) }}" 
                                class="btn btn-danger btn-sm">
                                <i class="fa fa-minus-square"></i> 
                            </a>
                        </td>
                    </tr>
                  @empty
                    <tr>
                        <td colspan="8"><b>Não existem taxas de hash cadastradas no momento!</b></td>
                    </tr>
                  @endforelse
                
              </tbody>
            </table>
            {{ $ghashs->links() }}
          </div>
        </div>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
      </div>
</div>
@endsection
