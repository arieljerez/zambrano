<?php

use Illuminate\Database\Seeder;

class EntidadesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $regiones_sanitarias = array( 'Region Sanitaria I' => 'Region Sanitaria I',
                                    'Region Sanitaria II'=> 'Region Sanitaria II',
                                    'Region Sanitaria III'=> 'Region Sanitaria III',
                                    'Region Sanitaria IV'=> 'Region Sanitaria IV',
                                    'Region Sanitaria V'=> 'Region Sanitaria V',
                                    'Region Sanitaria VI'=> 'Region Sanitaria VI',
                                    'Region Sanitaria VII'=> 'Region Sanitaria VII',
                                    'Region Sanitaria VIII'=> 'Region Sanitaria VIII',
                                    'Region Sanitaria IX'=> 'Region Sanitaria IX',
                                    'Region Sanitaria X'=> 'Region Sanitaria X',
                                    'Region Sanitaria XI'=> 'Region Sanitaria XI',
                                    'Region Sanitaria XII'=> 'Region Sanitaria XII',
                                    );
        foreach ($regiones_sanitarias as $key => $value) {
                  App\Models\Entidad::create(['entidad' => 'regiones_sanitarias', 'valor' => $value]);
        }
    }
}
