@extends('adminlte::page')

@section('title', 'CurrencyCoin - Cadastrar Novo Algoritimo')

@section('content_header')
    <h1>Cadastrar Novo Algoritimo</h1>
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
                {{ Form::open(['route' => 'algo.store']) }}

                @include('partials.algo._form')
                
                {!!  Form::close()  !!}
            </div>
            <div class="box-footer">
                
            </div>
        </div> 
    </div>
</div>
@endsection