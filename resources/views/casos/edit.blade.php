@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Caso # {{ $caso->id }}


                    @if ($caso->estado == 'pendiente_formulario')

                        {!! Form::model($caso, ['method' => 'PUT','route' => ['casos.update', $caso->id], 'aria-label' => __('Actualizar Caso')])  !!}
                            <input type="hidden" name="cambiar_estado" value="pendiente_formulario">
                            <button type="submit" class="btn btn-primary float-right">
                                A aprobación <i class="fa fa-step-forward" aria-hidden="true"></i>
                            </button>
                        {!! Form::Close() !!}

                    @endif

                    @if ($caso->estado == 'pendiente_aprobacion')

                        {!! Form::model($caso, ['method' => 'PUT','route' => ['casos.update', $caso->id], 'aria-label' => __('Actualizar Caso')])  !!}
                        <input type="hidden" name="cambiar_estado" value="aprobado">
                        <button type="submit" class="btn btn-success float-right">
                            Aprobar <i class="fa fa-check" aria-hidden="true"></i>
                        </button>
                        {!! Form::Close() !!}

                        {!! Form::model($caso, ['method' => 'PUT','route' => ['casos.update', $caso->id], 'aria-label' => __('Actualizar Caso')])  !!}
                        <input type="hidden" name="cambiar_estado" value="rechazado">
                        <button type="submit" class="btn btn-danger float-right">
                            Rechazar <i class="fa fa-times" aria-hidden="true"></i>
                        </button>
                        {!! Form::Close() !!}

                    @endif

                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="row">
                            <div class="col-2">
                                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                    <a class="nav-link" id="v-pills-paciente-tab" data-toggle="pill" href="#v-pills-paciente" role="tab" aria-controls="v-pills-home" aria-selected="true">Paciente</a>
                                    <a class="nav-link active" id="v-pills-diabetologico-tab" data-toggle="pill" href="#v-pills-diabetologico" role="tab" aria-controls="v-pills-diabetologico" aria-selected="false">Diabetológico</a>
                                    <a class="nav-link" id="v-pills-oftalmologico-tab" data-toggle="pill" href="#v-pills-oftalmologico" role="tab" aria-controls="v-pills-oftalmologico" aria-selected="false">Oftalmológico</a>
                                    <a class="nav-link" id="v-pills-bitacora-tab" data-toggle="pill" href="#v-pills-bitacora" role="tab" aria-controls="v-pills-bitacora" aria-selected="false">Bitácora</a>
                                    <a class="nav-link" id="v-pills-tratamientos-tab" data-toggle="pill" href="#v-pills-tratamientos" role="tab" aria-controls="v-pills-tratamientos" aria-selected="false">Tratamientos</a>
                                </div>
                            </div>
                            <div class="col-10">
                                <div class="tab-content" id="v-pills-tabContent">
                                    <div class="tab-pane fade" id="v-pills-paciente" role="tabpanel" aria-labelledby="v-pills-paciente-tab"> @include('casos.paciente')</div>
                                    <div class="tab-pane fade show active" id="v-pills-diabetologico" role="tabpanel" aria-labelledby="v-pills-diabetologico-tab">
                                        {!! Form::model($caso, ['enctype' =>"multipart/form-data", 'method' => 'PUT','route' => ['casos.update', $caso->id], 'aria-label' => __('Actualizar Caso')])  !!}
                                        <fieldset {{ $solo_lectura == true ? 'disabled':''}}>

                                        @include('casos.diabetologico')

                                        <div class="row"><div class="col-md-12">&nbsp;</div></div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="fas fa-save"></i> {{ __('Grabar') }}
                                                </button>
                                            </div>
                                        </div>
                                        <input  type="hidden" name="destino" value="diabetologico">
                                        </fieldset>

                                        {!! Form::Close() !!}
                                    </div>
                                    <div class="tab-pane fade" id="v-pills-oftalmologico" role="tabpanel" aria-labelledby="v-pills-oftalmologico-tab">
                                        {!! Form::model($caso, ['enctype' =>"multipart/form-data", 'method' => 'PUT','route' => ['casos.update', $caso->id], 'aria-label' => __('Actualizar Caso')])  !!}
                                        <fieldset {{ $solo_lectura == true ? 'disabled':''}}>
                                          @include('casos.oftalmologico')
                                          <div class="row"><div class="col-md-12">&nbsp;</div></div>
                                          <div class="row">
                                              <div class="col-md-6">
                                                  <button type="submit" class="btn btn-primary">
                                                      <i class="fas fa-save"></i> {{ __('Grabar') }}
                                                  </button>
                                              </div>
                                          </div>
                                          <input  type="hidden" name="destino" value="oftalmologico">
                              
                                          </fieldset>
                                        {!! Form::Close() !!}
                                     </div>
                                    <div class="tab-pane fade" id="v-pills-bitacora" role="tabpanel" aria-labelledby="v-pills-bitacora-tab">@include('casos.bitacora')</div>
                                    <div class="tab-pane fade" id="v-pills-tratamientos" role="tabpanel" aria-labelledby="v-pills-tratamientos-tab">@include('casos.tratamientos')</div>
                                </div>
                            </div>
                        </div>
                        <div class="row"><div class="col-md-12">&nbsp;</div></div>
                        <div class="row">
                            <div class="col-md-6">
                                <a href="{{ url('casos') }}" class="btn btn-primary"> <i class="far fa-arrow-alt-circle-left"></i> Volver</a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
