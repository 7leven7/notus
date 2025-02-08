<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PassedTest;
use App\Models\User;
use App\Models\Training;
use Carbon\Carbon;
use Faker\Factory as Faker;

class PassedTestSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();
        $users = User::all();
        $trainings = Training::all();

        foreach ($users as $user) {
            $training = $trainings->random();
            PassedTest::create([
                'user_id'     => $user->id,
                'training_id' => $training->id,
                'test_date'   => $faker->dateTimeBetween('-1 year', 'now')->format('Y-m-d'),
                'valid_until' => Carbon::now()->addYear()->format('Y-m-d'),
            ]);
        }
    }
}
