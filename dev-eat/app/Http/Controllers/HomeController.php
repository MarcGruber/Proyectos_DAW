<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Restaurante;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {


        // Recuperem una col·lecció amb tots els planetes de la BD
               $restaurantes = Restaurante::Paginate (10);
    
               // Carreguem la vista planets/index.blade.php 
               // i li passem la llista de planetes


            return view('welcome',compact('restaurantes'));
        

    }
}
