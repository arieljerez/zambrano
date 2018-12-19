<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use App\Models\Caso;

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
}
