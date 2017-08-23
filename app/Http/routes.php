<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//es la url la vista y el controlador/con inicio en el navegador XD

Route::get('inicio','Auth\AuthController@getLogin');
Route::post('login','Auth\AuthController@postLogin');
Route::get('logout','Auth\AuthController@getLogout');
Route::get('regmed','MedicoController@index');
Route::post('enviar','MedicoController@registrar');


Route::group(['middleware' => 'auth'],function (){
//contenido de usuario autenticado
Route::get('/','InicioController@index');
Route::get('regpaciente','PacienteController@index');
Route::post('registrarpac','PacienteController@store');
Route::get('listapaciente','PacienteController@listar');
Route::get('vis','DescripcionController@index');
Route::get('/{id}/diagpaciente','DiagnosticoController@index');
//Route::get('/{id}/resulpaciente/{id2}','DiagnosticoController@index');

});

//Route::get('inicio','InicioController@index');