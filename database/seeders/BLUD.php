<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Project;

class BLUD extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Project::create([
            'title' => 'BLUD',
            'description' => 'Profile Website untuk Badan Layanan Umum Daerah SMKN 2 Depok Sleman',
            'image_url' => 'projects/01JJM1TE3RBJ4SZ926X1JQXWXQ.jpg',
            'demo_url' => 'https://blud.smkn2depoksleman.sch.id',
            'repository_url' => null,
            'technologies' => [
                'WordPress',
                'Elementor',
                'CMS',
                'PHP',
                'MySQL',
                'Frontend',
                'Web Design'
            ]
        ]);

        // Project kedua (Task Management)
        Project::create([
            'title' => 'Task Management App',
            'description' => 'Collaborative task management with real-time updates',
            'image_url' => 'projects/task-management.jpg',
            'demo_url' => 'https://task.example.com',
            'repository_url' => 'https://github.com/yourusername/task-management',
            'technologies' => [
                'Frontend',
                'React',
                'TypeScript',
                'Tailwind',
                'SaaS'
            ]
        ]);

        // Project ketiga (Portfolio)
        Project::create([
            'title' => 'Portfolio Website',
            'description' => 'Personal portfolio website with modern design',
            'image_url' => 'projects/portfolio.jpg',
            'demo_url' => 'https://portfolio.example.com',
            'repository_url' => 'https://github.com/yourusername/portfolio',
            'technologies' => [
                'Frontend',
                'React',
                'TypeScript',
                'MongoDB',
                'Node.js'
            ]
        ]);
    }
}
