@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
              <div class="card shadow mb-5 bg-white rounded">
                  <div class="card-header {{ config('prodiaba.casos.class.'.$caso->estado) }} ">Caso # {{ $caso->id }} <p>
                    Estado: {{ config('prodiaba.casos.estados.'.$caso->estado) }}
                  </p>
                    </div>
                    @if ($caso->estado == 'pendiente_aprobacion')
                        @include('prodiaba.parts.aprobar_form')
                    @endif

                    @if ($caso->estado == 'vencido')
                        @include('prodiaba.parts.reaprobar_form')
                    @endif
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="row">
                            <div class="col-12 col-md-2">
                                @include('casos.parts.edit_form_nav_pills')
                            </div>
                            <div class="col-12 col-md-10">
                                <div class="tab-content" id="v-pills-tabContent">
                                    <div class="tab-pane fade" id="v-pills-paciente" role="tabpanel" aria-labelledby="v-pills-paciente-tab">
                                        <fieldset disabled>
                                           @include('casos.paciente')
                                        </fieldset>
                                      </div>
                                    <div class="tab-pane fade show active" id="v-pills-diabetologico" role="tabpanel" aria-labelledby="v-pills-diabetologico-tab">
                                        @include('casos.diabetologico.index')
                                    </div>
                                    <div class="tab-pane fade" id="v-pills-oftalmologico" role="tabpanel" aria-labelledby="v-pills-oftalmologico-tab">
                                          @include('casos.oftalmologico.index')
                                     </div>
                                    <div class="tab-pane fade" id="v-pills-bitacora" role="tabpanel" aria-labelledby="v-pills-bitacora-tab">@include('bitacora.index')</div>
                                    <div class="tab-pane fade" id="v-pills-tratamientos" role="tabpanel" aria-labelledby="v-pills-tratamientos-tab">@include('tratamientos.index')</div>
                                    <div class="tab-pane fade" id="v-pills-adjuntos" role="tabpanel" aria-labelledby="v-pills-adjuntos-tab">@include('adjuntos.index')</div>
                                </div>
                            </div>
                        </div>
                        <div class="row"><div class="col-md-12">&nbsp;</div></div>
                        <div class="row">
                            <div class="col-md-6">
                              @if ($caso->estado == 'vencido')
                                <a href="{{ url('prodiaba/vencidos') }}" class="btn btn-primary"> <i class="far fa-arrow-alt-circle-left"></i> Volver</a>
                              @endif
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
