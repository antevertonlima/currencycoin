@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card mb-3">
        <div class="card-header">
            <i class="fa fa-table"></i> Editar {{ strtoupper($algo->name) }}
        </div>
        <div class="card-body">
        {{ Form::model($algo, ['route' => ['algo.update', $algo->id], 'method' => 'PUT']) }}

        {{ csrf_field() }}
        {!! Form::text('name', old('name'), ['class' => 'form-control']) !!}        
        {!! Form::text('description', old('description'), ['class' => 'form-control']) !!}
        {!! Form::text('measure', old('measure'), ['class' => 'form-control']) !!}
        {!! Form::submit('Salvar') !!}
        
        {!!  Form::close()  !!}
        </div>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
    </div>
</div>
@endsection
