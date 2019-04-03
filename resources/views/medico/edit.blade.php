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
    
    @if($caso->estado == 'pendiente-formulario')
        {!! Form::model($caso, ['enctype' =>"multipart/form-data", 'method' => 'POST','route' => ['medico.update-diabetologico', $caso->id], 'aria-label' => __('Actualizar Caso')])  !!}

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
    @else
        <fieldset disabled="disabled">
            @include('casos.diabetologico.index')
        </fieldset>
    @endif

@endsection

@section('oftalmologico')
    @if ($caso->estado == 'pendiente-formulario')
        {!! Form::model($caso, ['enctype' =>"multipart/form-data", 'method' => 'POST','route' => ['medico.update-oftalmologico', $caso->id], 'aria-label' => __('Actualizar Caso')])  !!}
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
    @else
       <fieldset disabled="disabled">
            @include('casos.oftalmologico.index')
       </fieldset> 
    @endif

@endsection