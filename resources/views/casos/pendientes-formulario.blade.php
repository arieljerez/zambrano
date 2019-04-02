@extends('casos.layouts.listado')

@section('card_class',config('prodiaba.casos.class.pendiente-formulario'))
@section('titulo_estado', config('prodiaba.casos.estados.pendiente-formulario') )

@section('filtros')
<form method="get" action="{{url('casos/pendientes-formulario')}}">
  @include('casos.parts.filtro_paciente')
</form>       
@endsection
