<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    protected $fillable = [
        'direccion',
        'precioTotal',
        'preuTotal',
        'restaurante_id'
    ]; 

    public function platos()
    {
  	
	// La taula per seguir convencions Laravel s'hauria d'haver anomenat superhero_superpower!!! 
      
   	return $this->belongsToMany(
       		 Pedido::class,
        	'pedido_plato');
       
     }
    
}
