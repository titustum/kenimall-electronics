<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class CategorySeeder extends Seeder
{
    public function run()
    {
        // Get the first user ID from the users table (you can change this if you need a specific user ID)
        $userId = User::first()->id;

        $categories = [
            [
                'name' => 'TVs, Home Audio, and Home Theatre Accessories',
                'image_path' => 'https://merchandising-assets.bestbuy.ca/bltc8653f66842bff7f/bltecfad2235b10bd33/66846758534a9db3bcadde03/ht-20240705-homepage-sbc-icon.jpg?width=250&quality=80&auto=webp',
                'added_by' => $userId,
            ],
            [
                'name' => 'Computers and Tablets',
                'image_path' => 'https://merchandising-assets.bestbuy.ca/bltc8653f66842bff7f/blt24a700f32e929659/63be07ba013dbb4c68f9b3df/computing-evergreen-category-icon-computers-and-tablets.jpg?width=250&quality=80&auto=webp',
                'added_by' => $userId,
            ],
            [
                'name' => 'Computing Accessories',
                'image_path' => 'https://merchandising-assets.bestbuy.ca/bltc8653f66842bff7f/bltd9386dee2c0bb137/631a7b580a5bd94db562fe97/computing-evergreen-icon-computer-accessories.jpg?width=250&quality=80&auto=webp',
                'added_by' => $userId,
            ],
            [
                'name' => 'Headphones and Portable Speakers',
                'image_path' => 'https://merchandising-assets.bestbuy.ca/bltc8653f66842bff7f/blt9450d10d80be158b/6192ea614eed0e4a24dca596/homepage-shopbycategory-pa-on-sale.jpg?width=250&quality=80&auto=webp',
                'added_by' => $userId,
            ],
            [
                'name' => 'Wearable Technology',
                'image_path' => 'https://merchandising-assets.bestbuy.ca/bltc8653f66842bff7f/blt570fba736c35c750/65e104150f1d35993cca56e1/15929829_1.jpg?width=250&quality=80&auto=webp',
                'added_by' => $userId,
            ],
            [
                'name' => 'Cell Phones and Accessories',
                'image_path' => 'https://merchandising-assets.bestbuy.ca/bltc8653f66842bff7f/blt73c9d78a1a777d89/65d7c2a75d2ab283df73e4ef/wi-20240223-icon-cellphones-and-accessories.jpg?width=250&quality=80&auto=webp',
                'added_by' => $userId,
            ],
            [
                'name' => 'Major Appliances',
                'image_path' => 'https://merchandising-assets.bestbuy.ca/bltc8653f66842bff7f/bltebba6ba1bd154354/5ee2c83e0f079e4334fd6c74/majorapps-icon.jpg?width=250&quality=80&auto=webp',
                'added_by' => $userId,
            ],
            [
                'name' => 'Vacuums',
                'image_path' => 'https://merchandising-assets.bestbuy.ca/bltc8653f66842bff7f/blt2705e457feb84d61/62059060214fe9266428d3e4/vacuums-sbc-icon-12370687.jpeg?width=250&quality=80&auto=webp',
                'added_by' => $userId,
            ],
            [
                'name' => 'Kitchen Appliances',
                'image_path' => 'https://merchandising-assets.bestbuy.ca/bltc8653f66842bff7f/blt051d0a8b7b479bb7/6644e3874b531eb1dfc30c36/17234373.jpg?width=250&quality=80&auto=webp',
                'added_by' => $userId,
            ],
            [
                'name' => 'Video Games and Accessories',
                'image_path' => 'https://multimedia.bbycastatic.ca/multimedia/products/150x150/174/17477/17477496.jpg',
                'added_by' => $userId,
            ],
            [
                'name' => 'Cameras and Camcorders',
                'image_path' => 'https://merchandising-assets.bestbuy.ca/bltc8653f66842bff7f/bltff769e2ada93c2db/5fa9e4b44e40cf53001f5252/di-evergreen-category-icon-cameras-drones.jpg?width=250&quality=80&auto=webp',
                'added_by' => $userId,
            ],
            [
                'name' => 'Smart Home',
                'image_path' => 'https://merchandising-assets.bestbuy.ca/bltc8653f66842bff7f/bltea880f7135258af9/65e11b0972b38733f422c650/sh-20240112-icon-hp-smart-home-white.jpg?width=250&quality=80&auto=webp',
                'added_by' => $userId,
            ]
        ];

        // Insert categories into the categories table
        foreach ($categories as $category) {
            DB::table('categories')->insert([
                'name' => $category['name'],
                'image_path' => $category['image_path'],
                'added_by' => $category['added_by'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
