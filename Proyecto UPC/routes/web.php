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
Route::get('/rankings', function () {
    $datos = [
        ['posicion' => '1', 'jugador' => 'luisen32', 'partidas_jugadas' => '147', 'partidas_ganadas' => '120', 'partidas_empatadas' => '2', 'partidas_perdidas' => '25'],
        ['posicion' => '2', 'jugador' => 'juco', 'partidas_jugadas' => '137',  'partidas_ganadas' => '83', 'partidas_empatadas' => '6', 'partidas_perdidas' => '48'],
        ['posicion' => '3', 'jugador' => 'yungkurt', 'partidas_jugadas' => '185', 'partidas_ganadas' => '65', 'partidas_empatadas' => '20', 'partidas_perdidas' => '100'],
    ];
    return view('rankings.index', ['datos' => $datos]);
})->name('rankings');


Route::get('/perfil', function () {
    return view('perfil');
})->name('perfil');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
