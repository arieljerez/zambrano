<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
   
    @yield('scripts')
    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">

    <!-- Styles -->
    <link href="{{ elixir('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/navbar.css') }}" rel="stylesheet">
    @yield('css')
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
              <nav class="navbar">
               <a class="navbar-brand" href="#">
                 <img src="{{ asset('images/BA-gris.png') }}"  class="d-inline-block align-top" alt="">
               </a>
               @auth('web')
               <a class="navbar-brand" href="{{ url('/home') }}">
                   {{ config('app.name', 'Laravel') }}
               </a>
               @endauth
               @auth('prodiaba')
               <a class="navbar-brand" href="{{ url('/prodiaba/home') }}">
                   {{ config('app.name', 'Laravel') }}
               </a>
               @endauth
               @auth('efector')
               <a class="navbar-brand" href="{{ url('/efector/home') }}">
                   {{ config('app.name', 'Laravel') }}
               </a>
               @endauth
              </nav>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->

                  @guest


                  @else

                    <ul class="navbar-nav mr-auto">
                      @include('layouts.menu')
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
                        @else
                          @auth('web')
                            <li class="nav-item">
                                <a class="nav-link btn btn-success" href="{{ route('medico.create') }}">Iniciar Caso</a>
                            </li>
                          @endauth
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                  @auth('web')
                                    {{ Auth::User()->apellidos }} , {{ Auth::User()->nombres }} <span class="caret"></span>
                                  @endauth

                                  @auth('efector')
                                    {{ Auth::User()->usuario }} <span class="caret"></span>
                                  @endauth

                                  @auth('prodiaba')
                                    {{ Auth::User()->usuario }} <span class="caret"></span>
                                  @endauth
                                </a>
                                @auth('web')
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('medico.logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Cerrar sesión') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('medico.logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                                @endauth

                                @auth('efector')
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('efector.logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Cerrar sesión') }}
                                    </a>
                                    <a class="dropdown-item" href="{{ route('prodiaba.cambiarclave') }}" style="background-color: #051a30; color:white">
                                        {{ __('Cambiar Contraseña') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('efector.logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                                @endauth

                                @auth('prodiaba')
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('prodiaba.logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Cerrar sesión') }}
                                    </a>
                                    <a class="dropdown-item" href="{{ route('prodiaba.cambiarclave') }}" style="background-color: #051a30; color:white">
                                        {{ __('Cambiar Contraseña') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('prodiaba.logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                                @endauth
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

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

@yield('js')

</html>
