@extends('casos.layouts.listado')

@section('card_class',config('prodiaba.casos.class.pendiente-aprobacion'))
@section('titulo_estado', config('prodiaba.casos.estados.pendiente-aprobacion') )

@section('filtros')
    <form method="get" action="{{url('casos/pendientes-aprobacion')}}">
        @include('casos.parts.filtro_paciente')
    </form>
@endsection

