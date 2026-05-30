<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'name' => 'Wireless Mouse',
                'category' => 'Electronics',
                'price' => 29.99,
                'description' => 'A high-precision wireless mouse with ergonomic design.',
                'stock' => 150,
            ],
            [
                'name' => 'Bluetooth Headphones',
                'category' => 'Electronics',
                'price' => 59.99,
                'description' => 'Noise-cancelling over-ear headphones with Bluetooth connectivity.',
                'stock' => 100,
            ],
            [
                'name' => 'Coffee Maker',
                'category' => 'Home Appliances',
                'price' => 89.99,
                'description' => 'A programmable coffee maker with a built-in grinder.',
                'stock' => 50,
            ],
            [
                'name' => 'Yoga Mat',
                'category' => 'Fitness',
                'price' => 19.99,
                'description' => 'A non-slip yoga mat with extra cushioning for comfort.',
                'stock' => 200,
            ],
            [
                'name' => 'Smart Watch',
                'category' => 'Electronics',
                'price' => 199.99,
                'description' => 'A smart watch with fitness tracking and notifications.',
                'stock' => 75,
            ],
            [
                'name' => 'Electric Kettle',
                'category' => 'Home Appliances',
                'price' => 39.99,
                'description' => 'A fast-boiling electric kettle with auto shut-off.',
                'stock' => 120,
            ],
            [
                'name' => 'Running Shoes',
                'category' => 'Footwear',
                'price' => 79.99,
                'description' => 'Lightweight running shoes with breathable mesh upper.',
                'stock' => 80,
            ],
            [
                'name' => 'Backpack',
                'category' => 'Accessories',
                'price' => 49.99,
                'description' => 'A durable backpack with multiple compartments for organization.',
                'stock' => 60,
            ],
            [
                    'name' => 'LED Desk Lamp',
                    'category' => 'Home Decor',
                    'price' => 24.99,
                    'description' => 'An energy-efficient LED desk lamp with adjustable brightness.',
                    'stock' => 90,
            ],
            [
                    'name' => 'Gaming Keyboard',
                    'category' => 'Electronics',
                    'price' => 89.99,
                    'description' => 'A mechanical gaming keyboard with customizable RGB lighting.',
                    'stock' => 40,
            ],
            [
                    'name' => 'Stainless Steel Water Bottle',
                    'category' => 'Outdoor',
                    'price' => 14.99,
                    'description' => 'A durable stainless steel water bottle with insulation.',
                    'stock' => 180,
            ],
             [
                    'name' => 'Portable Charger',
                    'category' => 'Electronics',
                    'price' => 34.99,
                    'description' => 'A compact portable charger with fast charging capabilities.',
                    'stock' => 110,
            ],
             [
                    'name' => 'Fitness Tracker',
                    'category' => 'Fitness',
                    'price' => 49.99,
                    'description' => 'A fitness tracker with heart rate monitoring and sleep tracking.',
                    'stock' => 70,
            ],
             [
                    'name' => 'Noise-Cancelling Earbuds',
                    'category' => 'Electronics',
                    'price' => 79.99,
                    'description' => 'True wireless earbuds with active noise cancellation.',
                    'stock' => 90,
            ],
             [
                    'name' => 'Smart Thermostat',
                    'category' => 'Home Appliances',
                    'price' => 149.99,
                    'description' => 'A smart thermostat that learns your schedule and saves energy.',
                    'stock' => 30,
            ],
        ];

        foreach($products as $product) {
            Product::create($product);
        }
    }
}
