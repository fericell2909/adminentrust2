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

	Route::post('PersonaNatural/Editar', ['as' =>'PersonaNatural/Editar', 'uses' => 'PersonaController@EditarGuardarPersonaNatural']);

	// Fin de Persona Natural.

	// BootGrid

	Route::get('PersonaNatural/CrudBootGrid', ['as' =>'PersonaNatural/Crud', 'uses' => 'PersonaController@CrudBootGrid']);

	Route::post('PersonaNatural/BootGrid', ['as' =>'PersonaNatural/BootGrid', 'uses' => 'PersonaController@BootGrid']);

	Route::get('PersonaNatural/EditarBootGrid/{id}', ['as' =>'PersonaNatural/Crud', 'uses' => 'PersonaController@EditarBootGridPersonaNatural']);

	Route::post('PersonaNatural/EditarBootGrid', ['as' =>'PersonaNatural/Editar', 'uses' => 'PersonaController@EditarBootGridGuardarPersonaNatural']);

	// Fin BootGrid


	// Persona Juridicas
	// Mostar el Listado : GET
	Route::get('PersonaJuridica/Crud', ['as' =>'PersonaJuridica/Crud', 'uses' => 'PersonaController@CrudJuridica']);

	// Traer los Datos.
	Route::post('PersonaJuridica/Listar', ['as' =>'PersonaJuridica/Listar', 'uses' => 'PersonaController@ListarPersonasJuridicas']);

	//Ver
	Route::get('PersonaJuridica/Ver/{id}', ['as' =>'PersonaJuridica/Ver', 'uses' => 'PersonaController@EditarPersonaJuridica']);

	//Editar
	Route::get('PersonaJuridica/Editar/{id}', ['as' =>'PersonaJuridica/Editar', 'uses' => 'PersonaController@EditarPersonaJuridica']);

	// Registro de Facturas

	Route::get('Venta/Factura', ['as' =>'Venta/Factura', 'uses' => 'VentaController@RegistrarFactura']);

	Route::post('Venta/Factura', ['as' =>'Venta/Factura', 'uses' => 'VentaController@GuardarFactura']);


	Route::get('Reportes', ['as' =>'Reportes', 'uses' => 'PDFController@reportes']);

	Route::get('reporte_usuarios/{tipo}', 'PDFController@crear_reporte_usuarios');

	Route::get('listado_graficas',['as' =>'listado_graficas','uses' =>  'GraficasController@index']);
	Route::get('grafica_registros/{anio}/{mes}',['as' =>'grafica_registros' ,'uses' => 'GraficasController@registros_mes']);

});
