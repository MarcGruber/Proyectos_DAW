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

        $restaurante->user_id = 16;
        $restaurante->name = "Los Pollos Hermanos";
        $restaurante->capacidad = "50";

        $restaurante->save();
////////////////////////////////////////////////////////////////
        $restaurante2 = new Restaurante();

        $restaurante2->user_id = 17;
        $restaurante2->name = "Pizzeria Generica";
        $restaurante2->capacidad = "30";

        $restaurante2->save();

    }
}
