<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {        
        User::factory()->create([
            'name' => env('DEV_SEEDING_USER_NAME'),
            'email' => env('DEV_SEEDING_USER_EMAIL'),
            'password' => bcrypt(env('DEV_SEEDING_USER_PASSWORD')),
        ]);
     
        User::factory(10)->create();
    }
}
