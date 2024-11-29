<?php

namespace Database\Factories;

use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    protected $model = Order::class;

    public function definition(): array
    {
        return [
            'total_price' => $this->faker->randomFloat(2, 20, 500),
            'delivery_date' => $this->faker->dateTimeBetween('+1 day', '+1 month'),
        ];
    }
}
