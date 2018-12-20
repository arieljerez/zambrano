
@php
    if(!isset($tratamiento)){
     $tratamiento = new App\Models\Tratamiento();
     $tratamiento->caso_id = $caso->id;
    }
    $tratamientos = App\Models\Tratamiento::where('caso_id', '=', $caso->id)->get();
@endphp

@auth('efector')
  @php
    $solo_lectura = false;
  @endphp
@endauth
<nav>
    <div class="nav nav-tabs" id="nav-tab2" role="tablist">
        <a class="nav-item nav-link active" id="nav-home-tab2" data-toggle="tab" href="#nav-home2" role="tab" aria-controls="nav-home" aria-selected="true">Listado</a>
        <a class="nav-item nav-link " id="nav-profile-tab2" data-toggle="tab" href="#nav-profile2" role="tab" aria-controls="nav-profile" aria-selected="false">Cargar tratamiento</a>
    </div>
</nav>

<div class="tab-content" id="nav-tabContent">
    <div class="tab-pane fade show active"  id="nav-home2" role="tabpanel" aria-labelledby="nav-home-tab2">
        <div class="card">
            <div class="card-header">{{ __('Tratamientos') }}</div>

            <div class="card-body">

                <table class="table">
                    <thead>
                    <tr>
                        <th> Fecha </th>
                        <th> Evento </th>
                        <th> Descripcion  </th>
                        <th> Archivo </th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($tratamientos as $tratamiento)
                        <tr>
                            <td> <h5>     {{ \Carbon\Carbon::parse($tratamiento->fecha)->format('d/m/Y')  }}       </h5>
                                <small> Registro: {{  \Carbon\Carbon::parse($tratamiento->created_at)->format('d/m/Y H:m') }} </small></td>
                            <td>   {{ $tratamiento->evento }}      </td>
                            <td>       {{ $tratamiento->descripcion }}       </td>
                            <td>
                                @isset ($tratamiento->archivo)
                                    <a href="#" class="btn btn-default"> <i class="fa fa-download"></i> {{ $tratamiento->archivo }}</a>
                                @endisset
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
    <div class="tab-pane fade" id="nav-profile2" role="tabpanel" aria-labelledby="nav-profile-tab2">
        <div class="card">
            <div class="card-header">{{ __('Nuevo tratamiento') }}</div>

            <div class="card-body">
              <fieldset {{ $solo_lectura == true ? 'disabled':''}}>
                <form method="POST" action="{{ route('tratamientos.store') }}" aria-label="{{ __('Nuevo tratamientos') }}">
                    @csrf
                    @include('tratamientos.fields')
                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i> {{ __('Grabar') }}
                            </button>
                    </div>
                </form>
              </fieldset>
            </div>
        </div>
    </div>
</div>
