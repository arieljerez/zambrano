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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/prodiaba/home', 'ProdiabaController@home')->name('prodiaba.home');
Route::get('/efector/home', 'EfectorController@home')->name('efector.home');



Route::prefix('prodiaba')->group(function() {
    Route::get('/login', 'Auth\ProdiabaLoginController@showLoginForm')->name('prodiaba.login');
    Route::post('/login', 'Auth\ProdiabaLoginController@login')->name('prodiaba.login.submit');

    Route::post('/logout', 'Auth\ProdiabaLoginController@logout')->name('prodiaba.logout');

    Route::get('/pendientes', 'ProdiabaController@pendientes')->name('prodiaba.pendientes');
    Route::get('/aprobados', 'ProdiabaController@aprobados')->name('prodiaba.aprobados');
    Route::get('/rechazados', 'ProdiabaController@rechazados')->name('prodiaba.rechazados');
    Route::get('/vencidos', 'ProdiabaController@vencidos')->name('prodiaba.vencidos');
    Route::post('/aprobar', 'ProdiabaController@aprobar')->name('prodiaba.aprobar');
    Route::post('/rechazar', 'ProdiabaController@rechazar')->name('prodiaba.rechazar');
    Route::post('/reaprobar', 'ProdiabaController@reaprobar')->name('prodiaba.reaprobar');
    Route::get('/tratamientos-solicitados', 'ProdiabaController@tratamientosSolicitados')->name('prodiaba.tratamientos_solicitados');
    Route::post('/aprobar-tratamiento', 'ProdiabaController@aprobarTratamiento')->name('prodiaba.aprobar-tratamiento');
});

Route::prefix('efector')->group(function() {
    Route::get('/login', 'Auth\EfectorLoginController@showLoginForm')->name('efector.login');
    Route::post('/login', 'Auth\EfectorLoginController@login')->name('efector.login.submit');
    Route::post('/logout', 'Auth\EfectorLoginController@logout')->name('efector.logout');
});

Route::group(['middleware' => 'auth:web,efector,prodiaba'], function () {

  Route::get('prodiaba/cambiarclave', 'ProdiabaController@mostrarCambiarClaveForm')->name('prodiaba.cambiarclave');
  Route::post('prodiaba/cambiarclave', 'ProdiabaController@cambiarClave')->name('prodiaba.cambiarclave');
  Route::Resource('prodiaba', 'ProdiabaController');
  Route::Resource('efector', 'EfectorController');
 


  Route::get('efectores/cambiarclave', 'EfectorController@mostrarCambiarClaveForm')->name('efectores.cambiarclave');
  Route::post('efectores/cambiarclave', 'EfectorController@cambiarClave')->name('efectores.cambiarclave');

  Route::Resource('usuarios', 'UsuarioController');
  Route::Resource('pacientes', 'PacienteController');
  Route::Resource('efectores', 'EfectorController');
  Route::Resource('prodiabas', 'UsuarioProdiabaController');
  Route::Resource('tratamientos', 'TratamientoController');

  Route::get('casos/buscar_paciente/{url}', ['uses'=>'PacienteController@buscar']);

  Route::get('casos/create/{id}', 'CasoController@createPacienteExistente');

  Route::get('casos/pendientes-formulario', 'CasoController@pendientesFormulario')->name('casos.pendientes-formulario');
  Route::get('casos/pendientes-aprobacion', 'CasoController@pendientesAprobacion')->name('casos.pendientes-aprobacion');
  Route::get('casos/aprobados', 'CasoController@aprobados')->name('casos.aprobados');
  Route::get('casos/rechazados', 'CasoController@rechazados')->name('casos.rechazados');
  Route::get('casos/vencidos', 'CasoController@vencidos')->name('casos.vencidos');

  Route::get('casos/por-paciente/{id?}',['uses'=> 'CasoController@porPaciente'])->name('casos.por_paciente');

  Route::Resource('casos', 'CasoController');

  Route::get('eliminar_archivo_of/{caso_id}/oftalmologicos/{file}', 'CasoController@eliminarArchivoOf');

  Route::get('eliminar_archivo_di/{caso_id}/diabetologicos/{file}', 'CasoController@eliminarArchivoDi');

  Route::get('descargar/diabetologicos/{file}', 'CasoController@descargarArchivoDi');
  Route::get('descargar/oftalmologicos/{file}', 'CasoController@descargarArchivoOf');

  Route::resource('adjuntos', 'AdjuntoController')->only('store');

  Route::get('descargar/adjuntos/{file}', 'AdjuntoController@download')->name('adjuntos.download');

  Route::get('descargar/tratamientos/{file}', 'TratamientoController@download')->name('tratamientos.download');
  Route::post('tratamientos/adjuntar/{id}', 'TratamientoController@adjuntar')->name('tratamientos.adjuntar');
});
