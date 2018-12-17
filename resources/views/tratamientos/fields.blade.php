

<div class="form-group row">
    <label for="name" class="col-md-4 col-form-label text-md-right">Caso</label>

    <div class="form-group col-md-4">
        <input class="form-control" type="input" name="caso_id" id="caso_id" value="{{ old('caso_id',$tratamiento->caso_id)}}" readonly>
    </div>
</div>

<div class="form-group row">
    <label for="name" class="col-md-4 col-form-label text-md-right">Fecha</label>

    <div class="form-group col-md-4">
      <input class="form-control" type="date" name="fecha" id="fecha" value="{{ old('fecha',$tratamiento->fecha)}}">
    </div>
</div>

<div class="form-group row">
    <label for="name" class="col-md-4 col-form-label text-md-right">Evento</label>
    <div class="form-group col-md-4">
      <input class="form-control" type="text" name="evento" id="evento" value="{{ old('evento',$tratamiento->evento)}}">
    </div>
</div>

<div class="form-group row">
    <label for="name" class="col-md-4 col-form-label text-md-right">Descripcion</label>

    <div class="form-group col-md-6">
        <input class="form-control" type="text" name="descripcion" id="fecha" value="{{ old('descripcion',$tratamiento->descripcion)}}">
    </div>
</div>

<div class="form-group row">
    <label for="name" class="col-md-4 col-form-label text-md-right">Archivo</label>

    <div class="form-group col-md-8">
        <div class="form-check form-check-inline">
            <input class="form-control" type="file" name="archivo" id="archivo">
        </div>
    </div>
</div>
