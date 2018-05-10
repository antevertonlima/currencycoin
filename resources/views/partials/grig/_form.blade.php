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

{!! Html::openFormGroup('mining_group_id', $errors) !!}
    {!! Form::label('mining_group_id','Grupo', ['class' => 'control-label']) !!}
    {!! Form::select('mining_group_id', $mgroup, null, ['class' => 'form-control select2','tabindex' => '-1','aria-hidden' => 'true']) !!}
    {!! Form::error('mining_group_id', $errors) !!} 
{!! Html::closeFormGroup() !!}

{!! Html::openFormGroup('coin_id', $errors) !!}
    {!! Form::label('coin_id','Moeda', ['class' => 'control-label']) !!}
    {!! Form::select('coin_id', $coin, null, ['class' => 'form-control select2','tabindex' => '-1','aria-hidden' => 'true']) !!}
    {!! Form::error('coin_id', $errors) !!} 
{!! Html::closeFormGroup() !!}

{!! Html::openFormGroup() !!}
{!! Form::submit('Salvar', ['class' => 'btn btn-primary']) !!}
{!! Html::closeFormGroup() !!}