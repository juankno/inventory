<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Product::factory()->count(50)->create([
            'category_id' => function () {
                return \App\Models\Category::inRandomOrder()->first()->id;
            },
        ]);
    }
}
