<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PropietarioController;
use App\Http\Controllers\MascotaController;


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

Route::view('/{menu?}', 'home')->name('home');

Route::get('/propietarios/listar', [PropietarioController::class, 'listar'])->name('propietarios.listar');
Route::get('/propietarios/buscarMascota', [PropietarioController::class, 'buscarMascota'])->name('propietarios.buscarMascota');
Route::get('/propietarios/anadir', [PropietarioController::class, 'anadir'])->name('propietarios.anadir');
Route::get('/propietarios/modificar', [PropietarioController::class, 'modificar'])->name('propietarios.modificar');

Route::get('/mascotas/listar', [MascotaController::class, 'listar'])->name('mascotas.listar');
Route::get('/mascotas/buscar', [MascotaController::class, 'buscar'])->name('mascotas.buscar');
Route::get('/mascotas/anadir', [MascotaController::class, 'anadir'])->name('mascotas.anadir');
Route::get('/mascotas/anadirLineaHistorial', [MascotaController::class, 'anadirLineaHistorial'])->name('mascotas.anadirLineaHistorial');

// Route::get('/', function () {
//     return view('welcome');
// });
