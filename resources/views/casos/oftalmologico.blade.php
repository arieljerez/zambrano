
<div class="card">
    <div class="card-header">Control Oftalmológico </div>
    <div class="card-body">

      <nav>
        <div class="nav nav-tabs" id="nav-tab-ofta" role="tablist">
          <a class="nav-item nav-link{{ $caso->oftalmologico_archivo == null ? ' active': '' }}" id="nav-form-ofta-tab" data-toggle="tab" href="#nav-form-ofta" role="tab" aria-controls="nav-form-ofta" aria-selected="true">Por Formulario</a>
          <a class="nav-item nav-link{{ $caso->oftalmologico_archivo == null ? '': ' active' }}" id="nav-arch-ofta-tab" data-toggle="tab" href="#nav-arch-ofta" role="tab" aria-controls="nav-arch-ofta" aria-selected="false">Por Archivo</a>
        </div>
      </nav>
      <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade{{ $caso->oftalmologico_archivo == null ? 'show active': '' }}"  id="nav-form-ofta" role="tabpanel" aria-labelledby="nav-form-ofta-tab">
          @include('casos.oftalmologico.fields')
        </div>
        <div class="tab-pane fade{{ $caso->oftalmologico_archivo == '' ? '': 'show active' }}" id="nav-arch-ofta" role="tabpanel" aria-labelledby="nav-arch-ofta-tab">
          @include('casos.oftalmologico.archivo')
        </div>
      </div>


    </div><!-- end card body-->
</div>
