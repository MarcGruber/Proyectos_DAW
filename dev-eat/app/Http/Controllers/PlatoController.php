<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Plato; 

class PlatoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $platos = Plato::all();
    
        // Carreguem la vista planets/index.blade.php 
        // i li passem la llista de planetes
        return view('platos.index',compact('platos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("platos.create");
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
            
             return redirect()->route('platos.index')
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
              return view('platos.show',compact('plato')); 
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
        return view('platos.edit',compact('plato'));
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
                'nom' => 'required',
                'precio' => 'required'           
            ]);
           
            $plato = Plato::findOrFail($id);
            $plato->update($request->all());
        
        
            return redirect()->route('platos.index')
                            ->with('success','Plato actualitzat correctament');
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
               
           }
           catch(\Illuminate\Database\QueryException $e) {
                return redirect()->route('platos.index')
                           ->with('error','Error esborrant el plato');
           }   
           return redirect()->route('platos.index')
                           ->with('success','Plato esborrat correctament.');   
    }
}
