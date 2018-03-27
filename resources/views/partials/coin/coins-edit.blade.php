@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card mb-3">
        <div class="card-header">
            <i class="fa fa-table"></i> Editar {{ strtoupper($coin->abbreviation) }}
        </div>
        <div class="card-body">
            {{ Form::model($coin, ['route' => ['coin.update', $coin->id], 'method' => 'PUT']) }}

            @include('partials.coin._form')
            
            {!!  Form::close()  !!}
        </div>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
    </div>
</div>
@endsection
