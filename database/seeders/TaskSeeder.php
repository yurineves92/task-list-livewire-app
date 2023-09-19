<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Task;
use Faker\Factory as Faker;

class TaskSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 2) as $index) {
            $completed_at = $faker->boolean(50) ? $faker->dateTimeThisMonth : null;

            Task::create([
                'description' => $faker->sentence,
                'completed_at' => $completed_at,
                'complete' => $completed_at !== null ? $faker->boolean(50) : 0,
            ]);
        }
    }
}