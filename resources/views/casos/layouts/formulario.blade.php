@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-12">
                <span class="float-right">
                    @Auth('web')      
                        @if ($caso->estado == 'pendiente_formulario')
                            @include('casos.parts.caso_aaprobacion_form')
                        @endif
                    @endauth
                </span>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card shadow mb-5 bg-white rounded">
                <div class="card-header {{ config('prodiaba.casos.class.'.$caso->estado) }} ">
                    @section('form-header')
                        <span class="float-left"><h4><strong>Caso # </strong>{{ $caso->id }} </h4>
                            <p><strong>Estado: </strong> {{ config('prodiaba.casos.estados.'.$caso->estado) }}<br/>
                                @isset($caso->diabetologo)
                                   <strong> Diabetologo: </strong> {{$caso->diabetologo->apellidos}}, {{$caso->diabetologo->nombres }} <br/>
                                @endisset

                                @isset($caso->oftalmologo)
                                  <strong> Oftalmologo: </strong>   {{$caso->oftalmologo->apellidos}}, {{$caso->oftalmologo->nombres }}
                                @endisset
                            </p>
                        </span>
                    @show 
                </div>

                @include('flash-message')

                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-2 col-lg-2">
                            @include('casos.parts.edit_form_nav_pills')
                        </div>

                        <div class="col-12 col-sm-12 col-md-10 col-lg-10">
                            <div class="tab-content" id="v-pills-tabContent">

                                <div class="tab-pane fade show active" id="v-pills-paciente" role="tabpanel" aria-labelledby="v-pills-paciente-tab">
                                    @yield('paciente')
                                </div>

                                <div class="tab-pane fade " id="v-pills-diabetologico" role="tabpanel" aria-labelledby="v-pills-diabetologico-tab">
                                    @yield('diabetologico')
                                </div>

                                <div class="tab-pane fade" id="v-pills-oftalmologico" role="tabpanel" aria-labelledby="v-pills-oftalmologico-tab">
                                    @yield('oftalmologico')
                                </div>
                                <div class="tab-pane fade" id="v-pills-bitacora" role="tabpanel" aria-labelledby="v-pills-bitacora-tab">@include('bitacora.index')</div>
                                <div class="tab-pane fade" id="v-pills-tratamientos" role="tabpanel" aria-labelledby="v-pills-tratamientos-tab">@include('tratamientos.index')</div>
                                <div class="tab-pane fade" id="v-pills-adjuntos" role="tabpanel" aria-labelledby="v-pills-adjuntos-tab">@include('adjuntos.index')</div>
                            </div>
                        </div> <!-- end col-10-->

                    </div>  <!-- end row-body -->
                </div> <!-- end card-body -->
                <div class="card-footer">
                    <a href="{{ url()->previous() }}" class="btn btn-primary"> <i class="far fa-arrow-alt-circle-left"></i> Volver</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection