<?php

use App\Http\Controllers\LineaDeHistorialController;
use App\Http\Controllers\MascotaController;
use App\Http\Controllers\PropietarioController;
use App\Models\LineaDeHistorial;
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

Route::get('/propietario/form-modify', [PropietarioController::class, 'form_modify'])->name('propietario.form_modify');
Route::post('/propietario/modify-search', [PropietarioController::class, 'modify_search'])->name('propietario.modify_search');
Route::post('/propietario/search', [PropietarioController::class, 'search'])->name('propietario.search');
Route::resource('propietario', PropietarioController::class);

Route::get('mascota/search', [MascotaController::class, 'search'])->name('mascota.search');
Route::resource('mascota', MascotaController::class);
Route::resource('linea-de-historial', LineaDeHistorialController::class);
