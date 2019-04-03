@extends('casos.layouts.listado')

@section('card_class','bg-secondary text-white')
@section('titulo_estado', 'Casos por Paciente' )

@section('filtros')
  <a href="{{ url('casos/buscar_paciente/medico.listado.por-paciente') }}" class="btn btn-primary"> <i class="fas fa-search"></i> Buscar Paciente</a>     
  
  @if ($paciente_id = Session::get('paciente_id'))
    <div class="form-row">
        <div class="col-3">
          <div class="form-check">
              <form method="post" action="{{url('medico/listado/por-paciente/'.$paciente_id)}}">
                @csrf
                {{ Form::checkbox('mis_casos', old('mis_caso',1), true, ['class' => 'form-check-input',"id"=>"defaultCheck1"]) }}
                <label class="form-check-label" for="defaultCheck1"> Mis Casos </label>
                <button type="submit">Buscar</button>
              </form>
          </div>

        </div>
    </div>
  @endif

  @endsection

@section('table')
  @include('casos.table_todos',['route_prefix' => 'medico'])
@endsection
