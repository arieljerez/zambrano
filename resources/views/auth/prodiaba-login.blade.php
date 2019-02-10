@extends('auth.login-layout')

@section('imagen','prodiaba.jpg')
@section('titulo','Acceso Prodiaba')
@section('form')
<form method="POST" action="{{ route('prodiaba.login.submit') }}">
    @csrf

    <div class="form-group row">
        <label for="usuario" class="col-md-4 col-form-label text-md-right">{{ __('Usuario') }}</label>

        <div class="col">
            <input id="usuario" type="text" class="form-control{{ $errors->has('usuario') ? ' is-invalid' : '' }}" name="usuario" value="{{ old('usuario') }}" required autofocus>

            @if ($errors->has('usuario'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('usuario') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group row">
        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Contraseña') }}</label>

        <div class="col">
            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

            @if ($errors->has('password'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-6 offset-md-4">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                <label class="form-check-label" for="remember">
                    {{ __('Recordarme') }}
                </label>
            </div>
        </div>
    </div>

    <div class="form-group row mb-0">
        <div class="col-md-8 offset-md-4">
            <button type="submit" class="btn btn-primary">
                {{ __('Acceder') }}
            </button>

        </div>
    </div>
</form>
@endsection
