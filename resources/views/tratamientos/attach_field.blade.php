<!-- Button trigger modal -->
<div class="form-inline">
  <button type="button" class="btn btn-info" data-toggle="modal" data-target="#adjuntarArchivoTratamientoModal">
    <i class="fa fa-upload fa-2x" aria-hidden="true"></i>
</div>

<!-- Modal Aprobar-->
<div class="modal fade" id="adjuntarArchivoTratamientoModal" tabindex="-1" role="dialog" aria-labelledby="aprobarModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    {!! Form::open(['method' => 'POST','route' => ['tratamientos.adjuntar',$tratamiento->id], 'aria-label' => __('Aprobar Caso'), 'enctype' => 'multipart/form-data' ])  !!}
    <div class="modal-content">
      <div class="modal-header text-white bg-success mb-3">
        <h5 class="modal-title" id="exampleModalLabel">Adjuntar Tratamiento</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="form-group row">
              <label for="name" class="col-md-2 col-form-label text-md-right">Archivo</label>

              <div class="form-group col-md-10">
                  <div class="form-check form-check-inline">
                      <input class="form-control" type="file" name="archivo[]" id="archivo" multiple required>
                  </div>
              </div>
          </div>
      </div>
      <div class="modal-footer">
        <input type="hidden" name="caso_id" value="{{ $caso->id}}" />
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-success">Adjuntar <i class="fa fa-upload" aria-hidden="true"></i></button>
      </div>
    </div>
    {!! Form::Close() !!}
  </div>
</div>
