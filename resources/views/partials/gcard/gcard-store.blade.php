@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card mb-3">
        <div class="card-header">
            <i class="fa fa-table"></i> Cadastrar Nova Serie
        </div>
        <div class="card-body">
            {{ Form::open(['route' => 'gcard.store']) }}

            @include('partials.gcard._form')
            
            {!!  Form::close()  !!}
        </div>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
    </div>
</div>
@endsection
