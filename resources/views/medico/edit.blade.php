@extends('casos.layouts.formulario')

@section('paciente')

    {!! Form::model($caso, ['method' => 'PUT','route' => ['medico.update-paciente', $caso->id], 'aria-label' => __('Actualizar Paciente')])  !!}

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
    
    {!! Form::model($caso, ['enctype' =>"multipart/form-data", 'method' => 'PUT','route' => ['medico.update-diabetologico', $caso->id], 'aria-label' => __('Actualizar Caso')])  !!}

        @include('casos.diabetologico.index')

        <div class="row"><div class="col-md-12">&nbsp;</div></div>

        <div class="row">
            <div class="col-md-6">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> {{ __('Grabar') }}
                </button>
            </div>
        </div>

        <input  type="hidden" name="destino" value="diabetologico">

    {!! Form::Close() !!}

@endsection

@section('oftalmologico')
    {!! Form::model($caso, ['enctype' =>"multipart/form-data", 'method' => 'PUT','route' => ['medico.update-oftalmologico', $caso->id], 'aria-label' => __('Actualizar Caso')])  !!}
    @include('casos.oftalmologico.index')
    <div class="row"><div class="col-md-12">&nbsp;</div></div>
        <div class="row">
            <div class="col-md-6">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> {{ __('Grabar') }}
                </button>
            </div>
        </div>
        <input  type="hidden" name="destino" value="oftalmologico">
    {!! Form::Close() !!}
@endsection