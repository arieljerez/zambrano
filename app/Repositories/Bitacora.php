<?php
namespace App\Repositories;

use App\Models\Bitacora as ModelBitacora;
use Auth;

class Bitacora
{
    static public function grabar($caso_id, $evento, $descripcion)
    {

      $bitacora = new ModelBitacora();
      $bitacora->caso_id = $caso_id;
      $bitacora->evento = $evento;
      $bitacora->descripcion = $descripcion;
      $bitacora->usuario_id = auth()->User()->id;
      $bitacora->usuario_tabla = Bitacora::getLoginTabla();
      $bitacora->save();
    }

    public function porCaso($caso_id)
    {
      return ModelBitacora::where('caso_id','=',$caso_id)->get();
    }

    public static function getLoginTabla()
    {
      $guard = auth()->guard(); // Retrieve the guard
      $sessionName = $guard->getName(); // Retrieve the session name for the guard
      // The following extracts the name of the guard by disposing of the first
      // and last sections delimited by "_"
      $parts = explode("_", $sessionName);
      unset($parts[count($parts)-1]);
      unset($parts[0]);
      $guardName = implode("_",$parts);
      switch ($guardName) {
        case 'prodiaba':
          return 'prodiabas';
          break;
        case 'efector':
          return 'efectores';
          break;
        default:
          return 'usuarios';
          break;
      }
    }
}
