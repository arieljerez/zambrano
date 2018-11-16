<?php
 namespace App\Repositories;

 use App\Models\Caso as CasoModel;
 use App\Repositories\Bitacora;

 class Caso
 {
   public function pendientesAprobacion($filtro = array(),$paginate = 25)
   {
     return $this->consultaBase()
         ->where('casos.estado','=','pendiente_aprobacion')
         ->paginate($paginate);
   }

   public function consultaBase()
   {
     return \DB::Table('casos')
         ->join('pacientes','pacientes.id','=','casos.paciente_id')
         ->select('casos.id as id','casos.created_at as fecha',\DB::Raw( 'concat(pacientes.apellidos , " ", pacientes.nombres) as paciente '),'pacientes.dni as dni');
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
