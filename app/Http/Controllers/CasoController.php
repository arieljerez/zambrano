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
    ];

    protected $redirigirDespuesDe = [
      'store' => 'casos.show', 
      'update' => 'casos.edit',
    ];

    public function __construct(CasoRepository $casoRepository,PacienteRepository $paciente)
    {
      $this->middleware('auth');
      $this->casoRepository = $casoRepository;
      $this->pacienteRepository = $paciente;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $filtro = request()->only(['dni','apellidos','nombres','id','fecha_desde','fecha_hasta']); 
        $paginado = request()->input('paginacion') != null ? request()->input('paginacion'): 25;
        $casos = $this->casoRepository->consultaBase($filtro)
                ->paginate($paginado);
        request()->flash();
        return view($this->vistas['index'],compact('casos'));
    }

    public function consultaBase($estado)
    {
      $filtro = request()->only(['dni','apellidos','nombres']);
      $paginado = request()->input('paginacion') != null ? request()->input('paginacion'): 25;
      return $this->casoRepository->ObtenerCasos($estado,$filtro,$paginado);
    }
    public function pendientesFormulario()
    {
      $casos = $this->consultaBase(__FUNCTION__);
      $estado = 'pendiente_formulario';
      return view($this->vistas['pendientes_formulario'],compact('casos','estado'));
    }

    public function pendientesAprobacion()
    {
      $casos = $this->consultaBase(__FUNCTION__);
      $estado = 'pendiente_aprobacion';
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
          $filtro = array_merge(request()->only(['dni','apellidos','nombres']),['paciente_id' => $id]);
          $casos = $this->casoRepository->porPaciente($filtro);
          return view($this->vistas['por_paciente'],compact('casos'));
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
          $paciente = $this->grabarPaciente($request);

          $caso = $this->casoRepository->store([
            'estado'=> 'pendiente_formulario',
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
        return redirect()->route($this->redirigirDespuesDe['update'],['id' => $caso->id]);
    }

  public function grabarOftalmologico(Request $request, Caso $caso)
  {
    if( $request->hasfile('archivo')){
        $oftalmologico_archivo =  $request->file('archivo')->store('oftalmologicos');
        $caso->update(['oftalmologico'=> '[]', 'oftalmologico_archivo' => $oftalmologico_archivo]);

        Bitacora::grabar($caso->id,'Oftalmologico','Formulario Oftalmologico Actualizado');
      }else{
        $oftalmologico = json_encode($request->input('oftalmologico'));
        $caso->update(['oftalmologico'=> $oftalmologico]);

        Bitacora::grabar($caso->id,'Oftalmologico','Formulario Oftalmologico Actualizado');
    }
  }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Caso  $caso
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, $id)
    // {
    //     $caso = Caso::find($id);

    //     if ($request->has('cambiar_estado')){
    //         return $this->cambiarEstado ($caso, $request->input('cambiar_estado'));
    //     }

    //     switch ($request->input('destino')) {
    //       case 'paciente':
    //         $paciente = $this->grabarPaciente($request, $caso->id);
    //         $caso->update( ['paciente' => json_encode($paciente) ]);
    //         break;
    //       case 'diabetologico':
    //         $this->grabarDiabetologico($request, $caso);
    //         break;
    //       case 'oftalmologico':
    //         $this->grabarOftalmologico($request, $caso);
    //         break;
    //       default:
    //         // code...
    //         break;
    //     }

    //     return redirect()->route($this->redirigirDespuesDe['update'],['id' => $caso->id]);
    // }



    public function cambiarEstado(Caso $caso, $estado)
    {
         // TODO: pasara a repositorio
        if ($estado == 'pendiente_formulario'){
            $caso = $this->casoRepository->aPendienteAprobacion($caso);
            Request()->session()->flash('success', 'Caso #'.$caso->id.' actualizado con éxito!');
            return redirect()->route('casos.pendientes-aprobacion');
        }
    }

    public function eliminarArchivoOf($caso_id,$file)
    {
        \Storage::delete($file);
        $caso = \App\Models\Caso::find($caso_id);
        $caso->update(['oftalmologico_archivo'=> '']);
        $caso->save();
        return back();
    }

    public function eliminarArchivoDi($caso_id,$file)
    {
        $caso = $this->casoRepository->eliminarArchivoDi($caso_id,$file);
        flash_success('Caso #'.$caso->id.' Archivo Diabetologico eliminado');
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

}
