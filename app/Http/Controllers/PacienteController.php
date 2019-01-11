<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

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
        return view('backend.pacientes.index',compact('pacientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $paciente = new Paciente;
      return view('backend.pacientes.create',compact('paciente'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $request->validate([
          'paciente.nombres' => 'required|string',
          'paciente.apellidos' => 'required|string',
          'paciente.fecha_nacimiento' => 'required|date',
          'paciente.domicilio' => 'required|string',
          'paciente.telefono' => 'required|string',
          'paciente.telefono_familiar' => 'required|string',
          'paciente.dni' => 'required|integer|unique:pacientes,dni',
          'paciente.sexo' => 'required',
          'paciente.region_sanitaria' => 'required'
      ]);

      $paciente = Paciente::create($request->input('paciente'));
      return  redirect(route('pacientes.index'))->with(['success' => 'Paciente '.$paciente->usuario . ' creado']);
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
    public function edit($id)
    {
      $paciente = Paciente::find($id);
      return view('backend.pacientes.edit',compact('paciente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Paciente  $paciente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $datos = $request->validate([
          'paciente.nombres' => 'required|string',
          'paciente.apellidos' => 'required|string',
          'paciente.fecha_nacimiento' => 'required|date',
          'paciente.domicilio' => 'required|string',
          'paciente.telefono' => 'required|string',
          'paciente.telefono_familiar' => 'required|string',
          'paciente.dni' => ['required','integer',Rule::unique('pacientes','dni')->ignore($id)],
          'paciente.sexo' => 'required',
          'paciente.region_sanitaria' => 'required'
      ]);

      $paciente = Paciente::findOrFail($id);
      $paciente->update( $datos['paciente']);
      $paciente->save();

    return redirect(route('pacientes.index'))->with(['success' => 'Paciente '.$paciente->apellidos .' ,'. $paciente->nombres . ' actualizado']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Paciente  $paciente
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $paciente = Paciente::find($id);
      $datos = \DB::table('casos')->where([['paciente_id', '=',$id]])->get();

      if (count($datos)){
        return redirect()->route('pacientes.index')
                      ->with('fail','Usuario Paciente tiene Casos relacionados y no se puede eliminar');
      }

      $paciente->delete();
      return redirect()->route('pacientes.index')
                    ->with('success','Usuario Paciente eliminado');
    }
}
