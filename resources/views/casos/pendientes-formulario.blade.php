@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Casos: Pendiente Formulario</div>
                <div class="card-body">

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="row">
                     <div class="col-md-6 mb-3">
                       <a href="{{url('casos/create')}}" class="btn btn-primary"><i class="fas fa-plus"></i> Nuevo Caso</a>
                     </div>
                   </div>

                    <div class="row">
                        @include('casos.table')
                    </div>
                    <div class="row">
                      <div class="col">
                        {{ $casos->links() }}
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
