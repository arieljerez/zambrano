<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Caso;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $aprobados = Caso::where('estado','=','aprobado')->count();
      $rechazados = Caso::where('estado','=','rechazado')->count();
      $pendientes_aprobacion = Caso::where('estado','=','pendiente_aprobacion')->count();
      $pendientes_formulario = Caso::where('estado','=','pendiente_formulario')->count();
      $vencidos = Caso::where('estado','=','vencido')->count();
      return view('home',compact('aprobados','rechazados','pendientes_aprobacion','pendientes_formulario','vencidos'));
    }

    public function welcome()
    {
      return view('welcome');
    }
}
