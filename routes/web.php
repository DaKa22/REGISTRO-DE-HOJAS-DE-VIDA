<?php

use App\Http\Controllers\Historial_LaboralController;
use App\Http\Controllers\Tabla_EstudioController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::resource('user', UserController::class);
Route::get('imprimir_user', [UserController::class, 'imprimir'])->name('imprimir.users');

Route::resource('tabla_estudio', Tabla_EstudioController::class);
Route::get('imprimir_tabla_estudio', [Tabla_EstudioController::class, 'imprimir'])->name('imprimir.tabla_estudio');

Route::resource('historial_laboral', Historial_LaboralController::class);
Route::get('imprimir_historial_laboral', [Historial_LaboralController::class, 'imprimir'])->name('imprimir.historial_laboral');


