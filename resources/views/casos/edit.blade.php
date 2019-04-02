@extends('layouts.app')

@section('content')

@auth('efector')
    @php
    $solo_lectura = false;
    @endphp
@endauth

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card shadow mb-5 bg-white rounded">
                    <div class="card-header {{ config('prodiaba.casos.class.'.$caso->estado) }} ">
                        <span class="float-left">Caso # {{ $caso->id }} <p>
                      Estado: {{ config('prodiaba.casos.estados.'.$caso->estado) }}
                    </p>
                        </span>
                <span class="float-right">
                    @if ($caso->estado == 'pendiente-formulario')
                      @include('casos.parts.caso_aaprobacion_form')
                    @endif
                </span>

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
                                      {!! Form::model($caso, ['enctype' =>"multipart/form-data", 'method' => 'PUT','route' => ['casos.update', $caso->id], 'aria-label' => __('Actualizar Caso')])  !!}
                                      <fieldset {{ $solo_lectura == true ? 'disabled':''}}>

                                        @include('casos.paciente')

                                        <div class="row"><div class="col-md-12">&nbsp;</div></div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="fas fa-save"></i> {{ __('Grabar') }}
                                                </button>
                                            </div>
                                        </div>
                                        <input type="hidden" name="destino" value="paciente">
                                      </fieldset>
                                        {!! Form::Close() !!}
                                    </div>

                                    <div class="tab-pane fade " id="v-pills-diabetologico" role="tabpanel" aria-labelledby="v-pills-diabetologico-tab">

                                            {!! Form::model($caso, ['enctype' =>"multipart/form-data", 'method' => 'PUT','route' => ['casos.update', $caso->id], 'aria-label' => __('Actualizar Caso')])  !!}

                                            @include('casos.diabetologico.index')

                                            <div class="row"><div class="col-md-12">&nbsp;</div></div>

                                            @if(!$solo_lectura)
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <button type="submit" class="btn btn-primary">
                                                        <i class="fas fa-save"></i> {{ __('Grabar') }}
                                                    </button>
                                                </div>
                                            </div>
                                            <input  type="hidden" name="destino" value="diabetologico">
                                            @endif
                                            {!! Form::Close() !!}

                                    </div>

                                    <div class="tab-pane fade" id="v-pills-oftalmologico" role="tabpanel" aria-labelledby="v-pills-oftalmologico-tab">
                                        {!! Form::model($caso, ['enctype' =>"multipart/form-data", 'method' => 'PUT','route' => ['casos.update', $caso->id], 'aria-label' => __('Actualizar Caso')])  !!}
                                          @include('casos.oftalmologico.index')
                                            <div class="row"><div class="col-md-12">&nbsp;</div></div>
                                            @if(!$solo_lectura)
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <button type="submit" class="btn btn-primary">
                                                            <i class="fas fa-save"></i> {{ __('Grabar') }}
                                                        </button>
                                                    </div>
                                                </div>
                                                <input  type="hidden" name="destino" value="oftalmologico">
                                            @endif
                                        {!! Form::Close() !!}
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
