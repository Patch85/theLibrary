<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Holding>
 */
class HoldingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $user = User::all()->random();

        return [
            'user_id' => $user->id,
            'collection_id' => $user->collections->random()->id,
            'name' => fake()->words(3, true),
            'description' => fake()->sentence(),
            'holding_type' => fake()->randomElement(['book', 'eBook', 'article', 'DVD', 'CD']),
        ];
    }
}
