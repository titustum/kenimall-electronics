<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $brands = [
            ['name' => 'Apple', 'image' => 'apple.png'],
            ['name' => 'Samsung', 'image' => 'samsung.png'],
            ['name' => 'Sony', 'image' => 'sony.png'],
            ['name' => 'LG', 'image' => 'lg.png'],
            ['name' => 'Microsoft', 'image' => 'microsoft.png'],
            ['name' => 'Dell', 'image' => 'dell.png'],
            ['name' => 'HP', 'image' => 'hp.png'],
            ['name' => 'Lenovo', 'image' => 'lenovo.png'],
            ['name' => 'ASUS', 'image' => 'asus.png'],
            ['name' => 'Acer', 'image' => 'acer.png'],
            ['name' => 'Bose', 'image' => 'bose.png'],
            ['name' => 'Beats', 'image' => 'beats.png'],
            ['name' => 'Canon', 'image' => 'canon.png'],
            ['name' => 'Nikon', 'image' => 'nikon.png'],
            ['name' => 'DJI', 'image' => 'dji.png'],
            ['name' => 'OnePlus', 'image' => 'oneplus.png'],
            ['name' => 'Google', 'image' => 'google.png'],
            ['name' => 'Amazon', 'image' => 'amazon.png'],
            ['name' => 'Razer', 'image' => 'razer.png'],
            ['name' => 'Nintendo', 'image' => 'nintendo.png'],
        ];

        foreach ($brands as $brand) {
            DB::table('brands')->insert([
                'name' => $brand['name'],
                'image_path' => 'brands/'.$brand['image'],
                'added_by' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

    }
}
