<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->words(2, true), // Nombre del producto
            'description' => $this->faker->sentence(),
            'price' => $this->faker->randomFloat(2, 5, 100), // Precio aleatorio entre 5 y 100
        ];
    }
}
