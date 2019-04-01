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

/********************************************************************************************
 *  Prodiaba
 *********************************************************************************************/

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
    Route::get('/prodiaba/home', 'ProdiabaController@home')->name('prodiaba.home');

    Route::Resource('prodiaba', 'ProdiabaController');
  });


/*******************************************************************************************
 *  Rutas de medicos 
 *******************************************************************************************/
Route::group(['middleware' => 'auth:web'], function () {

  Route::prefix ('medico/listado')->name('medico.listado.')->group( function() {
    Route::get('pendiente-formulario', 'MedicoCasoController@pendientesFormulario')->name('pendiente-formulario');
    Route::get('pendiente-aprobacion', 'MedicoCasoController@pendientesAprobacion')->name('pendiente-aprobacion');
    Route::get('aprobado', 'MedicoCasoController@aprobados')->name('aprobado');
    Route::get('rechazado', 'MedicoCasoController@rechazados')->name('rechazado');
    Route::get('vencido', 'MedicoCasoController@vencidos')->name('vencido');
    Route::get('por-paciente/{id?}',['uses'=> 'MedicoCasoController@porPaciente'])->name('por-paciente');
    Route::get('/',['uses'=> 'MedicoCasoController@index'])->name('index');

  });

  Route::prefix ('medico')->name('medico.')->group( function() {
    Route::get('create/{id}', 'MedicoCasoController@createPacienteExistente');
    Route::put('update-paciente/{id}', 'MedicoCasoController@updatePaciente')->name('update-paciente');

    Route::put('update-diabetologico/{id}', 'MedicoCasoController@updateDiabetologico')->name('update-diabetologico');
    Route::put('update-oftalmologico/{id}', 'MedicoCasoController@updateOftalmologico')->name('update-oftalmologico');

    Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
    Route::post('login', 'Auth\LoginController@login')->name('submit');
    Route::post('logout', 'Auth\LoginController@logout')->name('logout');
    Route::get('home', 'MedicoCasoController@home')->name('home');
  });

  Route::Resource('medico', 'MedicoCasoController');
});

/*********************************************************************************************
 *  Efector 
 *********************************************************************************************/
Route::group(['middleware' => 'auth:efector'], function () {

  Route::prefix ('efector/listado')->name('efector.listado.')->group( function() {
    Route::get('pendiente-formulario', 'EfectorCasoController@pendientesFormulario')->name('pendiente-formulario');
    Route::get('pendiente-aprobacion', 'EfectorCasoController@pendientesAprobacion')->name('pendiente-aprobacion');
    Route::get('aprobado', 'EfectorCasoController@aprobados')->name('aprobado');
    Route::get('rechazado', 'EfectorCasoController@rechazados')->name('rechazado');
    Route::get('vencido', 'EfectorCasoController@vencidos')->name('vencido');
    Route::get('por-paciente/{id?}',['uses'=> 'EfectorCasoController@porPaciente'])->name('por-paciente');
    Route::get('/',['uses'=> 'EfectorCasoController@index'])->name('index');
  });

  Route::prefix ('efector')->name('efector.')->group( function() {
    Route::put('update-paciente/{id}', 'EfectorCasoController@updatePaciente')->name('update-paciente');
    Route::put('update-diabetologico/{id}', 'EfectorCasoController@updateDiabetologico')->name('update-diabetologico');
    Route::put('update-oftalmologico/{id}', 'EfectorCasoController@updateOftalmologico')->name('update-oftalmologico');

    Route::get('login', 'Auth\EfectorLoginController@showLoginForm')->name('login');
    Route::post('login', 'Auth\EfectorLoginController@login')->name('submit');
    Route::post('logout', 'Auth\EfectorLoginController@logout')->name('logout');
    Route::get('home', 'EfectorCasoControllerController@home')->name('home');
  });

  Route::Resource('efector', 'EfectorCasoController');
});

/*******************************************************************************
 * 
 * **************************************************************************** */
Route::group(['middleware' => 'auth:web,efector,prodiaba'], function () {

  Route::get('prodiaba/cambiarclave', 'ProdiabaController@mostrarCambiarClaveForm')->name('prodiaba.cambiarclave');
  Route::post('prodiaba/cambiarclave', 'ProdiabaController@cambiarClave')->name('prodiaba.cambiarclave');

 
  Route::get('efectores/cambiarclave', 'EfectorController@mostrarCambiarClaveForm')->name('efectores.cambiarclave');
  Route::post('efectores/cambiarclave', 'EfectorController@cambiarClave')->name('efectores.cambiarclave');

  Route::Resource('usuarios', 'UsuarioController');
  Route::Resource('pacientes', 'PacienteController');
  Route::Resource('efectores', 'EfectorController');
  Route::Resource('prodiabas', 'UsuarioProdiabaController');
  Route::Resource('tratamientos', 'TratamientoController');

  Route::get('casos/buscar_paciente/{url}', ['uses'=>'PacienteController@buscar']);
/*
  Route::get('casos/pendientes-formulario', 'CasoController@pendientesFormulario')->name('casos.pendientes-formulario');
  Route::get('casos/pendientes-aprobacion', 'CasoController@pendientesAprobacion')->name('casos.pendientes-aprobacion');
  Route::get('casos/aprobados', 'CasoController@aprobados')->name('casos.aprobados');
  Route::get('casos/rechazados', 'CasoController@rechazados')->name('casos.rechazados');
  Route::get('casos/vencidos', 'CasoController@vencidos')->name('casos.vencidos');

  Route::get('casos/por-paciente/{id?}',['uses'=> 'CasoController@porPaciente'])->name('casos.por_paciente');

  Route::Resource('casos', 'CasoController');
*/
  Route::get('eliminar_archivo_of/{caso_id}/oftalmologicos/{file}', 'CasoController@eliminarArchivoOf');
  Route::get('eliminar_archivo_di/{caso_id}/diabetologicos/{file}', 'CasoController@eliminarArchivoDi');

  Route::get('descargar/diabetologicos/{file}', 'CasoController@descargarArchivoDi');
  Route::get('descargar/oftalmologicos/{file}', 'CasoController@descargarArchivoOf');

  Route::resource('adjuntos', 'AdjuntoController')->only('store');

  Route::get('descargar/adjuntos/{file}', 'AdjuntoController@download')->name('adjuntos.download');
  Route::get('descargar/tratamientos/{file}', 'TratamientoController@download')->name('tratamientos.download');

  Route::post('tratamientos/adjuntar/{id}', 'TratamientoController@adjuntar')->name('tratamientos.adjuntar');
});
