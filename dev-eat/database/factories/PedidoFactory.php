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

            'name' => $this->faker->sentence(),
            'direccion' => $this->faker->sentence(),
            'precioTotal' => $this->faker->randomElement(['4', '3', '5']),
            'restaurante_id' => $this->faker->randomElement(['1','2','3'])

        ];
    }
}
