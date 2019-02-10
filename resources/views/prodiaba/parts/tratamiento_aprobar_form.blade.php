<!-- Button trigger modal -->
<button type="button" class="btn btn-success" data-toggle="modal" data-target="#aprobarTratamientoModal">
    <i class="fa fa-check" aria-hidden="true"></i>
</button>


<!-- Modal Aprobar tratamiento-->
<div class="modal fade" id="aprobarTratamientoModal" tabindex="-1" role="dialog" aria-labelledby="aprobarTratamientoModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">

    <div class="modal-content">
      <div class="modal-header text-white bg-success mb-3">
        <h5 class="modal-title" id="exampleModalLabel">Aprobar Tratamiento</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      {{ Form::open(['method' => 'post','route' => ['prodiaba.aprobar-tratamiento',$tratamiento->id], 'aria-label' => __('Aprobar Caso')])  }}
      <div class="modal-body">
        <input type="hidden" name="cambiar_estado" value="aprobado">
        <div class="form-group">
            <textarea name="texto_aprobacion" class="form-control col-10" required></textarea>
        </div>
      </div>
      <div class="modal-footer">
        <input type="hidden" name="id" value="{{ $tratamiento->id}}" />
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-success">Aprobar <i class="fa fa-check" aria-hidden="true"></i></button>
      </div>
          {!! Form::Close() !!}
    </div>
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
