<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Caso as CasoRepository;
use App\Models\Caso;
use App\Serializables\Diabetologico;
use App\Serializables\Oftalmologico;

class ProdiabaController extends Controller
{
    protected $casoRepository;
    /**
    * Create a new controller instance.
    *
    * @return void
    */
    public function __construct(CasoRepository $casoRepository)
    {
      $this->middleware('auth:prodiaba');
      $this->casoRepository = $casoRepository;
    }
    /**
    * Show the application dashboard.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {

    }

    public function pendientes()
    {
      $casos  = $this->casoRepository->pendientesAprobacion();
      return view('prodiaba.pendientes', compact('casos'));
    }

    public function aprobados()
    {
      $casos  = $this->casoRepository->aprobados();
      return view('prodiaba.aprobados', compact('casos'));
    }

    public function home()
    {
      return view('prodiaba.home');
    }

    public function edit($caso_id)
    {
        $solo_lectura = true;
        $caso = Caso::find($caso_id);
        $paciente =  json_decode($caso->paciente);
        $diabetologico = new Diabetologico(json_decode($caso->diabetologico,true));
        $oftalmologico = new Oftalmologico(json_decode($caso->oftalmologico,true));

        return view('prodiaba.edit', compact('caso','paciente','diabetologico','oftalmologico','solo_lectura'));
    }
}
