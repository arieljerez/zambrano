<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(EntidadesTableSeeder::class);
        $this->call(PacientesTableSeeder::class);
		    $this->call(CasosTableSeeder::class);
        $this->call(UsuariosTableSeeder::class);
        $this->call(ProdiabasTableSeeder::class);
        $this->call(EfectoresTableSeeder::class);
    }
}
