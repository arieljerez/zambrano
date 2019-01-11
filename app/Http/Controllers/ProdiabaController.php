<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Caso as CasoRepository;
use App\Models\Caso;
use App\Models\Prodiaba;
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
      $this->middleware('auth:prodiaba,efector');
      $this->casoRepository = $casoRepository;
    }
    /**
    * Show the application dashboard.
    *
    * @return \Illuminate\Http\Response
    */
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
      $pendientes_aprobacion = Caso::where('estado','=','pendiente_aprobacion')->count();
      $pendientes_formulario = Caso::where('estado','=','pendiente_formulario')->count();
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

    public function aprobar()
    {
      $caso_id = request()->input('caso_id');
      $texto_aprobacion = request()->input('texto_aprobacion');
      $fecha_aprobacion = request()->input('fecha_aprobacion');
      $this->casoRepository->aprobar($caso_id,$fecha_aprobacion,$texto_aprobacion);

      request()->session()->flash('status', 'Caso #'.$caso_id.' ha sido aprobado.');
      return redirect()->route('prodiaba.pendientes');
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

    public function rechazar()
    {
      $id = request()->input('caso_id');
      $texto = request()->input('texto_aprobacion');
      $fecha = request()->input('fecha_aprobacion');
      $this->casoRepository->rechazar($id,$fecha,$texto);

      request()->session()->flash('wrongs', 'Caso #'.$id.' ha sido rechazado.');
      return redirect()->route('prodiaba.pendientes');
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
    }
}
