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


Route::get('/test', function () {
    return view('pruebas');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/inicial', 'SesionController@index');

Route::group(['prefix'=>'distribuidor','middleware'=>'auth'],function(){

	route::get('solicitudes/enviar_parcial',[
		'uses' =>'SolicitudesController@enviar_parcial',
		'as'   =>	'solicitudes.enviar_parcial'
	]);
	
	route::get('solicitudes/{id}/enviar',[
		'uses' =>'SolicitudesController@enviar',
		'as'   =>	'solicitudes.enviar'
	]);

	route::get('solicitudes/{id}/envio_parcial',[
		'uses' =>'SolicitudesController@envio_parcial',
		'as'   =>	'solicitudes.envio_parcial'
	]);

	route::get('solicitudes/modal_parcial',[
		'uses' =>'SolicitudesController@modal_parcial',
		'as'   =>	'solicitudes.modal_parcial'
	]);

	route::get('solicitudes/index_aprobados',[
		'uses' =>'SolicitudesController@index_aprobados',
		'as'   =>	'solicitudes.index_aprobados'
	]);

	route::get('solicitudes/{id}/aprobar',[
		'uses' =>'SolicitudesController@aprobar',
		'as'   =>	'solicitudes.aprobar'
	]);

	route::get('solicitudes/{id}/renovar_chassis',[
		'uses' =>'SolicitudesController@renovar_chassis',
		'as'   =>	'solicitudes.renovar_chassis'
	]);

	route::get('solicitudes/index_espera',[
		'uses' =>'SolicitudesController@index_espera',
		'as'   =>	'solicitudes.index_espera'
	]);

	route::get('solicitudes/{id}/aprobacion',[
		'uses' =>'SolicitudesController@aprobacion',
		'as'   =>	'solicitudes.aprobacion'
	]);

	route::get('solicitudes/{id}/espera',[
		'uses' =>'SolicitudesController@espera',
		'as'   =>	'solicitudes.espera'
	]);

	route::get('solicitudes/{id}/addDetalle',[
		'uses' =>'SolicitudesController@addDetalle',
		'as'   =>	'solicitudes.addDetalle'
	]);	

	route::get('solicitudes/{id}/detalle',[
		'uses' =>'SolicitudesController@detalle',
		'as'   =>	'solicitudes.detalle'
	]);

	route::get('solicitudes/{id}/{id2}/quitar_detalle',[
		'uses' =>'SolicitudesController@quitar_detalle',
		'as'   =>	'solicitudes.quitar_detalle'
	]);

	route::get('solicitudes/{id2}/{id}quitar_chassis',[
		'uses' =>'SolicitudesController@quitar_chassis',
		'as'   =>	'solicitudes.quitar_chassis'
	]);

	route::get('solicitudes/{id}editar_detalle',[
		'uses' =>'SolicitudesController@editar_detalle',
		'as'   =>	'solicitudes.editar_detalle'
	]);
	route::get('solicitudes/{id}update_detalle',[
		'uses' =>'SolicitudesController@update_detalle',
		'as'   =>	'solicitudes.update_detalle'
	]);
	
	route::get('solicitudes/{id}/{id2}/detalle_all',[
		'uses' =>'SolicitudesController@detalle_all',
		'as'   =>	'solicitudes.detalle_all'
	]);

	route::resource('solicitudes','SolicitudesController');
	
	route::resource('principal','PrincipalController');
	route::resource('vehiculos','VehiculosController');

	route::get('stock',[
		'uses' =>'VehiculosController@stock',
		'as'   =>	'vehiculos.stock'
	]);

	route::get('{id}/{id2}/{id4}/modelos',[
		'uses' => 'VehiculosController@modelos', 
		'as'   => 'vehiculos.modelos'
	]);

	route::get('{id}/{id2}/{id3}/{id4}/master',[
		'uses' => 'VehiculosController@master', 
		'as'   => 'vehiculos.master'
	]);

	route::get('{id}/{id1}/{id2}/{id3}/{id4}/det_vehiculos',[
		'uses' => 'VehiculosController@det_vehiculos', 
		'as'   => 'vehiculos.det_vehiculos'
	]);

	route::resource('stocks','AsignacionStocksController');


	route::get('envios/{id}/detalle',[
		'uses' =>'EnviosController@detalle',
		'as'   =>	'envios.detalle'
	]);

	route::get('envios/{id}/{id2}/detalle_all',[
		'uses' =>'EnviosController@detalle_all',
		'as'   =>	'envios.detalle_all'
	]);

	route::get('envios/{id}/enviar',[
		'uses' =>'EnviosController@enviar',
		'as'   =>	'envios.enviar'
	]);

	route::get('envios/{id}/envio_parcial',[
		'uses' =>'EnviosController@envio_parcial',
		'as'   =>	'envios.envio_parcial'
	]);

	route::get('envios/modal_parcial',[
		'uses' =>'EnviosController@modal_parcial',
		'as'   =>	'envios.modal_parcial'
	]);
	
	route::resource('envios','EnviosController');

});