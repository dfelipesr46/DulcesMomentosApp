<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\OrderStatus;
use App\Models\Customer;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    public function run(): void
    {
        $statuses = OrderStatus::pluck('id'); // Obtener los IDs de los estados
        $customers = Customer::all(); // Obtener todos los clientes

        foreach ($customers as $customer) {
            Order::factory()->count(2)->create([
                'customer_id' => $customer->id,
                'status_id' => $statuses->random(),
            ]);
        }
    }
}
