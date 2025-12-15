<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $settings = [
            // General
            ['key' => 'site_name', 'value' => 'My Portfolio', 'type' => 'text', 'group' => 'general'],
            ['key' => 'site_description', 'value' => 'A showcase of my work and skills.', 'type' => 'textarea', 'group' => 'general'],
            ['key' => 'site_logo', 'value' => null, 'type' => 'image', 'group' => 'general'],

            // Hero
            ['key' => 'hero_title', 'value' => 'Hi, I am a Developer', 'type' => 'text', 'group' => 'hero'],
            ['key' => 'hero_subtitle', 'value' => 'Building efficient and scalable solutions.', 'type' => 'textarea', 'group' => 'hero'],

            // Contact
            ['key' => 'contact_email', 'value' => 'admin@example.com', 'type' => 'text', 'group' => 'contact'],
            ['key' => 'resume_file', 'value' => null, 'type' => 'file', 'group' => 'contact'],
            ['key' => 'github_link', 'value' => 'https://github.com', 'type' => 'text', 'group' => 'social'],
            ['key' => 'linkedin_link', 'value' => 'https://linkedin.com', 'type' => 'text', 'group' => 'social'],
        ];

        foreach ($settings as $setting) {
            \App\Models\Setting::updateOrCreate(['key' => $setting['key']], $setting);
        }
    }
}
