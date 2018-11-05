<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCasosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('casos', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('diabetologo_id')->nullable();
            $table->unsignedInteger('oftalmologo_id')->nullable();
            $table->unsignedInteger('paciente_id');
            $table->json('diabetologico');
            $table->json('oftalmologico');
            $table->json('paciente');
            $table->timestamps();

            $table->foreign('diabetologo_id')->references('id')->on('usuarios');
            $table->foreign('oftalmologo_id')->references('id')->on('usuarios');
            $table->foreign('paciente_id')->references('id')->on('pacientes');
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('casos');
    }
}
