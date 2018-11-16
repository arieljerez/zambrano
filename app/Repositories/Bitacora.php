<?php
namespace App\Repositories;

use App\Models\Bitacora as ModelBitacora;

class Bitacora
{
    static public function grabar($caso_id, $evento, $descripcion)
    {
      $guard = "web";
      if(\Auth::guard('prodiaba')->check())
      {
        $guard = 'prodiaba';
      }
      $bitacora = new ModelBitacora();
      $bitacora->caso_id = $caso_id;
      $bitacora->evento = $evento;
      $bitacora->descripcion = $descripcion;
      $bitacora->usuario_id = \Auth::User()->id;
      $bitacora->ambito_usuario = $guard;
      $bitacora->save();
    }

    public function porCaso($caso_id)
    {
      return ModelBitacora::where('caso_id','=',$caso_id)->get();
    }
}

/*
  $table->unsignedinteger('caso_id');
  $table->string('evento',50);
  $table->string('descripcion',300);
  $table->unsignedinteger('usuario_id',50);
  $table->string('ambito_usuario',50); // prodiaba - zambrabo
*/
