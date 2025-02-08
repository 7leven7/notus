<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Image;
use App\Models\Product;
use Faker\Factory as Faker;

class ImageSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();
        $products = Product::all();

        foreach ($products as $product) {
            $image1 = Image::create([
                'product_id' => $product->id,
                'path'       => 'images/' . $faker->word . '.jpg',
                'main'       => true,
            ]);

            $image2 = Image::create([
                'product_id' => $product->id,
                'path'       => 'images/' . $faker->word . '.jpg',
                'main'       => false,
            ]);

            $product->main_image_id = $image1->id;
            $product->save();
        }
    }
}
