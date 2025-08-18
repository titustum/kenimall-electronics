<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    public function run()
    {
        // Get the first user ID from the users table (you can change this if you need a specific user ID)
        $userId = User::first()->id;

        $categories = [
            ['name' => 'Smartphones', 'slug' => 'smartphones', 'image' => 'smartphones.jpg'],
            ['name' => 'Laptops', 'slug' => 'laptops', 'image' => 'laptops.jpg'],
            ['name' => 'Headphones', 'slug' => 'headphones', 'image' => 'headphones.jpg'],
            ['name' => 'Televisions', 'slug' => 'televisions', 'image' => 'televisions.jpg'],
            ['name' => 'Gaming Consoles', 'slug' => 'gaming-consoles', 'image' => 'gaming-consoles.jpg'],
            ['name' => 'Tablets', 'slug' => 'tablets', 'image' => 'tablets.jpg'],
            ['name' => 'Smartwatches', 'slug' => 'smartwatches', 'image' => 'smartwatches.jpg'],
            ['name' => 'Bluetooth Speakers', 'slug' => 'bluetooth-speakers', 'image' => 'bluetooth-speakers.jpg'],
            ['name' => 'Digital Cameras', 'slug' => 'digital-cameras', 'image' => 'digital-cameras.jpg'],
            ['name' => 'Computer Accessories', 'slug' => 'computer-accessories', 'image' => 'computer-accessories.jpg'],
        ];

        // Insert categories into the categories table
        foreach ($categories as $category) {
            DB::table('categories')->insert([
                'name' => $category['name'],
                'slug' => $category['slug'],
                'image_path' => 'categories/'.$category['image'],
                'added_by' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
