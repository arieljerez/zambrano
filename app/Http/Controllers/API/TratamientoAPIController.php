<?php
namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\API\APIBaseController as APIBaseController;
use App\Models\Tratamiento;
use App\Models\Caso;
use App\Repositories\Bitacora;
use App\Repositories\Tratamiento as Repository;
use Validator;

class TratamientoAPIController extends APIBaseController
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
        $posts = Tratamiento::all();
        return $this->sendResponse($posts->toArray(), 'Tratamientos enviados');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datos = $request->only('caso_id','fecha','evento','descripcion','archivo','usuario_id');

        $validator = Validator::make($datos, [
            'fecha' => 'required|date_format:Y-m-d',
            'evento' => 'required',
            'descripcion' => 'required',
            'caso_id' => 'required|integer',
            'archivo' => 'required',
            'usuario_id' => 'required|integer'
        ]);

        if($validator->fails()){
            return $this->sendError('Validacion Error.', $validator->errors());
        }

        $caso = Caso::find($datos['caso_id']);
        if($caso == null){
          return $this->sendError('Validacion Error.', ['caso'=>'caso inexistente']);
        }


/*
        if($caso->estado == 'aprobado' && env('APP_DIAS_VENCIMIENTO', 0)) // 0 no vence
        {
          if( !isset($caso->fecha_reaprobacion) && \Carbon\Carbon::parse($caso->fecha_aprobacion)->diffInDays(\Carbon\Carbon::now()) > env('APP_DIAS_VENCIMIENTO', 60))
          {
              $caso->estado = 'vencido';
              $caso->save();
              Bitacora::grabar($datos['caso_id'],'Vencido','El caso pasa a vencido');
          }
        }
*/
        $tratamiento = $this->repository->grabar($datos['caso_id'],$datos['fecha'],$datos['evento'],$datos['descripcion'],$datos['archivo'],$datos['usuario_id']);
        //Bitacora::grabar($datos['caso_id'],'Tratamiento',$datos['evento'] . ': '. $datos['descripcion']);
        return $this->sendResponse($tratamiento->toArray(), 'Tratamiento creado con éxito');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);


        if (is_null($post)) {
            return $this->sendError('Post not found.');
        }


        return $this->sendResponse($post->toArray(), 'Post retrieved successfully.');
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
        $input = $request->all();


        $validator = Validator::make($input, [
            'name' => 'required',
            'description' => 'required'
        ]);


        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }


        $post = Post::find($id);
        if (is_null($post)) {
            return $this->sendError('Post not found.');
        }


        $post->name = $input['name'];
        $post->description = $input['description'];
        $post->save();


        return $this->sendResponse($post->toArray(), 'Post updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);


        if (is_null($post)) {
            return $this->sendError('Post not found.');
        }


        $post->delete();


        return $this->sendResponse($id, 'Tag deleted successfully.');
    }
}
