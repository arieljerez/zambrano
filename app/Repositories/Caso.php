<?php
 namespace App\Repositories;

 use App\Models\Caso as CasoModel;
 use App\Repositories\Bitacora;

 class Caso
 {
   public function pendientesAprobacion($filtro = array(),$paginate = 25)
   {
         $query =  $this->consultaBase($filtro)
             ->where('casos.estado','=','pendiente_aprobacion');
         return $query->paginate($paginate);
   }

   public function aprobados($filtro = array(),$paginate = 25)
   {
         $query =  $this->consultaBase($filtro)
             ->where('casos.estado','=','aprobado');
         return $query->paginate($paginate);
   }

   public function rechazados($filtro = array(),$paginate = 25)
   {
         $query =  $this->consultaBase($filtro)
             ->where('casos.estado','=','rechazado');
         return $query->paginate($paginate);
   }
   public function consultaBase($filtro)
   {
    $query =  \DB::Table('casos')
         ->join('pacientes','pacientes.id','=','casos.paciente_id')
         ->select('casos.id as id','casos.created_at as fecha',\DB::Raw( 'concat(pacientes.apellidos , " ", pacientes.nombres) as paciente '),'pacientes.dni as dni');
         if(isset($filtro['dni'])){
           $query = $query->where('dni','like','%'.request()->input('dni').'%');
         }

         if(isset($filtro['apellidos'])){
           $query = $query->where('apellidos','like','%'.request()->input('apellidos').'%');
         }

         if(isset($filtro['nombres'])){
           $query = $query->where('nombres','like','%'.request()->input('nombres').'%');
         }
    return $query;
   }

   public function aprobar($caso_id,$fecha,$texto)
   {
     $caso =  CasoModel::find($caso_id);
     $data = ['estado' => 'aprobado','fecha_aprobacion' => $fecha, 'texto_aprobacion' => $texto];
     $caso->update($data);
     $caso->save();
     Bitacora::grabar($caso->id,'Aprobado',$texto);
   }

   public function rechazar($caso_id,$fecha,$texto)
   {
     $caso =  CasoModel::find($caso_id);
     $data = ['estado' => 'rechazado','fecha_rechazo' => $fecha, 'texto_rechazo' => $texto];
     $caso->update($data);
     $caso->save();
    Bitacora::grabar($caso->id,'Rechazado',$texto);
   }
 }
