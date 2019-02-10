<!-- Button trigger modal -->
<div class="form-inline">
  <button type="button" class="btn btn-danger col-6" data-toggle="modal" data-target="#rechazarModal">
    Rechazar <i class="fa fa-times" aria-hidden="true"></i>
  </button>
  <button type="button" class="btn btn-success col-6 " data-toggle="modal" data-target="#aprobarModal">
    Aprobar <i class="fa fa-check" aria-hidden="true"></i>
  </button>
</div>

<!-- Modal Aprobar-->
<div class="modal fade" id="aprobarModal" tabindex="-1" role="dialog" aria-labelledby="aprobarModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    {!! Form::model($caso, ['method' => 'POST','route' => ['prodiaba.aprobar'], 'aria-label' => __('Aprobar Caso')])  !!}
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

<!-- Modal Rechazar-->
<div class="modal fade" id="rechazarModal" tabindex="-1" role="dialog" aria-labelledby="rechazarModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    {!! Form::model($caso, ['method' => 'POST','route' => ['prodiaba.rechazar'], 'aria-label' => __('Actualizar Caso')])  !!}
    <div class="modal-content">
      <div class="modal-header text-white bg-danger mb-3">
        <h5 class="modal-title" id="exampleModalLabel">Rechazar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <input type="hidden" name="cambiar_estado" value="rechazado">
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
        <button type="submit" class="btn btn-danger">Rechazar <i class="fa fa-times" aria-hidden="true"></i></button>
      </div>
    </div>
    {!! Form::Close() !!}
  </div>
</div>
