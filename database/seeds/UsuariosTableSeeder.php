<?php

use Illuminate\Database\Seeder;

class UsuariosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\Usuario::class, 1)->create([
            'usuario' => 'SYSTEM',
            'email' => 'system@prodiaba',
            'password' => '$2y$10$vW2Y/SWtyKUT1fhmeo026.CzQd8Tx8LrJuzwASQGosFVMG09QBq.K'
        ]);
      
        factory(App\Models\Usuario::class, 15)->create();

        factory(App\Models\Usuario::class, 1)->create(['dni' => '1234']);
    }
}
