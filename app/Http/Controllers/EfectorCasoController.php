<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\CasoRepository;
use App\Repositories\PacienteRepository;

class EfectorCasoController extends CasoController
{
    protected $vistas = [
        'index' => 'casos.index',
        'create' => 'efector.create',
        'edit' => 'efector.edit',
        'show' => 'efector.show',
        'pendientes_formulario' => 'efector.listado',
        'pendientes_aprobacion' => 'efector.listado',
        'aprobados' => 'efector.listado',
        'vencidos' => 'efector.listado',
        'rechazados' => 'efector.listado',
        'por_paciente' => 'efector.por_paciente'
    ];
  
    protected $redirigirDespuesDe = [
        'store' => 'efector.show', 
        'update' => 'efector.edit',
    ];
    
    public function __construct(CasoRepository $casoRepository,PacienteRepository $paciente)
    {
      parent::__construct($casoRepository,$paciente);
      $this->middleware('auth:efector');
    }

    public function index($prefix_url='efector')
    {
        return parent::index($prefix_url);
    }
}
