<table class="table">
    <thead>
    <tr>
        <th> Caso</th>
        <th> Fecha </th>
        <th> DNI </th>
        <th> Paciente </th>
    </tr>
    </thead>
    <tbody>
    @foreach ($casos as $caso)
        <tr>
            <td> <h5>#     {{ $caso->id }}      </h5 </td>
            <td>      {{ \Carbon\Carbon::parse($caso->fecha)->format('d/m/Y')  }}    </td>
            <td>      {{ $caso->dni }}       </td>
            <td>      {{ $caso->paciente }}    </td>
            <td>
               <a href="{{ route('tratamientos.edit', $caso->id ) }}" class="btn btn-primary"> <i class="far fa-save"></i> Editar</a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
