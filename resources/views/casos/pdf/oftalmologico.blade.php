@extends('layouts.pdf')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Caso {{ $caso->id }}</div>

                </div>
            </div>
        </div>

        @include('casos.paciente')

        @include('casos.oftalmologico')

    </div>

@endsection
