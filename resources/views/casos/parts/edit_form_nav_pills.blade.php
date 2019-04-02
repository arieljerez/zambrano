<div class="nav flex-column nav-pills" id="casoTab" role="tablist" aria-orientation="vertical">
    <a class="nav-link active" id="v-pills-paciente-tab" data-toggle="pill" href="#v-pills-paciente" role="tab" aria-controls="v-pills-home" aria-selected="true">Paciente</a>
    <a class="nav-link" id="v-pills-diabetologico-tab" data-toggle="pill" href="#v-pills-diabetologico" role="tab" aria-controls="v-pills-diabetologico" aria-selected="false">Diabetológico
        @if($caso->diabetologico_esta_completo)
            <i class="fa fa-check" aria-hidden="true" style="color:green"></i>
        @else
            <i class="fa fa-times" aria-hidden="true" style="color:red"></i>
        @endif
    </a>
    <a class="nav-link" id="v-pills-oftalmologico-tab" data-toggle="pill" href="#v-pills-oftalmologico" role="tab" aria-controls="v-pills-oftalmologico" aria-selected="false">Oftalmológico
        @if($caso->oftalmologico_esta_completo)
            <i class="fa fa-check" aria-hidden="true" style="color:green"></i>
        @else
            <i class="fa fa-times" aria-hidden="true" style="color:red"></i>
        @endif
    </a>
    <a class="nav-link" id="v-pills-bitacora-tab" data-toggle="pill" href="#v-pills-bitacora" role="tab" aria-controls="v-pills-bitacora" aria-selected="false">Bitácora</a>
    <a class="nav-link" id="v-pills-tratamientos-tab" data-toggle="pill" href="#v-pills-tratamientos" role="tab" aria-controls="v-pills-tratamientos" aria-selected="false">
    Tratamientos <span class="badge badge-danger" data-toggle="tooltip" data-placement="top" title="Solicitados">{{ $caso->tratamientos()->solicitado()->count() }}</span><span class="badge badge-success" data-toggle="tooltip" data-placement="top" title="Aprobados">{{ $caso->tratamientos()->aprobado()->count() }}</span>
    </a>
    <a class="nav-link" id="v-pills-adjuntos-tab" data-toggle="pill" href="#v-pills-adjuntos" role="tab" aria-controls="v-pills-adjuntos" aria-selected="false">Adjuntos
        <span class="badge badge-light">{{$caso->adjuntos()->count()}}</span>
    </a>
</div>

@section('js')

<script>
    @if ($message = Session::get('tab-adjuntos'))
        $(function () {
            $('#casoTab a[href="#v-pills-adjuntos"]').tab('show') // Select tab by name
        })
    @endif

    @if ($message = Session::get('tab-oftalmologico'))
        $(function () {
            $('#casoTab a[href="#v-pills-oftalmologico"]').tab('show') // Select tab by name
        })
    @endif

    @if ($message = Session::get('tab-diabetologico'))
        $(function () {
            $('#casoTab a[href="#v-pills-diabetologico"]').tab('show') // Select tab by name
        })
    @endif

    @if ($message = Session::get('tab-paciente'))
        $(function () {
            $('#casoTab a[href="#v-pills-paciente"]').tab('show') // Select tab by name
        })
    @endif

    @if ($message = Session::get('tab-tratamientos'))
        $(function () {
            $('#casoTab a[href="#v-pills-tratamientos"]').tab('show') // Select tab by name
        })
    @endif
    
</script>

@endsection
