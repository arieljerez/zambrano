<div class="card">
    <div class="card-header">Paciente: Datos Personales</div>

    <div class="card-body">

      <div class="row">
        <div class="col-md-12">
          <p>
            Apellidos: {{ $paciente->apellidos }}
          </p>
          <p>
            Nombres: {{ $paciente->nombres }}
          </p>

          <p>
            Fecha Nacimiento: {{ $paciente->fecha_nacimiento }}
          </p>
        </div>

      </div>
  </div>
</div>
