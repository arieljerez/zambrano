@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
      <div class="col-md-10">
      <div class="card">
          <div class="card-header">Panel de Control</div>
          <div class="card-body">
          <div class="row">
              <div class="col-md-4">
                <div class="card border-danger" style="max-width: 18rem;">
                  <div class="card-body">
                    <h4 class="card-title">Rechazados</h4>
                    <p class="card-text"><h1>{{ $rechazados }}</h1></p>
                    <a href="{{ route('prodiaba.rechazados') }}" class="btn btn-primary">Ver</a>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="card border-danger mb-3" style="max-width: 18rem;">
                  <div class="card-body">
                    <h4 class="card-title">Vencidos</h4>
                      <p class="card-text"><h1>{{ $vencidos }}</h1></p>
                    <a href="{{ route('prodiaba.vencidos') }}" class="btn btn-primary">Ver</a>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="card border-success" style="max-width: 18rem;">
                  <div class="card-body">
                    <h4 class="card-title">Aprobados</h4>
                    <p class="card-text"><h1>{{$aprobados}}</h1></p>
                    <a href="{{ route('prodiaba.aprobados') }}" class="btn btn-primary">Ver</a>
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
