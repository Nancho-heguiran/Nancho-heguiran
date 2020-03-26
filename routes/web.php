<?php

Route::get('/', 'Seguridad\InicioController@index')->name('login');//formulario de logueo
Route::post('login_validacion', 'Seguridad\LoginController@login')->name('login_post'); //valida el usuario
Route::get('logout', 'Seguridad\LoginController@logout')->name('logout'); //cierre de secion 

Route::View('home', 'sirnec.home')->name('home'); // ya estando adentro
Route::View('/modelo', 'layouts.base.modelo')->name('modelo'); // modelo paginas
Route::View('/layout', 'layouts.sirnec')->name('layout'); // plantilla

/*llamados */
Route::get('getMunucipios/{id}', 'Sirnec\LlamadosController@getMunucipios')->middleware('auth');
Route::get('getOficinas/{id}', 'Sirnec\LlamadosController@getOficinas')->middleware('auth');
Route::get('getClaseoficinas/{id}', 'Sirnec\LlamadosController@getClaseoficinas')->middleware('auth');
Route::get('usuarios_list_pdf', 'Sirnec\LlamadosController@exportUsuariosPdf')->name('usuarios.pdf');
Route::get('usuarios_list_excel', 'Sirnec\LlamadosController@exportusuariosExcel')->name('usuarios.excel');
Route::get('getUsuarios/{id}', 'Sirnec\LlamadosController@getUsuarios')->middleware('auth');
Route::get('getLogin/{id}', 'Sirnec\LlamadosController@getLogin')->middleware('auth');
Route::get('getEmail/{id}', 'Sirnec\LlamadosController@getEmail')->middleware('auth');
Route::get('getBarrios/{id}', 'Sirnec\LlamadosController@getBarrios')->middleware('auth');
Route::post('importscr', 'Sirnec\LlamadosController@importscr')->name('importscr')->middleware('auth');
Route::get('getOficinasdes/{id}', 'Sirnec\LlamadosController@getOficinasdes')->middleware('auth');
Route::get('getFuncionariosofic/{id}', 'Sirnec\LlamadosController@getFuncionariosofic')->middleware('auth');


/* usuarios */
Route::get('usuarios', 'Sirnec\UsuariosController@index')->name('usuarios')->middleware('auth');
Route::post('usuarios_guardar', 'Sirnec\UsuariosController@store')->name('usuarios_guardar')->middleware('auth');
Route::get('usuarios/{id}/editar', 'Sirnec\UsuariosController@edit')->name('usuarios_editar')->middleware('auth');
Route::delete('usuarios/{id}', 'Sirnec\UsuariosController@eliminar')->name('usuarios_eliminar')->middleware('auth');
Route::put('usuarios/{id}', 'Sirnec\UsuariosController@update')->name('usuarios_actualizar')->middleware('auth');
Route::get('cambiocontrasena', 'Sirnec\UsuariosController@cambiocontrasena')->name('cambiocontrasena')->middleware('auth');
Route::put('usuariosactualizar/{id}', 'Sirnec\UsuariosController@cambio')->name('usuarios_actualizar_password')->middleware('auth');

/* Barrios */
Route::get('barrios', 'Sirnec\BarriosController@index')->name('barrios')->middleware('auth');
Route::post('barrios_guardar', 'Sirnec\BarriosController@store')->name('barrios_guardar')->middleware('auth');
Route::get('barrios/{id}/editar', 'Sirnec\BarriosController@edit')->name('barrios_editar')->middleware('auth');
Route::delete('barrios/{id}', 'Sirnec\BarriosController@eliminar')->name('barrios_eliminar')->middleware('auth');
Route::put('barrios/{id}', 'Sirnec\BarriosController@update')->name('barrios_actualizar')->middleware('auth');

/* oficinas */
Route::get('oficinas', 'Sirnec\OficinasController@index')->name('oficinas')->middleware('auth');
Route::post('oficinas_guardar', 'Sirnec\OficinasController@store')->name('oficinas_guardar')->middleware('auth');
Route::get('oficinas/{id}/editar', 'Sirnec\OficinasController@edit')->name('oficinas_editar')->middleware('auth');
Route::delete('oficinas/{id}', 'Sirnec\OficinasController@eliminar')->name('oficinas_eliminar')->middleware('auth');
Route::put('oficinas/{id}', 'Sirnec\OficinasController@update')->name('oficinas_actualizar')->middleware('auth');

/* titulosdeformacion */
Route::get('titulosdeformacion', 'Sirnec\TitulosdeformacionController@index')->name('titulosdeformacion')->middleware('auth');
Route::post('titulosdeformacion_guardar', 'Sirnec\TitulosdeformacionController@store')->name('titulosdeformacion_guardar')->middleware('auth');
Route::get('titulosdeformacion/{id}/editar', 'Sirnec\TitulosdeformacionController@edit')->name('titulosdeformacion_editar')->middleware('auth');
Route::delete('titulosdeformacion/{id}', 'Sirnec\TitulosdeformacionController@eliminar')->name('titulosdeformacion_eliminar')->middleware('auth');
Route::put('titulosdeformacion/{id}', 'Sirnec\TitulosdeformacionController@update')->name('titulosdeformacion_actualizar')->middleware('auth');

/* scr */
Route::get('scr', 'Sirnec\ScrController@index')->name('scr')->middleware('auth');

/* raft 29-30 */
Route::get('raft', 'Sirnec\RaftIdentificacionController@index')->name('raft')->middleware('auth');
Route::post('raft_guardar', 'Sirnec\RaftIdentificacionController@store')->name('raft_guardar')->middleware('auth');
Route::put('raft30/{id}', 'Sirnec\RaftIdentificacionController@update30')->name('raft_actualizar30')->middleware('auth');
Route::put('raft29/{id}', 'Sirnec\RaftIdentificacionController@update29')->name('raft_actualizar29')->middleware('auth');
Route::get('raft29/{id}', 'Sirnec\RaftIdentificacionController@raft29')->name('raft29')->middleware('auth');
Route::get('raft30/{id}', 'Sirnec\RaftIdentificacionController@raft30')->name('raft30')->middleware('auth');

/* funcionarios */
Route::get('funcionarios', 'Sirnec\FuncionariosController@index')->name('funcionarios')->middleware('auth');
Route::post('funcionarios_guardar', 'Sirnec\FuncionariosController@store')->name('funcionarios_guardar')->middleware('auth');
Route::get('funcionarios/{id}/editar', 'Sirnec\FuncionariosController@edit')->name('funcionarios_editar')->middleware('auth');

/* despacho de material */
Route::get('despmaterial', 'Sirnec\DespachomaterialController@index')->name('despmaterial')->middleware('auth');
Route::post('despmaterial_guardar', 'Sirnec\DespachomaterialController@store')->name('despmaterial_guardar')->middleware('auth');

