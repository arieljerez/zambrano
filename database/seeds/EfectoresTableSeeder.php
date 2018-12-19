<?php

use Illuminate\Database\Seeder;

class EfectoresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      factory(App\Models\Efector::class, 15)->create();
      factory(App\Models\Efector::class, 1)->create(['usuario' => '1234']);
    }
}
