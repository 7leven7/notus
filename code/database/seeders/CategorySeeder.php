<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run()
    {
        $electronics = Category::create(['name' => 'Electronics']);
        $books       = Category::create(['name' => 'Books']);
        $clothing    = Category::create(['name' => 'Clothing']);

        Category::create(['name' => 'Mobile Phones', 'parent_id' => $electronics->id]);
        Category::create(['name' => 'Laptops', 'parent_id' => $electronics->id]);
        Category::create(['name' => 'Fiction', 'parent_id' => $books->id]);
        Category::create(['name' => 'Non-Fiction', 'parent_id' => $books->id]);
        Category::create(['name' => 'Men', 'parent_id' => $clothing->id]);
        Category::create(['name' => 'Women', 'parent_id' => $clothing->id]);
    }
}
