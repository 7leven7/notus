<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            AdminUserSeeder::class,
            UsersSeeder::class,
            CategorySeeder::class,
            ProductSeeder::class,
            ImageSeeder::class,
            CommentSeeder::class,
            ArrivalNoticeSeeder::class,
            TrainingSeeder::class,
            TestSeeder::class,
            PassedTestSeeder::class,
            AttendanceLogSeeder::class,
        ]);
    }
}
