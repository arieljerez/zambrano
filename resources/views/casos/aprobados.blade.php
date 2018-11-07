@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-success text-white">Casos Aprobados</div>
                <div class="card-body">

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

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
