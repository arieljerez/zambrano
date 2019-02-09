<?php
namespace App\Repositories;

use App\Models\Bitacora as ModelBitacora;
use Auth;

class Bitacora
{
    static public function grabar($caso_id, $evento, $descripcion,$usuario_id=null)
    {
      if($usuario_id == null){
        $usuario_id = auth()->User()->id;
      }
      $bitacora = new ModelBitacora();
      $bitacora->caso_id = $caso_id;
      $bitacora->evento = $evento;
      $bitacora->descripcion = $descripcion;
      $bitacora->usuario_id = $usuario_id;
      $bitacora->usuario_tabla = Bitacora::getLoginTabla();
      $bitacora->save();
    }

    public function porCaso($caso_id)
    {
      return ModelBitacora::where('caso_id','=',$caso_id)->get();
    }

    public static function getLoginTabla()
    {
      $guardName = getGuardName();
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
