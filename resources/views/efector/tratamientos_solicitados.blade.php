@extends('casos.layouts.listado')

@section('card_class', "bg-default text-black")
@section('titulo_estado', "Tratamientos Solicitados" )

@section('filtros')
<form method="get" action="{{url('efector/listado/tratamientos-solicitados')}}">
  @include('casos.parts.filtro_paciente')
</form>       
@endsection

@section('table')
  @include('casos.table',['route_prefix' => 'efector'])
@endsection

