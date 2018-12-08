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
                      <div class="col-6">
                        <form method="post" action=" {{ route('casos.por_paciente')}}">
                          <div class="form-inline">
                            <label class="form-label col-2">DNI:</label>
                              <input type="text" class="form-control col-5" name="dni"/>
                              <a href="{{ url('casos') }}" class="btn btn-primary"> <i class="fas fa-search"></i> Buscar Paciente</a>
                          </div>
                        </form>
                      </div>
                    </div>

                    <div class="clearfix"> </div>
                    <div class="row">
                      @include('casos.table',['accion' => 'ver'])
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
