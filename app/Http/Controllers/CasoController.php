<?php

namespace App\Http\Controllers;

use App\Models\Caso;
use App\Models\Paciente;
use Illuminate\Http\Request;
use App\Serializables\Diabetologico;
use App\Serializables\Oftalmologico;
use App\Repositories\CasoRepository;
use App\Repositories\Bitacora;
use App\Repositories\Paciente as PacienteRepository;

use Exception;

class CasoController extends Controller
{
    protected $pacienteRepository;

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
        return view('casos.index',compact('casos'));
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
      return view('casos.pendientes-formulario',compact('casos'));
    }

    public function pendientesAprobacion()
    {
      $casos = $this->consultaBase(__FUNCTION__);
      return view('casos.pendientes-aprobacion',compact('casos'));
    }

    public function aprobados()
    {
      $casos = $this->consultaBase(__FUNCTION__);
      return view('casos.aprobados',compact('casos'));
    }

    public function vencidos()
    {
      $casos = $this->consultaBase(__FUNCTION__);
      return view('casos.vencidos',compact('casos'));
    }

    public function rechazados()
    {
      $casos = $this->consultaBase(__FUNCTION__);
      return view('casos.rechazados',compact('casos'));
    }

    public function porPaciente($id = 0)
    {
          $filtro = array_merge(request()->only(['dni','apellidos','nombres']),['paciente_id' => $id]);
          $casos = $this->casoRepository->porPaciente($filtro);
          return view('casos.por_paciente',compact('casos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Paciente $paciente)
    {
        $caso = new Caso();
        $solo_lectura = false;
        return view('casos.create',compact('paciente','caso','solo_lectura'));
    }

    public function createPacienteExistente($id)
    {
      $paciente = \App\Models\Paciente::find($id);
      $caso = new \App\Models\Caso();
      $solo_lectura = false;

      return view('casos.create',compact(['paciente','caso','solo_lectura']));
    }

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
          return redirect()->route('casos.edit',['id' => $caso->id]);

        } catch (Exception $e) {
          $request->session()->flash('error', 'Caso no generado: '.$e->getMessage());
          return redirect()->back()->withInput();
        }
    }

    public function grabarPaciente($request,$caso=0)
    {
        $input = $request->only('paciente');
        $paciente = $this->pacienteRepository->store($input);
        if ($caso > 0){
            Bitacora::grabar($caso,'Paciente','Datos del Paciente Actualizados');
        }
        return $paciente;
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Caso  $caso
     * @return \Illuminate\Http\Response
     */
    public function edit(Caso $caso)
    {
        $solo_lectura = false;
        $paciente =  json_decode($caso->paciente);
        $diabetologico = new Diabetologico(json_decode($caso->diabetologico,true));
        $oftalmologico = new Oftalmologico(json_decode($caso->oftalmologico,true));

        if($caso->estado != 'pendiente_formulario')
        {
          $solo_lectura = true;
        }

        return view('casos.edit', compact('caso','paciente','diabetologico','oftalmologico','solo_lectura'));
    }

  public function grabarDiabetologico(Request $request, Caso $caso)
  {
      if( $request->hasfile('archivo')){
        $diabetologico_archivo =  $request->file('archivo')->store('diabetologicos');
        $caso->update(['diabetologico'=> '[]', 'diabetologico_archivo' => $diabetologico_archivo]);

        Bitacora::grabar($caso->id,'Diabetologico','Archivo Diabetologico Actualizado');
      }else{
        $diabetologico = json_encode($request->input('diabetologico'));
        $caso->update(['diabetologico'=> $diabetologico]);

        Bitacora::grabar($caso->id,'Diabetologico','Formulario Diabetologico Actualizado');
      }
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
    public function update(Request $request, Caso $caso)
    {
        if ($request->has('cambiar_estado')){
            return $this->cambiarEstado ($caso, $request->input('cambiar_estado'));
        }

        switch ($request->input('destino')) {
          case 'paciente':
            $paciente = $this->grabarPaciente($request, $caso->id);
            $caso->update( ['paciente' => json_encode($paciente) ]);
            break;
          case 'diabetologico':
            $this->grabarDiabetologico($request, $caso);
            break;
          case 'oftalmologico':
            $this->grabarOftalmologico($request, $caso);
            break;
          default:
            // code...
            break;
        }

        return redirect()->route('casos.edit',['id' => $caso->id]);
    }

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
        \Storage::delete($file);
        $caso = App\Models\Caso::find($caso_id);
        $caso->update(['diabetologico_archivo'=> '']);
        $caso->save();
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
