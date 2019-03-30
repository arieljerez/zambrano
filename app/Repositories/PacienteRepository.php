<?php

namespace App\Repositories;

use App\Models\Paciente;
use Illuminate\Support\Facades\Validator;

class PacienteRepository
{
    public function storePorCaso($input,$caso_id=0)
    {
        $this->validarPaciente($input);

        $paciente_data = $input['paciente'];

        $paciente = Paciente::updateOrCreate(['dni' => $paciente_data['dni']],$paciente_data);


        if($caso_id > 0 ){
            Bitacora::grabar($caso_id,'Paciente','Datos del Paciente Actualizados');
        }

        return $paciente;
    }

    public function validarPaciente($paciente)
    {
        Validator::make($paciente, [
            'paciente.dni' => 'required|integer',
        ])->validate();
    }
}
