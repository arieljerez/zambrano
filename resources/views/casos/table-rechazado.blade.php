<div class="table-responsive">
    <table class="table">
      <thead>
          <tr>
              <th> Caso </th>
              <th> Fecha Caso</th>
              <th> Rechazo </th>
              <th> Motivo </th>
              <th> Paciente </th>
              <th> Médicos </th>
              <th> Acción </th>
          </tr>
      </thead>
      <tbody>
      @foreach ($casos as $caso)
          <tr>
              <td> <h5># {{ $caso->id }}      </h5> </td>
              <td> {{ fecha($caso->fecha)  }}    </td>
              <td> {{ fecha($caso->fecha_rechazo)  }}    </td>
              <td> {{ $caso->texto_rechazo }} </td>
              <td> {{ $caso->paciente }} <small><br><strong>DNI:</strong>{{ $caso->dni }} </small>   </td>
              <td> 
               <strong>Diabetologo:</strong> {{ ($caso->diabetologo)['apellidos']}} {{ ($caso->diabetologo)['nombres'] }} <br>
               <strong>Oftalmologo:</strong> {{ ($caso->oftalmologo)['apellidos']}} {{ ($caso->oftalmologo)['nombres'] }}</td>
              <td>
                <a href="{{ route($route_prefix.'.edit', $caso->id ) }}" class="btn btn-primary"> <i class="far fa-edit fa-2x"></i></a>
              </td>
          </tr>
      @endforeach
      </tbody>
    </table>
  </div>
  