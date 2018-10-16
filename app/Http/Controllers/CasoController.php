<?php

namespace App\Http\Controllers;

use App\Models\Caso;
use Illuminate\Http\Request;

class CasoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $casos = \DB::Table('casos')
            ->join('pacientes','pacientes.id','=','casos.paciente_id')
            ->join('medicos','medicos.id','casos.medico_id')
            ->select('casos.id as id','casos.created_at as fecha',\DB::Raw( 'concat(pacientes.apellidos , " ", pacientes.nombres ," " , pacientes.dni) as paciente '))->get();
        return view('casos.index',compact('casos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $caso = new Caso();
        $diabetologico =  "{ \"medico\": {\"medico\": \"\"}, \"contacto\": \"lhkjh\", \"paciente\": {\"dni\": null, \"edad\": null, \"sexo\": null, \"fecha\": null, \"nombres\": \"jkhxcvbxcv\", \"telefono\": null, \"apellidos\": \"cvbxcvb\", \"domicilio\": null, \"telefono_familiar\": null}, \"servicio\": \"kj\", \"nacimiento\": \"2018-10-31\"}";
        $caso->diabetologico = json_decode($diabetologico);
         return view('casos.create',compact('caso'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        Caso::create( ['paciente_id' => 1,'medico_id' => 1,'oftalmologico' => '[]' ,'diabetologico' => json_encode($request->all())]);
        return redirect()->route('casos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Caso  $caso
     * @return \Illuminate\Http\Response
     */
    public function show(Caso $caso)
    {
        return dd(json_decode($caso->diabetologico));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Caso  $caso
     * @return \Illuminate\Http\Response
     */
    public function edit(Caso $caso)
    {
        $caso->diabetologico = json_decode($caso->diabetologico);
        return view('casos.edit',compact('caso'));
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
        //
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
}
