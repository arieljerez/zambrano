@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Casos</div>
                <div class="card-body">

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="row">
                     <div class="col-md-6 mb-3">
                       <a href="{{url('casos/create')}}" class="btn btn-primary"><i class="fas fa-plus"></i> Nuevo Caso</a>
                     </div>
                   </div>

                    <div class="row">
                      <table class="table">
                        <thead>
                          <tr>
                            <th> Caso</th>
                            <th> Fecha </th>
                            <th> Paciente </th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($casos as $caso)
                          <tr>
                            <td>      {{ $caso->id }}       </td>
                            <td>      {{ $caso->fecha }}    </td>
                            <td>      {{ $caso->paciente }}    </td>
                            <td>         <a href="{{ route('casos.edit', $caso->id ) }}" class="btn btn-primary"> <i class="far fa-save"></i> Editar</a>
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
