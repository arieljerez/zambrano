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
            'dni' => '99999999',
            'email' => 'system@prodiaba',
            'apellidos' => 'SYSTEM',
            'nombres' => '.',
            'password' => '$2y$10$vW2Y/SWtyKUT1fhmeo026.CzQd8Tx8LrJuzwASQGosFVMG09QBq.K'
        ]);
      
        factory(App\Models\Usuario::class, 5)->create();
        factory(App\Models\Usuario::class, 1)->create(['dni' => '1234']);
    }
}
