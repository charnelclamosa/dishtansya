<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Truncate table
        Product::truncate();

        // Create data seeds
        $products = [
            [
                'name' => 'Burger',
                'available_stock' => '99',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Spaghetti',
                'available_stock' => '99',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'French fries',
                'available_stock' => '99',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Milk tea',
                'available_stock' => '99',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Hotdog sandwich',
                'available_stock' => '99',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Salad',
                'available_stock' => '99',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Fried chicken with rice',
                'available_stock' => '99',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Ramen',
                'available_stock' => '99',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Salad',
                'available_stock' => '99',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Ice cream',
                'available_stock' => '99',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ];
        Product::insert($products);
    }
}
