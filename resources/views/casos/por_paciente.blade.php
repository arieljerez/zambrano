@extends('casos.listado')

@section('card_class', 'bg-info text-light')
@section('titulo_estado', 'Por Paciente')

@section('filtros')
<div class="row">
  <div class="col-12">
    <a href="{{ url('casos/buscar_paciente/casos.por_paciente') }}" class="btn btn-primary"> <i class="fas fa-search"></i> Buscar Paciente</a>
  </div>
  <div class="col-12">
    &nbsp;
  </div>
</div>
@endsection
