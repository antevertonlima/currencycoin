@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card mb-3">
        <div class="card-header">
            <i class="fa fa-table"></i> Editar {{ $algo->name }}
        </div>
        <div class="card-body">
        {{ Form::model($algo, ['route' => ['algo.update', $algo->id], 'method' => 'PUT']) }}

        @include('partials.algo._form')
        
        {!!  Form::close()  !!}
        </div>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
    </div>
</div>
@endsection
