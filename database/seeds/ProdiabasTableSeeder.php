<?php

use Illuminate\Database\Seeder;

class ProdiabasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      factory(App\Models\Prodiaba::class, 15)->create();
      factory(App\Models\Prodiaba::class, 1)->create(['usuario' => '1234']);
    }
}
