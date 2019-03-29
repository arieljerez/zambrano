<div class="table-responsive">
  <table class="table">
    <thead>
        <tr>
            <th> Caso </th>
            <th> Estado </th>
            <th> Fecha </th>
            <th> DNI </th>
            <th> Paciente </th>
            <th> Aprobacion / Rechazo </th>
            <th> Acción </th>
        </tr>
    </thead>

    <tbody>
    @foreach ($casos as $caso)
        <tr>
            <td> <h5>#     {{ $caso->id }}      </h5> </td>
            <td>
              {{ estado($caso->estado)  }}
            </td>
            <td>      {{ fecha($caso->fecha) }}    </td>
            <td>      {{ $caso->dni }}       </td>
            <td>      {{ $caso->paciente }}    </td>
            <td>
                @isset($caso->fecha_aprobacion)
                  {{ fecha($caso->fecha_aprobacion) }}
                @endisset
                @isset($caso->fecha_rechazo)
                    {{ fecha($caso->fecha_rechazo) }}
                @endisset
            </td>

            <td>
              <a href="{{ route('casos.edit', $caso->id ) }}" class="btn btn-primary"> <i class="far fa-edit fa-2x"></i> </a>
            </td>
        </tr>
    @endforeach
    </tbody>
  </table>
</div>
