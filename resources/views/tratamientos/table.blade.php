<div class="table-responsive">
    <table class="table table-sm">
        <thead>
        <tr>
            <th> Fecha </th>
            <th> Estado </th>
            <th> Evento </th>
            <th> Descripcion  </th>
            <th> Archivo </th>
            <th> U:Efector </th>
            <th> Aprobado Por </th>

        </tr>
        </thead>
        <tbody>
        @foreach ($caso->tratamientos as $tratamiento)
            <tr>
                <td> <h5>     {{ fecha($tratamiento->fecha) }}       </h5>
                    <small> Registro: {{  \Carbon\Carbon::parse($tratamiento->created_at)->format('d/m/Y H:i') }} </small></td>
                <td>   {{ config('prodiaba.tratamientos.estados.'.$tratamiento->estado) }}      </td>
                <td>   {{ $tratamiento->evento }}      </td>
                <td>       {{ $tratamiento->descripcion }}       </td>
                <td>
                    @isset ($tratamiento->archivo)
                      <a href="{{ url('descargar/'.$tratamiento->archivo)}}" class="btn btn-default"> <i class="fa fa-download fa-2x"></i> </a>
                    @else
                    <div class="form-group">
                      @if($tratamiento->adjuntos->count() > 0)
                       @include('tratamientos.attach_list')
                      @endif
                      @include('tratamientos.attach_field')
                    </div>
                      
                    @endisset
                </td>
                <td>
                  {{  $tratamiento->usuario->usuario }}
                </td>
                <td>
                  @if($tratamiento->fecha_aprobacion)
                    <p>
                      {{  $tratamiento->usuario_aprobacion }}
                    </p> <small>Fecha: {{ fecha($tratamiento->fecha_aprobacion) }} </small><br />
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
</div>
