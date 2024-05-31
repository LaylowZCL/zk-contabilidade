<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Products;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $products = [
            [
                "brand_id" => 1,
                "product_name" => "Lawman T-shirt",
                "category_id" => 1,
                "price" => 200.00,
                'color_id' => 1,
                "description" => "Mens T-shirt",
                'product_image' => 'img-1.png',
                'created_by' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                "brand_id" => 2,
                "product_name" => "Puma T-shirt",
                "category_id" => 1,
                "price" => 250.00,
                'color_id' => 1,
                "description" => "Mens T-shirt",
                'product_image' => 'img-2.png',
                'created_by' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                "brand_id" => 3,
                "product_name" => "Startbucks Coffie",
                "category_id" => 8,
                "price" => 100.00,
                'color_id' => 1,
                "description" => "Coffie",
                'product_image' => 'img-3.png',
                'created_by' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                "brand_id" => 3,
                "product_name" => "Sitting Chair with Pillow",
                "category_id" => 7,
                "price" => 1523.00,
                'color_id' => 1,
                "description" => "Pumas Sitting Chair with Pillow",
                'product_image' => 'img-4.png',
                'created_by' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                "brand_id" => 5,
                "product_name" => "Man's Bike Halmet",
                "category_id" => 9,
                "price" => 999.00,
                'color_id' => 1,
                "description" => "Man's Bike Halmet",
                'product_image' => 'img-5.png',
                'created_by' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                "brand_id" => 6,
                "product_name" => "Oneplus Smart Watch",
                "category_id" => 5,
                "price" => 5999.00,
                'color_id' => 1,
                "description" => "Man Smart watch",
                'product_image' => 'img-7.png',
                'created_by' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                "brand_id" => 1,
                "product_name" => "Hand Purse",
                "category_id" => 1,
                "price" => 599.00,
                'color_id' => 1,
                "description" => "Ladies Purse",
                'product_image' => 'img-10.png',
                'created_by' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];

        DB::table('products')->insert($products);
    }
}
