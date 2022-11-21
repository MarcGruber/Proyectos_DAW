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
			
            ['name'=>'macarrones', 'restaurante_id'=>2, 'precio'=>'5'],
			['name'=>'albondiga', 'restaurante_id'=>2, 'precio'=>'5'],
			['name'=>'paella' , 'restaurante_id'=>2, 'precio'=>'6'],
			['name'=>'batido', 'restaurante_id'=>2, 'precio'=>'2'],
			['name'=> 'coca cola', 'restaurante_id'=>2, 'precio'=>'3'],
			['name'=> 'ensalada', 'restaurante_id'=>2, 'precio'=>'9'],
			['name'=>'agua' , 'restaurante_id'=>2, 'precio'=>'3'],
			['name'=>'pollo marinado', 'restaurante_id'=>2, 'precio'=>'4' ],
			['name'=>'batido de proteinas', 'restaurante_id'=>2, 'precio'=>'5'],
			['name'=> 'monster' , 'restaurante_id'=>4, 'precio'=>'2'],
			['name'=> 'bistec' , 'restaurante_id'=>4, 'precio'=>'9'],
			['name'=> 'pepsi', 'restaurante_id'=>4, 'precio'=>'5'],
			['name'=> 'tiras de pollo' , 'restaurante_id'=>4, 'precio'=>'5'],
			['name'=> 'pollo rebozado' , 'restaurante_id'=>4, 'precio'=>'3'],
			['name'=> 'frankfurt' , 'restaurante_id'=>3, 'precio'=>'1'],
			['name'=> 'viena' , 'restaurante_id'=>3,'precio'=>'3.5'],
			['name'=> 'patatas fritas' , 'restaurante_id'=>3, 'precio'=>'2.5'],
			['name'=> 'patatas fritas' , 'restaurante_id'=>3, 'precio'=>'2'],
			
		];

		Plato::insert($superpowers);  
    }
}
