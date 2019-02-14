<!-- Button trigger modal -->
<div class="form-inline">
  <button type="button" class="btn btn-success col-12 col-md-6 " data-toggle="modal" data-target="#reaprobarModal">
    ReAprobar <i class="fa fa-check" aria-hidden="true"></i>
  </button>
</div>

<!-- Modal Re Aprobar -->
<div class="modal fade" id="reaprobarModal" tabindex="-1" role="dialog" aria-labelledby="reaprobarModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    {!! Form::model($caso, ['method' => 'POST','route' => ['prodiaba.reaprobar'], 'aria-label' => __('Re Aprobar Caso')])  !!}
    <div class="modal-content">
      <div class="modal-header text-white bg-success mb-3">
        <h5 class="modal-title" id="exampleModalLabel">Aprobar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <input type="hidden" name="cambiar_estado" value="aprobado">
        <div class="form-group">
            <textarea name="texto_aprobacion" class="form-control col-10" required></textarea>
        </div>
        <div class="form-group">
            <input type="date" name="fecha_aprobacion" class="form-control col-6" required>
        </div>
      </div>
      <div class="modal-footer">
        <input type="hidden" name="caso_id" value="{{ $caso->id}}" />
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-success">Aprobar <i class="fa fa-check" aria-hidden="true"></i></button>
      </div>
    </div>
    {!! Form::Close() !!}
  </div>
</div>
