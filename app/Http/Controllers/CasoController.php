<?php

namespace App\Http\Controllers;

use App\Models\Caso;
use App\Models\Paciente;
use Illuminate\Http\Request;
use App\Serializables\Diabetologico;
use App\Serializables\Oftalmologico;
use App\Repositories\Caso as CasoRepository;
use App\Repositories\Bitacora;
use App\Repositories\Paciente as PacienteRepository;

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
        $casos = $this->consultaBase()
                ->paginate(25);
        return view('casos.index',compact('casos'));
    }

    public function consultaBase($filtro = [])
    {
        $query = $this->casoRepository->consultabase($filtro);
        if(request()->has('dni')){
          $query = $query->where('pacientes.dni','like','%'.request()->input('dni').'%');
        }

        if(request()->has('apellidos')){
          $query = $query->where('pacientes.apellidos','like','%'.request()->input('apellidos').'%');
        }

        if(request()->has('nombres')){
          $query = $query->where('pacientes.nombres','like','%'.request()->input('nombres').'%');
        }
        //--

        if(request()->input('id') > 0){
          $query = $query->where('casos.id','=',request()->input('id'));
        }

        if(request()->input('fecha_desde') != ""){
          $query = $query->where('casos.created_at','>=',request()->input('fecha_desde'));
        }

        if(request()->input('fecha_hasta') != ""){
          $query = $query->where('casos.created_at','<=',request()->input('fecha_hasta'));
        }

        return $query;
    }

    public function pendientesFormulario()
    {
        $query = $this->consultaBase()
            ->where('casos.estado','=','pendiente_formulario');
        $casos = $query->paginate(25);
        return view('casos.pendientes-formulario',compact('casos'));
    }

    public function pendientesAprobacion()
    {
        $query = $this->consultaBase()
            ->where('casos.estado','=','pendiente_aprobacion');

        $casos = $query->paginate(25);
        return view('casos.pendientes-aprobacion',compact('casos'));
    }

    public function aprobados()
    {
        $casos = $this->consultaBase()
            ->where('casos.estado','=','aprobado')
            ->paginate(25);
        return view('casos.aprobados',compact('casos'));
    }

    public function vencidos()
    {
        $casos = $this->consultaBase()
            ->where('casos.estado','=','vencido')
            ->paginate(25);
        return view('casos.vencidos',compact('casos'));
    }

    public function rechazados()
    {
        $casos = $this->consultaBase()
            ->where('casos.estado','=','rechazado')
            ->paginate(25);
        return view('casos.rechazados',compact('casos'));
    }

    public function porPaciente($id = 0)
    {
          $query = $this->consultaBase([]);
          $query = $query->where('pacientes.id','=',$id);
          $casos = $query->paginate(25);
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
        $paciente =  $this->grabarPaciente($request);
        $caso = Caso::create( [
                'estado'=> 'pendiente_formulario',
                'paciente_id' => $paciente->id,
                'oftalmologico' => '[]' ,
                'diabetologico' => '[]',
                'paciente' => json_encode($paciente)
        ]);

        Bitacora::grabar($caso->id,'Caso Iniciado','Caso pendiente de formularios');

        return redirect()->route('casos.edit',['id' => $caso->id]);
    }

    public function grabarPaciente($request,$caso=0)
    {

        $input = $request->only('paciente');
        $paciente = $this->pacienteRepository->store($input);
        if ($caso > 0)
        {
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
        $caso->save();
        Bitacora::grabar($caso->id,'Diabetologico','Archivo Diabetologico Actualizado');
      }else{
        $diabetologico = json_encode($request->input('diabetologico'));
        $caso->update(['diabetologico'=> $diabetologico]);
        $caso->save();
        Bitacora::grabar($caso->id,'Diabetologico','Formulario Diabetologico Actualizado');
      }
  }

  public function grabarOftalmologico(Request $request, Caso $caso)
  {
    if( $request->hasfile('archivo')){
        $oftalmologico_archivo =  $request->file('archivo')->store('oftalmologicos');
        $caso->update(['oftalmologico'=> '[]', 'oftalmologico_archivo' => $oftalmologico_archivo]);
        $caso->save();
        Bitacora::grabar($caso->id,'Oftalmologico','Formulario Oftalmologico Actualizado');
      }else{
        $oftalmologico = json_encode($request->input('oftalmologico'));
        $caso->update(['oftalmologico'=> $oftalmologico]);
        $caso->save();
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
            $caso->save();
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Caso  $caso
     * @return \Illuminate\Http\Response
     */
    public function destroy(Caso $caso)
    {
        //
    }

    public function cambiarEstado(Caso $caso, $estado)
    {
         // TODO: pasara a repositorie
        if ($estado == 'pendiente_formulario'){
            $caso->update(['estado' => 'pendiente_aprobacion']);
            $caso->save();
            Bitacora::grabar($caso->id,'Cambio estado','Pasa a Pendiente aprobación');
            return redirect()->route('casos.pendientes-aprobacion');
        }

        if ($estado == 'rechazado'){
            $caso->update(['estado' => 'rechazado']);
            $caso->save();
            Bitacora::grabar($caso->id,'Cambio estado','Caso Rechazado');
            return redirect()->route('casos.rechazados');
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
