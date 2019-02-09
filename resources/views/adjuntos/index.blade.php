<nav>
    <div class="nav nav-tabs" id="nav-tab2" role="tablist">
        <a class="nav-item nav-link active" id="nav-list-tab" data-toggle="tab" href="#nav-list" role="tab" aria-controls="nav-list" aria-selected="true">Listado</a>
        <a class="nav-item nav-link " id="nav-form-tab" data-toggle="tab" href="#nav-form" role="tab" aria-controls="nav-form" aria-selected="false">Cargar</a>
    </div>
</nav>

<div class="tab-content" id="nav-tabContent">
    <div class="tab-pane fade show active"  id="nav-list" role="tabpanel" aria-labelledby="nav-list-tab">
        <div class="card">
            <div class="card-header">{{ __('Adjuntos') }}</div>

            <div class="card-body">
              @include('adjuntos.table')
            </div>
        </div>
    </div>

    <div class="tab-pane fade" id="nav-form" role="tabpanel" aria-labelledby="nav-form-tabs">
        <div class="card">
            <div class="card-header">{{ __('Nuevo adjunto') }}</div>

            <div class="card-body">
              <fieldset>

                <form method="POST" action="{{ route('adjuntos.store') }}" enctype="multipart/form-data" aria-label="{{ __('Nuevo adjuntos') }}">
                    @csrf
                    @include('adjuntos.fields')
                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i> {{ __('Grabar') }}
                            </button>
                        </div>
                    </div>
                </form>

              </fieldset>
            </div>
        </div>
    </div>
</div>
