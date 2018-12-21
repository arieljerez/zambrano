<div class="table-responsive">
  <table class="table table-striped table-condensed">
    <thead>
        <th>#</th>
        <th>Evento</th>
        <th>Descripción</th>
        <th>Usuario</th>
    </thead>
    <tbody>
        @foreach( $datos as $registro)
          <tr>
              <td>
                <p class="h4">{{ $registro->id }}</p>
                <p><small>Registro: {{ $registro->created_at }}</small></p>
              </td>
              <td>{{ $registro->evento}}</td>
              <td>{{ $registro->descripcion }}</td>
              <td>

                @if ($registro->usuario_tabla == 'prodiabas')
                  {{ \App\Models\Prodiaba::find($registro->usuario_id)->usuario }}
                @endif

                @if ($registro->usuario_tabla == 'efectores')
                  {{ \App\Models\Efector::find($registro->usuario_id)->usuario }}
                @endif

                @if ($registro->usuario_tabla == 'usuarios')
                  {{ \App\Models\Usuario::find($registro->usuario_id)->usuario }}
                @endif
              </td>
          </tr>
        @endforeach
    </tbody>
  </table>
</div>
