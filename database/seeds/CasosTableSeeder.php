<?php

use Illuminate\Database\Seeder;

class CasosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\Caso::class, 85)->create(['fecha_aprobacion'=> null,'texto_aprobacion' => null,'fecha_rechazo'=> null,'texto_rechazo' => null]);
/*
        factory(App\Models\Caso::class, 55)->create(['estado' => 'pendiente-aprobacion','fecha_aprobacion'=> null,'texto_aprobacion' => null,'fecha_rechazo'=> null,'texto_rechazo' => null]);

        factory(App\Models\Caso::class, 75)->create(['estado' => 'rechazado','fecha_aprobacion'=> null,'texto_aprobacion' => null]);

        factory(App\Models\Caso::class, 150)->create(['estado' => 'aprobado','fecha_rechazo'=> null,'texto_rechazo' => null]);
*/
    }
}
