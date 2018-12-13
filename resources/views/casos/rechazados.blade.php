@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card shadow mb-5 bg-white rounded">
                <div class="card-header bg-danger text-white">Casos Rechazados</div>
                <div class="card-body">

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="get" action="{{url('casos/rechazados')}}">
                      @include('casos.parts.filtro_paciente')
                    </form>

                    <div class="row">
                        @include('casos.table',['accion'=>'ver'])
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
