@extends('casos.layouts.listado')

@section('card_class',config('prodiaba.casos.class.vencido'))
@section('titulo_estado', config('prodiaba.casos.estados.vencido') )

@section('filtros')

<form method="get" action="{{url('casos/vencidos')}}">
    @include('casos.parts.filtro_paciente')
  </form>

@endsection
