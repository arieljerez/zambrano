@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card card-default">
                <div class="card-header">Pacientes</div>
                <div class="card-body">

                  <form method="get" action="{{url('casos/buscar_paciente/'.$url.'/')}}">
                    @include('casos.parts.filtro_paciente')
                  </form>

                    @if( $pacientes->count() > 0)
                        <div class="row">
                            <div class="col-md-4 mb-4">
                                Encontrados: {{$pacientes->count()}} de {{$pacientes->total()}}
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-striped table-condensed">
                                <thead>
                                  <th>DNI</th>
                                  <th>Apellidos</th>
                                  <th>Nombres</th>
                                  <th>Fecha Nacimiento</th>
                                  <th>Teléfonos</th>
                                  <th>Sexo</th>
                                  <th>Seleccionar</th>
                                </thead>
                                <tbody>
                                @foreach( $pacientes as $usuario)
                                    <tr>
                                        <td>
                                            <p class="h4">{{ $usuario->dni }}</p>
                                            <p><small>Registro: {{ \Carbon\Carbon::parse($usuario->created_at)->format('d/m/Y')  }} </small></p>
                                            <small>Actualización: {{ \Carbon\Carbon::parse($usuario->updated_at)->format('d/m/Y')  }}</small>
                                        </td>
                                        <td>{{ $usuario->apellidos}}</td>
                                        <td>{{ $usuario->nombres}}</td>
                                        <td>{{ \Carbon\Carbon::parse($usuario->fecha_nacimiento)->format('d/m/Y')  }}</td>
                                        <td><p>Teléfono{{ $usuario->telefono }}</p><p>Teléfono Familiar{{ $usuario->telefono_familiar }}</p></td>
                                        <td>{{ $usuario->sexo }}</td>
                                        <td>
                                            <a href="{{ url(route($url).'/'.$usuario->id) }}" class="btn btn-primary"><i class="fa fa-check"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>

                        {{ $pacientes->links() }}
                    @else
                        <div class="row">
                            <div class="col-md-3 mb-3">
                                No se encontraron resultados
                            </div>
                        </div>
                    @endif
                </div>
            </div>


        </div>
    </div>
</div>
@endsection
