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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datos = $request->only('caso_id','fecha','evento','descripcion','archivo');

        $caso = Caso::find($datos['caso_id']);

        $tratamiento = $this->repository->grabar($datos['caso_id'],$datos['fecha'],$datos['evento'],$datos['descripcion']);
        Bitacora::grabar($datos['caso_id'],'Tratamiento',$datos['evento'] . ': '. $datos['descripcion']);

        Request()->session()->flash('tab-tratamientos',true);
        flash_success('Caso #'.$caso->id.' - Tratamiento Cargado');  

        return redirect()->back();
    }
   
    public function download($file)
    {
        return \Storage::download('tratamientos/'.$file);
    }

    public function adjuntar($id)
    {
        $this->repository->attach($id);
        return redirect()->back();
    }
}
