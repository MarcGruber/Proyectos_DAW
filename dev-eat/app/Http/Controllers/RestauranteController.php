<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Restaurante;

class RestauranteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
       // $this->middleware('auth');
    }
    public function index()
    {
               // Recuperem una col·lecció amb tots els planetes de la BD
               $restaurantes = Restaurante::Paginate (10);
    
               // Carreguem la vista planets/index.blade.php 
               // i li passem la llista de planetes
               return view('restaurantes.index',compact('restaurantes'));
    }

    public function home()
    {
               // Recuperem una col·lecció amb tots els planetes de la BD
               $restaurantes = Restaurante::Paginate (10);
    
               // Carreguem la vista planets/index.blade.php 
               // i li passem la llista de planetes
               return view('welcome',compact('restaurantes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("restaurantes.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
                // Validació dels camps
                $request->validate([
                    'name' => 'required',            
                    'capacidad' => 'required',
                ]);
            
                // Primera forma: breu,insegura, necessita tenir array $fillable al model
                Restaurante::create($request->all());
             
                return redirect()->route('restaurantes.index')
                                ->with('success','Restaurante creat correctament.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
                // Obtenim un objecte Planet a partir del seu id
                $restaurante = Restaurante::findOrFail($id);
                // carreguem la vista i li passem el planeta que volem visualitzar
                return view('restaurantes.show',compact('restaurante'));
    }

    public function showPlatos($id)
    {
                // Obtenim un objecte Planet a partir del seu id
                $restaurante = Restaurante::findOrFail($id);

                $restaurante = Restaurante::find(10);
                echo $restaurante->plato->name;

                // carreguem la vista i li passem el planeta que volem visualitzar
                return view('restaurantes.show',compact('restaurante'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $restaurante = Restaurante::findOrFail($id);
        return view('restaurantes.edit',compact('restaurante'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name', 
            'capacidad'          
        ]);
    
        // Opcio 1
        $restaurante = Restaurante::findOrFail($id);
        $restaurante->update($request->all());

    
        return redirect()->route('restaurantes.index')
                        ->with('success','Restaurante actualitzat correctament');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
               $restaurante = Restaurante::findOrFail($id);

               try {
                   $result = $restaurante->delete();
                   
               }
               catch(\Illuminate\Database\QueryException $e) {
                    return redirect()->route('restaurantes.index')
                               ->with('error','Error esborrant el restaurant');
               }   
               return redirect()->route('restaurantes.index')
                               ->with('success','Restaurant esborrat correctament.');    
    }
}
