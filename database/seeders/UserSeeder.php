<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use \App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::factory(10)->create();

        $dillon = User::factory()->create([
            'name' => 'Dillon',
            'email' => 'dillon@example.com',
            'password' => bcrypt('password123'),
        ]);

        $users->push($dillon);
    }
}
