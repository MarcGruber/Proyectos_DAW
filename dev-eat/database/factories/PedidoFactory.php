<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pedido>
 */
class PedidoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Pedido::class;
    
 
    public function definition()
    {
        return [
            'name' => Str::random(10), // $this->faker->name,

            $table->string('direccion');
            $table->string('precioTotal');
            $table->foreignId('restaurante_id')
        ];
    }
}
