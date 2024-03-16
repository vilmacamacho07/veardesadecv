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

/*RUTAS PASSWORD RESET*/

use Illuminate\Support\Facades\Route;

Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');

Route::get('/', 'InicioController@index')->name('inicio');
//Route::get('/mostrarflete', 'InicioController@index')->name('mostrarflete');

Route::get('seguridad/login', 'Seguridad\LoginController@index')->name('login');
Route::post('seguridad/login', 'Seguridad\LoginController@login')->name('login_post');
Route::get('seguridad/logout', 'Seguridad\LoginController@logout')->name('logout');
Route::post('ajax-sesion', 'AjaxController@setSession')->name('ajax')->middleware('auth');
Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => ['auth', 'superadmin']], function () {
    Route::get('', 'AdminController@index');
    /*RUTAS DE USUARIO*/
    Route::get('usuario', 'UsuarioController@index')->name('usuario');
    Route::get('usuario/crear', 'UsuarioController@crear')->name('crear_usuario');
    Route::post('usuario', 'UsuarioController@guardar')->name('guardar_usuario');
    Route::get('usuario/{id}/editar', 'UsuarioController@editar')->name('editar_usuario');
    Route::put('usuario/{id}', 'UsuarioController@actualizar')->name('actualizar_usuario');
    Route::delete('usuario/{id}', 'UsuarioController@eliminar')->name('eliminar_usuario');
    /*RUTAS DE PERMISO*/
    Route::get('permiso', 'PermisoController@index')->name('permiso');
    Route::get('permiso/crear', 'PermisoController@crear')->name('crear_permiso');
    Route::post('permiso', 'PermisoController@guardar')->name('guardar_permiso');
    Route::get('permiso/{id}/editar', 'PermisoController@editar')->name('editar_permiso');
    Route::put('permiso/{id}', 'PermisoController@actualizar')->name('actualizar_permiso');
    Route::delete('permiso/{id}', 'PermisoController@eliminar')->name('eliminar_permiso');
    /*RUTAS DEL MENU*/
    Route::get('menu', 'MenuController@index')->name('menu');
    Route::get('menu/crear', 'MenuController@crear')->name('crear_menu');
    Route::post('menu', 'MenuController@guardar')->name('guardar_menu');
    Route::get('menu/{id}/editar', 'MenuController@editar')->name('editar_menu');
    Route::put('menu/{id}', 'MenuController@actualizar')->name('actualizar_menu');
    Route::get('menu/{id}/eliminar', 'MenuController@eliminar')->name('eliminar_menu');
    Route::post('menu/guardar-orden', 'MenuController@guardarOrden')->name('guardar_orden');
    /*RUTAS ROL*/
    Route::get('rol', 'RolController@index')->name('rol');
    Route::get('rol/crear', 'RolController@crear')->name('crear_rol');
    Route::post('rol', 'RolController@guardar')->name('guardar_rol');
    Route::get('rol/{id}/editar', 'RolController@editar')->name('editar_rol');
    Route::put('rol/{id}', 'RolController@actualizar')->name('actualizar_rol');
    Route::delete('rol/{id}', 'RolController@eliminar')->name('eliminar_rol');
    /*RUTAS MENU_ROL*/
    Route::get('menu-rol', 'MenuRolController@index')->name('menu_rol');
    Route::post('menu-rol', 'MenuRolController@guardar')->name('guardar_menu_rol');
    /*RUTAS PERMISO_ROL*/
    Route::get('permiso-rol', 'PermisoRolController@index')->name('permiso_rol');
    Route::post('permiso-rol', 'PermisoRolController@guardar')->name('guardar_permiso_rol');
});

/*RUTAS GONDOLAS*/
Route::get('gondola', 'GondolaController@index')->name('gondola')->middleware('auth');
Route::get('gondola/crear', 'GondolaController@crear')->name('crear_gondola')->middleware('auth');
Route::post('gondola', 'GondolaController@guardar')->name('guardar_gondola')->middleware('auth');
Route::post('gondola/{gondola}', 'GondolaController@ver')->name('ver_gondola')->middleware('auth');
Route::get('gondola/{id}/editar', 'GondolaController@editar')->name('editar_gondola')->middleware('auth');
Route::put('gondola/{id}', 'GondolaController@actualizar')->name('actualizar_gondola')->middleware('auth');
Route::delete('gondola/{id}', 'GondolaController@eliminar')->name('eliminar_gondola')->middleware('auth');


/* RUTAS FLETES
 */

 Route::get('flete/{id}/{gondolaid}/mostrar', 'FleteController@mostrar')->name('flete.mostrar');
 Route::get('flete', 'FleteController@index')->name('flete')->middleware('auth');
 Route::get('flete/crear/', 'FleteController@crear')->name('flete.crear')->middleware('auth');
 //Route::get('flete/crear/{placas_truck}', 'FleteController@datos_gondola')->name('flete.datos_gondola')->middleware('auth');
 Route::post('flete', 'FleteController@guardar')->name('flete.guardar')->middleware('auth');
 Route::put('flete/{gondola}', 'FleteController@finalizar')->name('flete.finalizar')->middleware('auth');
 Route::get('flete/{id}/editar', 'FleteController@editar')->name('flete.editar')->middleware('auth');
 Route::put('flete/{id}/actualizar', 'FleteController@actualizar')->name('flete.actualizar')->middleware('auth');
 Route::delete('flete/{id}', 'FleteController@eliminar')->name('flete.eliminar')->middleware('auth');

 