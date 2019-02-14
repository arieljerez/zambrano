<div class="form-group row">
    <label for="name" class="col-md-4 col-form-label text-md-right">Caso</label>

    <div class="form-group col-md-4">
        <input class="form-control" type="input" name="caso_id" id="caso_id" value="{{ old('caso_id',$caso->id)}}" readonly>
    </div>
</div>

<div class="form-group row">
    <label for="name" class="col-md-4 col-form-label text-md-right">Fecha</label>

    <div class="form-group col-md-4">
      <input class="form-control" type="date" name="fecha" id="fecha" value="{{ old('fecha')}}" required>
    </div>
</div>

<div class="form-group row">
    <label for="name" class="col-md-4 col-form-label text-md-right">Evento</label>
    <div class="form-group col-md-4">
      {{ Form::Select('evento', config('prodiaba.tratamientos.eventos'),null,['placeholder' => 'Seleccione una opción', 'class' => 'form-control', 'required'] ) }}
    </div>
</div>

<div class="form-group row">
    <label for="name" class="col-md-4 col-form-label text-md-right">Descripcion</label>

    <div class="form-group col-md-6">
        {{ Form::textarea('descripcion',null,['placeholder' => 'Complete el campo', 'class' => 'form-control', 'required'])}}
    </div>
</div>

<input class="form-control" type="hidden" name="archivo" id="archivo">

<!--
<div class="form-group row">
    <label for="name" class="col-md-4 col-form-label text-md-right">Archivo</label>

    <div class="form-group col-md-8">
        <div class="form-check form-check-inline">
            <input class="form-control" type="file" name="archivo" id="archivo" required>
        </div>
    </div>
</div>
-->
