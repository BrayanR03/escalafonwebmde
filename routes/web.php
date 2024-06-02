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

Route::get('/', function () {
    return view('home');
});
Route::get('/trabajadores', function () {
    return view('trabajadores');
});
Route::get('/institucion', function () {
    return view('institucion');
});
Route::get('/cargos', function () {
    return view('cargos');
});