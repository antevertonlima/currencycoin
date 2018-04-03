@extends('layouts.app')

@section('content')
<div class="container">
    @if (Session::has('message'))
    {!! Html::flashMessages(session()->get('message')) !!}
    @endif
    <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Listagem de Placas
          <a href="{{ route('gcard.create') }}" 
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
                    <th>Descrição</th>
                    <th>Serie</th>
                    <th>Tipo</th>
                    <th>Marca</th>
                    <th>Ações</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                    <th>#ID</th>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th>Serie</th>
                    <th>Tipo</th>
                    <th>Marca</th>
                    <th>Ações</th>
                </tr>
              </tfoot>
              <tbody>
                
                  @forelse ($gcards as $gcard)
                    <tr>
                        <td>{{ $gcard->id }}</td>
                        <td>{{ $gcard->name }}</td>
                        <td>{{ $gcard->description }}</td>
                        <td>{{ $gcard->graphicSerie->name }}</td>
                        <td>{{ $gcard->graphicSerie->graphicType->name }}</td>
                        <td>{{ $gcard->graphicSerie->graphicType->brand->name }}</td>
                        <td>
                            <a href="{{ route('gcard.edit', ['id' => $gcard->id]) }}" 
                                class="btn btn-primary btn-sm">
                                <i class="fa fa-pencil-square"></i> 
                            </a>

                            <a href="{{ route('gcard.destroy', ['id' => $gcard->id]) }}" 
                                class="btn btn-danger btn-sm">
                                <i class="fa fa-minus-square"></i> 
                            </a>
                        </td>
                    </tr>
                  @empty
                    <tr>
                        <td colspan="7"><b>Não existem placas de video cadastradas no momento!</b></td>
                    </tr>
                  @endforelse
                
              </tbody>
            </table>
            {{ $gcards->links() }}
          </div>
        </div>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
      </div>
</div>
@endsection
