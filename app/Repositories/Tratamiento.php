<?php
 namespace App\Repositories;

 use App\Models\Tratamiento as ModelTratamiento;

 class Tratamiento
 {
   static public function grabar($caso_id,$fecha,$evento,$descripcion, $archivo, $usuario_id=null)
   {
      if($usuario_id == null){
        $usuario_id = auth()->User()->id;
      }
      $tratamiento = new ModelTratamiento();
      $tratamiento->caso_id = $caso_id;
      $tratamiento->usuario_id = $usuario_id;
      $tratamiento->fecha = $fecha;
      $tratamiento->evento = $evento;
      $tratamiento->descripcion = $descripcion;

      if( request()->hasfile('archivo') ){
        $tratamiento->archivo =  request()->file('archivo')->store('tratamientos');
        $tratamiento->archivo_nombre = request()->file('archivo')->getClientOriginalName();
      }

      $tratamiento->save();
      return $tratamiento;
   }

   static public function aprobar(ModelTratamiento $tratamiento)
   {
     $tratamiento->estado = 'aprobado';
     $tratamiento->fecha_aprobacion = now();
     $tratamiento->usuario_aprobacion = auth()->User()->usuario;
     $tratamiento->update();
     return $tratamiento;
   }

   public function porCaso($caso_id)
   {
     return ModelTratamiento::where('caso_id','=',$caso_id)->get();
   }

 }
