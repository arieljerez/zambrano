@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Actualizar Usuario') }}</div>

                <div class="card-body">
                  <form action="{!! route('usuarios.update',[$usuario->id]) !!}" method="post">
                        @method('PATCH')
                        @csrf
                        @include('backend.usuarios.fields')
                        <div class="form-group row">
                            <label for="matricula" class="col-sm-4 col-form-label text-md-right">{{ __('Matricula') }}</label>

                            <div class="col-md-6">
                                <input id="matricula" type="text" class="form-control{{ $errors->has('matricula') ? ' is-invalid' : '' }}" name="matricula" value="{{ old('matricula',$usuario->matricula) }}" autofocus>

                                @if ($errors->has('matricula'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('matricula') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                  <i class="fas fa-save"></i> {{ __('Actualizar') }}
                                </button>
                                <a href="{{ url('usuarios') }}" class="btn btn-primary"> <i class="far fa-arrow-alt-circle-left"></i> Volver</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
