@extends('casos.layouts.listado')

@section('card_class','bg-secondary text-white')
@section('titulo_estado', 'Casos por Paciente' )

@section('filtros')
  <a href="{{ url('casos/buscar_paciente/efector.listado.por-paciente') }}" class="btn btn-primary"> <i class="fas fa-search"></i> Buscar Paciente</a>     
@endsection

@section('table')
  @include('casos.table_todos',['route_prefix' => 'efector'])
@endsection
