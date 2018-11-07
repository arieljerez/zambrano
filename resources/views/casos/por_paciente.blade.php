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
                      <table class="table">
                        <thead>
                          <tr>
                            <th> #</th>
                            <th> Fecha </th>
                            <th> Paciente </th>
                            <th> &nbsp; </th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($casos as $caso)
                          <tr>
                            <td>  <h4>    {{ $caso->id }}      </h4> </td>
                            <td>      {{ $caso->fecha }}    </td>
                            <td>      {{ $caso->paciente }}    </td>
                            <td>         <a href="{{ route('casos.show', $caso->id ) }}" class="btn btn-light"> <i class="far fa-eye"></i> Ver</a>
                       </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
