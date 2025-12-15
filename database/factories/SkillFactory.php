<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Skill>
 */
class SkillFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->word(),
            'category' => $this->faker->randomElement(['Frontend', 'Backend', 'DevOps', 'Tools']),
            'proficiency' => $this->faker->numberBetween(40, 100),
            'icon' => 'fa-solid fa-code', // Placeholder icon class
            'is_active' => true,
            'sort_order' => $this->faker->numberBetween(1, 100),
        ];
    }
}
