<?php

namespace Database\Seeders;

use App\Models\Job;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class JobSeeder extends Seeder
{
    public function run(): void
    {
        Job::insert([
            [
                'title' => 'أخصائي علاقات عامة',
                'location' => 'عمان',
                'description' => 'نبحث عن أخصائي علاقات عامة لديه خبرة في إدارة الحملات المجتمعية.',
                'type' => 'دوام كامل',
                'deadline' => now()->addDays(15),
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'متطوع لتنظيم الفعاليات',
                'location' => 'السلط',
                'description' => 'مطلوب متطوعون للمساعدة في تنظيم فعاليات خيرية.',
                'type' => 'متطوع',
                'deadline' => now()->addDays(30),
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'محاسب مالي',
                'location' => 'الزرقاء',
                'description' => 'نبحث عن محاسب لإدارة الحسابات والتقارير المالية للمؤسسة.',
                'type' => 'دوام جزئي',
                'deadline' => now()->addDays(10),
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
             [
                'title' => 'أخصائي علاقات عامة',
                'location' =>'اربد',
                'description' => 'نبحث عن أخصائي علاقات عامة لديه خبرة في إدارة الحملات المجتمعية.',
                'type' => 'دوام كامل',
                'deadline' => now()->addDays(15),
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'متطوع لتنظيم الفعاليات',
                'location' => 'عجلون',
                'description' => 'مطلوب متطوعون للمساعدة في تنظيم فعاليات خيرية.',
                'type' => 'متطوع',
                'deadline' => now()->addDays(30),
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'محاسب مالي',
                'location' => 'ام قيس',
                'description' => 'نبحث عن محاسب لإدارة الحسابات والتقارير المالية للمؤسسة.',
                'type' => 'دوام جزئي',
                'deadline' => now()->addDays(10),
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
               [
                'title' => 'أخصائي علاقات عامة',
                'location' => 'عمان',
                'description' => 'نبحث عن أخصائي علاقات عامة لديه خبرة في إدارة الحملات المجتمعية.',
                'type' => 'دوام كامل',
                'deadline' => now()->addDays(15),
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'متطوع لتنظيم الفعاليات',
                'location' => 'السلط',
                'description' => 'مطلوب متطوعون للمساعدة في تنظيم فعاليات خيرية.',
                'type' => 'متطوع',
                'deadline' => now()->addDays(30),
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'محاسب مالي',
                'location' => 'الزرقاء',
                'description' => 'نبحث عن محاسب لإدارة الحسابات والتقارير المالية للمؤسسة.',
                'type' => 'دوام جزئي',
                'deadline' => now()->addDays(10),
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
             [
                'title' => 'أخصائي علاقات عامة',
                'location' =>'اربد',
                'description' => 'نبحث عن أخصائي علاقات عامة لديه خبرة في إدارة الحملات المجتمعية.',
                'type' => 'دوام كامل',
                'deadline' => now()->addDays(15),
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'متطوع لتنظيم الفعاليات',
                'location' => 'عجلون',
                'description' => 'مطلوب متطوعون للمساعدة في تنظيم فعاليات خيرية.',
                'type' => 'متطوع',
                'deadline' => now()->addDays(30),
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'محاسب مالي',
                'location' => 'ام قيس',
                'description' => 'نبحث عن محاسب لإدارة الحسابات والتقارير المالية للمؤسسة.',
                'type' => 'دوام جزئي',
                'deadline' => now()->addDays(10),
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
