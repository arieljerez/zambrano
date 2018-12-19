@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card shadow mb-5 bg-white rounded">
                <div class="card-header bg-success text-white">Casos: Aprobados</div>
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

                    <form method="get" action="{{url('prodiaba/aprobados')}}">
                      @include('casos.parts.filtro_paciente')
                    </form>

                    <div class="row">
                        <!-- -->
                        <table class="table">
                            <thead>
                            <tr>
                                <th> Caso</th>
                                <th> Fecha </th>
                                <th> DNI </th>
                                <th> Paciente </th>
                                <th> Fecha Aprobación </th>
                                <th>  </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($casos as $caso)
                                <tr>
                                    <td> <h5>#     {{ $caso->id }}      </h5> </td>
                                    <td>      {{ \Carbon\Carbon::parse($caso->fecha)->format('d/m/Y')  }}    </td>
                                    <td>      {{ $caso->dni }} </td>
                                    <td>      {{ $caso->paciente }}    </td>
                                    <td>      {{\Carbon\Carbon::parse($caso->fecha_aprobacion)->format('d/m/Y')  }} </td>
                                    <td>
                                       <a href="{{ route('prodiaba.edit', $caso->id ) }}" class="btn btn-primary"> <i class="far fa-eye"></i> Ver</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <!-- -->
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
