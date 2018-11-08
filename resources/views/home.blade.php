@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-10">
                    <!-- -->
            <div class="row">
                  <div class="col-sm-6">
                    <div class="card border-danger" style="max-width: 18rem;">
                      <div class="card-body">
                        <h4 class="card-title">Rechazados</h4>
                        <p class="card-text"><h1>20</h1></p>
                        <a href="{{ route('casos.rechazados') }}" class="btn btn-primary">Ver</a>
                      </div>
                    </div>
                  </div>
                    <div class="col-sm-6">
                      <div class="card border-warning mb-3" style="max-width: 18rem;">
                        <div class="card-body">
                          <h4 class="card-title">Pendientes Aprobación</h4>
                            <p class="card-text"><h1>45</h1></p>
                          <a href="#" class="btn btn-primary">Ver</a>
                        </div>
                      </div>
                    </div>
            </div>
            <div class="row">
                  <div class="col-sm-6">
                    <div class="card border-success" style="max-width: 18rem;">
                      <div class="card-body">
                        <h4 class="card-title">Aprobados</h4>
                        <p class="card-text"><h1>260</h1></p>
                        <a href="{{ route('casos.aprobados') }}" class="btn btn-primary">Ver</a>
                      </div>
                    </div>
                  </div>
                    <div class="col-sm-6">
                      <div class="card border-primary mb-3" style="max-width: 18rem;">
                        <div class="card-body">
                          <h4 class="card-title">Pendientes Formulario</h4>
                            <p class="card-text"><h1>75</h1></p>
                          <a href="#" class="btn btn-primary">IR</a>
                        </div>
                      </div>
                    </div>
            </div>
                    <!-- -->
        </div>
    </div>
</div>
@endsection
