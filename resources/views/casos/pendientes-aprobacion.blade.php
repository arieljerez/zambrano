@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Casos: Pendientes de aprobacion</div>
                <div class="card-body">

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

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