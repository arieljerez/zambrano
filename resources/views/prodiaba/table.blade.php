<table class="table">
    <thead>
    <tr>
        <th> Caso</th>
        <th> Fecha </th>
        <th> DNI </th>
        <th> Paciente </th>
        <th> Aprobación / Rechazo </th>
        <th>  </th>
    </tr>
    </thead>
    <tbody>
    @foreach ($casos as $caso)
        <tr>
            <td> <h5>#     {{ $caso->id }}      </h5> </td>
            <td>      {{ \Carbon\Carbon::parse($caso->fecha)->format('d/m/Y')  }}    </td>
            <td>      {{ $caso->dni }} </td>
            <td>      {{ $caso->paciente }}    </td>
            <td>      @isset($caso->fecha_aprobacion)
                        {{\Carbon\Carbon::parse($caso->fecha_aprobacion)->format('d/m/Y')  }}
                      @endisset
                      @isset($caso->fecha_rechazo)
                                 {{\Carbon\Carbon::parse($caso->fecha_rechazo)->format('d/m/Y')  }}
                               @endisset
                      @isset($caso->fecha_reaprobacion)
                      <p>
                        Re: {{\Carbon\Carbon::parse($caso->fecha_reaprobacion)->format('d/m/Y')  }}
                      </p>
                      @endisset

            </td>
            <td>
               <a href="{{ route('prodiaba.edit', $caso->id ) }}" class="btn btn-primary"> <i class="far fa-eye"></i> Ver</a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
