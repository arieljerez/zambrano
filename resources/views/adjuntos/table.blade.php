<table class="table">
    <thead>
    <tr>
        <th> Fecha </th>
        <th> Descripcion  </th>
        <th> Archivo </th>
        <th> Usuario </th>
    </tr>
    </thead>
    <tbody>
    @foreach ($caso->adjuntos as $adjunto)
        <tr>
            <td> <h5>     {{ \Carbon\Carbon::parse($adjunto->fecha)->format('d/m/Y')  }}       </h5>
                <small> Registro: {{  \Carbon\Carbon::parse($adjunto->created_at)->format('d/m/Y H:m') }} </small></td>

            <td>       {{ $adjunto->descripcion }}       </td>
            <td>
                @isset ($adjunto->archivo)
                    <a href="{{ route('adjuntos.download',$adjunto->archivo)}}" class="btn btn-default"> <i class="fa fa-download"></i> </a>
                @endisset
            </td>
            <td>   {{ $adjunto->usuario_tabla }} \  {{ $adjunto->usuario->usuario }}    </td>
        </tr>
    @endforeach
    </tbody>
</table>
