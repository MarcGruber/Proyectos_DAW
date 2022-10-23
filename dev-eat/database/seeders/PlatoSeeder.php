<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Plato; 

class PlatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $superpowers = [
            ['name'=>'maccarrones', 'restaurante_id'=>'2'],
			['name'=>'albondiga', 'restaurante_id'=>'2'],
			['name'=>'paella' , 'restaurante_id'=>'2'],
			['name'=>'batido', 'restaurante_id'=>'2'],
			['name'=> 'coca cola', 'restaurante_id'=>'2'],
			['name'=> 'ensalada', 'restaurante_id'=>'2'],
			['name'=>'agua' , 'restaurante_id'=>'2'],
			['name'=>'pollo marinado', 'restaurante_id'=>'2' ],
			['name'=>'batido de proteinas', 'restaurante_id'=>'2'],
			['name'=> 'monster' , 'restaurante_id'=>'1'],
			['name'=> 'bistec' , 'restaurante_id'=>'1'],
			['name'=> 'pepsi', 'restaurante_id'=>'1'],
			['name'=> 'tiras de pollo' , 'restaurante_id'=>'1'],
			['name'=> 'pollo rebozado' , 'restaurante_id'=>'1'],
			['name'=> 'frankfurt' , 'restaurante_id'=>'3'],
			['name'=> 'viena' , 'restaurante_id'=>'33'],
			['name'=> 'patatas fritas' , 'restaurante_id'=>'3'],
			['name'=> 'patatas fritas' , 'restaurante_id'=>'3'],
			['name'=> 'hamburgesa artesanal' , 'restaurante_id'=>'3'],
		];

		Plato::insert($superpowers);  
    }
}
