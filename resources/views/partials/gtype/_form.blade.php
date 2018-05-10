{{ csrf_field() }}

{!! Form::hidden('redirect_to', URL::previous()) !!}

{!! Html::openFormGroup('brand_id', $errors) !!}
    {!! Form::label('brand_id','Marca', ['class' => 'control-label']) !!}
    {!! Form::select('brand_id', $brand, null, ['class' => 'form-control']) !!}
    {!! Form::error('brand_id', $errors) !!} 
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