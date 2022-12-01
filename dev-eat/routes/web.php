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
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('/');


Route::get('/', [App\Http\Controllers\RestauranteController::class, 'home'])->name('welcome');



// Route::group(['middleware'=>['auth','rol']],
Route::group(['middleware'=>['auth','role:cliente']], function() {
    //cliente
    
Route::get('/client', [App\Http\Controllers\RestauranteController::class, 'home'])->name('welcome');

Route::get('/client/restaurantes', [App\Http\Controllers\RestauranteController::class, 'index'])->name('restaurantes.index');
Route::get('/client/restaurantes/show/{id}', [App\Http\Controllers\RestauranteController::class, 'show'])->name('Clientrestaurantes.show');    
Route::get('/client/platos/show/{id}', [App\Http\Controllers\PlatoController::class, 'show'])->name('ClientePlatos.show');

Route::get('/client/restaurantes/show/{id}/pedidos/destroy/{idPedido}', [App\Http\Controllers\PedidosController::class, 'destroy'])->name('pedidos.destroy');

Route::get('/client/restaurantes/show/{id}/pedidos/edit/{idPedido}', [App\Http\Controllers\PedidosController::class, 'edit'])->name('pedidos.edit');

Route::post('/client/restaurantes/show/{id}/pedidos/update/{idPedido}', [App\Http\Controllers\PedidosController::class, 'update'])->name('pedidos.update');

Route::get('/client/restaurantes/show/{id}/pedidos/show/{idPedido}', [App\Http\Controllers\PedidosController::class, 'show'])->name('ClientePedidos.show');

Route::get('/client/restaurantes/show/{id}/pedidos/create', [App\Http\Controllers\PedidosController::class, 'create'])->name('ClientePedidos.create');

Route::post('/client/restaurantes/show/{id}/pedidos/store', [App\Http\Controllers\PedidosController::class, 'store'])->name('ClientePedidos.store');

Route::get('/client/restaurantes/show/{id}/pedidos/index', [App\Http\Controllers\PedidosController::class, 'index'])->name('ClientePedidos.index');

Route::get('/client/restaurantes/show/{id}/pedidos/pagar/{idPedido}', [App\Http\Controllers\PedidosController::class, 'pagar'])->name('ClientePedidos.pagar');
});


//////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////


Route::group(['middleware'=>['auth','role:restaurante']], function() {


Route::get('/', [App\Http\Controllers\RestauranteController::class, 'home'])->name('welcome');

///////// RESTAURANTES ///////////////

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


///////// PEDIDOS ///////////////


Route::get('/pedidos', [App\Http\Controllers\PedidosController::class, 'index'])->name('pedidos.index');

Route::get('/pedidos/show/{id}', [App\Http\Controllers\PedidosController::class, 'show'])->name('pedidos.show');

Route::get('/pedidos/create', [App\Http\Controllers\PedidosController::class, 'create'])->name('pedidos.create');




Route::get('/pedidos/destroy/{id}', [App\Http\Controllers\PedidosController::class, 'destroy'])->name('pedidos.destroy');

Route::get('/pedidos/edit/{id}', [App\Http\Controllers\PedidosController::class, 'edit'])->name('pedidos.edit');

Route::post('/pedidos/update/{id}', [App\Http\Controllers\PedidosController::class, 'update'])->name('pedidos.update');




});

Route::group(['middleware'=>['auth','role:admin']], function() {


  
    /*
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
    
    
    ///////// PEDIDOS ///////////////
    
    
    Route::get('/pedidos', [App\Http\Controllers\PedidosController::class, 'index'])->name('pedidos.index');
    
    Route::get('/pedidos/show/{id}', [App\Http\Controllers\PedidosController::class, 'show'])->name('pedidos.show');
    
    Route::get('/pedidos/create', [App\Http\Controllers\PedidosController::class, 'create'])->name('pedidos.create');
    
    
    Route::post('/pedidos/store', [App\Http\Controllers\PedidosController::class, 'store'])->name('pedidos.store');
    
    Route::get('/pedidos/destroy/{id}', [App\Http\Controllers\PedidosController::class, 'destroy'])->name('pedidos.destroy');
    
    Route::get('/pedidos/edit/{id}', [App\Http\Controllers\PedidosController::class, 'edit'])->name('pedidos.edit');
    
    Route::post('/pedidos/update/{id}', [App\Http\Controllers\PedidosController::class, 'update'])->name('pedidos.update');
    
    */
    
    
    });