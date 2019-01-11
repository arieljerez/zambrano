<div class="form-group row">
    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Usuario') }}</label>

    <div class="col-md-6">
        <input id="usuario" type="text" class="form-control{{ $errors->has('usuario') ? ' is-invalid' : '' }}" name="usuario" value="{{ old('usuario',$prodiaba->usuario) }}" required autofocus>

        @if ($errors->has('usuario'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('usuario') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group row">
    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Correo electrónico') }}</label>

    <div class="col-md-6">
        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email',$prodiaba->email) }}" placeholder="nomail@site.app">

        @if ($errors->has('email'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
    </div>
</div>
