<?php

namespace App\Http\Controllers;

use App\Models\Caso;
use App\Models\Paciente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Serializables\Diabetologico;
use App\Serializables\Oftalmologico;

class CasoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $casos = $this->consultaBase()
                ->get();
        return view('casos.index',compact('casos'));
    }

    public function consultaBase()
    {
        return \DB::Table('casos')
            ->join('pacientes','pacientes.id','=','casos.paciente_id')
            ->select('casos.id as id','casos.created_at as fecha',\DB::Raw( 'concat(pacientes.apellidos , " ", pacientes.nombres) as paciente '),'pacientes.dni as dni');
    }
    public function pendientesFormulario()
    {
        $casos = $this->consultaBase()
            ->where('casos.estado','=','pendiente_formulario')
            ->get();
        return view('casos.pendientes-formulario',compact('casos'));
    }

    public function pendientesAprobacion()
    {
        $casos = $this->consultaBase()
            ->where('casos.estado','=','pendiente_aprobacion')
            ->get();
        return view('casos.pendientes-aprobacion',compact('casos'));
    }

    public function aprobados()
    {
        $casos = $this->consultaBase()
            ->where('casos.estado','=','aprobado')
            ->get();
        return view('casos.aprobados',compact('casos'));
    }

    public function rechazados()
    {
        $casos = $this->consultaBase()
            ->where('casos.estado','=','rechazado')
            ->get();
        return view('casos.rechazados',compact('casos'));
    }

    public function porPaciente()
    {
        $casos = \DB::Table('casos')
            ->join('pacientes','pacientes.id','=','casos.paciente_id')
            ->select('casos.id as id','casos.created_at as fecha',\DB::Raw( 'concat(pacientes.apellidos , " ", pacientes.nombres ," " , pacientes.dni) as paciente '))->get();
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
         return view('casos.create',compact('paciente','caso'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $paciente_data = $request->only('paciente');
        $this->validarPaciente($paciente_data);

        $paciente_data = $paciente_data['paciente'];
        $paciente =  Paciente::updateOrCreate(['dni' => $paciente_data['dni']],$paciente_data);

       $caso = Caso::create( ['estado'=> 'pendiente_formulario','paciente_id' => $paciente->id,'oftalmologico' => '[]' ,'diabetologico' => '[]', 'paciente' => json_encode($paciente) ]);
       return redirect()->route('casos.edit',['id' => $caso->id]);
    }

    protected function validarPaciente($paciente)
    {
        Validator::make($paciente, [
            'paciente.nombres' => 'required|string',
            'paciente.apellidos' => 'required|string',
            'paciente.fecha_nacimiento' => 'required|date',
            'paciente.domicilio' => 'required|string',
            'paciente.telefono' => 'required|string',
            'paciente.telefono_familiar' => 'required|string',
            'paciente.dni' => 'required|integer',
            'paciente.sexo' => 'required',
        ])->validate();
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Caso  $caso
     * @return \Illuminate\Http\Response
     */
    public function show(Caso $caso)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Caso  $caso
     * @return \Illuminate\Http\Response
     */
    public function edit(Caso $caso)
    {
        $paciente =  json_decode($caso->paciente);
        $diabetologico = new Diabetologico(json_decode($caso->diabetologico,true));
        $oftalmologico = new Oftalmologico(json_decode($caso->oftalmologico,true));
        return view('casos.edit', compact('caso','paciente','diabetologico','oftalmologico'));
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
        $destino = $request->input('destino');
        if ($destino == 'diabetologico')
        {
            $diabetologico = json_encode($request->input('diabetologico'));

            if( $request->hasfile('archivo')){
              $diabetologico_archivo =  $request->file('archivo')->store('diabetologicos');
            //  dd($diabetologico_archivo);
              $caso->update(['diabetologico'=> $diabetologico, 'diabetologico_archivo' => $diabetologico_archivo]);
              $caso->save();
            }else{
              $caso->update(['diabetologico'=> $diabetologico]);
              $caso->save();
            }

        }

        if ($destino == 'oftalmologico')
        {
            $oftalmologico = json_encode($request->input('oftalmologico'));

            if( $request->hasfile('archivo')){
              $oftalmologico_archivo =  $request->file('archivo')->store('oftalmologicos');

              $caso->update(['oftalmologico'=> $oftalmologico, 'oftalmologico_archivo' => $oftalmologico_archivo]);
              $caso->save();
            }else{
              $caso->update(['oftalmologico'=> $oftalmologico]);
              $caso->save();
          }
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

    public function cambiarEstado (Caso $caso, $estado)
    {

        if ($estado == 'pendiente_formulario'){
            $caso->update(['estado' => 'pendiente_aprobacion']);
            $caso->save();
            return redirect()->route('casos.pendientes-aprobacion');
        }

        if ($estado == 'rechazado'){
            $caso->update(['estado' => 'rechazado']);
            $caso->save();
            return redirect()->route('casos.rechazados');
        }

        if ($estado == 'aprobado'){
            $caso->update(['estado' => 'aprobado']);
            $caso->save();
            return redirect()->route('casos.aprobados');
        }

    }
    public function pdf_diabetologico($caso_id)
    {
      $caso = Caso::find($caso_id);
      $paciente =  json_decode($caso->paciente);
      $diabetologico = json_decode($caso->diabetologico);
      $pdf = \PDF::loadView('casos.pdf.diabetologico', compact('caso','paciente','diabetologico'));
      //return $pdf->download('caso.pdf');
      //return view('casos.pdf.diabetologico', compact('caso','paciente','diabetologico'));

      return $pdf->download('caso_'.$caso_id.'_diabetologico.pdf');
    }

    public function pdf_oftalmologico($caso_id)
    {
      $caso = Caso::find($caso_id);
      $paciente =  json_decode($caso->paciente);
      $diabetologico = json_decode($caso->diabetologico);
      $pdf = \PDF::loadView('casos.pdf.oftalmologico', compact('caso','paciente','diabetologico'));
      //return $pdf->download('caso.pdf');

      return $pdf->download('caso_'.$caso_id.'_oftalmologico.pdf');
    }
}
