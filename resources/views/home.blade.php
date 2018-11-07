@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


                </div>
            </div>

            <div class="row">
                  <div class="col-sm-6">
                    <div class="card border-danger" style="max-width: 18rem;">
                      <div class="card-body">
                        <h4 class="card-title">Rechazados</h4>
                        <p class="card-text"><h1>20</h1></p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                      </div>
                    </div>
                  </div>
                    <div class="col-sm-6">
                      <div class="card border-warning mb-3" style="max-width: 18rem;">
                        <div class="card-body">
                          <h4 class="card-title">Pendientes</h4>
                          <p class="card-text">Formulario: 50</p>
                          <p class="card-text">Aprobacion: 45</p>
                          <a href="#" class="btn btn-primary">Go somewhere</a>
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
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                      </div>
                    </div>
                  </div>
                    <div class="col-sm-6">
                      <div class="card border-warning mb-3" style="max-width: 18rem;">
                        <div class="card-body">
                          <h4 class="card-title">Pendientes</h4>
                          <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                          <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                      </div>
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection
