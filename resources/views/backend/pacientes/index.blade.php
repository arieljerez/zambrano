@extends('layouts.app')

@section('content')
    @component('backend.pacientes.table',['pacientes'=>$pacientes])

    @endcomponent
@endsection
