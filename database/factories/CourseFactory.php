<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = fake()->name();

        return [
            'name' => $name,
            'description' => fake()->text(30),
            'banner' => fake()->text(10),
            'slug' => Str::slug($name),
            'price' => fake()->numberBetween(1, 10),
            'likes' => fake()->numberBetween(1, 100),
            'views' => fake()->numberBetween(1, 1000),

        ];
    }
}
