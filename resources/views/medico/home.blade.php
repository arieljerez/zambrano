@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
      <div class="col-md-8">
      <div class="card">
          <div class="card-header">Panel de Control</div>
          <div class="card-body">
          <div class="row">

              <div class="col-sm-6">
                  <div class="card border-primary mb-3" style="max-width: 18rem;">
                    <div class="card-body">
                      <h4 class="card-title">Pendientes Formulario</h4>
                        <p class="card-text"><h5>{{ $pendientes_formulario }}</h5></p>

                        <p class="card-text"><h6>Mis Casos: {{ \App\Models\Caso::Propios()->PendienteFormulario()->count() }}</h6></p>
                      <a href="{{ route('medico.listado.pendiente-formulario') }}" class="btn btn-primary">Ver</a>
                    </div>
                  </div>
                </div>
              <div class="col-md-6">
                <div class="card border-warning mb-3" style="max-width: 18rem;">
                  <div class="card-body">
                    <h4 class="card-title">Pendientes Aprobación</h4>
                      <p class="card-text"><h1>{{ $pendientes_aprobacion }}</h1></p>
                    <a href="{{ route('medico.listado.pendiente-aprobacion') }}" class="btn btn-primary">Ver</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
                  <div class="col-sm-6">
                    <div class="card border-success" style="max-width: 18rem;">
                      <div class="card-body">
                        <h4 class="card-title">Aprobados</h4>
                        <p class="card-text"><h1>{{$aprobados}}</h1></p>
                        <a href="{{ route('medico.listado.aprobado') }}" class="btn btn-primary">Ver</a>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                      <div class="card border-danger" style="max-width: 18rem;">
                        <div class="card-body">
                          <h4 class="card-title">Rechazados</h4>
                          <p class="card-text"><h1>{{ $rechazados }}</h1></p>
                          <a href="{{ route('medico.listado.rechazado') }}" class="btn btn-primary">Ver</a>
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
