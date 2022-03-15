<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Faker\Factory;
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
        Product::truncate();
        $faker = Factory::create();

        foreach (range(1, 2) as $index) {
            Product::create([
                'product_name' => $faker->name(),
                'product_details' => $faker->sentence(),
                'product_price' => $faker->numerify('#####'),
                'brand_name' => Brand::all()->random()->id,
                'category_name' => Category::all()->random()->id,
                'product_image' => $faker->image('public/uploads', 500, 500, null, false),
                'product_image_gallery' => $faker->image('public/uploads', 500, 500, null, false),
            ]);
        }

    }
}
