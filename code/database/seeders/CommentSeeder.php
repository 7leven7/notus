<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Comment;
use App\Models\Product;
use Faker\Factory as Faker;

class CommentSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();
        $products = Product::all();

        foreach ($products as $product) {
            $num = rand(0, 5);
            for ($i = 0; $i < $num; $i++) {
                Comment::create([
                    'product_id' => $product->id,
                    'user_name'  => $faker->name,
                    'text'       => $faker->sentence,
                    'rating'     => rand(1, 5),
                    'approved'   => (bool) rand(0, 1),
                ]);
            }
        }
    }
}
