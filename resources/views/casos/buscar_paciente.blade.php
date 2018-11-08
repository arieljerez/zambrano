@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card card-default">
                <div class="card-header">Pacientes</div>
                <div class="card-body">

                    @if (session('delete_ok'))
                        <div class="alert alert-success">
                            {{ session('delete_ok') }}
                        </div>
                    @endif

                    @if (session('delete_fail'))
                        <div class="alert alert-danger">
                            {{ session('delete_fail') }}
                        </div>
                    @endif

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <a href="{{url('pacientes/create')}}" class="btn btn-primary"><i class="fas fa-plus"></i> Nuevo Usuario</a>
                        </div>
                    </div>


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
                                </thead>
                                <tbody>
                                @foreach( $pacientes as $usuario)
                                    <tr>
                                        <td>
                                            <p class="h4">{{ $usuario->dni }}</p>
                                            <p><small>Registro: {{ $usuario->created_at }}</small></p>
                                            <small>Actualización: {{ $usuario->updated_at }}</small>
                                        </td>
                                        <td>{{ $usuario->apellidos}}</td>
                                        <td>{{ $usuario->nombres}}</td>
                                        <td>{{ $usuario->fecha_nacimiento }}</td>
                                        <td><p>Teléfono{{ $usuario->telefono }}</p><p>Teléfono Familiar{{ $usuario->telefono_familiar }}</p></td>
                                        <td>{{ $usuario->sexo }}</td>
                                        <td>
                                            <a href="{{ url('casos/create',$usuario->id) }}" class="btn btn-link">Seleccionar</a>
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
