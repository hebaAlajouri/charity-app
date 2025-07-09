<?php

namespace Database\Seeders;

use App\Models\Report;
use Illuminate\Database\Seeder;

class ReportSeeder extends Seeder
{
    public function run(): void
    {
        Report::insert([
            [
                'title' => 'تقرير الدعم الشهري',
                'category' => 'التمويل',
                'description' => 'تقرير يوضح الدعم الشهري المقدم للأيتام والمشاريع.',
                'file_path' => 'reports/monthly-support.pdf',
                'published_at' => now()->subMonth(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'تقرير حملة الإغاثة الشتوية',
                'category' => 'الإغاثة',
                'description' => 'ملخص عن حملة الإغاثة الشتوية ومراحل تنفيذها.',
                'file_path' => 'reports/winter-relief.pdf',
                'published_at' => now()->subMonths(2),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
