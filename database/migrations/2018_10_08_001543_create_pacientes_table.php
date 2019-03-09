<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePacientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pacientes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('dni')->unique();
            $table->string('apellidos')->nullable();
            $table->string('nombres')->nullable();
            $table->date('fecha_nacimiento')->nullable(null);
            $table->string('domicilio')->nullable();
            $table->string('telefono')->nullable();
            $table->string('telefono_familiar')->nullable();
            $table->string('sexo')->nullable();
            $table->string('region_sanitaria')->nullable();

            $table->timestamps();
        });

        Schema::table('pacientes', function (Blueprint $table) {
            $table->date('fecha_nacimiento')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pacientes');
    }
}
