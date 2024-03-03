<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Campain>
 */
class CampainFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "name" => fake()->name(),
            "description" => fake()->text(),
            "goal" => fake()->sentence(),
            "niche" => fake()->word(),
            "task" => fake()->sentence(),
            "start" => now(),
            "end" => now()->addDays(5)
        ];
    }
}
