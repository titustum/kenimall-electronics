<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Seeder;

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
            [
                "id" => 1,
                "image_url" => "https://multimedia.bbycastatic.ca/multimedia/products/250x250/189/18925/18925110.jpeg",
                "name" => "Open Box - Apple MacBook Air 13.6\" with Touch ID (2022) - Midnight (Apple M2 / 16GB RAM / 256GB SSD) - English",
                "price" => 969.99,
                "original_price" => 1299.99,
                "discount" => 25,
                "rating" => 0.0,
                "reviews_count" => 0,
                "brand" => "Apple",
                "model" => "MacBook Air 13.6\" (2022)",
                "processor" => "Apple M2",
                "ram" => "16GB",
                "storage" => "256GB SSD",
                "description" => "Open Box Apple MacBook Air featuring Apple M2 chip, 16GB RAM, and 256GB SSD in Midnight color."
            ],
            [
                "id" => 2,
                "image_url" => "https://multimedia.bbycastatic.ca/multimedia/products/250x250/165/16566/16566905.jpg",
                "name" => "Apple iPad 10.9\" 64GB with Wi-Fi 6 (10th Generation) - Silver",
                "price" => 439.99,
                "original_price" => 499.99,
                "discount" => 12,
                "rating" => 4.42,
                "reviews_count" => 12,
                "brand" => "Apple",
                "model" => "iPad 10.9\" (10th Generation)",
                "processor" => "Apple A14 Bionic",
                "ram" => "4GB",
                "storage" => "64GB",
                "description" => "Apple iPad 10.9\" with Wi-Fi 6, featuring a 10th generation Apple A14 Bionic chip, 4GB RAM, and 64GB storage."
            ],
            [
                "id" => 3,
                "image_url" => "https://multimedia.bbycastatic.ca/multimedia/products/250x250/155/15557/15557657.jpg",
                "name" => "Soundcore by Anker Life Tune Pro Over-Ear Noise Cancelling Bluetooth Headphones - Blue",
                "price" => 59.99,
                "original_price" => 159.99,
                "discount" => 62,
                "rating" => 4.24,
                "reviews_count" => 49,
                "brand" => "Anker",
                "model" => "Life Tune Pro",
                "processor" => "Bluetooth 5.0",
                "ram" => "N/A",
                "storage" => "N/A",
                "description" => "Anker Life Tune Pro Over-Ear Noise Cancelling Bluetooth Headphones in Blue. Provides superior sound quality and noise cancellation."
            ],
            [
                "id" => 4,
                "image_url" => "https://multimedia.bbycastatic.ca/multimedia/products/250x250/153/15386/15386732.jpg",
                "name" => "HP DeskJet 2755e Wireless All-In-One Inkjet Printer - HP Instant Ink 3-Month Free Trial Included*",
                "price" => 59.99,
                "original_price" => 104.99,
                "discount" => 43,
                "rating" => 4.14,
                "reviews_count" => 5460,
                "brand" => "HP",
                "model" => "DeskJet 2755e",
                "processor" => "N/A",
                "ram" => "N/A",
                "storage" => "N/A",
                "description" => "HP DeskJet 2755e wireless all-in-one inkjet printer, featuring a 3-month free trial of HP Instant Ink."
            ],
            [
                "id" => 5,
                "image_url" => "https://multimedia.bbycastatic.ca/multimedia/products/250x250/184/18470/18470962.jpg",
                "name" => "Apple AirPods 4 In-Ear True Wireless Earbuds with USB-C Charging Case",
                "price" => 159.99,
                "original_price" => 179.99,
                "discount" => 11,
                "rating" => 3.69,
                "reviews_count" => 13,
                "brand" => "Apple",
                "model" => "AirPods 4",
                "processor" => "Apple H1 Chip",
                "ram" => "N/A",
                "storage" => "N/A",
                "description" => "Apple AirPods 4 In-Ear true wireless earbuds with USB-C charging case. Features Apple H1 chip for seamless connectivity."
            ],
            [
                "id" => 6,
                "image_url" => "https://multimedia.bbycastatic.ca/multimedia/products/250x250/149/14933/14933348.jpg",
                "name" => "Samsung 27\" FHD 75Hz 5ms GTG IPS LED FreeSync Monitor (LF27T350FHNXZA) - Dark Blue Grey",
                "price" => 129.99,
                "original_price" => 149.99,
                "discount" => 13,
                "rating" => 4.65,
                "reviews_count" => 6683,
                "brand" => "Samsung",
                "model" => "LF27T350FHNXZA",
                "processor" => "N/A",
                "ram" => "N/A",
                "storage" => "N/A",
                "description" => "Samsung 27\" FHD IPS LED FreeSync monitor with 75Hz refresh rate, 5ms GTG response time, and a sleek dark blue-grey design."
            ],
            [
                "id" => 7,
                "image_url" => "https://multimedia.bbycastatic.ca/multimedia/products/250x250/181/18150/18150113.jpg",
                "name" => "Toshiba 43\" 1080p HD LED Fire Smart TV (43V35KU) - 2024",
                "price" => 249.99,
                "original_price" => 299.99,
                "discount" => 17,
                "rating" => 4.63,
                "reviews_count" => 1103,
                "brand" => "Toshiba",
                "model" => "43V35KU",
                "processor" => "N/A",
                "ram" => "N/A",
                "storage" => "N/A",
                "description" => "Toshiba 43\" 1080p HD LED Fire Smart TV with Fire TV built-in for seamless streaming experience."
            ],
            [
                "id" => 8,
                "image_url" => "https://multimedia.bbycastatic.ca/multimedia/products/250x250/172/17278/17278649.jpg",
                "name" => "Apple AirPods Pro 2 Noise Cancelling True Wireless Earbuds with USB-C MagSafe Charging Case",
                "price" => 279.99,
                "original_price" => 329.99,
                "discount" => 15,
                "rating" => 4.37,
                "reviews_count" => 49,
                "brand" => "Apple",
                "model" => "AirPods Pro 2",
                "processor" => "Apple H2 Chip",
                "ram" => "N/A",
                "storage" => "N/A",
                "description" => "Apple AirPods Pro 2 with Noise Cancellation and MagSafe charging case featuring Apple H2 chip for high-quality sound."
            ],
            [
                "id" => 9,
                "image_url" => "https://multimedia.bbycastatic.ca/multimedia/products/250x250/184/18481/18481518.jpg",
                "name" => "Samsung 50\" 4K UHD HDR LED Tizen OS Smart TV (UN50DU7200FXZC) - 2024",
                "price" => 469.99,
                "original_price" => 599.99,
                "discount" => 22,
                "rating" => 4.42,
                "reviews_count" => 1652,
                "brand" => "Samsung",
                "model" => "UN50DU7200FXZC",
                "processor" => "N/A",
                "ram" => "N/A",
                "storage" => "N/A",
                "description" => "Samsung 50\" 4K UHD HDR LED Smart TV featuring Tizen OS with stunning 4K resolution and HDR support."
            ],
            [
                "id" => 10,
                "image_url" => "https://multimedia.bbycastatic.ca/multimedia/products/250x250/188/18896/18896891.jpg",
                "name" => "Samsung Galaxy A16 5G 128GB - Blue Black - Unlocked",
                "price" => 239.99,
                "original_price" => 269.99,
                "discount" => 11,
                "rating" => 5.0,
                "reviews_count" => 1,
                "brand" => "Samsung",
                "model" => "Galaxy A16 5G",
                "processor" => "Exynos 850",
                "ram" => "4GB",
                "storage" => "128GB",
                "description" => "Samsung Galaxy A16 5G with 128GB storage, 4GB RAM, and Exynos 850 processor. Unlocked for all carriers."
            ],
            [
                "id" => 11,
                "image_url" => "https://multimedia.bbycastatic.ca/multimedia/products/250x250/184/18486/18486669.jpg",
                "name" => "Acer Aspire Go 15.6\" Laptop - Silver (Intel N100/8GB RAM/512GB SSD/Windows 11)",
                "price" => 399.99,
                "original_price" => 549.99,
                "discount" => 27,
                "rating" => 5.0,
                "reviews_count" => 3,
                "brand" => "Acer",
                "model" => "Aspire Go",
                "processor" => "Intel N100",
                "ram" => "8GB",
                "storage" => "512GB SSD",
                "description" => "Acer Aspire Go 15.6\" Laptop with Intel N100 processor, 8GB RAM, and 512GB SSD."
            ],
            [
                "id" => 12,
                "image_url" => "https://multimedia.bbycastatic.ca/multimedia/products/250x250/179/17981/17981254.jpg",
                "name" => "HP 15.6\" Laptop - Natural Silver (Intel Core i7 1255U/16GB RAM/1TB SSD/Windows 11)",
                "price" => 799.99,
                "original_price" => 999.99,
                "discount" => 20,
                "rating" => 4.04,
                "reviews_count" => 221,
                "brand" => "HP",
                "model" => "HP 15.6\" Laptop",
                "processor" => "Intel Core i7 1255U",
                "ram" => "16GB",
                "storage" => "1TB SSD",
                "description" => "HP 15.6\" Laptop with Intel Core i7, 16GB RAM, and 1TB SSD storage."
            ]
        ];

        // Loop through each product and insert it into the database
        foreach ($allProducts as $productData) {
            // Get a random category
            $category = Category::inRandomOrder()->first();
            $user = User::inRandomOrder()->first();

            // Create the product and associate it with the random category
            Product::create([
                'added_by' => $user->id,
                'image_url' => $productData['image_url'],
                'name' => $productData['name'],
                'price' => $productData['price'],
                'original_price' => $productData['original_price'],
                'discount' => $productData['discount'],
                'rating' => $productData['rating'],
                'reviews_count' => $productData['reviews_count'],
                'brand' => $productData['brand'],
                'model' => $productData['model'],
                'processor' => $productData['processor'],
                'ram' => $productData['ram'],
                'storage' => $productData['storage'],
                'description' => $productData['description'],
                'category_id' => $category->id,  // Assign the category_id here
            ]);
        }
    }
}
