<div class="form-group row">
    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('DNI') }}</label>

    <div class="col-md-6">
        <input id="dni" type="text" class="form-control{{ $errors->has('dni') ? ' is-invalid' : '' }}" name="dni" value="{{ old('dni',$usuario->dni) }}" required autofocus>

        @if ($errors->has('dni'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('dni') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group row">
    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombres') }}</label>

    <div class="col-md-6">
        <input id="nombres" type="text" class="form-control{{ $errors->has('nombres') ? ' is-invalid' : '' }}" name="nombres" value="{{ old('nombres',$usuario->nombres) }}" required autofocus>

        @if ($errors->has('nombres'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('nombres') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group row">
    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Apellidos') }}</label>

    <div class="col-md-6">
        <input id="apellidos" type="text" class="form-control{{ $errors->has('apellidos') ? ' is-invalid' : '' }}" name="apellidos" value="{{ old('apellidos',$usuario->apellidos) }}" required autofocus>

        @if ($errors->has('apellidos'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('apellidos') }}</strong>
            </span>
        @endif
    </div>
</div>
