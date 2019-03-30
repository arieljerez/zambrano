@extends('casos.layouts.formulario')

@section('paciente')

    {!! Form::model($caso, ['method' => 'PUT','route' => ['efector.update-paciente', $caso->id], 'aria-label' => __('Actualizar Paciente')])  !!}

    @include('casos.paciente')

    <div class="row"><div class="col-md-12">&nbsp;</div></div>
    <div class="row">
        <div class="col-md-6">
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> {{ __('Grabar') }}
            </button>
        </div>
    </div>
    <input type="hidden" name="destino" value="paciente">

    {!! Form::Close() !!}

@endsection

@section('diabetologico')
<fieldset disabled="disabled">
    @include('casos.diabetologico.index')
</fieldset>

@endsection

@section('oftalmologico')
<fieldset disabled="disabled">
    @include('casos.oftalmologico.index')
</fieldset>
@endsection