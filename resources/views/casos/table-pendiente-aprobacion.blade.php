<div class="table-responsive">
    <table class="table">
      <thead>
          <tr>
              <th> Caso </th>
              <th> Fecha Caso</th>
              <th> DNI </th>
              <th> Paciente </th>
              <th> Form.Di </th>
              <th> Form.Of </th>
              <th> Acción </th>
          </tr>
      </thead>
      <tbody>
      @foreach ($casos as $caso)
          <tr>
              <td> <h5># {{ $caso->id }}      </h5> </td>
              <td> {{ fecha($caso->fecha)  }}    </td>
              <td> {{ $caso->dni }}       </td>
              <td> {{ $caso->paciente }}    </td>
              <td> @include('casos.parts.check_diabetologico') 
              <small> {{ ($caso->diabetologo)['apellidos']}} {{ ($caso->diabetologo)['nombres'] }}</small></td>
              <td> @include('casos.parts.check_oftalmologico') <small> {{ ($caso->oftalmologo)['apellidos']}} {{ ($caso->oftalmologo)['nombres'] }}</small></td>
              <td>
                <a href="{{ route($route_prefix.'.edit', $caso->id ) }}" class="btn btn-primary"> <i class="far fa-edit fa-2x"></i></a>
              </td>
          </tr>
      @endforeach
      </tbody>
    </table>
  </div>
  