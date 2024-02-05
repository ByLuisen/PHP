<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OwnerController;


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
Route::get('/propietarios/listar', [OwnerController::class, 'listar'])->name('propietarios.listar');
Route::get('/propieatarios/buscarMascota', [OwnerController::class, 'buscarMascota'])->name('propietarios.buscarMascota');
Route::get('/propietarios/anadir', [OwnerController::class, 'anadir'])->name('propietarios.anadir');
Route::get('/propietarios/modificar', [OwnerController::class, 'modificar'])->name('propietarios.modificar');

// Route::get('/', function () {
//     return view('welcome');
// });
