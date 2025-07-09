<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DonationSeeder extends Seeder
{
    public function run()
    {
        DB::table('donations')->insert([
            [
                'user_id' => 1,
                'project_id' => 1,
                'amount' => 150.00,
                'payment_type' => 'bank_transfer',
                'bank_name' => 'ABC Bank',
                'account_number' => '123456789',
                'full_name' => 'Heba Alajouri',
                'status' => 'success',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 1,
                'project_id' => 2,
                'amount' => 200.00,
                'payment_type' => 'credit_card',
                'bank_name' => null,
                'account_number' => null,
                'full_name' => 'Heba Alajouri',
                'status' => 'pending',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
