<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
			
            ['name'=>'MarcAdmin', 'email'=>'marcAdmin2@prova.com', 'password'=>'provaprova', 'role'=>'admin'],
			['name'=>'Gustavo Fring', 'email'=>'pollos@hermanos.com', 'password'=>'provaprova', 'role'=>'restaurante'],
			['name'=>'Luigi', 'email'=>'generica@pizzeria.com', 'password'=>'provaprova', 'role'=>'restaurante'],
			['name'=>'Pol', 'email'=>'polCliente@prova.com', 'password'=>'provaprova', 'role'=>'cliente'],
			['name'=>'Juan', 'email'=>'juanCliente@prova.com', 'password'=>'provaprova', 'role'=>'cliente'],
			['name'=>'Marc', 'email'=>'marcCliente@prova.com', 'password'=>'provaprova', 'role'=>'cliente']
			
		];
        User::insert($users); 
    }
}
