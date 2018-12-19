
<div class="card">
    <div class="card-header">Control Diabetológico</div>
    <div class="card-body">
      <nav>
        <div class="nav nav-tabs" id="nav-tab-diabe" role="tablist">
          <a class="nav-item nav-link{{ isset($caso->diabetologico_archivo) ? ' ': ' active' }}" id="nav-form-diabe-tab" data-toggle="tab" href="#nav-form-diabe" role="tab" aria-controls="nav-form-diabe" aria-selected="true">Por Formulario</a>
          <a class="nav-item nav-link{{ isset($caso->diabetologico_archivo) ? '  active': '' }}" id="nav-arch-diabe-tab" data-toggle="tab" href="#nav-arch-diabe" role="tab" aria-controls="nav-arch-diabe" aria-selected="false">Por Archivo</a>
        </div>
      </nav>
      <div class="tab-content" id="nav-tabContent">
        @unless($caso->diabetologico_archivo)
        <div class="tab-pane fade{{ isset($caso->diabetologico_archivo) ? ' ': 'show active' }}"  id="nav-form-diabe" role="tabpanel" aria-labelledby="nav-form-diabe-tab">
            @include('casos.diabetologico.fields')
        </div>
        @endunless
        <div class="tab-pane fade{{ isset($caso->diabetologico_archivo)  ? ' show active': '' }}" id="nav-arch-diabe" role="tabpanel" aria-labelledby="nav-arch-diabe-tab">
          @include('casos.diabetologico.archivo')
        </div>
      </div>

    </div>
</div>
