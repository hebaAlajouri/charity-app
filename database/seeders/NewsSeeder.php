<?php

namespace Database\Seeders;

use App\Models\News;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class NewsSeeder extends Seeder
{
    public function run(): void
    {
        $newsData = [
            [
                'title' => 'افتتاح حملة كفالة جديدة في رمضان',
                'content' => 'تم افتتاح حملة جديدة لدعم الأيتام خلال شهر رمضان المبارك. شارك الآن في كفالة يتيم.',
                'image' => null,
            ],
            [
                'title' => 'نجاح حملة الإغاثة الشتوية',
                'content' => 'بفضل دعمكم، تمكنّا من إيصال المساعدات إلى أكثر من 500 عائلة في المناطق المحتاجة.',
                'image' => null,
            ],
            [
                'title' => 'مشروع جديد لبناء مدرسة',
                'content' => 'تم إطلاق مشروع جديد لبناء مدرسة لتعليم الأيتام في المنطقة الجنوبية.',
                'image' => null,
            ],
        ];

        foreach ($newsData as $news) {
            News::create($news);
        }
    }
}
