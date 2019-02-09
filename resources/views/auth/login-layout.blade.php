@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="">
            <div class="card" >
                <div class="card-header">@yield('titulo')</div>
                  <div class="card-body">
                      <div class="row">
                        <div class="col-4">
                           <img style="width: 300px; height: 200px;" class="card-img-top img-thumbnail rounded " src="{{ asset('images/') }}/@yield('imagen')" alt="Card image cap">
                        </div>
                        <div class="col">
                            @yield('form')
                        </div>
                      </div>
                      <div class="row mb-0">
                          <script>
                              grecaptcha.ready(function() {
                                  grecaptcha.execute('6LfNsnQUAAAAAFIWElo2XIywsl5BIO2Tu3PjF7IP', {action: 'login'})
                                      .then(function(token) {
                                      ...
                                      });
                              });
                          </script>
                      </div>
                  </div>
            </div>
        </div>
    </div>
</div>
<script src='https://www.google.com/recaptcha/api.js?render=6LfNsnQUAAAAAFIWElo2XIywsl5BIO2Tu3PjF7IP'></script>
@endsection
