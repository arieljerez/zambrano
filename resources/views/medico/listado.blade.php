@extends('casos.layouts.listado')

@section('card_class',config('prodiaba.casos.class.'.$estado))
@section('titulo_estado', config('prodiaba.casos.estados.'.$estado) )

@section('filtros')
<form method="get" action="{{url('medico/listado/'.$estado)}}">
  @include('casos.parts.filtro_paciente')
  <div class="form-row">
    <div class="col-3">
      <div class="form-check">
          {{ Form::checkbox('mis_casos', old('mis_caso',1), true, ['class' => 'form-check-input',"id"=>"defaultCheck1"]) }}
          <label class="form-check-label" for="defaultCheck1"> Mis Casos </label>
      </div>
    </div>
  </div>
</form>       
@endsection

@section('table')
  @include('casos.table'.'-'.$estado,['route_prefix' => 'medico'])
@endsection
