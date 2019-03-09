<?php

namespace App\Repositories;

use App\Models\Paciente as ModelPaciente;
use Illuminate\Support\Facades\Validator;

class Paciente
{
    public function store($input)
    {
        $this->validarPaciente($input);

        $paciente_data = $input['paciente'];

        $paciente = ModelPaciente::updateOrCreate(['dni' => $paciente_data['dni']],$paciente_data);

        return $paciente;
    }

    public function validarPaciente($paciente)
    {
        Validator::make($paciente, [
            'paciente.dni' => 'required|integer',
        ])->validate();
    }
}
