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
            $table->increments('id',1001);
            $table->unsignedInteger('diabetologo_id')->nullable();
            $table->unsignedInteger('oftalmologo_id')->nullable();
            $table->unsignedInteger('paciente_id');
            $table->json('diabetologico');
            $table->json('oftalmologico');
            $table->json('paciente');
            $table->string('estado',20)->default('');
            $table->string('diabetologico_archivo',100)->nullable();
            $table->string('oftalmologico_archivo',100)->nullable();

            $table->date('fecha_aprobacion')->nullable();
            $table->date('fecha_rechazo')->nullable();
            $table->string('texto_aprobacion',200)->nullable();
            $table->string('texto_rechazo',200)->nullable();

            $table->date('fecha_reaprobacion')->nullable();
            $table->string('texto_reaprobacion',200)->nullable();

            $table->timestamps();

            $table->foreign('diabetologo_id')->references('id')->on('usuarios');
            $table->foreign('oftalmologo_id')->references('id')->on('usuarios');
            $table->foreign('paciente_id')->references('id')->on('pacientes');

            $table->index(['estado']);
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
