<?php

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

Route::get('/', function () {
    return "welcome.blade.php";
});

///////// RESTAURANTES ///////////////
Route::get('/restaurantes', [App\Http\Controllers\RestauranteController::class, 'index'])->name('restaurantes.index');

Route::get('/restaurantes/show/{id}', [App\Http\Controllers\RestauranteController::class, 'show'])->name('restaurantes.show');

Route::get('/restaurantes/create', [App\Http\Controllers\RestauranteController::class, 'create'])->name('restaurantes.create');


Route::post('/restaurantes/store', [App\Http\Controllers\RestauranteController::class, 'store'])->name('restaurantes.store');

Route::get('/restaurantes/destroy/{id}', [App\Http\Controllers\RestauranteController::class, 'destroy'])->name('restaurantes.destroy');

Route::get('/restaurantes/edit/{id}', [App\Http\Controllers\RestauranteController::class, 'edit'])->name('restaurantes.edit');

Route::post('/restaurantes/update/{id}', [App\Http\Controllers\RestauranteController::class, 'update'])->name('restaurantes.update');




///////// PLATOS ///////////////


Route::get('/platos', [App\Http\Controllers\PlatoController::class, 'index'])->name('platos.index');

Route::get('/platos/show/{id}', [App\Http\Controllers\PlatoController::class, 'show'])->name('platos.show');

Route::get('/platos/create', [App\Http\Controllers\PlatoController::class, 'create'])->name('platos.create');


Route::post('/platos/store', [App\Http\Controllers\PlatoController::class, 'store'])->name('platos.store');

Route::get('/platos/destroy/{id}', [App\Http\Controllers\PlatoController::class, 'destroy'])->name('platos.destroy');

Route::get('/platos/edit/{id}', [App\Http\Controllers\PlatoController::class, 'edit'])->name('platos.edit');

Route::post('/platos/update/{id}', [App\Http\Controllers\PlatoController::class, 'update'])->name('platos.update');