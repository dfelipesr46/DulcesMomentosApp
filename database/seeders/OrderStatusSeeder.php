<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\OrderStatus;

class OrderStatusSeeder extends Seeder
{
    public function run(): void
    {
        $statuses = [
            ['name' => 'Pendiente'],
            ['name' => 'En preparación'],
            ['name' => 'Enviado']
        ];

        foreach ($statuses as $status) {
            OrderStatus::firstOrCreate(['name'=>$status['name']]);
        }
    }
}
