<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class HoldingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Holding::factory(500)->create();
    }
}
