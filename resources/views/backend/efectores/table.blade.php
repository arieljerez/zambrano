<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
          <div class="card card-default">
              <div class="card-header">Usuarios: Efectores</div>
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
                    <a href="{{url('efectores/create')}}" class="btn btn-primary"><i class="fas fa-plus"></i> Nuevo Efector</a>
                  </div>
                </div>

                @if( $efectores->count() > 0)
                <div class="row">
                  <div class="col-md-4 mb-4">
                    Encontrados: {{$efectores->count()}} de {{$efectores->total()}}
                  </div>
                </div>

                <div class="table-responsive">
                  <table class="table table-striped table-condensed">
                    <thead>
                        <th>Usuario</th>
                        <th>Email</th>
                    </thead>
                    <tbody>
                        @foreach( $efectores as $efector)
                          <tr>
                              <td>
                                <p class="h5">{{ $efector->usuario }}</p>
                                <small># {{ $efector->id }}</small>
                              </td>
                              <td>{{ $efector->email }}</td>
                              <td>
                                <div class="btn-group" role="group">
                                  <a href="{{ route('efectores.edit', $efector->id) }}" class='btn btn-link'><i class="fas fa-edit"></i></a>
                                  <form action="{{ route('efectores.destroy', $efector->id) }}" method="POST">
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

                {{ $efectores->links() }}
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
