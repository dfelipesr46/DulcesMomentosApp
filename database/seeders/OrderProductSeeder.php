<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Database\Seeder;

class OrderProductSeeder extends Seeder
{
    public function run(): void
    {
        $orders = Order::all();
        $products = Product::all();

        foreach ($orders as $order) {
            $randomProducts = $products->random(rand(1, 5)); // Selecciona entre 1 y 5 productos aleatorios

            foreach ($randomProducts as $product) {
                $quantity = rand(1, 10);
                $subtotal = $quantity * $product->price;

                $order->products()->attach($product->id, [
                    'quantity' => $quantity,
                    'subtotal' => $subtotal,
                ]);
            }
        }
    }
}
