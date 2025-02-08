<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Test;
use App\Models\Training;
use Faker\Factory as Faker;

class TestSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();
        $trainings = Training::all();

        foreach ($trainings as $training) {
            for ($i = 0; $i < 3; $i++) {
                Test::create([
                    'training_id'    => $training->id,
                    'question'       => $faker->sentence,
                    'answer'         => $faker->sentence,
                    'correct_answer' => $faker->sentence,
                ]);
            }
        }
    }
}
