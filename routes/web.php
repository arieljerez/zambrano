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

    Route::get('/home', 'ProdiabaController@home')->name('prodiaba.home');

    Route::get('/pendientes', 'ProdiabaController@pendientes')->name('prodiaba.pendientes');
    Route::post('/aprobar', 'ProdiabaController@aprobar')->name('prodiaba.aprobar');
    Route::post('/rechazar', 'ProdiabaController@rechazar')->name('prodiaba.rechazar');

});
Route::Resource('prodiaba', 'ProdiabaController');
Route::Resource('tratamientos', 'TratamientoController');
Auth::routes();

Route::group(['middleware' => 'auth'], function () {
  Route::get('/home', 'HomeController@index')->name('home');

  Route::Resource('usuarios', 'UsuarioController');
  Route::Resource('pacientes', 'PacienteController');
  Route::Resource('auditoria', 'AuditoriaController');

  Route::get('casos/buscar_paciente', function (){
      $pacientes = App\Models\Paciente::paginate(50);
      return view('casos.buscar_paciente',compact(['pacientes']));
  });

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
  Route::get('casos/por-paciente', 'CasoController@porPaciente')->name('casos.por_paciente');
  Route::Resource('casos', 'CasoController');

  Route::get('eliminar_archivo_of/{caso_id}/oftalmologicos/{file}', function ($caso_id,$file) {
      Storage::delete($file);
      $caso = App\Models\Caso::find($caso_id);
      $caso->update(['oftalmologico_archivo'=> '']);
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
