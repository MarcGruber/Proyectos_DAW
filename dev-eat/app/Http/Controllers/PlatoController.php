<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Plato; 
use App\Models\Restaurante;
use App\Models\Pedido;

class PlatoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $platos = Plato::Paginate (10);
        $restaurantes = Restaurante::all();

    
        // Carreguem la vista planets/index.blade.php 
        // i li passem la llista de planetes
        return view('platos.index',compact('platos', 'restaurantes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (auth()->user()->role == 'restaurante') {
            $restaurantes = [];
 $restaurantsUsuari = Restaurante::Paginate(30);
                foreach ($restaurantsUsuari as $key) {
                    if ($key->user_id == auth()->user()->id) {
                        array_push($restaurantes, $key);
                    }
                }
            
                return view('viewsRestaurantes.platos.create',compact('restaurantes'));       


         }
        $restaurantes = Restaurante::Paginate (10);
        return view("viewsRestaurantes.platos.create", compact('restaurantes'));
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
                'precio' => 'required', 
                'restaurante_id' => 'required', 
            ]);
        
           
            
             $plato = new Plato;
             $plato->name = $request->name;
             $plato->precio = $request->precio;
             $plato->restaurante_id = $request->restaurante_id;
             $plato->save();
            
             return redirect()->route('restaurantes.show', $request->restaurante_id)
             ->with('success','Plat creat correctament');
        
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
              $plato = Plato::findOrFail($id);
              // carreguem la vista i li passem el planeta que volem visualitzar

              $roleUser = auth()->user()->role;
            if($roleUser == 'cliente' ){
                return view('clientes.platos.show',compact('plato'));
            }
            if ($roleUser == 'admin') {
                return view('platos.show',compact('plato'));
            }
            if ($roleUser == 'restaurante') {
                return view('viewsRestaurantes.platos.show',compact('plato'));
            }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $plato = Plato::findOrFail($id);
        return view('viewsRestaurantes.platos.edit',compact('plato'));
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
             //
             $request->validate([
                'name',
                'precio'          
            ]);
            $plato = Plato::findOrFail($id);
            $plato->update($request->all());
            
        
            return redirect()->route('restaurantes.show', $plato->restaurante_id)
            ->with('success','Restaurante editat correctament.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
           //  Obtenim el planeta que volem esborrar
           $plato = Plato::findOrFail($id);
           // intentem esborrar-lo, En cas que un superheroi tingui aquest planeta assignat
           // es produiria un error en l'esborrat!!!!
           try {
               $result = $plato->delete();
               return redirect()->route('restaurantes.show', $plato->restaurante_id)
               ->with('success','Restaurante editat correctament.');
           }
           catch(\Illuminate\Database\QueryException $e) {
                return redirect()->route('platos.index')
                           ->with('error','Error esborrant el plato');
           }   
           return redirect()->route('platos.index')
                           ->with('success','Plato esborrat correctament.');   
    }

}
