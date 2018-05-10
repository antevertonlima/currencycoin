@extends('adminlte::page')

@section('title', 'CurrencyCoin - Cadastrar Nova Marca')

@section('content_header')
    <h1>Cadastrar Nova Marca</h1>
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
                {{ Form::open(['route' => 'brand.store']) }}

                @include('partials.brand._form')
                
                {!!  Form::close()  !!}  
            </div>
            <div class="box-footer">
                
            </div>
        </div> 
    </div>
</div>
@endsection
