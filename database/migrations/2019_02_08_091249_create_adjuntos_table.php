<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdjuntosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adjuntos', function (Blueprint $table) {
          $table->increments('id');
          $table->unsignedinteger('caso_id')->nullable();
          $table->unsignedinteger('usuario_id');
          $table->date('fecha');
          $table->string('descripcion');
          $table->string('archivo')->nullable();
          $table->string('archivo_nombre')->nullable();
          $table->string('usuario_tabla',20);// prodiabas - efectores - usuarios
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
        Schema::drop('adjuntos');
    }
}
