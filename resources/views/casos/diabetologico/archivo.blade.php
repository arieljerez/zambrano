<div class="row">

    @if($caso->diabetologico_archivo != null)
    <div class="form-group col-md-3">
        <a href="{{ asset('descargar/'.$caso->diabetologico_archivo) }}" class="btn btn-primary">Descargar</a>
        @if($caso->estado == 'pendiente_formulario')
        <a href="{{ asset('eliminar_archivo_di/'.$caso->id.'/'.$caso->diabetologico_archivo) }}" class="btn btn-danger" disabled>Eliminar</a>
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
