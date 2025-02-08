<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Category;
use Faker\Factory as Faker;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();
        $categories = Category::all();

        for ($i = 0; $i < 20; $i++) {
            $product = Product::create([
                'name'         => ucfirst($faker->word),
                'description'  => $faker->sentence,
                'price'        => $faker->randomFloat(2, 10, 500),
                'main_image_id'=> null,
            ]);

            $catIds = $categories->random(rand(1, 3))->pluck('id')->toArray();
            $product->categories()->attach($catIds);
        }
    }
}
