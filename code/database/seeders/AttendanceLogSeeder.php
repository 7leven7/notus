<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AttendanceLog;
use App\Models\User;
use Carbon\Carbon;
use Faker\Factory as Faker;

class AttendanceLogSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();
        $users = User::all();

        foreach ($users as $user) {
            AttendanceLog::create([
                'user_id'          => $user->id,
                'arrival_time'     => Carbon::now()->subHours(rand(1, 5)),
                'departure_time'   => Carbon::now(),
                'signature'        => $faker->word,
                'gdpr_confirmation'=> true,
            ]);
        }
    }
}
