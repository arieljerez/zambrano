@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Casos</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                       {!! Form::model($caso, ['route' => ['casos.store', $caso], 'aria-label' => __('Nuevo Caso')])  !!}

                        <div class="row">
                            <div class="col-2">
                                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                    <a class="nav-link" id="v-pills-paciente-tab" data-toggle="pill" href="#v-pills-paciente" role="tab" aria-controls="v-pills-home" aria-selected="true">Paciente</a>
                                    <a class="nav-link" id="v-pills-diabetologico-tab" data-toggle="pill" href="#v-pills-diabetologico" role="tab" aria-controls="v-pills-diabetologico" aria-selected="false">Diabetológico</a>
                                    <a class="nav-link active" id="v-pills-oftalmologico-tab" data-toggle="pill" href="#v-pills-oftalmologico" role="tab" aria-controls="v-pills-oftalmologico" aria-selected="false">Oftalmológico</a>
                                    <a class="nav-link" id="v-pills-bitacora-tab" data-toggle="pill" href="#v-pills-bitacora" role="tab" aria-controls="v-pills-bitacora" aria-selected="false">Bitácora</a>
                                </div>
                            </div>
                            <div class="col-10">
                                <div class="tab-content" id="v-pills-tabContent">
                                    <div class="tab-pane fade" id="v-pills-paciente" role="tabpanel" aria-labelledby="v-pills-paciente-tab"> @include('casos.paciente')</div>
                                    <div class="tab-pane fade" id="v-pills-diabetologico" role="tabpanel" aria-labelledby="v-pills-diabetologico-tab"> @include('casos.diabetologico')</div>
                                    <div class="tab-pane fade show active" id="v-pills-oftalmologico" role="tabpanel" aria-labelledby="v-pills-oftalmologico-tab"> @include('casos.oftalmologico')</div>
                                    <div class="tab-pane fade" id="v-pills-bitacora" role="tabpanel" aria-labelledby="v-pills-bitacora-tab">@include('casos.bitacora')</div>
                                </div>
                            </div>
                        </div>
                        <div class="row"><div class="col-md-12">&nbsp;</div></div>
                        <div class="row">
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save"></i> {{ __('Crear') }}
                                </button>
                                <a href="{{ url('casos') }}" class="btn btn-primary"> <i class="far fa-arrow-alt-circle-left"></i> Volver</a>
                                <a href="{{ url('casos') }}" class="btn btn-primary"> <i class="far fa-arrow-alt-circle-down"></i> PDF Diabetologico</a>
                                <a href="{{ url('casos') }}" class="btn btn-primary"> <i class="far fa-arrow-alt-circle-down"></i> PDF Oftaltologico</a>
                            </div>
                        </div>
                        {!! Form::Close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
