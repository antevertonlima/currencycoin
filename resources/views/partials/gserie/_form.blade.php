{{ csrf_field() }}

{!! Form::hidden('redirect_to', URL::previous()) !!}

{!! Html::openFormGroup('graphic_type_id', $errors) !!}
    {!! Form::label('graphic_type_id','Tipo', ['class' => 'control-label']) !!}
    {!! Form::select('graphic_type_id', $gtypes, null, ['class' => 'form-control']) !!}
    {!! Form::error('graphic_type_id', $errors) !!} 
{!! Html::closeFormGroup() !!}

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

{!! Html::openFormGroup() !!}
{!! Form::submit('Salvar', ['class' => 'btn btn-primary']) !!}
{!! Html::closeFormGroup() !!}