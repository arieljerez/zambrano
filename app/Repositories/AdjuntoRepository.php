<?php
 namespace App\Repositories;

 use App\Models\Adjunto;
 use App\Repositories\Bitacora;

 class AdjuntoRepository
 {
     static public function grabar($caso_id,$fecha,$descripcion)
     {
        $adjunto = new Adjunto();
        $adjunto->caso_id = $caso_id;
        $adjunto->usuario_id = auth()->User()->id;
        $adjunto->fecha = $fecha;
        $adjunto->usuario_tabla = self::getLoginTabla();
        $adjunto->descripcion = $descripcion;

        if( request()->hasfile('archivo') ){
          $adjunto->archivo =  request()->file('archivo')->store('adjuntos');
          $adjunto->archivo_nombre = request()->file('archivo')->getClientOriginalName();
        }
        $adjunto->save();

        Bitacora::grabar($caso_id,'Adjunto', 'Archivo adjuntado ['.$adjunto->archivo_nombre .']');

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
