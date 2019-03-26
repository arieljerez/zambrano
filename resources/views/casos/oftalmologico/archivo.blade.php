<div class="row">

    @if($caso->oftalmologico_archivo != null)
    <div class="form-group col-md-3">
          <a href="{{ $caso->oftalmologico_url }}" class="btn btn-primary">Descargar</a>
        @if($caso->estado == 'pendiente_formulario')
          <a href="{{ asset('eliminar_archivo_of/'.$caso->id.'/'.$caso->oftalmologico_archivo) }}" class="btn btn-danger">Eliminar</a>
        @endif
    </div>
    @else
      <div class="form-group col-md-3">
          <label class="form-check-label" for="archivo">Subir archivo:</label>
      </div>
      <div class="form-group col-md-6">
          <fieldset {{ $solo_lectura == true ? 'disabled':''}}>
              <input class="form-control" type="file" name="archivo" id="oftalmologico_archivo">
          </fieldset>
      </div>
    @endif

</div>
