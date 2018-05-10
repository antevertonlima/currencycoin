@extends('adminlte::page')

@section('title', "CurrencyCoin - Editar " . strtoupper($brand->name))

@section('content_header')
    <h1>Editar {{ strtoupper($brand->name) }}</h1>
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
                {{ Form::model($brand, ['route' => ['brand.update', $brand->id], 'method' => 'PUT']) }}

                @include('partials.brand._form')
                
                {!!  Form::close()  !!}   
            </div>
            <div class="box-footer">
                
            </div>
        </div> 
    </div>
</div>
@endsection
