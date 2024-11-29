<?php


namespace Database\Seeders;

use Database\Seeders\CategorySeeder;
use Database\Seeders\OrderStatusSeeder;
use Database\Seeders\ProductSeeder;
use Database\Seeders\CustomerSeeder;
use Database\Seeders\OrderSeeder;
use Database\Seeders\OrderProductSeeder;




// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            CategorySeeder::class,
            ProductSeeder::class,
            OrderStatusSeeder::class,
            CustomerSeeder::class,
            OrderSeeder::class,
            OrderProductSeeder::class,
        ]);
    }
}
