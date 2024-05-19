<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Profile>
 */
class ProfileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'icon' => fake()->text(10),
            'banner' => fake()->text(10),
            'bio' => fake()->text(10),
            'type' => fake()->numberBetween(1, 2),
            'premium' => fake()->boolean()
        ];
    }
}
