{{ csrf_field() }}

{!! Form::hidden('redirect_to', URL::previous()) !!}

{!! Html::openFormGroup('algorithm_id', $errors) !!}
    {!! Form::label('algorithm_id','Algoritimo', ['class' => 'control-label']) !!}
    {!! Form::select('algorithm_id', $algorithms, null, ['class' => 'form-control']) !!}
    {!! Form::error('algorithm_id', $errors) !!} 
{!! Html::closeFormGroup() !!}

{!! Html::openFormGroup('name', $errors) !!}
    {!! Form::label('name','Nome', ['class' => 'control-label']) !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
    {!! Form::error('name', $errors) !!} 
{!! Html::closeFormGroup() !!}

{!! Html::openFormGroup('abbreviation', $errors) !!}
    {!! Form::label('abbreviation','Abreviatura', ['class' => 'control-label']) !!}
    {!! Form::text('abbreviation', null, ['class' => 'form-control']) !!}
    {!! Form::error('abbreviation', $errors) !!} 
{!! Html::closeFormGroup() !!}

{!! Html::openFormGroup('description', $errors) !!}
    {!! Form::label('description','Descrição', ['class' => 'control-label']) !!}
    {!! Form::text('description', null, ['class' => 'form-control']) !!}
    {!! Form::error('description', $errors) !!} 
{!! Html::closeFormGroup() !!}

{!! Html::openFormGroup() !!}
    {!! Form::submit('Salvar') !!}
{!! Html::closeFormGroup() !!}