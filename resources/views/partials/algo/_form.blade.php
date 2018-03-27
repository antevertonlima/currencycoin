{{ csrf_field() }}

{!! Form::hidden('redirect_to', URL::previous()) !!}

{!! Html::openFormGroup('name', $errors) !!}
    {!! Form::label('name','Nome', ['class' => 'control-label']) !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
    {!! Form::error('name', $errors) !!} 
{!! Html::closeFormGroup() !!}

{!! Html::openFormGroup('description', $errors) !!}
    {!! Form::label('description','Descrição', ['class' => 'control-label']) !!}
    {!! Form::text('description', null, ['class' => 'form-control']) !!}
    {!! Form::error('description', $errors) !!} 
{!! Html::closeFormGroup() !!}

{!! Html::openFormGroup('measure', $errors) !!}
    {!! Form::label('measure','Und. de Medida', ['class' => 'control-label']) !!}
    {!! Form::text('measure', null, ['class' => 'form-control']) !!}
    {!! Form::error('measure', $errors) !!} 
{!! Html::closeFormGroup() !!}

{!! Html::openFormGroup() !!}
    {!! Form::submit('Salvar') !!}
{!! Html::closeFormGroup() !!}