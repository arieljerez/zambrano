@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card  shadow mb-5 bg-white rounded">
                <div class="card-header bg-success text-white">Iniciar Nuevo Caso </div>

                <div class="card-body">

                  <div class="row">
                    <div class="col-12">
                      <a href="{{ url('casos/buscar_paciente/casos.create') }}" class="btn btn-primary"> <i class="fas fa-search"></i> Buscar Paciente</a>
                    </div>
                    <div class="col-12">
                      &nbsp;
                    </div>
                  </div>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                       {!! Form::model($caso, ['route' => ['casos.store', $caso], 'aria-label' => __('Nuevo Caso')])  !!}
                       <fieldset {{ $solo_lectura == false ? '' : 'disabled' }} d>
                         @include('casos.paciente')
                       </fieldset>

                        <div class="row"><div class="col-md-12">&nbsp;</div></div>
                        <div class="row">
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i> {{ __('Crear') }}
                            </button>
                        </div>
                        {!! Form::Close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
