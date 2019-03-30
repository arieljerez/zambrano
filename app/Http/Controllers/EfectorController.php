<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use App\Models\Caso;
use App\Models\Efector;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;

class EfectorController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:efector');
    }

    public function home()
    {
      $aprobados = Caso::where('estado','=','aprobado')->count();
      $rechazados = Caso::where('estado','=','rechazado')->count();
      $pendientes_aprobacion = Caso::where('estado','=','pendiente_aprobacion')->count();
      $pendientes_formulario = Caso::where('estado','=','pendiente_formulario')->count();
      $vencidos = Caso::where('estado','=','vencido')->count();
      return view('efector.home',compact('aprobados','rechazados','pendientes_aprobacion','pendientes_formulario','vencidos'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $efectores = Efector::paginate(25);
        return view('backend.efectores.index',compact('efectores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $efector = new Efector;
        return view('backend.efectores.create',compact('efector'));
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
          'usuario' => ['required','unique:efectores,usuario'],
          'email' =>  ['required','unique:efectores,email'],
          'password' => 'required|confirmed'
      ]);

      $efector = Efector::create($request->only('usuario','email','password'));
      $efector->password = \Hash::make($request->input('password'));
      $efector->save();
      return  redirect(route('efectores.index'))->with(['success' => 'Efector '.$efector->usuario . ' creado']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Efector  $paciente
     * @return \Illuminate\Http\Response
     */
    public function show(Efector $efector)
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
      $efector = Efector::find($id);
      return view('backend.efectores.edit',compact('efector'));
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
      $request->validate([
          'usuario' => ['required',Rule::unique('efectores')->ignore($id)],
          'email' => ['required','email',Rule::unique('efectores')->ignore($id)],
      ]);

      if ($request->input('password') != ''){
        $request->validate([
            'password' => ['confirmed'],
        ]);
      }

      $efector = Efector::find($id);
      $efector->update($request->only('usuario','email'));
      $efector->save();

      if ($request->has('password')!= ''){
        $efector->update( ['password' => Hash::make($request->input('password'))]);
        $efector->save();
      }
      return redirect(route('efectores.index'))->with(['success' => 'Efector '.$efector->usuario . ' actualizado']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Efector  $efector
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $efector = Efector::find($id);
      $datos = \DB::table('bitacoras')->where([['usuario_tabla', '=','efectores'],['usuario_id', '=',$id]])->get();

      if (count($datos)){
        return redirect()->route('efectores.index')
                      ->with('fail','Usuario Efector tiene registros en Bitacora relacionados y no se puede eliminar');
      }

      $datos = \DB::table('tratamientos')->where('usuario_id', '=',$id)->get();

      if (count($datos)){
        return redirect()->route('efectores.index')
                      ->with('fail','Usuario Efector tiene registros en Tratamientos relacionados y no se puede eliminar');
      }

      $efector->delete();
      return redirect()->route('efectores.index')
                    ->with('success','Usuario Efector eliminado');
    }
    
    public function mostrarCambiarClaveForm()
    {
      return view('auth.efector-change');
    }

    public function cambiarClave()
    {
      $user = \Auth::user();
      if (!\Hash::check(request('oldpassword'), $user->password)) {
          return back()->withErrors(['oldpassword' => 'Contraseña Incorrecta']);
      }
      $data = request()->validate([
              'password' => 'required|confirmed',
      ]);
      $data['password']= bcrypt($data['password']);
      $user->update($data);
      return redirect()->route('efector.home')->with(['success' => 'Contraseña actualizada']);
    }
}
