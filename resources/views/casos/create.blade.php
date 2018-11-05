@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Iniciar Nuevo Caso</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                       {!! Form::model($caso, ['route' => ['casos.store', $caso], 'aria-label' => __('Nuevo Caso')])  !!}

                        @include('casos.paciente')
                        <div class="row"><div class="col-md-12">&nbsp;</div></div>
                        <div class="row">
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i> {{ __('Crear') }}
                            </button>
                            <a href="{{ url('casos') }}" class="btn btn-primary"> <i class="far fa-arrow-alt-circle-left"></i> Volver</a>
                        </div>
                        {!! Form::Close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
