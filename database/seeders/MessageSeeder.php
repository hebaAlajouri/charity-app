<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MessageSeeder extends Seeder
{
    public function run()
    {
        DB::table('messages')->insert([
            [
                'name' => 'Heba Alajouri',
                'email' => 'hebaajoury1212@gmail.com',
                'phone' => '0775945787',
                'subject' => 'استفسار',
                'message' => 'هل يمكنني التبرع عبر الإنترنت؟',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Mohamed Ali',
                'email' => 'mohamed@example.com',
                'phone' => '0781234567',
                'subject' => 'شكوى',
                'message' => 'لم يصلني أي تأكيد على التبرع.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
