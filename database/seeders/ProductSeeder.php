<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Category;
use App\Models\User;
use App\Models\Brand;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $allProducts = [
            // Laptop Products
            [
                "id" => 1,
                "image_path" => "https://multimedia.bbycastatic.ca/multimedia/products/250x250/189/18925/18925110.jpeg",
                "name" => "Open Box - Apple MacBook Air 13.6\" with Touch ID (2022) - Midnight (Apple M2 / 16GB RAM / 256GB SSD) - English",
                "price" => 969.99,
                "sale_price" => 969.99,
                "description" => "Open Box Apple MacBook Air featuring Apple M2 chip, 16GB RAM, and 256GB SSD in Midnight color.",
                "category_id" => 1,  // Example category ID, you should set it accordingly
                "brand" => "Apple",
                "model" => "MacBook Air 13.6\" (2022)",
                "color" => "Midnight",
                "stock" => 10,
                "is_featured" => true,
                "features" => json_encode([
                    'processor' => 'Apple M2',
                    'ram' => '16GB',
                    'storage' => '256GB SSD',
                    'screen_size' => '13.6"'
                ]),
                'slug' => Str::slug('Open Box - Apple MacBook Air 13.6" with Touch ID (2022) - Midnight'),
            ],
            [
                "id" => 2,
                "image_path" => "https://multimedia.bbycastatic.ca/multimedia/products/250x250/165/16566/16566905.jpg",
                "name" => "Apple iPad 10.9\" 64GB with Wi-Fi 6 (10th Generation) - Silver",
                "price" => 439.99,
                "sale_price" => 439.99,
                "description" => "Apple iPad 10.9\" with Wi-Fi 6, featuring a 10th generation Apple A14 Bionic chip, 4GB RAM, and 64GB storage.",
                "category_id" => 2,  // Example category ID
                "brand" => "Apple",
                "model" => "iPad 10.9\" (10th Generation)",
                "color" => "Silver",
                "stock" => 15,
                "is_featured" => false,
                "features" => json_encode([
                    'processor' => 'Apple A14 Bionic',
                    'ram' => '4GB',
                    'storage' => '64GB',
                    'wifi' => 'Wi-Fi 6'
                ]),
                'slug' => Str::slug('Apple iPad 10.9" 64GB with Wi-Fi 6 (10th Generation) - Silver'),
            ],
            [
                "id" => 3,
                "image_path" => "https://multimedia.bbycastatic.ca/multimedia/products/250x250/149/14933/14933348.jpg",
                "name" => "Acer Aspire Go 15.6\" Laptop - Silver (Intel N100/8GB RAM/512GB SSD/Windows 11)",
                "price" => 399.99,
                "sale_price" => 399.99,
                "description" => "Acer Aspire Go 15.6\" Laptop with Intel N100 processor, 8GB RAM, and 512GB SSD.",
                "category_id" => 1,  // Example category ID
                "brand" => "Acer",
                "model" => "Aspire Go",
                "color" => "Silver",
                "stock" => 20,
                "is_featured" => false,
                "features" => json_encode([
                    'processor' => 'Intel N100',
                    'ram' => '8GB',
                    'storage' => '512GB SSD',
                    'os' => 'Windows 11'
                ]),
                'slug' => Str::slug('Acer Aspire Go 15.6" Laptop - Silver (Intel N100/8GB RAM/512GB SSD/Windows 11)'),
            ],
            // Headphones Products
            [
                "id" => 4,
                "image_path" => "https://multimedia.bbycastatic.ca/multimedia/products/250x250/181/18150/18150113.jpg",
                "name" => "Apple AirPods 4 In-Ear True Wireless Earbuds with USB-C Charging Case",
                "price" => 159.99,
                "sale_price" => 159.99,
                "description" => "Apple AirPods 4 In-Ear true wireless earbuds with USB-C charging case. Features Apple H1 chip for seamless connectivity.",
                "category_id" => 3,  // Example category ID
                "brand" => "Apple",
                "model" => "AirPods 4",
                "color" => "White",
                "stock" => 50,
                "is_featured" => true,
                "features" => json_encode([
                    'chip' => 'Apple H1',
                    'connectivity' => 'Bluetooth 5.0',
                    'charging_case' => 'USB-C'
                ]),
                'slug' => Str::slug('Apple AirPods 4 In-Ear True Wireless Earbuds with USB-C Charging Case'),
            ]
        ];

        // Loop through each product and insert it into the database
        foreach ($allProducts as $productData) {
            // Get a random category and brand
            $category = Category::find($productData['category_id']);  // Ensure the category exists
            $brand = Brand::firstOrCreate(['name' => $productData['brand']]);  // Ensure brand exists or create it
            $user = User::inRandomOrder()->first(); // Get a random user who added the product

            // Create the product and associate it with the random category, brand, and user
            Product::create([
                'added_by' => $user->id, 
                'image_path' => $productData['image_path'],
                'name' => $productData['name'],
                'price' => $productData['price'],
                'sale_price' => $productData['sale_price'],
                'description' => $productData['description'],
                'category_id' => $category->id,  // Assign the category_id here
                'brand_id' => $brand->id, // Assign the brand_id here
                'stock' => $productData['stock'],
                'is_featured' => $productData['is_featured'],
                'condition' => $productData['condition'] ?? null,
                'features' => $productData['features'], // Store features as JSON
                'slug' => $productData['slug'],
                'model' => $productData['model'],
            ]);
        }
    }
}
