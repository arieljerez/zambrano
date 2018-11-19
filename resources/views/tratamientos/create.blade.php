@extends('layouts.app')

@section('content')

    @php
        if(!isset($tratamiento)){
         $tratamiento = new App\Models\Tratamiento();
        }
    @endphp
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Nuevo tratamiento) }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('tratamientos.store') }}" aria-label="{{ __('Nuevo tratamientos') }}">
                        @csrf
                        @include('tratamientos.fields')
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                  <i class="fas fa-save"></i> {{ __('Grabar') }}
                                </button>
                                <a href="{{ url('tratamientos') }}" class="btn btn-primary"> <i class="far fa-arrow-alt-circle-left"></i> Volver</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
