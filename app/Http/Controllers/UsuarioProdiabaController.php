<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prodiaba;
use Illuminate\Validation\Rule;

class UsuarioProdiabaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $datos = Prodiaba::paginate(25);
      return view('backend.prodiabas.index',compact('datos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $prodiaba = new Prodiaba;
      return view('backend.prodiabas.create',compact('prodiaba'));
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
          'usuario' => ['required','unique:prodiabas,usuario'],
          'email' =>  ['required','unique:prodiabas,email'],
          'password' => 'required|confirmed'
      ]);

      $prodiaba = Prodiaba::create($request->only('usuario','email','password'));
      $prodiaba->password = \Hash::make($request->input('password'));
      $prodiaba->save();
      return  redirect(route('prodiabas.index'))->with(['success' => 'Prodiaba '.$prodiaba->usuario . ' creado']);
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
      $prodiaba = Prodiaba::find($id);
      return view('backend.prodiabas.edit',compact('prodiaba'));
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
      $request->validate([
          'usuario' => ['required', Rule::unique('prodiabas')->ignore($id)],
          'email' => ['required','email', Rule::unique('prodiabas')->ignore($id)],
      ]);

      if ($request->input('password') != ''){
        $request->validate([
            'password' => ['confirmed'],
        ]);
      }

      $prodiaba = Prodiaba::find($id);
      $prodiaba->update($request->only('usuario','email'));
      $prodiaba->save();

      if ($request->has('password')!= ''){
        $prodiaba->update( ['password' => \Hash::make($request->input('password'))]);
        $prodiaba->save();
      }
      return redirect(route('prodiabas.index'))->with(['success' => 'Prodiaba '.$prodiaba->usuario . ' actualizado']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $prodiaba = Prodiaba::find($id);
      $datos = \DB::table('bitacoras')->where([['usuario_tabla', '=','prodiabas'],['usuario_id', '=',$id]])->get();

      if (count($datos)){
        return redirect()->route('prodiabas.index')
                      ->with('fail','Usuario Prodiaba tiene registros en Bitacora relacionados y no se puede eliminar');
      }

      $prodiaba->delete();
      return redirect()->route('prodiabas.index')
                    ->with('success','Usuario Prodiaba eliminado');
    }
}
