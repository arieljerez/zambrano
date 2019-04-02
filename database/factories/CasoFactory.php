<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Caso::class, function (Faker $faker) {
	$paciente_id = DB::table('pacientes')->inRandomOrder()->value('id');
	$paciente_json = json_encode( DB::table('pacientes')->where('id','=',$paciente_id)->first());
    return [
		'paciente_id' => $paciente_id,
		'diabetologico' => '[]',
    'oftalmologico' => '[]',
		'oftalmologico_archivo' => null,
		'diabetologico_archivo' => null,
		'paciente' => $paciente_json,
		'estado' => 'pendiente-formulario',
		'fecha_rechazo' => $faker->dateTimeBetween($startDate = '-12 days', $endDate = 'now') ,
    'created_at' => $faker->dateTimeBetween($startDate = '-3 month', $endDate = '-20 days') ,
		'fecha_aprobacion' => $faker->dateTimeBetween($startDate = '-12 days', $endDate = 'now'),
		'texto_rechazo' => 'Motivo del rechazo: '.$faker->text(100),
		'texto_aprobacion' => 'Razón de la aprobacion: '.$faker->text(100)
    ];
});
