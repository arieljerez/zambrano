<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdjuntoController extends Controller
{
    public function store(Request $request)
    {
        $data = request()->all();
        \App\Repositories\Adjunto::grabar($data['caso_id'],$data['fecha'],$data['descripcion']);
        return back();
    }

    public function download($file)
    {
        return \Storage::download('adjuntos/'.$file);
    }
}
