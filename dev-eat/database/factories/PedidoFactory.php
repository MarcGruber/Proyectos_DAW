<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\Pedido;
use Illuminate\Support\Str;

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

            'direccion' => $this->faker->sentence(),
            'user_id' => $this->faker->randomElement([18,19,20]),
            'restaurante_id' => $this->faker->randomElement([22,23]),
            'precioTotal' => $this->faker->randomElement(['10', '15', '12']),
            'estado' => $this->faker->randomElement([1,0])
        ];
    }
}
