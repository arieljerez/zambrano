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

Route::group(['middleware' => 'auth'], function () {
  Route::get('/home', 'HomeController@index')->name('home');
  Route::Resource('casos', 'CasoController');

  Route::get('descargar-caso/{caso_id}/diabetologico', 'CasoController@pdf_diabetologico')->name('caso_diabetologico.pdf');
  Route::get('descargar-caso/{caso_id}/oftalmologico', 'CasoController@pdf_oftalmologico')->name('caso_oftalmologico.pdf');

  Route::get('descargar/diabetologicos/{file}', function ($file) {
      return Storage::response('diabetologicos/'.$file);
  });

  Route::get('descargar/oftalmologicos/{file}', function ($file) {
      return Storage::response('oftalmologicos/'.$file);
  });
});
