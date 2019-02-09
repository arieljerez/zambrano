<?php
 namespace App\Repositories;

 use App\Models\Adjunto as ModelAdjunto;

 class Adjunto
 {
     static public function grabar($caso_id,$fecha,$descripcion)
     {
        $adjunto = new ModelAdjunto();
        $adjunto->caso_id = $caso_id;
        $adjunto->usuario_id = auth()->User()->id;
        $adjunto->fecha = $fecha;
        $adjunto->usuario_tabla = Adjunto::getLoginTabla();
        $adjunto->descripcion = $descripcion;

        if( request()->hasfile('archivo') ){
          $adjunto->archivo =  request()->file('archivo')->store('adjuntos');
          $adjunto->archivo_nombre = request()->file('archivo')->getClientOriginalName();
        }

        $adjunto->save();
        return $adjunto;
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
