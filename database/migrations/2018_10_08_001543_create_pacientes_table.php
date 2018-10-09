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
            $table->string('apellidos')->required();
            $table->string('nombres')->required();
            $table->date('fecha_nacimiento')->required();
            $table->string('domicilio')->required();
            $table->string('telefono')->required();
            $table->string('telefono_2')->required();
            $table->enum('sexo',['M','F'])->required();

            $table->timestamps();
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
