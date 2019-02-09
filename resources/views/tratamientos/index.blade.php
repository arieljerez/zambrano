@auth('efector')
  @php
    $solo_lectura = false;
  @endphp
@endauth
<nav>
    <div class="nav nav-tabs" id="nav-tab2" role="tablist">
        <a class="nav-item nav-link active" id="nav-home-tab2" data-toggle="tab" href="#nav-home2" role="tab" aria-controls="nav-home" aria-selected="true">Listado</a>
        @auth('efector')
          <a class="nav-item nav-link " id="nav-profile-tab2" data-toggle="tab" href="#nav-profile2" role="tab" aria-controls="nav-profile" aria-selected="false">Cargar tratamiento</a>
        @endauth
    </div>
</nav>

<div class="tab-content" id="nav-tabContent">
    <div class="tab-pane fade show active"  id="nav-home2" role="tabpanel" aria-labelledby="nav-home-tab2">
        <div class="card">
            <div class="card-header">{{ __('Tratamientos') }}</div>

            <div class="card-body">
              @include('tratamientos.table')
            </div>
        </div>
    </div>
  @auth('efector')
    <div class="tab-pane fade" id="nav-profile2" role="tabpanel" aria-labelledby="nav-profile-tab2">
        <div class="card">
            <div class="card-header">{{ __('Nuevo tratamiento') }}</div>

            <div class="card-body">
              <fieldset {{ $solo_lectura == true ? 'disabled':''}}>


                <form method="POST" enctype="multipart/form-data" action="{{ route('tratamientos.store') }}" aria-label="{{ __('Nuevo tratamientos') }}">
                    @csrf
                    @include('tratamientos.fields')
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
@endauth
