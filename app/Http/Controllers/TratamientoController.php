<?php

namespace App\Http\Controllers;

use App\Models\Tratamiento;
use Illuminate\Http\Request;
use App\Repositories\Tratamiento as Repository;
use App\Repositories\Bitacora;
use App\Models\Caso;

class TratamientoController extends Controller
{
    protected $repository;

    public function __construct(Repository $repository)
    {
      $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tratamiento = new Tratamiento();
        return view('tratamientos.create',compact('tratamiento'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datos = $request->only('caso_id','fecha','evento','descripcion','archivo');
        $this->validar('datos');

        $caso = Caso::find($datos['caso_id']);

        if($caso->estado == 'aprobado')
        {
          if( !isset($caso->fecha_reaprobacion) && \Carbon\Carbon::parse($caso->fecha_aprobacion)->diffInDays(\Carbon\Carbon::now()) > 6)
          {
              $caso->estado = 'vencido';
              $caso->save();
              Bitacora::grabar($datos['caso_id'],'Vencido','El caso pasa a vencido');
          }
        }

        $tratamiento = $this->repository->grabar($datos['caso_id'],$datos['fecha'],$datos['evento'],$datos['descripcion'],$datos['archivo']);
        Bitacora::grabar($datos['caso_id'],'Tratamiento',$datos['evento'] . ': '. $datos['descripcion']);


        return redirect()->back();
    }

    public function validar($datos)
    {

    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tratamiento  $tratamiento
     * @return \Illuminate\Http\Response
     */
    public function show(Tratamiento $tratamiento)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tratamiento  $tratamiento
     * @return \Illuminate\Http\Response
     */
    public function edit(Tratamiento $tratamiento)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tratamiento  $tratamiento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tratamiento $tratamiento)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tratamiento  $tratamiento
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tratamiento $tratamiento)
    {
        //
    }
}
