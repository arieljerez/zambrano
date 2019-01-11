<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
          <div class="card card-default">
              <div class="card-header">Usuarios: Profesionales</div>
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
                    <a href="{{url('usuarios/create')}}" class="btn btn-primary"><i class="fas fa-plus"></i> Nuevo Usuario</a>
                  </div>
                </div>

                @if( $usuarios->count() > 0)
                <div class="row">
                  <div class="col-md-4 mb-4">
                    Encontrados: {{$usuarios->count()}} de {{$usuarios->total()}}
                  </div>
                </div>

                <div class="table-responsive">
                  <table class="table table-striped table-condensed">
                    <thead>
                        <th>DNI</th>
                        <th>Nombres</th>
                        <th>Apellidos</th>
                        <th>Acciones</th>
                    </thead>
                    <tbody>
                        @foreach( $usuarios as $usuario)
                          <tr>
                              <td>
                                <p class="h4">{{ $usuario->dni }}</p>
                                <small>Matricula: {{ $usuario->matricula }}</small>
                              </td>
                              <td>{{ $usuario->nombres }}</td>
                              <td>{{ $usuario->apellidos }}</td>
                              <td>
                                <div class="btn-group" role="group">
                                  <a href="{{ route('usuarios.edit', $usuario->id) }}" class='btn btn-link'><i class="fas fa-edit"></i></a>
                                  <form action="{{ route('usuarios.destroy', $usuario->id) }}" method="POST">
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

                {{ $usuarios->links() }}
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
