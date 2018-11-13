<?php
 namespace App\Repositories;

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
 }
