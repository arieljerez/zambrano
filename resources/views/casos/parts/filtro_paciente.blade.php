<div class="row">
    <div class="col-md-3 mb-3">DNI:
        <input type="text" name="dni" class="form-control" value="{{ old('dni')}}"/>
    </div>
    <div class="col-md-3 mb-3">
        Apellidos:
        <input type="text" name="apellidos" class="form-control" value="{{ old('apellidos')}}"/>
    </div>
    <div class="col-md-3 mb-3">
        Nombres:
        <input type="text" name="nombres" class="form-control" value="{{ old('nombres')}}"/>
    </div>
    <div class="col-md-3 mb-3">
        <button class="btn btn-primary" type="submit"><i class="fa fa-search"></i> Buscar </button>
    </div>
</div>
