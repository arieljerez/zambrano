<div class="row">

    @if($caso->oftalmologico_archivo != null)
    <div class="form-group col-md-3">
        <a href="{{ asset('descargar/'.$caso->oftalmologico_archivo) }}" class="btn btn-primary">Descargar</a>
        <a href="{{ asset('eliminar_archivo_of/'.$caso->id.'/'.$caso->oftalmologico_archivo) }}" class="btn btn-danger">Eliminar</a>
    </div>
    @else
    <div class="form-group col-md-3">
        <label class="form-check-label" for="archivo">Subir archivo:</label>
    </div>
    <div class="form-group col-md-6">
        <input class="form-control" type="file" name="archivo" id="oftalmologico_archivo">
    </div>
    @endif

</div>
