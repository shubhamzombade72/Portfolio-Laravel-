<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'),
        ]);

        $this->call([
            SettingsSeeder::class,
        ]);

        \App\Models\Project::factory(10)->create();
        \App\Models\Experience::factory(5)->create();
        \App\Models\Skill::factory(12)->create();
    }
}
