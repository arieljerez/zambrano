<table class="table">
    <thead>
    <tr>
        <th> Fecha </th>
        <th> Estado </th>
        <th> Evento </th>
        <th> Descripcion  </th>
        <th> Archivo </th>
        <th> Usuario </th>
        <th> Aprobado Por </th>

    </tr>
    </thead>
    <tbody>
    @foreach ($caso->tratamientos as $tratamiento)
        <tr>
            <td> <h5>     {{ \Carbon\Carbon::parse($tratamiento->fecha)->format('d/m/Y')  }}       </h5>
                <small> Registro: {{  \Carbon\Carbon::parse($tratamiento->created_at)->format('d/m/Y H:i') }} </small></td>
            <td>   {{ config('prodiaba.tratamientos.estados.'.$tratamiento->estado) }}      </td>
            <td>   {{ $tratamiento->evento }}      </td>
            <td>       {{ $tratamiento->descripcion }}       </td>
            <td>
                @isset ($tratamiento->archivo)
                    <a href="{{ url('descargar/'.$tratamiento->archivo)}}" class="btn btn-default"> <i class="fa fa-download fa-2x"></i> </a>
                @else
                    @if($tratamiento->estado == 'aprobado' )
                        @auth('efector')
                            @include('tratamientos.attach_field')
                        @endauth
                    @endif
                @endisset
            </td>
            <td>
              {{  $tratamiento->usuario->usuario }}
            </td>
            <td>
              @if($tratamiento->fecha_aprobacion)
                <p>
                  {{  $tratamiento->usuario_aprobacion }}
                </p> <small>Fecha: {{ \Carbon\Carbon::parse($tratamiento->fecha_aprobacion)->format('d/m/Y')  }} </small><br />
                <small>Descripción: {{ $tratamiento->texto_aprobacion }} </small>
              @else
                @auth('prodiaba')
                  @include('prodiaba.parts.tratamiento_aprobar_form',['tratamiento' => $tratamiento])
                @endauth
              @endif

            </td>
        </tr>
    @endforeach
    </tbody>
</table>
