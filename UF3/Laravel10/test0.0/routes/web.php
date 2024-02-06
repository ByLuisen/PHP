<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\Postdaw2Controller;
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


Route::view('/', 'welcomeDaw2.home')->name('home');
Route::view('/contact', 'welcomeDaw2.contact')->name('contact');
// Route::view('/blog', 'welcomeDaw2.blog', ['posts' => $posts])->name('blog');

// Route::get('/blog', function() {
//     $posts = [
//         ['title' => '1r Post'],
//         ['title' => '2n Post'],
//         ['title' => '3r Post'],
//         ['title' => '4r Post'],
//         ['title' => '5th Post'],
//     ];
//     return view('welcomeDaw2.blog', ['posts' => $posts]);

// })->name('blog');

Route::get('/blog', [Postdaw2Controller::class, 'index'])->name('blog');
Route::view('/about', 'welcomeDaw2.about')->name('about');

/* Route::get('/', function () {
    return view('welcome');
    // return "Bienvenido a la página PRINCIPAL";
}); */

// Es equivalente a:
// Route::view('/', 'welcome');


//Routes del PostController (lógica del CRUD de Posts)
Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');
Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update');
Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');


// controlador de recursos con todos los métodos de CRUD
// Route::resource('posts', PostController::class)->names('posts');

// controlador de recursos con SOLO unos métodos de CRUD
// Route::resource('posts', PostController::class)->only(['index', 'show']);

// controlador de recursos EXCEPTO unos métodos de CRUD
// Route::resource('posts', PostController::class)->except(['index', 'show']);

// Route::get('cursos', function () {
//     return "Bienvenido a la página CURSOS";
// });

// Route::get('cursos/create', function () {
//     return "Estas en la página del formulario crear cursos";
// });

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

// // proteger rutas con expresiones regulares
// Route::get('cursos/{curso}', function ($curso) {
//     return "Bienvenido a la página de: $curso";
// })->where('curso', '[A-Za-z]+');

// // Route::view('blog', 'blog') -> name('noticias');
// Route::view('fotos', 'fotos')->name('galeria');

// Route::get()
