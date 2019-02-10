<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTratamientosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tratamientos', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedinteger('caso_id')->nullable();
            $table->unsignedinteger('usuario_id');
            $table->date('fecha');
            $table->string('evento');
            $table->string('descripcion');
            $table->string('archivo')->nullable();
            $table->string('archivo_nombre')->nullable();
            $table->string('estado')->default('solicitado');
            $table->date('fecha_aprobacion')->nullable();
            $table->string('usuario_aprobacion')->nullable();
            $table->string('texto_aprobacion')->nullable();
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
        Schema::dropIfExists('tratamientos');
    }
}
