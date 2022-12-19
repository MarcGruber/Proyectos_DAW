<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Pedido; 
use App\Models\Plato; 
use App\Models\Restaurante; 

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

    public function index($id)
    {
        if(auth()->user()->role == 'restaurante'){
            $pedidos = Pedido::where('restaurante_id', $id)->where('estado', 1)
            ->get();
            
            return view('viewsRestaurantes.pedidos.index',compact('pedidos'));
        }
        
        //$pedidos = Pedido::all();
        if(auth()->user()->role == 'cliente'){
        $pedidos = Pedido::where('user_id', auth()->user()->id)
        ->where('restaurante_id', $id)
        ->get();
        }
        
        
        
        
        return view('clientes.pedidos.index',compact('pedidos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $restaurante = Restaurante::findOrFail($id);
        return view("clientes.pedidos.create", compact('restaurante'));
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

        return redirect()->route('ClientePedidos.index', $request->restaurante_id)
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


    public function showPedido($id, $idPedido)
    {

        if(auth()->user()->role == 'cliente'){
        $pedido = Pedido::findOrFail($idPedido);
        $platosPedido = $pedido->platos()->where('pedido_id', $idPedido)->get();
        return view('clientes.pedidos.showPedido',compact('platosPedido','pedido'));
        }

        if(auth()->user()->role == 'restaurante'){
        $pedido = Pedido::findOrFail($idPedido);
        $platosPedido = $pedido->platos()->where('pedido_id', $idPedido)->get();

        return view('viewsRestaurantes.pedidos.show',compact('platosPedido','pedido'));
        }
    }



    public function showPlatos($request,$id)
    {
        if(auth()->user()->role == 'cliente'){
            $pedido = Pedido::findOrFail($id);
            $platos = Plato::all();
    
            return view('clientes.pedidos.show',compact('pedido', 'platos'));
        }
        if(auth()->user()->role == 'restaurante'){
            $pedido = Pedido::findOrFail($id);
            $platos = Plato::all();
           
            return view('viewsRestaurantes.pedidos.show',compact('pedido', 'platos'));
        }

    }


    public function pagar($id, $idPedido)
    {
        $pedido = Pedido::findOrFail($idPedido);
        $pedido->estado = 1;
        $pedido->save();


        $pedidos = Pedido::where('user_id', auth()->user()->id)
        ->where('restaurante_id', $id)
        ->get();
        
        return view('clientes.pedidos.index',compact('pedidos'));
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
    public function destroy($idRestaurante, $id)
    {
        //  Obtenim el planeta que volem esborrar
        $pedido = Pedido::findOrFail($id);
        // intentem esborrar-lo, En cas que un superheroi tingui aquest planeta assignat
        // es produiria un error en l'esborrat!!!!
        if($pedido->estado == 0){
        try {
            $result = $pedido->delete();

            $pedidos = Pedido::where('user_id', auth()->user()->id)
            ->where('restaurante_id', $id)
            ->get();
            
            return redirect()->route('ClientePedidos.index', $idRestaurante);
            
        }
        catch(\Illuminate\Database\QueryException $e) {
             return redirect()->route('pedidos.index')
                        ->with('error','Error esborrant el pedido');
        }   
        return redirect()->route('pedidos.index')
                        ->with('success','Pedido esborrat correctament.');    
    }
    }

    
    public function agregarPlato($idRestaurante,$idPedido, $idPlato){
        
        $pedido = Pedido::findOrFail($idPedido);
        $plato = Plato::findOrFail($idPlato);
        if ($pedido->estado == 0) {

            $precioPlato = $plato->precio;
            $precioTotal = $pedido->precioTotal;

            $precioSumado = $precioTotal + $precioPlato;

            $pedido->precioTotal = $precioSumado;
            $pedido->save();

            $pedido->platos()->attach($idPlato);
            return redirect()->route('ClientePedidos.index', $idRestaurante);
        } else {
            return response('El pedido ya esta pagado', 200);
        }
    }
    
    public function deletePlato($idRestaurante,$idPedido, $idPlato){
        
        $pedido = Pedido::findOrFail($idPedido);
        $plato = Plato::findOrFail($idPlato);
        if ($pedido->estado == 0) {

            $precioPlato = $plato->precio;
            $precioTotal = $pedido->precioTotal;

            $precioSumado = $precioTotal - $precioPlato;
            $pedido->precioTotal = $precioSumado;
            $pedido->save();
            
            $pedido->platos()->detach($idPlato);
            return redirect()->route('ClientePedidos.index', $idRestaurante);
        } else {
            return response('El pedido ya esta pagado', 200);
        }
    }
}
