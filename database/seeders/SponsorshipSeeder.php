<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SponsorshipSeeder extends Seeder
{
    public function run()
    {
        DB::table('sponsorships')->insert([
            [
                'sponsor_id' => 2,
                'orphan_id' => 1,
                'sponsorship_type' => 'monthly',
                'start_date' => now()->subMonths(3)->toDateString(),
                'sponsored_for' => 'education',
                'number_of_orphans' => 1,
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'sponsor_id' => 2,
                'orphan_id' => 2,
                'sponsorship_type' => 'yearly',
                'start_date' => now()->subYear()->toDateString(),
                'sponsored_for' => 'basic_needs',
                'number_of_orphans' => 1,
                'status' => 'ended',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
