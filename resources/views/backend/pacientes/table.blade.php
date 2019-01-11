<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
          <div class="card card-default">
              <div class="card-header">Pacientes</div>
              <div class="card-body">

                @if (session('success'))
                  <div class="alert alert-success">
                      {{ session('success') }}
                  </div>
                @endif

                @if (session('fail'))
                  <div class="alert alert-danger">
                      {{ session('fail') }}
                  </div>
                @endif

                <div class="row">
                  <div class="col-md-6 mb-3">
                    <a href="{{url('pacientes/create')}}" class="btn btn-primary"><i class="fas fa-plus"></i> Nuevo Paciente</a>
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
                        @foreach( $pacientes as $paciente)
                          <tr>
                              <td>
                                <p class="h4">{{ $paciente->dni }}</p>
                                <p><small>Registro: {{ $paciente->created_at }}</small></p>
                                  <small>Actualización: {{ $paciente->updated_at }}</small>
                              </td>
                              <td>{{ $paciente->apellidos}}</td>
                              <td>{{ $paciente->nombres}}</td>
                              <td>{{ $paciente->fecha_nacimiento }}</td>
                              <td><p>Teléfono{{ $paciente->telefono }}</p><p>Teléfono Familiar{{ $paciente->telefono_familiar }}</p></td>
                              <td>{{ $paciente->sexo }}</td>
                              <td>
                                <div class="btn-group" role="group">
                                  <a href="{{ route('pacientes.edit', $paciente->id) }}" class='btn btn-link'><i class="fas fa-edit"></i></a>
                                  <form action="{{ route('pacientes.destroy', $paciente->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class ="btn btn-danger btn-xs" type="submit" onclick="return confirm('¿Está seguro?')"><i class="fas fa-trash-alt"></i></button>
                                  </form>
                                </div>
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
