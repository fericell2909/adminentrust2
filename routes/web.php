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

Route::group(['middleware' => 'auth'], function () {
	// Ruta para Acceder al Registro de Persona Natural
	Route::get('admin/PersonaNatural', ['as' =>'admin/PersonaNatural', 'uses' => 'PersonaController@RegistrarPersonaNatural']);

	// Ruta para Guardar Registro de Persona Natural
	Route::post('admin/PersonaNatural', ['as' =>'admin/PersonaNatural', 'uses' => 'PersonaController@GuardarPersonaNatural']);

	// Rutas Llamadas Ajax de Zonas.
	Route::post('Zona/Listar_Provincias_x_Departamento/{id}',['as' => 'Zona/Listar_Provincias_x_Departamento', 'uses' => 'ZonaController@Listar_Provincias_x_Departamento']);

	Route::post('Zona/Listar_Distritos_x_Provincia/{id}',['as' => 'Zona/Listar_Distritos_x_Provincia', 'uses' => 'ZonaController@Listar_Distritos_x_Provincia']);


	// Ruta para Listar Persona Natural.

	Route::get('PersonaNatural/Crud', ['as' =>'PersonaNatural/Crud', 'uses' => 'PersonaController@Crud']);

	Route::get('PersonaNatural/Ver/{id}', ['as' =>'PersonaNatural/Crud', 'uses' => 'PersonaController@VerPersonaNatural']);

	Route::get('PersonaNatural/Editar/{id}', ['as' =>'PersonaNatural/Crud', 'uses' => 'PersonaController@EditarPersonaNatural']);

});


	

// Fin de Persona Natural.



