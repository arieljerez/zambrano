<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\AdjuntoRepository;
use Storage;

class AdjuntoController extends Controller
{
    protected $repository;

    public function __construct( AdjuntoRepository $repository)
    {
        $this->repository = $repository;
    }

    public function store(Request $request)
    {
        $data = request()->all();
        $this->repository::grabar($data['caso_id'],$data['fecha'],$data['descripcion']);
        return back();
    }

    public function download($file)
    {
        return Storage::download('adjuntos/'.$file);
    }
}
