<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Plato; 
use App\Models\Restaurante;
use App\Models\Pedido;
use App\Models\User;


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
        $roleUser = auth()->user()->role;

        // Recuperem una col·lecció amb tots els planetes de la BD
               $restaurantes = Restaurante::Paginate (10);
    
               // Carreguem la vista planets/index.blade.php 
               // i li passem la llista de planetes

        if($roleUser == 'cliente' ){
            return view('clientes.RestaurantesIndex',compact('restaurantes'));
        }
        if ($roleUser == 'admin') {
            return view('restaurantes.index',compact('restaurantes'));
        }
        
               

    }

    public function home()
    {
         if (auth()->user()->role == 'restaurante') {
            $restaurantes = [];
 $restaurantsUsuari = Restaurante::Paginate(30);
                foreach ($restaurantsUsuari as $key) {
                    if ($key->user_id == auth()->user()->id) {
                        array_push($restaurantes, $key);
                    }
                }
            
                return view('welcome',compact('restaurantes'));       


         } ;

        // Recuperem una col·lecció amb tots els planetes de la BD
               $restaurantes = Restaurante::Paginate (10);
    
               // Carreguem la vista planets/index.blade.php 
               // i li passem la llista de planetes
        if (auth()->user()->role == 'restaurante') {
        }

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
                $restaurante =  new Restaurante;

                $restaurante->user_id = auth()->user()->id;
                $restaurante->name = $request->name;
                $restaurante->capacidad = $request->capacidad;

                $restaurante->save();

                if(auth()->user()->role == 'restaurante'){
                    return redirect()->route('welcomeRestaurante')
                    ->with('success','Restaurante creat correctament.');
                }
             
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

                $roleUser = auth()->user()->role;
                // mostrar id -> auth()->user()->id;

                if($roleUser == 'cliente' ){
                    return view('clientes.restaurantes.show',compact('restaurante'));
                }
                if ($roleUser == 'admin') {
                    $user = User::findOrFail($id);
                    return view('restaurantes.show',compact('restaurante','user'));
                }
                if ($roleUser == 'restaurante') {
                    return view('viewsRestaurantes.restaurantes.show',compact('restaurante'));
                }
    }

    public function showPlatos($id)
    {
                // Obtenim un objecte Planet a partir del seu id
                $restaurante = Restaurante::findOrFail($id);
                $platos = [];
                // carregue la vista i li passem el planeta que volem visualitzar

        if ( auth()->user()->role == 'restaurante' && auth()->user()->id == $restaurante->user_id) {
            $platos = Plato::where('restaurante_id', $id)->get();
            return view('viewsRestaurantes.platos.index',compact('platos'));
        } else {
            dd('error');
        };
        

               // return view('restaurantes.show',compact('restaurante'));
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

    
        return redirect()->route('restaurantes.show', $restaurante->id)
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
               $restaurante = Restaurante::findOrFail($id);

                   $result = $restaurante->delete();
                   
                   return redirect()->route('welcomeRestaurante')
                   ->with('success','Restaurante eliminat correctament.');
    }
}
