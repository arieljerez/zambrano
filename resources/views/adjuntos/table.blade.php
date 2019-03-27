<div class="table-responsive">
    <table class="table table-sm">
        <thead>
        <tr>
            <th> Fecha </th>
            <th> Descripcion  </th>
            <th> Archivo </th>
            <th> Usuario </th>
        </tr>
        </thead>
        <tbody>
        @isset ($caso->diabetologico_archivo)
            <tr>
                <td>
                    
                </td>
                <td> Archivo Diabetológico </td>
                <td>
                    <a href="{{ $caso->diabetologico_url }}" class="btn btn-default"> <i class="fa fa-download fa-2x"></i> </a>
                </td>
                <td>     </td>
            </tr>
        @endisset
        
        @isset ($caso->oftalmologico_archivo)
            <tr>
                <td></td>
                <td> Archivo Oftalmológico </td>
                <td>
                    <a href="{{ $caso->oftalmologico_url }}" class="btn btn-default"> <i class="fa fa-download fa-2x"></i> </a>
                </td>
                <td></td>
            </tr>
        @endisset

        @foreach ($caso->adjuntos as $adjunto)
            <tr>
                <td>
                    <h5> {{ \Carbon\Carbon::parse($adjunto->fecha)->format('d/m/Y')  }} </h5>
                    <small> Registro: {{  \Carbon\Carbon::parse($adjunto->created_at)->format('d/m/Y H:i') }} </small>
                </td>
                <td> {{ $adjunto->descripcion }} </td>
                <td>
                    @isset ($adjunto->archivo)
                        <a href="{{ url( 'descargar/'.$adjunto->archivo )}}" class="btn btn-default"> <i class="fa fa-download fa-2x"></i> </a>
                    @endisset
                </td>
                <td>   {{ $adjunto->usuario_tabla }} \  {{ $adjunto->usuario->usuario }}    </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
