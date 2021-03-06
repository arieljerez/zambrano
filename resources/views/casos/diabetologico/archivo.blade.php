<div class="row">

    @if($caso->diabetologico_archivo != null)
    <div class="form-group col-md-3">
        <a href="{{ $caso->diabetologico_url }}" class="btn btn-primary">Descargar</a>
        @if($caso->estado == 'pendiente-formulario')
        <a href="{{ $caso->diabetologico_url_eliminar }}" class="btn btn-danger" disabled>Eliminar</a>
        @endif
    </div>
    @else

    <div class="form-group col-md-3">
        <label class="form-check-label" for="archivo">Subir archivo:</label>
    </div>
    <div class="form-group col-md-6">
        <input class="form-control" type="file" name="archivo" id="diabetologico_archivo">
    </div>

    @endif

</div>
