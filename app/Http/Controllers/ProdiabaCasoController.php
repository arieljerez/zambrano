<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\CasoRepository;
use App\Repositories\PacienteRepository;
use App\Repositories\Tratamiento as TratamientoRepository; 
use App\Http\Controllers\CasoController;

class ProdiabaCasoController extends CasoController
{
  protected $vistas = [
    'index' => 'casos.index',
    'create' => 'prodiaba.create',
    'edit' => 'prodiaba.edit',
    'show' => 'prodiaba.show',
    'pendientes_formulario' => 'prodiaba.listado',
    'pendientes_aprobacion' => 'prodiaba.listado',
    'aprobados' => 'prodiaba.listado',
    'vencidos' => 'prodiaba.listado',
    'rechazados' => 'prodiaba.listado',
    'por_paciente' => 'prodiaba.por_paciente',
    'home' => 'prodiaba.home'
  ];

  protected $redirigirDespuesDe = [
      'store' => 'prodiaba.show', 
      'update' => 'prodiaba.edit',
  ];

  public function __construct(CasoRepository $casoRepository,PacienteRepository $paciente)
  {
    parent::__construct($casoRepository,$paciente);
    $this->middleware('auth:prodiaba');
  }

  public function index($prefix_url='prodiaba')
  {
      return parent::index($prefix_url);
  }

  public function aprobar()
  {
      $caso_id = request()->input('caso_id');
      $texto_aprobacion = request()->input('texto_aprobacion');
      $fecha_aprobacion = request()->input('fecha_aprobacion');
      $this->casoRepository->aprobar($caso_id,$fecha_aprobacion,$texto_aprobacion);

      flash_success('Caso #'.$caso_id.' ha sido aprobado.');
      return redirect()->route($this->redirigirDespuesDe['update'],$caso_id);
  }

  public function rechazar()
  {
      $caso_id = request()->input('caso_id');
      $texto = request()->input('texto_aprobacion');
      $fecha = request()->input('fecha_aprobacion');
      $this->casoRepository->rechazar($caso_id,$fecha,$texto);

      flash('warning', 'Caso #'.$caso_id.' ha sido rechazado.');
      return redirect()->route($this->redirigirDespuesDe['update'],$caso_id);
  }

  public function aprobarTratamiento()
  {
      $tratamiento = TratamientoRepository::find(request()->input('id'));
      $tratamiento->texto_aprobacion =  request()->input('texto_aprobacion');
      TratamientoRepository::aprobar($tratamiento);

      flash_success('Caso #'.$tratamiento->caso_id.' Tratamiento: "'. $tratamiento->descripcion.'" ha sido aprobado.');

      Request()->session()->flash('tab-tratamientos',true);

      return redirect()->back();
  }

  public function edit($id)
  {
      Request()->session()->flash('tab-tratamientos',true);
      return parent::edit($id);
  }

/*
    public function index()
    {
        $datos = Prodiaba::paginate(25);
        return view('backend.prodiaba.index',compact('datos'));
    }

    public function pendientes()
    {
      $filtro = request()->only(['dni','apellidos','nombres']);
      $casos  = $this->casoRepository->pendientesAprobacion($filtro);
      return view('prodiaba.pendientes', compact('casos'));
    }

    public function aprobados()
    {
      $filtro = request()->only(['dni','apellidos','nombres']);
      $casos  = $this->casoRepository->aprobados($filtro);
      return view('prodiaba.aprobados', compact('casos'));
    }

    public function rechazados()
    {
      $filtro = request()->only(['dni','apellidos','nombres']);
      $casos  = $this->casoRepository->rechazados($filtro);
      return view('prodiaba.rechazados', compact('casos'));
    }

    public function vencidos()
    {
        $filtro = request()->only(['dni','apellidos','nombres']);
        $casos  = $this->casoRepository->vencidos($filtro);
        return view('prodiaba.vencidos', compact('casos'));
    }



    public function home()
    {
      $aprobados = Caso::where('estado','=','aprobado')->count();
      $rechazados = Caso::where('estado','=','rechazado')->count();
      $pendientes_aprobacion = Caso::where('estado','=','pendiente-aprobacion')->count();
      $pendientes_formulario = Caso::where('estado','=','pendiente-formulario')->count();
      $vencidos = Caso::where('estado','=','vencido')->count();
      return view('prodiaba.home',compact('aprobados','rechazados','pendientes_aprobacion','pendientes_formulario','vencidos'));
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



    public function reaprobar()
    {
      $caso_id = request()->input('caso_id');
      $texto_aprobacion = request()->input('texto_aprobacion');
      $fecha_aprobacion = request()->input('fecha_aprobacion');
      $this->casoRepository->reaprobar($caso_id,$fecha_aprobacion,$texto_aprobacion);

      request()->session()->flash('status', 'Caso #'.$caso_id.' ha sido re-aprobado.');
      return redirect()->route('prodiaba.vencidos');
    }



    
    public function mostrarCambiarClaveForm()
    {
      return view('auth.prodiaba-change');
    }

    public function cambiarClave()
    {
      $user = \Auth::user();
      if (!\Hash::check(request('oldpassword'), $user->password)) {
          return back()->withErrors(['oldpassword' => 'Contraseña Incorrecta']);
      }
      $data = request()->validate([
              'password' => 'required|confirmed',
      ]);
      $data['password']= bcrypt($data['password']);
      $user->update($data);
      return redirect()->route('prodiaba.home')->with(['success' => 'Contraseña actualizada']);
    }*/
}
