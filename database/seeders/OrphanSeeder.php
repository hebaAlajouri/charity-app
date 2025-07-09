<?php



namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class OrphanSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('orphans')->insert([
            [
                'name' => 'أحمد محمد',
                'guardian_phone' => '0791234567',
                'address' => 'عمان - الأردن',
                'age' => 10,
                'status' => 'available',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'ليان يوسف',
                'guardian_phone' => '0789876543',
                'address' => 'الزرقاء - الأردن',
                'age' => 8,
                'status' => 'available',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'سامي خالد',
                'guardian_phone' => '0774567890',
                'address' => 'إربد - الأردن',
                'age' => 9,
                'status' => 'available',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'رزان علاء',
                'guardian_phone' => '0791112233',
                'address' => 'الكرك - الأردن',
                'age' => 7,
                'status' => 'available',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
