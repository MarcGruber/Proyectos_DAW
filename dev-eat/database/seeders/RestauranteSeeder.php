<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Restaurante;

class RestauranteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $restaurante = new Restaurante();

        
        $restaurante->nombre = "kfc";
        $restaurante->capacidad = "23";

        $restaurante->save();
////////////////////////////////////////////////////////////////
        $restaurante2 = new Restaurante();

        
        $restaurante2->nombre = "kfc";
        $restaurante2->capacidad = "23";

        $restaurante2->save();

///////////////////////////////////////////////////////////////
        $restaurante3 = new Restaurante();

        
        $restaurante3->nombre = "kfc";
        $restaurante3->capacidad = "23";

        $restaurante3->save();
    }
}
