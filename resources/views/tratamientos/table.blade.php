<table class="table">
    <thead>
    <tr>
        <th> Fecha </th>
        <th> Evento </th>
        <th> Descripcion  </th>
        <th> Archivo </th>

    </tr>
    </thead>
    <tbody>
    @foreach ($tratamientos as $tratamiento)
        <tr>
            <td> <h5>     {{ \Carbon\Carbon::parse($tratamiento->fecha)->format('d/m/Y')  }}       </h5>
                <small> Registro: {{  \Carbon\Carbon::parse($tratamiento->created_at)->format('d/m/Y H:m') }} </small></td>
            <td>   {{ $tratamiento->evento }}      </td>
            <td>       {{ $tratamiento->descripcion }}       </td>
            <td>
                @isset ($tratamiento->archivo)
                    <a href="#" class="btn btn-default"> <i class="fa fa-download"></i> {{ $tratamiento->archivo }}</a>
                @endisset
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
