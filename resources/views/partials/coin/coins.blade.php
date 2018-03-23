@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Listagem de Criptomedas</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                    <th>#ID</th>
                    <th>Nome</th>
                    <th>Abreviação</th>
                    <th>Algoritimo</th>
                    <th>Descrição</th>
                    <th>Ações</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                    <th>#ID</th>
                    <th>Nome</th>
                    <th>Abreviação</th>
                    <th>Algoritimo</th>
                    <th>Descrição</th>
                    <th>Ações</th>
                </tr>
              </tfoot>
              <tbody>
                
                  @forelse ($coins as $coin)
                    <tr>
                        <td>{{ $coin->id }}</td>
                        <td>{{ $coin->name }}</td>
                        <td>{{ $coin->abbreviation }}</td>
                        <td>{{ $coin->algorithm->name }}</td>
                        <td>{{ $coin->description }}</td>
                        <td>
                            <div class="row">
                                <div class="col-md-6">
                                  <a href="{{ route('coin.edit', ['id' => $coin->id]) }}" class="btn btn-primary btn-block">
                                      <i class="fa fa-pencil-square"></i> Edit
                                  </a>  
                                </div>
                                <div class="col-md-6">
                                  {{ Form::open(['route' => ['coin.destroy', $coin->id], 'method' => 'delete']) }}
                                  <button class="btn btn-danger btn-block" type="submit"><i class="fa fa-minus-square"></i> Delete</button>
                                  {{ Form::close() }}
                                </div>
                              </div>
                        </td>
                    </tr>
                  @empty
                    <tr>
                        <td colspan="5"><b>Não existem criptomedas cadastradas no momento!</b></td>
                    </tr>
                  @endforelse
                
              </tbody>
            </table>
            {{ $coins->links() }}
          </div>
        </div>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
      </div>
</div>
@endsection