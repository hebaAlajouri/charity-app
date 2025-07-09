<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Project;

class ProjectSeeder extends Seeder
{
   

public function run(): void
{
    Project::insert([
        [
            'name' => 'مشروع كفالة يتيم',
            'code' => 'orphans001',
            'goal_amount' => 10000,
            'raised_amount' => 2500,
            'icon' => 'fas fa-child',
            'image' => 'images/projects/orphan.jpg',
            'description' => 'يهدف هذا المشروع إلى كفالة الأيتام وتوفير احتياجاتهم الأساسية.',
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'name' => 'مشروع دعم التعليم',
            'code' => 'education001',
            'goal_amount' => 20000,
            'raised_amount' => 8000,
            'icon' => 'fas fa-book',
            'image' => 'images/projects/education.jpg',
            'description' => 'دعم تعليم الأيتام من خلال توفير المستلزمات الدراسية والرسوم.',
            'created_at' => now(),
            'updated_at' => now(),
        ]
    ]);
}

}
