@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card shadow mb-5 bg-white rounded">
                <div class="card-header bg-info text-white">Casos Por Paciente</div>
                <div class="card-body">

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="row">
                      <div class="col-12">
                        <a href="{{ url('casos/buscar_paciente/casos.por_paciente') }}" class="btn btn-primary"> <i class="fas fa-search"></i> Buscar Paciente</a>
                      </div>
                      <div class="col-12">
                        &nbsp;
                      </div>
                    </div>

                    <div class="row">
                        @include('casos.table',['accion' => 'ver'])
                    </div>
                    <div class="row">
                      <div class="col">
                        {{ $casos->links() }}
                      </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
