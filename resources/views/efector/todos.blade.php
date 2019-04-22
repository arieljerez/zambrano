@extends('casos.layouts.listado')

@section('card_class','bg-info text-black')
@section('titulo_estado', 'Todos' )

@section('filtros')
    <form method="get" action="{{url('efector/listado')}}">
        @include('casos.parts.filtro_caso')
        @include('casos.parts.filtro_paciente')
    </form>    
@endsection

@section('table')
<table class="table">
        <thead>
        <tr>
            <th> Caso</th>
            <th> Fecha </th>
            <th> DNI </th>
            <th> Paciente </th>
            <th> Estado </th>
            <th> Acción </th>
        </tr>
        </thead>
        <tbody>
        @foreach ($casos as $caso)
            <tr>
                <td> <h5>#{{ $caso->id }}      </h5> </td>
                <td>      {{ fecha($caso->fecha) }}    </td>
                <td>      {{ $caso->dni }}       </td>
                <td>      {{ $caso->paciente }}    </td>
                <td>      {{ estado($caso->estado) }}    </td>
                <td>
                  <a href="{{ route($prefix_url.'.edit', $caso->id ) }}" class="btn btn-primary"> <i class="far fa-edit fa-2x"></i></a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
