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
        factory(App\Models\Caso::class, 50)->create();
    }
}
