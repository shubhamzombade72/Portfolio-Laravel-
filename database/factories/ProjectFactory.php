<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(3),
            'slug' => $this->faker->slug(),
            'short_description' => $this->faker->paragraph(),
            'full_description' => $this->faker->paragraphs(3, true),
            'problem' => $this->faker->paragraph(),
            'solution' => $this->faker->paragraph(),
            'tech_stack' => $this->faker->words(4),
            'category' => $this->faker->randomElement(['Web Development', 'Mobile App', 'UI/UX Design']),
            'live_url' => $this->faker->url(),
            'github_url' => $this->faker->url(),
            'is_featured' => $this->faker->boolean(30),
            'is_active' => true,
            'sort_order' => $this->faker->numberBetween(1, 100),
        ];
    }
}
