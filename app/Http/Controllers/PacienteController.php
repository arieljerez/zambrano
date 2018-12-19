<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use Illuminate\Http\Request;

class PacienteController extends Controller
{

    public function buscar($url)
    {
      $query = Paciente::where('dni','like','%');

      if(request()->has('dni')){
        $query = $query->where('dni','like','%'.request()->input('dni').'%');
      }

      if(request()->has('apellidos')){
        $query = $query->where('apellidos','like','%'.request()->input('apellidos').'%');
      }

      if(request()->has('nombres')){
        $query = $query->where('nombres','like','%'.request()->input('nombres').'%');
      }

      $pacientes = $query->paginate(25);
      $pacientes->withPath('/casos/buscar_paciente/'.$url);

      if(request()->has('dni')){
         $pacientes->appends(['dni' => request()->input('dni')]);
      }

      if(request()->has('apellidos')){
        $pacientes->appends(['apellidos' => request()->input('apellidos')]);
      }

      if(request()->has('nombres')){
        $pacientes->appends(['nombres' => request()->input('nombres')]);
      }

      return view('casos.buscar_paciente',compact(['pacientes','url']));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pacientes = Paciente::paginate(25);
        return view('pacientes.index',compact('pacientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Paciente  $paciente
     * @return \Illuminate\Http\Response
     */
    public function show(Paciente $paciente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Paciente  $paciente
     * @return \Illuminate\Http\Response
     */
    public function edit(Paciente $paciente)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Paciente  $paciente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Paciente $paciente)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Paciente  $paciente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Paciente $paciente)
    {
        //
    }
}
