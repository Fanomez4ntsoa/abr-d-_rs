<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BadgePriceSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now();
        
        // Badge simple
        DB::table('settings')->updateOrInsert(
            ['type' => 'badge_price'],
            ['description' => '1000', 'updated_at' => $now]
        );

        // Badge pro
        DB::table('settings')->updateOrInsert(
            ['type' => 'badge_price_pro'],
            ['description' => '2500', 'updated_at' => $now]
        );
    }
}
