{{ csrf_field() }}

{!! Form::hidden('redirect_to', URL::previous()) !!}

{!! Html::openFormGroup('graphics_card_id', $errors) !!}
    {!! Form::label('graphics_card_id','Tipo', ['class' => 'control-label']) !!}
    {!! Form::select('graphics_card_id', $gcards, null, ['class' => 'form-control']) !!}
    {!! Form::error('graphics_card_id', $errors) !!} 
{!! Html::closeFormGroup() !!}

{!! Html::openFormGroup('coin_id', $errors) !!}
    {!! Form::label('coin_id','Tipo', ['class' => 'control-label']) !!}
    {!! Form::select('coin_id', $coins, null, ['class' => 'form-control']) !!}
    {!! Form::error('coin_id', $errors) !!} 
{!! Html::closeFormGroup() !!}

{!! Html::openFormGroup('state', $errors) !!}
    {!! Form::label('state','Estado', ['class' => 'control-label']) !!}
    {!! Form::select('state', ['stock' => 'stock','oc' => 'oc'], null, ['class' => 'form-control','multiple' => 'multiple']) !!}
    {!! Form::error('state', $errors) !!} 
{!! Html::closeFormGroup() !!}

{!! Html::openFormGroup('hashrate', $errors) !!}
    {!! Form::label('hashrate','Taxa de Hash', ['class' => 'control-label']) !!}
    {!! Form::text('hashrate', null, ['class' => 'form-control']) !!}
    {!! Form::error('hashrate', $errors) !!} 
{!! Html::closeFormGroup() !!}

{!! Html::openFormGroup() !!}
    {!! Form::submit('Salvar') !!}
{!! Html::closeFormGroup() !!}