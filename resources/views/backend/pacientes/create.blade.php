@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

<div class="card">
    <div class="card-header">Paciente: Datos Personales</div>
    <div class="card-body">
      {!! Form::model($paciente, ['route' => ['pacientes.store', $paciente], 'aria-label' => __('Nuevo Paciente')])  !!}
        @include('backend.pacientes.fields')
        <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">
                  <i class="fas fa-save"></i> {{ __('Crear') }}
                </button>
                <a href="{{ url('usuarios') }}" class="btn btn-primary"> <i class="far fa-arrow-alt-circle-left"></i> Volver</a>
            </div>
        </div>
    {!! Form::Close() !!}
</div>

</div>
</div>
@endsection
