<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'Galletas'],
            ['name' => 'Pasteles'],
            ['name' => 'Cupcakes'],
        ];

        foreach ($categories as $category) {

            Category::firstOrCreate(['name'=>$category['name']]);
        }
    }
}
