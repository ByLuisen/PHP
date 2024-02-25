<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\PetController;
use App\Http\Controllers\HistoryController;
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
Route::get('/', [OwnerController::class,'home'])->name('home');

//LISTAR PROPIETARIO
Route::get('/list',  [OwnerController::class,'list'])->name('list');

//BUSCAR POR ID
Route::get('/search_form', [OwnerController::class, 'search_form'])->name('search_form');
Route::post('/search', [OwnerController::class, 'search'])->name('search');

//AÑADIR PROPIETARIO
Route::get('/add_form',  [OwnerController::class,'add_form'])->name('add_form');
Route::post('/add',  [OwnerController::class,'add'])->name('add');

//MODIFICAR PROPIETARIO
Route::get('/modify_form',  [OwnerController::class,'modify_form'])->name('modify_form');
Route::post('/search_modify',  [OwnerController::class,'search_modify'])->name('search_modify');
Route::put('/modify/{nif}', [OwnerController::class, 'modify'])->name('modify');

//ELIMINAR PROPIETARIO
Route::post('/delete/{nif}', [OwnerController::class, 'delete'])->name('delete');



//LISTAR MASCOTA
Route::get('/list_pet',  [PetController::class,'list_pet'])->name('list_pet');

//BUSCAR POR ID
Route::get('/search_form_pet', [PetController::class, 'search_form_pet'])->name('search_form_pet');
Route::post('/search_pet', [PetController::class, 'search_pet'])->name('search_pet');

//AÑADIR MASCOTA
Route::get('/add_form_pet',  [PetController::class,'add_form_pet'])->name('add_form_pet');
Route::post('/add_pet',  [PetController::class,'add_pet'])->name('add_pet');

//LISTAR HISTORIAL
Route::get('/list_history',  [HistoryController::class,'list_history'])->name('list_history');

//AÑADIR HISTORIAL
Route::get('/add_form_history',  [HistoryController::class,'add_form_history'])->name('add_form_history');
Route::post('/add_history',  [HistoryController::class,'add_history'])->name('add_history');






