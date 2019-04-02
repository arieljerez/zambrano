@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
      <div class="col-md-8">
      <div class="card">
          <div class="card-header">Panel de Control</div>
          <div class="card-body">
            @if (session('success'))
              <div class="alert alert-success">
                  {{ session('success') }}
              </div>
            @endif
          <div class="row">

              <div class="col-md-4">
                <div class="card border-danger mb-3" style="max-width: 18rem;">
                  <div class="card-body">
                    <h4 class="card-title">Vencidos</h4>
                      <p class="card-text"><h1>{{ $vencidos }}</h1></p>
                    <a href="{{ route('prodiaba.listado.vencido') }}" class="btn btn-primary">Ver</a>
                  </div>
                </div>
              </div>

              <div class="col-md-4">
                <div class="card border-danger mb-3" style="max-width: 18rem;">
                  <div class="card-body">
                    <h4 class="card-title">Tratamientos solicitados</h4>
                      <p class="card-text"><h1>{{ $tratamientos_solicitados }}</h1></p>
                    <a href="{{ route('prodiaba.listado.tratamientos-solicitados') }}" class="btn btn-primary">Ver</a>
                  </div>
                </div>
              </div>

              <div class="col-md-4">
                <div class="card border-info mb-3" style="max-width: 18rem;">
                  <div class="card-body">
                    <h4 class="card-title">Pendientes</h4>
                      <p class="card-text"><h1>{{ $pendientes_aprobacion }}</h1></p>
                    <a href="{{ route('prodiaba.listado.pendiente-aprobacion') }}" class="btn btn-primary">Ver</a>
                  </div>
                </div>
              </div>

            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="card border-danger" style="max-width: 18rem;">
                  <div class="card-body">
                    <h4 class="card-title">Rechazados</h4>
                    <p class="card-text"><h1>{{ $rechazados }}</h1></p>
                    <a href="{{ route('prodiaba.listado.rechazado') }}" class="btn btn-primary">Ver</a>
                  </div>
                </div>
              </div>

              <div class="col-md-6">
                <div class="card border-success" style="max-width: 18rem;">
                  <div class="card-body">
                    <h4 class="card-title">Aprobados</h4>
                    <p class="card-text"><h1>{{$aprobados}}</h1></p>
                    <a href="{{ route('prodiaba.listado.aprobado') }}" class="btn btn-primary">Ver</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection
