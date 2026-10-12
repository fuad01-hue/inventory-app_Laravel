<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Product;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $catLaptop = Category::create(['name' => 'Laptop']);
        $catAksesoris = Category::create(['name' => 'Aksesoris']);

        Product::create([
            'category_id' => $catLaptop->id,
            'sku' => 'LAP-001',
            'name' => 'Lenovo ThinkPad T14 Gen 1',
            'price' => 15000000,
            'stock' => 12
        ]);

        Product::create([
            'category_id' => $catAksesoris->id,
            'sku' => 'ACC-001',
            'name' => 'Mouse Gaming Furycube R7',
            'price' => 350000,
            'stock' => 25
        ]);
    }
}