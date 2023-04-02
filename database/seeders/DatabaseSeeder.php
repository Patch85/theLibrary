<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => env('DEV_SEEDING_USER_NAME'),
            'email' => env('DEV_SEEDING_USER_EMAIL'),
            'password' => bcrypt(env('DEV_SEEDING_USER_PASSWORD')),
        ]);
    }
}
