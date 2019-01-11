@extends('layouts.app')

@section('content')
    @component('backend.pacientes.table',['pacientes'=>$pacientes])
        <button type="button" class="btn btn-dark">Editar</button>
    @endcomponent
@endsection
