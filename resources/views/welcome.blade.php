@extends('layouts.app')

@section('content')

<!-- Main jumbotron for a primary marketing message or call to action -->
<div class="jumbotron">
  <div class="container">
    <h1 class="display-4">Prodiaba</h1>
    <p>Bienvenido al sistema de Seguimiento Oftalmológico de Prodiaba.</p>
    <p><a class="btn btn-primary btn-lg" href="#" role="button">Leer Más&raquo;</a></p>
  </div>
</div>
<div class="container">
  <!-- Example row of columns -->
  <div class="row">

    <div class="col-md-4">
      <div class="card" style="width: 18rem;">
        <img class="card-img-top" src="{{ asset('images/doctor.jpg') }}" alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title"><h2>Profesionales</h2></h5>
          <p class="card-text">Ingreso de documentacion y formularios electrónicos. Alta de Casos</p>
          <a href="{{ route('login')}}" class="btn btn-primary">Acceder</a>
        </div>
      </div>
    </div>

    <div class="col-md-4">
      <div class="card" style="width: 18rem;">
        <img class="card-img-top" src="{{ asset('images/auditor.png') }}" alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title"><h2>Prestadores</h2></h5>
          <p class="card-text">Ingreso de documentacion y formularios electrónicos. Alta de Casos</p>
          <a href="{{ route('efector.login')}}" class="btn btn-primary">Acceder</a>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card" style="width: 18rem;">
        <img class="card-img-top" src="{{ asset('images/prodiaba.jpg') }}" alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title"><h2>Prodiaba</h2></h5>
          <p class="card-text">Ingreso de documentacion y formularios electrónicos. Alta de Casos</p>
          <a href="{{ route('prodiaba.login')}}" class="btn btn-primary">Acceder</a>
        </div>
      </div>
  </div>

  <hr>
</div>
@endsection
