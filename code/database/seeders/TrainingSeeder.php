<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Training;

class TrainingSeeder extends Seeder
{
    public function run()
    {
        Training::create([
            'name'        => 'Basic Training',
            'description' => 'Basic training description',
            'level'       => '1',
        ]);

        Training::create([
            'name'        => 'Intermediate Training',
            'description' => 'Intermediate training description',
            'level'       => '2',
        ]);

        Training::create([
            'name'        => 'Advanced Training',
            'description' => 'Advanced training description',
            'level'       => '3',
        ]);

        Training::create([
            'name'        => 'Free Entry Training',
            'description' => 'Free entry training description',
            'level'       => 'free_entry',
        ]);
    }
}
