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
               <i class="fa fa-plus-square"></i> Novo
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
                            <div class="row">
                              <div class="col-md-6">
                                  <a href="{{ route('algo.edit', ['id' => $algorithm->id]) }}" 
                                     class="btn btn-primary btn-sm btn-block">
                                      <i class="fa fa-pencil-square"></i> Edit
                                  </a>
                              </div>
                              <div class="col-md-6">
                                  {{ Form::open(['route' => ['algo.destroy', $algorithm->id], 'method' => 'delete']) }}
                                  <button class="btn btn-danger btn-sm btn-block" type="submit">
                                      <i class="fa fa-minus-square"></i> Delete
                                  </button>
                                  {{ Form::close() }}
                              </div>
                            </div>
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