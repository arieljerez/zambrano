<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\CasoRepository;
use App\Repositories\PacienteRepository;

class MedicoCasoController extends CasoController
{
    protected $vistas = [
        'index' => 'medico.index',
        'create' => 'medico.create',
        'edit' => 'medico.edit',
        'show' => 'medico.show',
        'pendientes_formulario' => 'medico.listado',
        'pendientes_aprobacion' => 'medico.listado',
        'aprobados' => 'medico.listado',
        'vencidos' => 'medico.listado',
        'rechazados' => 'medico.listado',
        'por_paciente' => 'medico.por_paciente'
    ];
  
    protected $redirigirDespuesDe = [
        'store' => 'medico.edit', 
        'update' => 'medico.edit',
    ];
    
    public function __construct(CasoRepository $casoRepository,PacienteRepository $paciente)
    {
      parent::__construct($casoRepository,$paciente);
      $this->middleware('auth:web');
    }
}
