<div class="table-responsive">
  <table class="table table-striped table-sm display" id="table_bitacora">
    <thead>
        <th scope="col">#</th>
        <th scope="col">Evento</th>
        <th scope="col">Descripción</th>
        <th scope="col">Usuario</th>
    </thead>
    <tbody>
      @php
          $i = $caso->bitacoras->count();
          $tr_class = "";

          switch ($caso->estado) {
            case 'Vencido':
                $tr_class = 'class="table-warning"';
              break;
            case 'Aprobado':
                $tr_class = 'class="table-success"';
            break;
          }
      @endphp
        @foreach( $caso->bitacoras as $registro)
          @php
          switch ($registro->evento) {
              case 'Vencido':
                  $tr_class = 'class="table-warning"';
                break;
              case 'Aprobado':
                  $tr_class = 'class="table-success"';
                break;
              default:
                  $tr_class = '';
                break;
            }
          @endphp
          <tr {!! $tr_class !!}>
              <th scope="row">
                <p class="h4">{{ $i-- }}</p>
                <p><small>Registro: {{ $registro->created_at }}</small></p>
              </th>
              <td>{{ $registro->evento}}</td>
              <td>{{ $registro->descripcion }}</td>
              <td>

                {{ $registro->usuario_tabla }} / {{ $registro->usuario->nombre_completo }}
              </td>
          </tr>
        @endforeach
    </tbody>
  </table>
</div>

@section('js')
<script type="text/javascript">
    $(document).ready( function () {
      $('#table_bitacora').DataTable();
    });
</script>
@endsection