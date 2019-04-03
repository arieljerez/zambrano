@auth('efector')
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-cog" aria-hidden="true"></i>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{ route('pacientes.index') }}">Pacientes</a>
            <a class="dropdown-item" href="{{ route('efectores.index') }}">Efectores</a>
            <a class="dropdown-item" href="{{ route('usuarios.index') }}">Profesionales</a>
            <a class="dropdown-item" href="{{ route('prodiabas.index') }}">Prodiaba</a>
        </div>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Efector
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="{{ route('efector.listado.pendiente-formulario')}}">Pendientes Formulario</a>
        <a class="dropdown-item" href="{{ route('efector.listado.pendiente-aprobacion')}}">Pendientes Aprobación</a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="{{ route('efector.listado.aprobado')}}">Aprobados</a>
        <a class="dropdown-item" href="{{ route('efector.listado.rechazado')}}">Rechazados</a>
        <a class="dropdown-item" href="{{ route('efector.listado.vencido')}}">Vencidos</a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="{{ route('efector.listado.por-paciente')}}">Por Paciente</a>
        <a class="dropdown-item" href="{{ route('efector.listado.index')}}">Todos</a>
        </div>
    </li>
@endauth
    <!-- casos -->
@auth('web')
    <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Médico
    </a>
    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="{{ route('medico.listado.pendiente-formulario')}}">Pendientes Formulario</a>
        <a class="dropdown-item" href="{{ route('medico.listado.pendiente-aprobacion')}}">Pendientes Aprobación</a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="{{ route('medico.listado.aprobado')}}">Aprobados</a>
        <a class="dropdown-item" href="{{ route('medico.listado.rechazado')}}">Rechazados</a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="{{ route('medico.listado.por-paciente')}}">Por Paciente</a>
    </div>
    </li>
@endauth

    <!-- prodiaba -->
    @auth('prodiaba')

    <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Prodiaba
    </a>
    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="{{ route('prodiaba.listado.pendiente-aprobacion')}}">Pendientes</a>
        <a class="dropdown-item" href="{{ route('prodiaba.listado.aprobado')}}">Aprobados</a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="{{ route('prodiaba.listado.rechazado')}}">Rechazados</a>
        <a class="dropdown-item" href="{{ route('prodiaba.listado.vencido')}}">Vencidos</a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="{{ route('prodiaba.listado.tratamientos-solicitados')}}">Tratamientos Solicitados</a>

    </div>
    </li>
@endauth