@extends('adminlte::page')

@section('title', 'CurrencyCoin - Editar AAlgoritimo')

@section('content_header')
    <h1>Editar {{ $algo->name }}</h1>
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
                {{ Form::model($algo, ['route' => ['algo.update', $algo->id], 'method' => 'PUT']) }}

                @include('partials.algo._form')
                
                {!!  Form::close()  !!}
            </div>
            <div class="box-footer">
                
            </div>
        </div> 
    </div>
</div>
@endsection