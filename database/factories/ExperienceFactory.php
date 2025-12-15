<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Experience>
 */
class ExperienceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'company' => $this->faker->company(),
            'role' => $this->faker->jobTitle(),
            'start_date' => $this->faker->date(),
            'end_date' => $this->faker->optional(0.7)->date(),
            'is_current' => false,
            'description' => $this->faker->paragraph(),
            'location' => $this->faker->city() . ', ' . $this->faker->country(),
        ];
    }
}
