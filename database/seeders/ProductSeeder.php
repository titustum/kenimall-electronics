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
            ],
            [
                'name' => 'Samsung 65-inch 4K QLED TV',
                'description' => 'Experience stunning 4K visuals with the Samsung QLED TV featuring Quantum HDR and smart TV capabilities.',
                'model' => 'Q90T',
                'price' => 1499.99,
                'sale_price' => 1299.99,
                'stock' => 15,
                'is_featured' => true,
                'added_by' => 1,  // Replace with a valid user_id
                'category_id' => 1, // Replace with valid category_id for TVs
                'brand' => "Sumsung", // Replace with Samsung brand id
                'condition' => 'New',
                'specifications' => json_encode([
                    'resolution' => '3840x2160',
                    'screen_size' => '65 inches',
                    'refresh_rate' => '120Hz',
                    'smart_tv' => true,
                    'hdmi_ports' => 4,
                ]),
                'features' => json_encode(['4K', 'QLED', 'HDR10+', 'Bluetooth', 'WiFi']),
                'color' => 'Black',
                'image_path' => 'https://le.co.ke/wp-content/uploads/2023/05/samsung-qa65q60cau-65-inch-smart-qled-tv.jpeg',
                'slug' => 'samsung-65-inch-4k-qled-tv',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Sony WH-1000XM5 Wireless Headphones',
                'description' => 'Industry-leading noise cancellation headphones with exceptional sound quality and up to 30 hours battery life.',
                'model' => 'WH-1000XM5',
                'price' => 399.99,
                'sale_price' => null,
                'stock' => 25,
                'is_featured' => true,
                'added_by' => 1,
                'category_id' => 2, // Audio category id
                'brand' => "Sony", // Sony brand id
                'condition' => 'New',
                'specifications' => json_encode([
                    'battery_life' => '30 hours',
                    'noise_cancellation' => true,
                    'bluetooth_version' => '5.2',
                    'weight' => '250g',
                ]),
                'features' => json_encode(['Wireless', 'Noise Cancelling', 'Bluetooth', 'Touch Controls']),
                'color' => 'Black',
                'image_path' => 'https://le.co.ke/wp-content/uploads/2023/01/507.png',
                'slug' => 'sony-wh-1000xm5-wireless-headphones',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Apple iPhone 14 Pro Max',
                'description' => 'The latest iPhone with A16 Bionic chip, ProMotion display, and advanced camera system.',
                'model' => 'iPhone14ProMax',
                'price' => 1099.00,
                'sale_price' => 999.00,
                'stock' => 30,
                'is_featured' => true,
                'added_by' => 1,
                'category_id' => 3, // Mobile category id
                'brand' => "Apple", // Apple brand id
                'condition' => 'New',
                'specifications' => json_encode([
                    'display' => '6.7 inches OLED',
                    'processor' => 'A16 Bionic',
                    'storage' => '256GB',
                    'camera' => '48MP Triple-lens',
                    'battery' => '4323 mAh',
                ]),
                'features' => json_encode(['5G', 'Face ID', 'Wireless Charging', 'ProMotion']),
                'color' => 'Space Black',
                'image_path' => 'https://le.co.ke/wp-content/uploads/2023/02/Google-Pixel-6.jpg',
                'slug' => 'apple-iphone-14-pro-max',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Dell XPS 15 Laptop',
                'description' => 'High-performance laptop with 11th Gen Intel Core i7, 16GB RAM, and 512GB SSD for professionals.',
                'model' => 'XPS15-9500',
                'price' => 1599.99,
                'sale_price' => 1499.99,
                'stock' => 10,
                'is_featured' => false,
                'added_by' => 1,
                'category_id' => 4, // Laptops category id
                'brand' =>"Dell", // Dell brand id
                'condition' => 'New',
                'specifications' => json_encode([
                    'processor' => 'Intel Core i7-11800H',
                    'ram' => '16GB',
                    'storage' => '512GB SSD',
                    'display' => '15.6 inches 4K OLED',
                    'graphics' => 'NVIDIA GTX 1650 Ti',
                ]),
                'features' => json_encode(['Backlit Keyboard', 'Fingerprint Reader', 'Thunderbolt 4']),
                'color' => 'Silver',
                'image_path' => 'https://le.co.ke/wp-content/uploads/2022/04/dell-vostro-3400-3.jpg',
                'slug' => 'dell-xps-15-laptop',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Bose SoundLink Revolve+ Speaker',
                'description' => 'Portable Bluetooth speaker with 360-degree sound and up to 16 hours of battery life.',
                'model' => 'SoundLinkRevolve+',
                'price' => 299.00,
                'sale_price' => 279.00,
                'stock' => 20,
                'is_featured' => false,
                'added_by' => 1,
                'category_id' => 2, // Audio category id
                'brand' => "Bose", // Bose brand id
                'condition' => 'New',
                'specifications' => json_encode([
                    'battery_life' => '16 hours',
                    'water_resistant' => 'IPX4',
                    'bluetooth_range' => '30 feet',
                    'weight' => '1.5 lbs',
                ]),
                'features' => json_encode(['Bluetooth', '360-degree Sound', 'Portable', 'Water Resistant']),
                'color' => 'Black',
                'image_path' => 'https://le.co.ke/wp-content/uploads/2024/01/Logitech-Z333-Speaker-01.jpg.webp',
                'slug' => 'bose-soundlink-revolve-plus-speaker',
                'created_at' => now(),
                'updated_at' => now(),
            ],
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
