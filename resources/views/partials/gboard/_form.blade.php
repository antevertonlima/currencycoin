{{ csrf_field() }}

{!! Form::hidden('redirect_to', URL::previous()) !!}

{!! Html::openFormGroup('rig_id', $errors) !!}
    {!! Form::label('rig_id','Rig', ['class' => 'control-label']) !!}
    {!! Form::select('rig_id', $grig, null, ['class' => 'form-control','multiple' => 'multiple']) !!}
    {!! Form::error('rig_id', $errors) !!} 
{!! Html::closeFormGroup() !!}

{!! Html::openFormGroup('graphics_card_id', $errors) !!}
    {!! Form::label('graphics_card_id','Placa de Video', ['class' => 'control-label']) !!}
    {!! Form::select('graphics_card_id', $gcard, null, ['class' => 'form-control','multiple' => 'multiple']) !!}
    {!! Form::error('graphics_card_id', $errors) !!} 
{!! Html::closeFormGroup() !!}

{!! Html::openFormGroup('amount', $errors) !!}
    {!! Form::label('amount','Quantidade', ['class' => 'control-label']) !!}
    {!! Form::text('amount', null, ['class' => 'form-control']) !!}
    {!! Form::error('amount', $errors) !!} 
{!! Html::closeFormGroup() !!}

{!! Html::openFormGroup() !!}
    {!! Form::submit('Salvar') !!}
{!! Html::closeFormGroup() !!}