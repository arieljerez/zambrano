<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Caso::class, function (Faker $faker) {
	$paciente_id = DB::table('pacientes')->inRandomOrder()->value('id');
	$paciente_json = json_encode( DB::table('pacientes')->where('id','=',$paciente_id)->first());
    return [
		'paciente_id' => $paciente_id,
		'diabetologico' => json_encode(new App\Serializables\Diabetologico([])),
    'oftalmologico' => json_encode(new App\Serializables\Oftalmologico([])),
		'oftalmologico_archivo' => null,
		'diabetologico_archivo' => null,
		'paciente' => $paciente_json,
		'estado' => 'pendiente_formulario'
    ];
});
