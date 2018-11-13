
<div class="card">
    <div class="card-header">Control Oftalmológico </div>
    <div class="card-body">

      <nav>
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
          <a class="nav-item nav-link{{ $caso->oftalmologico_archivo == null ? ' active': '' }}" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Por Formulario</a>
          <a class="nav-item nav-link{{ $caso->oftalmologico_archivo == null ? '': ' active' }}" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Por Archivo</a>
        </div>
      </nav>
      <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade{{ $caso->oftalmologico_archivo == null ? 'show active': '' }}"  id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
          @include('casos.oftalmologico.fields')
        </div>
        <div class="tab-pane fade{{ $caso->oftalmologico_archivo == '' ? '': 'show active' }}" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
          @include('casos.oftalmologico.archivo')
        </div>
      </div>


    </div><!-- end card body-->
</div>
