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

Route::view('/{menu?}', 'home')->name('home');
Route::view('/propietarios/listar', 'propietarios.listar')->name('listarPropietarios');
Route::view('/propieatarios/buscarMascota', 'propietarios.buscarMascota')->name('buscarMascota');
Route::view('/propietarios/anadir', 'propietarios.anadir')->name('anadirPropietario');
Route::view('/propietarios/modificar', 'propietarios.modificar')->name('modificarPropietario');

// Route::get('/', function () {
//     return view('welcome');
// });
