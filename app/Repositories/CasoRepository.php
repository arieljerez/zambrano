<?php
 namespace App\Repositories;

 use App\Models\Caso as Caso;
 use App\Repositories\Bitacora;

 class CasoRepository
 {
    function ObtenerCasos($estado,$filtro,$paginado)
    {
        return $this->$estado($filtro,$paginado);
    }

    public function porPaciente($filtro = array(),$paginate = 25)
    {
      $query = $this->consultaBase($filtro);
      $query = $query->where('pacientes.id','=',$filtro['paciente_id']);
      return $query->paginate($paginate);
    }
    public function pendientesFormulario($filtro = array(),$paginate = 25)
    {
        $query = $this->consultaBase($filtro)
          ->where('casos.estado','=','pendiente_formulario');
        return $query->paginate($paginate);
    }

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

   public function vencidos($filtro = array(),$paginate = 25)
   {
     $query =  $this->consultaBase($filtro)
         ->where('casos.estado','=','vencido');
     return $query->paginate($paginate);
   }
   public function tratamientosSolicitados($filtro = array(),$paginate = 25)
   {
     $query =  $this->consultaBase($filtro)
         ->where('tratamientos.estado','=','solicitado')
         ->join('tratamientos','tratamientos.caso_id','=','casos.id');
     return $query->paginate($paginate);
   }
   public function consultaBase($filtro)
   {
        $query =  \DB::Table('casos')
             ->join('pacientes','pacientes.id','=','casos.paciente_id')
             ->select('casos.id as id','casos.created_at as fecha',
             \DB::Raw( 'concat(pacientes.apellidos , " ", pacientes.nombres) as paciente '),
             'pacientes.dni as dni','casos.estado as estado',
             'casos.fecha_reaprobacion','casos.fecha_rechazo');

        $query = $query->orderBy('casos.id', 'desc');

        if(isset($filtro['dni'])){
          $query = $query->where('dni','like','%'.request()->input('dni').'%');
        }

        if(isset($filtro['apellidos'])){
          $query = $query->where('apellidos','like','%'.request()->input('apellidos').'%');
        }

        if(isset($filtro['nombres'])){
          $query = $query->where('nombres','like','%'.request()->input('nombres').'%');
        }

        if(isset($filtro['id'])){
          $query = $query->where('casos.id','=',request()->input('id'));
        }

        if(isset($filtro['fecha_desde'])){
          $query = $query->where('casos.created_at','>=',request()->input('fecha_desde'));
        }

        if(isset($filtro['fecha_hasta'])){
          $query = $query->where('casos.created_at','<=',request()->input('fecha_hasta'));
        }
    return $query;
   }

   /**
    * Estados
    */

   public function aPendienteAprobacion($caso)
   {
      $caso->update(['estado' => 'pendiente_aprobacion']);
      Bitacora::grabar($caso->id,'Cambio estado','Pasa a Pendiente aprobación');
      return $caso;
   }

   public function aprobar($caso_id,$fecha,$texto)
   {
     $caso =  Caso::find($caso_id);
     $data = ['estado' => 'aprobado','fecha_aprobacion' => $fecha, 'texto_aprobacion' => $texto];
     $caso->update($data);
     //$caso->save();
     Bitacora::grabar($caso->id,'Aprobado',$texto);
   }

   public function rechazar($caso_id,$fecha,$texto)
   {
      $caso =  Caso::find($caso_id);
      $data = ['estado' => 'rechazado','fecha_rechazo' => $fecha, 'texto_rechazo' => $texto];
      $caso->update($data);
      //$caso->save();
      Bitacora::grabar($caso->id,'Rechazado',$texto);
   }

   public function reaprobar($caso_id,$fecha,$texto)
   {
     $caso =  Caso::find($caso_id);
     $data = ['estado' => 'aprobado','fecha_reaprobacion' => $fecha, 'texto_reaprobacion' => $texto];
     $caso->update($data);
     //$caso->save();
     Bitacora::grabar($caso->id,'Aprobado',$texto);
   }

   public function store($data)
   {
      $caso = Caso::create($data);
      Bitacora::grabar($caso->id,'Caso Iniciado','Caso pendiente de formularios');
      return $caso;
   }

   public function eliminarArchivoDi($caso_id,$file)
   {
      \Storage::delete($file);
      $caso = Caso::find($caso_id);
      $caso->update(['diabetologico_archivo'=> null]);
      Bitacora::grabar($caso->id,'Diabetológico','Archivo Eliminado');
      return $caso;
   }

   public function subirArchivoDi($caso_id)
   {
      $caso = Caso::find($caso_id);
      $diabetologico_archivo =  Request()->file('archivo')->store('diabetologicos');
      $caso->update(['diabetologico'=> '[]', 'diabetologico_archivo' => $diabetologico_archivo]);
      Bitacora::grabar($caso->id,'Diabetologico','Archivo Diabetológico Subido');

      return $caso;
   }

   public function grabarFormularioDi($caso_id, $datos)
   {
      $caso = Caso::find($caso_id);
      $diabetologico = json_encode($datos);
      $caso->update(['diabetologico'=> $diabetologico]);
      Bitacora::grabar($caso->id,'Diabetologico','Formulario Diabetológico Actualizado');

      return $caso;
   }
 }
