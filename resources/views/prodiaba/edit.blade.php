@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Caso # {{ $caso->id }}





                    </div>
                    @if ($caso->estado == 'pendiente_aprobacion')

                    <!-- Button trigger modal -->
                    <div class="form-inline">
                      <button type="button" class="btn btn-danger col-6" data-toggle="modal" data-target="#rechazarModal">
                        Rechazar <i class="fa fa-times" aria-hidden="true"></i>
                      </button>
                      <button type="button" class="btn btn-success col-6 " data-toggle="modal" data-target="#aprobarModal">
                        Aprobar <i class="fa fa-check" aria-hidden="true"></i>
                      </button>
                    </div>

                    <!-- Modal Aprobar-->
                    <div class="modal fade" id="aprobarModal" tabindex="-1" role="dialog" aria-labelledby="aprobarModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        {!! Form::model($caso, ['method' => 'POST','route' => ['prodiaba.aprobar'], 'aria-label' => __('Aprobar Caso')])  !!}
                        <div class="modal-content">
                          <div class="modal-header text-white bg-success mb-3">
                            <h5 class="modal-title" id="exampleModalLabel">Aprobar</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <input type="hidden" name="cambiar_estado" value="aprobado">
                            <div class="form-group">
                                <textarea name="texto_aprobacion" class="form-control col-10" required></textarea>
                            </div>
                            <div class="form-group">
                                <input type="date" name="fecha_aprobacion" class="form-control col-6" required>
                            </div>
                          </div>
                          <div class="modal-footer">
                            <input type="hidden" name="caso_id" value="{{ $caso->id}}" />
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-success">Aprobar <i class="fa fa-check" aria-hidden="true"></i></button>
                          </div>
                        </div>
                        {!! Form::Close() !!}
                      </div>
                    </div>

                    <!-- Modal Aprobar-->
                    <div class="modal fade" id="rechazarModal" tabindex="-1" role="dialog" aria-labelledby="rechazarModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        {!! Form::model($caso, ['method' => 'POST','route' => ['prodiaba.rechazar'], 'aria-label' => __('Actualizar Caso')])  !!}
                        <div class="modal-content">
                          <div class="modal-header text-white bg-danger mb-3">
                            <h5 class="modal-title" id="exampleModalLabel">Rechazar</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <input type="hidden" name="cambiar_estado" value="rechazado">
                            <div class="form-group">
                                <textarea name="texto_aprobacion" class="form-control col-10" required></textarea>
                            </div>
                            <div class="form-group">
                                <input type="date" name="fecha_aprobacion" class="form-control col-6" required>
                            </div>
                          </div>
                          <div class="modal-footer">
                            <input type="hidden" name="caso_id" value="{{ $caso->id}}" />
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-danger">Rechazar <i class="fa fa-times" aria-hidden="true"></i></button>
                          </div>
                        </div>
                        {!! Form::Close() !!}
                      </div>
                    </div>
                    @endif
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
                                </div>
                            </div>
                            <div class="col-10">
                                <div class="tab-content" id="v-pills-tabContent">
                                    <div class="tab-pane fade" id="v-pills-paciente" role="tabpanel" aria-labelledby="v-pills-paciente-tab">
                                        <fieldset disabled>
                                           @include('casos.paciente')
                                        </fieldset>
                                      </div>
                                    <div class="tab-pane fade show active" id="v-pills-diabetologico" role="tabpanel" aria-labelledby="v-pills-diabetologico-tab">
                                        <fieldset {{ $solo_lectura == true ? 'disabled':''}}>
                                        @include('casos.diabetologico')
                                        <div class="row"><div class="col-md-12">&nbsp;</div></div>
                                    </div>
                                    <div class="tab-pane fade" id="v-pills-oftalmologico" role="tabpanel" aria-labelledby="v-pills-oftalmologico-tab">
                                        <fieldset {{ $solo_lectura == true ? 'disabled':''}}>
                                          @include('casos.oftalmologico')
                                          <div class="row"><div class="col-md-12">&nbsp;</div></div>
                                        </fieldset>
                                     </div>
                                    <div class="tab-pane fade" id="v-pills-bitacora" role="tabpanel" aria-labelledby="v-pills-bitacora-tab">@include('casos.bitacora')</div>
                                </div>
                            </div>
                        </div>
                        <div class="row"><div class="col-md-12">&nbsp;</div></div>
                        <div class="row">
                            <div class="col-md-6">
                                <a href="{{ url('prodiaba/pendientes') }}" class="btn btn-primary"> <i class="far fa-arrow-alt-circle-left"></i> Volver</a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
