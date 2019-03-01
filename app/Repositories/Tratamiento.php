<?php
 namespace App\Repositories;

 use App\Models\Tratamiento as ModelTratamiento;

 class Tratamiento
 {
    static public function attach($id)
    {

      if( request()->hasfile('archivo') ){

        $tratamiento = ModelTratamiento::find($id);

        // getting all of the post data
        $files = request()->file('archivo');
        
        
        // recorremos cada archivo y lo subimos individualmente
        foreach($files as $file) {
            
            //cargar archivo
            $upload_success = $file->store('adjuntos');

            // grabar datos adjunto

            $adjunto = new \App\Models\Adjunto();
            $adjunto->caso_id = $tratamiento->caso_id;
            $adjunto->usuario_id = auth()->User()->id;
            $adjunto->fecha = now();
            $adjunto->usuario_tabla = \App\Repositories\Adjunto::getLoginTabla();
            $adjunto->descripcion = "Adjunto de tratamiento: " . $tratamiento->evento . " - " . $tratamiento->descripcion;

            $adjunto->archivo = $upload_success;
            $adjunto->archivo_nombre = $file->getClientOriginalName();

            $adjunto->save();

            // asociar al tratamiento
            $tratamiento->adjuntos()->attach($adjunto->id);
        }

          //cargar archivo
          //grabar datos adjuntos
          //grabar relacion tratamientos adjuntos
                
      } //endif 
    }

    static public function grabar($caso_id,$fecha,$evento,$descripcion,$usuario_id=null)
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
