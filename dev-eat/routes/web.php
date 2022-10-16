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
    return "welcome";
});

Route::get('menu', function () {
    return "Bienvenido a la pagina de menus";
});

Route::get('menu/create', function() {
    return "En esta pagina podras crear un menu";
});



Route::get('menu/{menu}/{plato?}', function($menu, $plato = null) {
    if ($plato === null) {
        return "Bienvenido al menu $menu";   
    } else {
    return "Esto es el plato $plato del menu $menu";
    }
});
