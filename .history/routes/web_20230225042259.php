<?php

use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\PersonaController;
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
    return view('welcome');
});

Auth::routes();



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//MIS RUTAS
//PERSONAS
Route::resource('persona',PersonaController::class);
//ESPECIALISTAS
Route::resource('/especialista', [App\Http\Controllers\EspecialistaController::class);
// Route::get('/especialista', [EspecialidadesController::class, 'index']);

