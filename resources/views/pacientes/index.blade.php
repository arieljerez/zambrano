@extends('layouts.app')

@section('content')
    @component('pacientes.table',['pacientes'=>$pacientes])
        <button type="button" class="btn btn-dark">Editar</button>
    @endcomponent
@endsection
