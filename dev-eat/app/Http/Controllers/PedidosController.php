<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Pedido; 

class PedidosController extends Controller
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
        $pedidos = Pedido::all();
        
        for ($i=0; $i < $pedidos; $i++) { 
            dd($pedidos[$i]->user_id);
        }
    
        
        return view('pedidos.index',compact('pedidos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("clientes.pedidos.create");
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
        ]);

        // Primera forma: breu,insegura, necessita tenir array $fillable al model  
        $pedido =  new Pedido;

        $pedido->direccion = $request->direccion;
        $pedido->user_id = auth()->user()->id;
        $pedido->restaurante_id = $request->restaurante_id;
        $pedido->precioTotal = 0;

        $pedido->save();


        return redirect()->route('welcome')
                        ->with('success','Pedido creat correctament.');
        // Segona forma: més llarg...més segur..
        
        // $pedido = new Pedido;
        // $pedido->name = $request->name;
        // $pedido->save();
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pedido = Pedido::findOrFail($id);
        
        return view('pedidos.show',compact('pedido'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pedido = Pedido::findOrFail($id);
        return view('pedidos.edit',compact('pedido'));
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
            'name' => 'required',           
        ]);
    
        // Opcio 1
        $pedido = Pedido::findOrFail($id);
        $pedido->update($request->all());

        // Opcio 2
        // $pedido->name = $request->name;
        // $pedido->save();
    
        return redirect()->route('pedidos.index')
                        ->with('success','Pedido actualitzat correctament');
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
        $pedido = Pedido::findOrFail($id);
        // intentem esborrar-lo, En cas que un superheroi tingui aquest planeta assignat
        // es produiria un error en l'esborrat!!!!
        try {
            $result = $pedido->delete();
            
        }
        catch(\Illuminate\Database\QueryException $e) {
             return redirect()->route('pedidos.index')
                        ->with('error','Error esborrant el pedido');
        }   
        return redirect()->route('pedidos.index')
                        ->with('success','Pedido esborrat correctament.');    
    }
}
