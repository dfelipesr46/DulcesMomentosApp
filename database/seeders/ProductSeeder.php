<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $categories = Category::all(); // Obtener todas las categorías

        foreach ($categories as $category) {
            Product::factory()->count(5)->create([
                'category_id' => $category->id, // Asignar productos a cada categoría
            ]);
        }
    }
}
