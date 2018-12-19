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
            <td> <h5>#     {{ $caso->id }}      </h5 </td>
            <td>
              {{ $caso->estado }} 
            </td>
            <td>      {{ \Carbon\Carbon::parse($caso->fecha)->format('d/m/Y')  }}    </td>
            <td>      {{ $caso->dni }}       </td>
            <td>      {{ $caso->paciente }}    </td>
            <td>
                @isset($caso->fecha_aprobacion)
                  {{ \Carbon\Carbon::parse($caso->fecha_aprobacion)->format('d/m/Y')  }}
                @endisset
                @isset($caso->fecha_rechazo)
                    {{ \Carbon\Carbon::parse($caso->fecha_rechazo)->format('d/m/Y')  }}
                @endisset
            </td>

            <td>
              @switch($accion)
                @case("ver")
                  <a href="{{ route('casos.edit', $caso->id ) }}" class="btn btn-primary"> <i class="far fa-eye"></i> Ver</a>
                  @break
                @case("editar")
                  <a href="{{ route('casos.edit', $caso->id ) }}" class="btn btn-primary"> <i class="far fa-save"></i> Editar</a>
                  @break
              @endswitch
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
