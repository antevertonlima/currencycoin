@extends('adminlte::page')

@section('title', 'CurrencyCoin - Listagem de Algoritimos')

@section('content_header')
    <h1>Listagem de Algoritimos</h1>
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
                <a href="{{ route('algo.create') }}" 
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
            <div class="box-footer">
                
            </div>
        </div> 
    </div>
</div>
@endsection

@section('js')
<script>
    $(document).ready(function() {
        $('#mining_group_id').select2();
        $('#coin_id').select2();
    });    
</script>
@stop