<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/prodiaba', function () {
    return view('prodiaba/home');
});

Route::prefix('prodiaba')->group(function() {
    Route::get('/login', 'Auth\ProdiabaLoginController@showLoginForm')->name('prodiaba.login');
    Route::post('/login', 'Auth\ProdiabaLoginController@login')->name('prodiaba.login.submit');
    Route::get('/home', 'ProdiabaController@home')->name('prodiaba.home');

    Route::get('/pendientes', 'ProdiabaController@pendientes')->name('prodiaba.pendientes');
    Route::get('/aprobados', 'ProdiabaController@aprobados')->name('prodiaba.aprobados');
    Route::get('/rechazados', 'ProdiabaController@rechazados')->name('prodiaba.rechazados');
    Route::get('/vencidos', 'ProdiabaController@vencidos')->name('prodiaba.vencidos');
    Route::post('/aprobar', 'ProdiabaController@aprobar')->name('prodiaba.aprobar');
    Route::post('/rechazar', 'ProdiabaController@rechazar')->name('prodiaba.rechazar');

});

Route::prefix('efector')->group(function() {
    Route::get('/login', 'Auth\EfectorLoginController@showLoginForm')->name('efector.login');
    Route::post('/login', 'Auth\EfectorLoginController@login')->name('efector.login.submit');
    Route::get('/home', 'EfectorController@home')->name('efector.home');
});

Route::Resource('prodiaba', 'ProdiabaController');
Route::Resource('efector', 'EfectorController');
Route::Resource('tratamientos', 'TratamientoController');
Auth::routes();

Route::group(['middleware' => 'auth:web,efector'], function () {
  Route::get('/home', 'HomeController@index')->name('home');

  Route::Resource('usuarios', 'UsuarioController');
  Route::Resource('pacientes', 'PacienteController');
  //Route::Resource('auditoria', 'AuditoriaController');

  Route::get('casos/buscar_paciente/{url}', ['uses'=>'PacienteController@buscar']);

  Route::get('casos/create/{id}', function ($id){
      $paciente = App\Models\Paciente::find($id);
      $caso = new App\Models\Caso();
      $solo_lectura = false;
      //Todo: Pasar a controlador
      return view('casos.create',compact(['paciente','caso','solo_lectura']));
  });
  Route::get('casos/pendientes-formulario', 'CasoController@pendientesFormulario')->name('casos.pendientes-formulario');
  Route::get('casos/pendientes-aprobacion', 'CasoController@pendientesAprobacion')->name('casos.pendientes-aprobacion');
  Route::get('casos/aprobados', 'CasoController@aprobados')->name('casos.aprobados');
  Route::get('casos/rechazados', 'CasoController@rechazados')->name('casos.rechazados');
  Route::get('casos/vencidos', 'CasoController@rechazados')->name('casos.vencidos');
  Route::get('casos/por-paciente/{id?}', function ($id = 0){
    $query =  \DB::Table('casos')
        ->join('pacientes','pacientes.id','=','casos.paciente_id')
        ->select('casos.id as id','casos.created_at as fecha',\DB::Raw( 'concat(pacientes.apellidos , " ", pacientes.nombres) as paciente '),'pacientes.dni as dni');
    $query = $query->where('pacientes.id','=',$id);
    $casos = $query->paginate(25);
    return view('casos.por_paciente',compact('casos'));

  })->name('casos.por_paciente');

  Route::Resource('casos', 'CasoController');

  Route::get('eliminar_archivo_of/{caso_id}/oftalmologicos/{file}', function ($caso_id,$file) {
      Storage::delete($file);
      $caso = App\Models\Caso::find($caso_id);
      $caso->update(['oftalmologico_archivo'=> '']);
      $caso->save();
      return back();
  });

  Route::get('eliminar_archivo_di/{caso_id}/diabetologicos/{file}', function ($caso_id,$file) {
      Storage::delete($file);
      $caso = App\Models\Caso::find($caso_id);
      $caso->update(['diabetologico_archivo'=> '']);
      $caso->save();
      return back();
  });

  Route::get('descargar/diabetologicos/{file}', function ($file) {
      return Storage::response('diabetologicos/'.$file);
  });
  Route::get('descargar/oftalmologicos/{file}', function ($file) {
      return Storage::response('oftalmologicos/'.$file);
  });
});
