@extends('adminlte::page')

@section('title', 'CurrencyCoin - Listagem de Marcas')

@section('content_header')
    <h1>Listagem de Marcas</h1>
@stop

@section('content')
<div class="row">
    @if (Session::has('message'))
    {!! Html::flashMessages(session()->get('message')) !!}
    @endif
    <div class="col-sm-12">
        <div class="box box-danger">
            <div class="box-header">
                <i class="fa fa-table"></i>
                <a href="{{ route('brand.create') }}" 
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
                        <th>Ações</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                        <th>#ID</th>
                        <th>Nome</th>
                        <th>Descrição</th>
                        <th>Ações</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    
                      @forelse ($brands as $brand)
                        <tr>
                            <td>{{ $brand->id }}</td>
                            <td>{{ $brand->name }}</td>
                            <td>{{ $brand->description }}</td>
                            <td>
                                <a href="{{ route('brand.edit', ['id' => $brand->id]) }}" 
                                  class="btn btn-primary btn-sm">
                                    <i class="fa fa-pencil-square"></i> 
                                </a>
    
                                <a href="{{ route('brand.destroy', ['id' => $brand->id]) }}" 
                                  class="btn btn-danger btn-sm">
                                    <i class="fa fa-minus-square"></i> 
                                </a>
                            </td>
                        </tr>
                      @empty
                        <tr>
                            <td colspan="4"><b>Não existem marcas cadastradas no momento!</b></td>
                        </tr>
                      @endforelse
                    
                  </tbody>
                </table>
                {{ $brands->links() }}
              </div>
            </div>
            <div class="box-footer">
                
            </div>
        </div> 
    </div>
</div>
@endsection
