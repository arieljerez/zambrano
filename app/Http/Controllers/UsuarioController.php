<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = Usuario::paginate(50);
        return view('backend.usuarios.index',compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Usuario::create([
            'dni' => $data['dni'],
            'matricula' => $data['matricula'],
            'apellidos' => $data['apellidos'],
            'nombres' => $data['nombres'],
            'password' => Hash::make($data['matricula']),
        ]);
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $usuario = Usuario::find($id);
      return view('backend.usuarios.edit',compact('usuario'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $usuario = Usuario::find($id);
      $data = $request->only('dni','matricula','apellidos','nombres');
      $usuario->update([
          'dni' => $data['dni'],
          'matricula' => $data['matricula'],
          'apellidos' => $data['apellidos'],
          'nombres' => $data['nombres'],
          'password' => \Hash::make($data['matricula']),
      ]);
      $usuario->save();
      return redirect()->route('usuarios.index')->with('success', 'Usuario Profesional DNI: '. $data['dni'].' actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

      $efector = Usuario::find($id);
      $datos = \DB::table('bitacoras')->where([['usuario_tabla', '=','usuarios'],['usuarios', '=',$id]])->get();

      if (count($datos)){
        return redirect()->route('usuarios.index')
                      ->with('fail','Usuario Profesional tiene registros relacionados y no se puede eliminar');
      }

      $efector->delete();
      return redirect()->route('efectores.index')
                    ->with('success','Usuario Efector eliminado');
    }
}
