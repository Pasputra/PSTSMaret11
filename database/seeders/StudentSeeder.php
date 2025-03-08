<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;
use Faker\Factory as Faker;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create(); 

        for ($i = 0; $i < 10; $i++) {
            Post::create([
                'name' => $faker->name,
                'gender' => $faker->randomElement(['Male', 'Female']),
                'email' => $faker->unique()->safeEmail,
                'phone' => $faker->phoneNumber,
                'grade' => $faker->randomElement(['A', 'B', 'C', 'D', 'E']),
                'action' => 'Active'
            ]);
        }
    }
}
