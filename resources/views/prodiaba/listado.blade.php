@extends('casos.layouts.listado')

@section('card_class',config('prodiaba.casos.class.'.$estado))
@section('titulo_estado', config('prodiaba.casos.estados.'.$estado) )

@section('filtros')
<form method="get" action="{{url('prodiaba/listado/'.$estado)}}">
  @include('casos.parts.filtro_paciente')
</form>       
@endsection

@section('table')
  @include('casos.table'.'-'.$estado,['route_prefix' => 'prodiaba'])
@endsection
