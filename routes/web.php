<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::view('/','home')->name('inicio');
/*
Route::get('/trabajadores', function () {
    return view('trabajadores');
});
Route::get('/institucion', function () {
    return view('institucion');
});
Route::get('/cargos', function () {
    return view('cargos');
});
*/
/*
Route::get('/areas', function () {
    return view('areas');
});*/
//Route::resource('areas','App\Http\Controllers\AreasController')->names('areas');
// web.php
Route::resource('areas', 'App\Http\Controllers\AreasController')->names('areas');
Route::get('/areas/search', [AreasController::class, 'show'])->name('areas.search');
Route::patch('/areas/actualizar', 'App\Http\Controllers\AreasController@update')->name('areas.update');
Route::delete('/areas/eliminar', 'App\Http\Controllers\AreasController@destroy')->name('areas.destroy');

Route::resource('cargos','App\Http\Controllers\CargosController')->names('cargos');
Route::get('/cargos/search',[CargosController::class, 'show'])->name('cargos.search');
Route::patch('cargos/actualizar','App\Http\Controllers\CargosController@update')->name('cargos.update');
Route::delete('/cargos/eliminar','App\Http\Controllers\CargosController@destroy')->name('cargos.destroy');

Route::resource('condicionlaboral','App\Http\Controllers\CondicionLaboralController')->names('condicionlaboral');
Route::get('/condicionlaboral/search',[CondicionLaboralController::class, 'show'])->name('condicionlaboral.search');
Route::patch('/condicionlaboral/actualizar','App\Http\Controllers\CondicionLaboralController@update')->name('condicionlaboral.update');
Route::delete('/condicionlaboral/eliminar','App\Http\Controllers\CondicionLaboralController@destroy')->name('condicionlaboral.destroy');

Route::resource('tipomovimiento','App\Http\Controllers\TipoMovimientoController')->names('tipomovimiento');
Route::get('/tipomovimiento/search',[TipoMovimientoController::class, 'show'])->name('tipomovimiento.search');
Route::patch('/tipomovimiento/actualizar','App\Http\Controllers\TipoMovimientoController@update')->name('tipomovimiento.update');
Route::delete('/tipomovimiento/eliminar','App\Http\Controllers\TipoMovimientoController@destroy')->name('tipomovimiento.destroy');

Route::resource('tipodocumento','App\Http\Controllers\TipoDocumentoController')->names('tipodocumento');
Route::get('/tipodocumento/search',[TipoDocumentoController::class, 'show'])->name('tipodocumento.search');
Route::patch('/tipodocumento/actualizar','App\Http\Controllers\TipoDocumentoController@update')->name('tipodocumento.update');
Route::delete('/tipodocumento/eliminar','App\Http\Controllers\TipoDocumentoController@destroy')->name('tipodocumento.destroy');

Route::resource('nivelestudio','App\Http\Controllers\NivelEstudioController')->names('nivelestudio');
Route::get('/nivelestudio/search',[NivelEstudioController::class, 'show'])->name('nivelestudio.search');
Route::patch('/nivelestudio/actualizar','App\Http\Controllers\NivelEstudioController@update')->name('nivelestudio.update');
Route::delete('/nivelestudio/eliminar','App\Http\Controllers\NivelEstudioController@destroy')->name('nivelestudio.destroy');


Route::resource('institucion','App\Http\Controllers\InstitucionController')->names('institucion');
Route::get('/institucion/search',[InstitucionController::class, 'show'])->name('institucion.search');
Route::patch('/institucion/actualizar','App\Http\Controllers\InstitucionController@update')->name('institucion.update');
Route::delete('/institucion/eliminar','App\Http\Controllers\InstitucionController@destroy')->name('institucion.destroy');


Route::resource('trabajadores','App\Http\Controllers\TrabajadoresController')->names('trabajadores');
Route::get('/trabajadores/search', [TrabajadoresController::class, 'show'])->name('trabajadores.search');
Route::get('/trabajadores/actualizar','App\Http\Controllers\TrabajadoresController@update')->name('trabajadores.update');
Route::delete('/trabajadores/eliminar','App\Http\Controllers\TrabajadoresController@destroy')->name('trabajadores.destroy');


Route::resource('estudios','App\Http\Controllers\EstudiosController')->names('estudios');
Route::get('/buscar-trabajador', 'App\Http\Controllers\TrabajadoresController@buscar')->name('buscar.trabajador');
Route::get('/estudios/search', [EstudiosController::class, 'show'])->name('estudios.search');
/*
Route::resource('condicionlaboral','App\Http\Controllers\CondicionLaboralController')->names('condicionlaboral');
Route::resource('institucion','App\Http\Controllers\InstitucionController')->names('institucion');
Route::resource('nivelestudios','App\Http\Controllers\NivelEstudiosController')->names('nivelestudios');
Route::resource('tipodocumento','App\Http\Controllers\TipoDocumentoController')->names('tipodocumento');
Route::resource('tipomovimiento','App\Http\Controllers\TipoMovimientoController')->names('tipomovimiento');
*/

/*
Route::get('/condicionlaboral', function () {
    return view('condicionlaboral');
});
Route::get('/tipomovimiento', function () {
    return view('tipomovimiento');
});
Route::get('/tipodocumento', function () {
    return view('tipodocumento');
});
Route::get('/nivelestudios', function () {
    return view('nivelestudios');
});*/