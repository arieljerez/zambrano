@extends('casos.layouts.formulario')

@section('pos-form-header')
    @if ($caso->estado == 'pendiente-aprobacion')
        @include('prodiaba.parts.aprobar_form')
    @endif

    @if ($caso->estado == 'vencido')
        @include('prodiaba.parts.reaprobar_form')
    @endif    
@endsection

@section('paciente')
    <fieldset disabled="disabled">
        @include('casos.paciente')
    </fieldset> 
@endsection

@section('diabetologico')
<fieldset disabled="disabled">
    @include('casos.diabetologico.index')
</fieldset>

@endsection

@section('oftalmologico')
<fieldset disabled="disabled">
    @include('casos.oftalmologico.index')
</fieldset>
@endsection