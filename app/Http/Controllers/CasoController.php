<?php

namespace App\Http\Controllers;

use App\Models\Caso;
use App\Models\Paciente;
use Illuminate\Http\Request;
use App\Serializables\Diabetologico;
use App\Serializables\Oftalmologico;
use App\Repositories\CasoRepository;
use App\Repositories\Bitacora;
use App\Repositories\PacienteRepository;
use PostTooLargeException;

use Exception;

class CasoController extends Controller
{
    protected $pacienteRepository;

    protected $vistas = [
      'index' => 'casos.index',
      'create' => 'casos.create',
      'edit' => 'casos.edit',
      'show' => 'casos.show',
      'pendientes_formulario' => 'casos.pendientes_formulario',
      'pendientes_aprobacion' => 'casos.pendientes_aprobacion',
      'aprobados' => 'casos.aprobados',
      'vencidos' => 'casos.vencidos',
      'rechazados' => 'casos.rechazados',
      'home' => 'casos.home',
      'tratamientos_solicitados' => 'casos.tratamientos_solicitados'
    ];

    protected $redirigirDespuesDe = [
      'store' => 'casos.edit', 
      'update' => 'casos.edit',
    ];

    public function __construct(CasoRepository $casoRepository,PacienteRepository $paciente)
    {
      $this->middleware('auth');
      $this->casoRepository = $casoRepository;
      $this->pacienteRepository = $paciente;
    }

    public function home()
    {
      $aprobados = Caso::where('estado','=','aprobado')->count();
      $rechazados = Caso::where('estado','=','rechazado')->count();
      $pendientes_aprobacion = Caso::where('estado','=','pendiente-aprobacion')->count();
      $pendientes_formulario = Caso::where('estado','=','pendiente-formulario')->count();
      $vencidos = Caso::where('estado','=','vencido')->count();
      $tratamientos_solicitados =  $this->casoRepository->tratamientosSolicitados()->count();
      return view($this->vistas['home'],compact('aprobados','rechazados','pendientes_aprobacion','pendientes_formulario','vencidos','tratamientos_solicitados'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($prefix_url='casos')
    {
        $filtro = request()->only(['dni','apellidos','nombres','id','fecha_desde','fecha_hasta']); 
        $paginado = request()->input('paginacion') != null ? request()->input('paginacion'): 5;
        $casos = $this->casoRepository->consultaBase($filtro)
                ->paginate($paginado);
        request()->flash();
        return view($this->vistas['index'],compact('casos','prefix_url'));
    }

    public function consultaBase($estado)
    {
      $filtro = request()->only(['dni','apellidos','nombres','mis_casos']);
      $paginado = request()->input('paginacion') != null ? request()->input('paginacion'): 5;
      request()->flash();
      return $this->casoRepository->ObtenerCasos($estado,$filtro,$paginado);
    }
    public function pendientesFormulario()
    {
      $casos = $this->consultaBase(__FUNCTION__);
      $estado = 'pendiente-formulario';
      return view($this->vistas['pendientes_formulario'],compact('casos','estado'));
    }

    public function pendientesAprobacion()
    {
      $casos = $this->consultaBase(__FUNCTION__);
      $estado = 'pendiente-aprobacion';
      return view($this->vistas['pendientes_aprobacion'],compact('casos','estado'));
    }

    public function aprobados()
    {
      $casos = $this->consultaBase(__FUNCTION__);
      $estado = 'aprobado';
      return view($this->vistas['aprobados'],compact('casos','estado'));
    }

    public function vencidos()
    {
      $casos = $this->consultaBase(__FUNCTION__);
      $estado = 'vencido';
      return view($this->vistas['vencidos'],compact('casos','estado'));
    }

    public function rechazados()
    {
      $casos = $this->consultaBase(__FUNCTION__);
      $estado = 'rechazado';
      return view($this->vistas['rechazados'],compact('casos','estado'));
    }

    public function porPaciente($id = 0)
    {
          $filtro = array_merge(request()->only(['dni','apellidos','nombres','mis_casos']),['paciente_id' => $id]);
          $casos = $this->casoRepository->porPaciente($filtro);

          request()->session()->flash('paciente_id', $id);
          return view($this->vistas['por_paciente'],compact('casos'));
    }

    public function tratamientosSolicitados()
    {
        $filtro = request()->only(['dni','apellidos','nombres']);
        $casos  = $this->casoRepository->tratamientosSolicitados($filtro);
        return view($this->vistas['tratamientos_solicitados'], compact('casos'));
    }

    //---------------------------------------------------------
    //---------------------------------------------------------
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
          $paciente = $this->pacienteRepository->storePorCaso($request->only('paciente'));

          $caso = $this->casoRepository->store([
            'estado'=> 'pendiente-formulario',
            'paciente_id' => $paciente->id,
            'oftalmologico' => '[]' ,
            'diabetologico' => '[]',
            'paciente' => json_encode($paciente)
          ]);

          $request->session()->flash('success', 'Caso #'.$caso->id.' generado con éxito!');
          return redirect()->route($this->redirigirDespuesDe['store'],['id' => $caso->id]);

        } catch (Exception $e) {
          $request->session()->flash('error', 'Caso no generado: '.$e->getMessage());
          return redirect()->back()->withInput();
        }
    }

    public function create()
    {
        $caso = new Caso();
        $paciente = new Paciente();
        return view($this->vistas['create'],compact('paciente','caso'));
    }

    public function createPacienteExistente($id)
    {
        $paciente = Paciente::find($id);
        $caso = new Caso();
        return view($this->vistas['create'],compact(['paciente','caso']));
    }
  
    public function updatePaciente($caso_id)
    {
      $datos = Request()->only('paciente');
      $paciente = $this->pacienteRepository->storePorCaso($datos,$caso_id);
      $caso = Caso::find($caso_id);
      $caso->update( ['paciente' => json_encode($paciente) ]);

      Request()->session()->flash('success', 'Caso #'.$caso->id.' - Paciente Actualizado');
      return redirect()->route($this->redirigirDespuesDe['update'],['id' => $caso_id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $caso = Caso::find($id);
        $paciente = json_decode($caso->paciente);
        $diabetologico = new Diabetologico(json_decode($caso->diabetologico,true));
        $oftalmologico = new Oftalmologico(json_decode($caso->oftalmologico,true));

        return view($this->vistas['edit'], compact('caso','paciente','diabetologico','oftalmologico','solo_lectura'));
    }

    public function updateDiabetologico($caso_id)
    {
        if( Request()->hasfile('archivo')){
            $caso = $this->casoRepository->subirArchivoDi($caso_id);
            flash_success('Caso #'.$caso->id.' - Archivo Diabetológico Subido');  
        }else{       
          $caso = $this->casoRepository->grabarFormularioDi($caso_id, Request()->input('diabetologico') );
          flash_success('Caso #'.$caso->id.' - Formulario Diabetológico Actualizado');  
        }
        Request()->session()->flash('tab-diabetologico',true);
        return redirect()->route($this->redirigirDespuesDe['update'],['id' => $caso->id]);
    }

    public function updateOftalmologico($caso_id)
    {
        if( Request()->hasfile('archivo')){

            $caso = $this->casoRepository->subirArchivoOf($caso_id);
            flash_success('Caso #'.$caso->id.' - Archivo Oftalmológico Subido'); 

        }else{
          $caso = $this->casoRepository->grabarFormularioOf($caso_id, Request()->input('oftalmologico') );
          flash_success('Caso #'.$caso->id.' - Formulario Oftalmológico Actualizado'); 
        }
        Request()->session()->flash('tab-oftalmologico',true);
        return redirect()->route($this->redirigirDespuesDe['update'],['id' => $caso->id]);
    }

    public function eliminarArchivoOf($caso_id,$file)
    {
        $caso = $this->casoRepository->eliminarArchivoOf($caso_id,$file);
        flash_success('Caso #'.$caso->id.' Archivo Oftalmológico eliminado');

        Request()->session()->flash('tab-oftalmologico',true);
        return back();
    }

    public function eliminarArchivoDi($caso_id,$file)
    {
        $caso = $this->casoRepository->eliminarArchivoDi($caso_id,$file);
        flash_success('Caso #'.$caso->id.' Archivo Diabetológico eliminado');
        Request()->session()->flash('tab-diabetologico',true);
        return back();
    }

    public function descargarArchivoDi($file)
    {
        return \Storage::download('diabetologicos/'.$file);
    }

    public function descargarArchivoOf($file)
    {
        return \Storage::download('oftalmologicos/'.$file);
    }

    public function pendienteAprobacion($caso_id)
    {
        $caso = $this->casoRepository->aPendienteAprobacion($caso_id);
        Request()->session()->flash('success', 'Caso #'.$caso->id.' actualizado a \'Pendiente Aprobación\' con éxito!');
        return back();
    }
}
