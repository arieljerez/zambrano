@extends('casos.layouts.listado')

@section('card_class',config('prodiaba.casos.class.rechazado'))
@section('titulo_estado', config('prodiaba.casos.estados.rechazado') )

@section('filtros')

<form method="get" action="{{url('casos/rechazados')}}">
    @include('casos.parts.filtro_paciente')
  </form>
@endsection
