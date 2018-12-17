@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card shadow mb-5 bg-white rounded">
                <div class="card-header bg-warning text-black">Casos: Pendiente Formulario</div>
                <div class="card-body">

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="get" action="{{url('casos/pendientes-formulario')}}">
                      @include('casos.parts.filtro_paciente')
                    </form>

                    <div class="row">
                      @auth('web')
                        @include('casos.table',['accion' => 'editar'])
                      @endauth

                      @auth('efector')
                        @include('casos.table',['accion' => 'ver'])
                      @endauth
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
