<?php

use Illuminate\Support\Facades\Auth;
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
    $datos = range(0, 29); // Genera un array del 0 al 29

    return view('welcome', ['datos' => $datos]);
})->name('index');

Route::get('/eventos', function () {
    return view('eventos.index');
})->name('eventos');

Route::get('/crear_eventos', function () {
    return view('eventos.crear-evento');
})->name('crear_eventos');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
