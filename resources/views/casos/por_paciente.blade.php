@extends('casos.layouts.listado')

@section('card_class', 'bg-info text-light')
@section('titulo_estado', 'Por Paciente')

@section('filtros')
  <a href="{{ url('casos/buscar_paciente/casos.por_paciente') }}" class="btn btn-primary"> <i class="fas fa-search"></i> Buscar Paciente</a>
@endsection
