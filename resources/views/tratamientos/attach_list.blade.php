<!-- Button trigger modal -->
<div class="form-inline">
<button type="button" class="btn btn-success" data-toggle="modal" data-target="#adjuntarListadoTratamientoModal-{{ $tratamiento->id}}">
    <i class="fa fa-download fa-2x" aria-hidden="true"></i>
</div>

<!-- Modal Aprobar-->
<div class="modal fade" id="adjuntarListadoTratamientoModal-{{ $tratamiento->id}}" tabindex="-1" role="dialog" aria-labelledby="aprobarModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">

    <div class="modal-content">
      <div class="modal-header text-white bg-success mb-3">
        <h5 class="modal-title" id="exampleModalLabel">Adjuntos</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
          <div class="form-group row">
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
                  @foreach ($tratamiento->adjuntos as $adjunto)
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
          </div>
      </div>
      <div class="modal-footer">
        <input type="hidden" name="caso_id" value="{{ $caso->id}}" />
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>

  </div>
</div>
