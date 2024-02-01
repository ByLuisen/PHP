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
    return view('welcome');
    // return "Bienvenido a la página PRINCIPAL";
});

Route::get('cursos', function () {
    return "Bienvenido a la página CURSOS";
});

Route::get('cursos/create', function () {
    return "Estas en la página del formulario crear cursos";
});

// Route::get('cursos/{curso}', function ($curso) {
//     return "Bienvenido a la página de: $curso";
// });

// // rutas con parámetros opcionales
// Route::get('cursos/{curso}/{categoria?}', function ($curso, $categoria = null) {
//     $mensaje = null;
//     if ($categoria) {
//         $mensaje = ', de la categoria';
//     }
//     return "Bienvenido a la página de: $curso $mensaje $categoria";
// });

// proteger rutas con expresiones regulares
Route::get('cursos/{curso}', function ($curso) {
    return "Bienvenido a la página de: $curso";
})->where('curso', '[A-Za-z]+');
