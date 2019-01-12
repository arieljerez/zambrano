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
        $tratamiento->archivo =  request()->file('archivo')->store('tratamiento');
        $tratamiento->archivo_original = request()->file('archivo')->getClientOriginalName();
      }

      $tratamiento->save();
      return $tratamiento;
   }

   public function porCaso($caso_id)
   {
     return ModelTratamiento::where('caso_id','=',$caso_id)->get();
   }
 }
