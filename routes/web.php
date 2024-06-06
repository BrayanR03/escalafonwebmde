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
Route::get('/areas/search', [AreasController::class, 'search'])->name('areas.search');
Route::patch('areas/{areas}', [AreasController::class, 'update'])->name('areas.update');
Route::resource('cargos','App\Http\Controllers\CargosController')->names('cargos');
Route::resource('condicionlaboral','App\Http\Controllers\CondicionLaboralController')->names('condicionlaboral');
Route::resource('institucion','App\Http\Controllers\InstitucionController')->names('institucion');
Route::resource('nivelestudios','App\Http\Controllers\NivelEstudiosController')->names('nivelestudios');
Route::resource('tipodocumento','App\Http\Controllers\TipoDocumentoController')->names('tipodocumento');
Route::resource('tipomovimiento','App\Http\Controllers\TipoMovimientoController')->names('tipomovimiento');


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