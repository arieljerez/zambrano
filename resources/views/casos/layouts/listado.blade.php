@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card shadow mb-5 rounded">
                <div class="card-header @yield('card_class')">Casos: @yield('titulo_estado')</div>
                <div class="card-body">

                    @include('flash-message')

                    <div class="row">
                        <div class="col-12">
                            @yield('filtros')
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            @section('table')
                    
                            @show
                        </div>
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
