@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card shadow mb-5 bg-white rounded">
                <div class="card-header bg-default text-black">Tratamientos Solicitados</div>
                <div class="card-body">

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if (session('wrongs'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('wrongs') }}
                        </div>
                    @endif

                    <form method="get" action="{{url('prodiaba/tratamientos-solicitados')}}">
                      @include('casos.parts.filtro_paciente')
                    </form>

                    <div class="row">
                        @include('prodiaba.table')
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
