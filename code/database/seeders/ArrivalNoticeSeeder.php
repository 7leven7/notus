<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ArrivalNotice;
use App\Models\User;
use Faker\Factory as Faker;

class ArrivalNoticeSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();
        $users = User::all();

        for ($i = 0; $i < 10; $i++) {
            ArrivalNotice::create([
                'user_id'      => $users->random()->id,
                'arrival_date' => $faker->date,
                'status'       => (rand(0, 1)) ? 'approved' : 'pending',
            ]);
        }
    }
}
