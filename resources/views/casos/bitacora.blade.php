
<div class="card">
    <div class="card-header">Bitácora </div>
    <div class="card-body">
      @php
        $obj = new \App\Repositories\Bitacora();
        $datos = $obj->porCaso($caso->id);
      @endphp
      @component('bitacora.por_caso',['datos' => $datos])
          <strong>Whoops!</strong> Something went wrong!
      @endcomponent
    </div>
</div>
