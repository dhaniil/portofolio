<?php

namespace Database\Seeders;

use App\Models\Skills;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SkillsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $skills = [
            ['name' => 'HTML5', 'percentage' => 70, 'slug' => 'html'],
            ['name' => 'CSS', 'percentage' => 65, 'slug' => 'css'],
            ['name' => 'JavaScript', 'percentage' => 63, 'slug' => 'javascript'],
            ['name' => 'PHP', 'percentage' => 50, 'slug' => 'php'],
            ['name' => 'Python', 'percentage' => 20, 'slug' => 'python'],
            ['name' => 'Tailwind CSS', 'percentage' => 60, 'slug' => 'tailwind-css'],
            ['name' => 'MySQL', 'percentage' => 54, 'slug' => 'mysql'],
            ['name' => 'C++', 'percentage' => 20, 'slug' => 'c-plus-plus'],
            ['name' => 'C#', 'percentage' => 10, 'slug' => 'c-sharp'],
            ['name' => 'TypeScript', 'percentage' => 45, 'slug' => 'typescript'],
            ['name' => 'MongoDB', 'percentage' => 30, 'slug' => 'mongodb'],
            ['name' => 'BaaS', 'percentage' => 30, 'slug' => 'backend-as-a-service'],

        ];
        
            foreach ($skills as $skill) {
            Skills::create([
                'name' => $skill['name'],
                'percentage' => $skill['percentage'],
                'slug' => $skill['slug'],
            ]);
        }
    }
}
