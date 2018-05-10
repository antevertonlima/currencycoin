@extends('adminlte::page')

@section('title', 'CurrencyCoin - Cadastrar Novo Grupo de Mineração')

@section('content_header')
    <h1>Editar {{ strtoupper($grig->name) }}</h1>
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
            </div>
            <div class="box-body">
                    {{ Form::model($grig, ['route' => ['grig.update', $grig->id], 'method' => 'PUT']) }}

                    @include('partials.grig._form')
                    
                    {!!  Form::close()  !!}
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