<?php

use App\Http\Controllers\usuario\auth\LoginController;
use App\Http\Controllers\usuario\auth\RegisterController;
use App\Http\Controllers\usuario\caracteristica\CharacteristicController;
use App\Http\Controllers\usuario\home\HomeController;
use App\Http\Controllers\usuario\particularidad\ParticularityController;
use App\Http\Controllers\usuario\persona\PersonController;
use App\Http\Controllers\usuario\post\PostController;
use App\Http\Controllers\visitador\coordenada\CoordenadaController;
use App\Http\Controllers\visitador\home\HomeControllerVisitador;
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


//RUTAS USUARIO
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login/singIn', [LoginController::class , 'store'])->name('login.store');

Route::get('/register', [RegisterController::class, 'index'])->name('register.index');
Route::post('/register/singIn', [RegisterController::class, 'store'])->name('register.store');

Route::get('/home/usuario',[HomeController::class, 'index'])->name('home.usuario.index');

Route::get('/usuario/publicar', [PersonController::class, 'index'])->name('usuario.index');
Route::post('/usuario/upload', [PersonController::class, 'save'])->name('usuario.save');
Route::get('/usuario/post', [PostController::class, 'index'])->name('usuario.post.index');
Route::get('/usuario/show/{id}',[PostController::class, 'show'])->name('usuario.post.show');

Route::put('/usuario/caracteristica', [CharacteristicController::class,'update'])->name('usuario.caracteristica.update');
Route::put('/usuario/persona/update',[PersonController::class, 'update'])->name('usuario.persona.update');
Route::put('/usuario/particularidad', [ParticularityController::class,'update'])->name('usuario.particularidad.update');




//VISTA VISITADOR
Route::get('/', [HomeControllerVisitador::class, 'index'])->name('home.visitador.index');
Route::get('/visitador/{id}', [HomeControllerVisitador::class, 'show'])->name('visitador.show');

Route::post('/coordenadas/save', [CoordenadaController::class, 'save'])->name('visitador.coordenada.save');
Route::get('/coordenadas/fecth', [CoordenadaController::class, 'fetchCoordenadas'])->name('coordenada.fecth');

