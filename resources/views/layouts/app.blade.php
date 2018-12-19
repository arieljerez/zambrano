<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ elixir('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">

    <!-- Styles -->
    <link href="{{ elixir('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/navbar.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
              <nav class="navbar">
               <a class="navbar-brand" href="#">
                 <img src="{{ asset('images/BA-gris.png') }}"  class="d-inline-block align-top" alt="">
               </a>
               <a class="navbar-brand" href="{{ url('/') }}">
                   {{ config('app.name', 'Laravel') }}
               </a>
              </nav>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                  @guest
                  @else

                    <ul class="navbar-nav mr-auto">
                      @auth('efector')
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-cog" aria-hidden="true"></i>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('pacientes.index') }}">Pacientes</a>
                                <a class="dropdown-item" href="{{ route('usuarios.index') }}">Usuarios</a>
                            </div>
                        </li>
                      @endauth
                      <!-- casos -->
                      @auth('web')
                      <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          Casos
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                          <a class="dropdown-item" href="{{ route('casos.pendientes-formulario')}}">Pendientes Formulario</a>
                          <a class="dropdown-item" href="{{ route('casos.pendientes-aprobacion')}}">Pendientes Aprobación</a>
                          <div class="dropdown-divider"></div>
                          <a class="dropdown-item" href="{{ route('casos.aprobados')}}">Aprobados</a>
                          <a class="dropdown-item" href="{{ route('casos.rechazados')}}">Rechazados</a>
                          <div class="dropdown-divider"></div>
                          <a class="dropdown-item" href="{{ route('casos.por_paciente')}}">Por Paciente</a>
                          <a class="dropdown-item" href="{{ route('casos.index')}}">Todos</a>
                        </div>
                      </li>
                      @endauth
                      <!-- Efector -->
                      @auth('efector')
                      <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          Efector
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                          <a class="dropdown-item" href="{{ route('casos.pendientes-formulario')}}">Pendientes Formulario</a>
                          <a class="dropdown-item" href="{{ route('casos.pendientes-aprobacion')}}">Pendientes Aprobación</a>
                          <div class="dropdown-divider"></div>
                          <a class="dropdown-item" href="{{ route('casos.aprobados')}}">Aprobados</a>
                          <a class="dropdown-item" href="{{ route('casos.rechazados')}}">Rechazados</a>
                          <a class="dropdown-item" href="{{ route('casos.vencidos')}}">Vencidos</a>
                          <div class="dropdown-divider"></div>
                          <a class="dropdown-item" href="{{ route('casos.por_paciente')}}">Por Paciente</a>
                          <a class="dropdown-item" href="{{ route('casos.index')}}">Todos</a>
                        </div>
                      </li>
                      @endauth
                      @auth('prodiaba')
                      <!-- prodiaba -->
                      <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          Prodiaba
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                          <a class="dropdown-item" href="{{ route('prodiaba.pendientes')}}">Pendientes</a>
                          <a class="dropdown-item" href="{{ route('prodiaba.aprobados')}}">Aprobados</a>
                          <div class="dropdown-divider"></div>
                          <a class="dropdown-item" href="{{ route('prodiaba.rechazados')}}">Rechazados</a>
                          <a class="dropdown-item" href="{{ route('prodiaba.vencidos')}}">Vencidos</a>
                        </div>
                      </li>

                    @endauth


                    </ul>
                  @endguest
                    <!-- Right Side Of Navbar -->


                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                          <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              Acceder
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                              <a class="dropdown-item" href="{{ route('login') }}">Profesionales</a>
                              <a class="dropdown-item" href="{{ route('efector.login')}}">Prestadores</a>
                              <div class="dropdown-divider"></div>
                              <a class="dropdown-item" href="{{ route('prodiaba.login') }}">Prodiaba</a>
                            </div>
                          </li>
                            <li class="nav-item">
                                @if (Route::has('register'))
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Registrarse') }}</a>
                                @endif
                            </li>
                        @else
                          <li class="nav-item">
                              <a class="nav-link btn btn-success" href="{{ route('casos.create') }}">Iniciar Caso</a>
                          </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::User()->apellido }} , {{ Auth::User()->nombres }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Cerrar sesión') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
