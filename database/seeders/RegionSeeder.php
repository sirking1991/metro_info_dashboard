<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RegionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('regions')->insert(['name'=>'National Capital Region', 'short_name'=>'NCR']);
        DB::table('regions')->insert(['name'=>'Ilocos Region', 'short_name'=>'Region I']);
        DB::table('regions')->insert(['name'=>'Cordillera Administrative Region', 'short_name'=>'CAR']);
        DB::table('regions')->insert(['name'=>'Cagayan Valley', 'short_name'=>'Region II']);
        DB::table('regions')->insert(['name'=>'Central Luzon', 'short_name'=>'Region III']);
        DB::table('regions')->insert(['name'=>'Calabarzon', 'short_name'=>'Region IV-A']);
        DB::table('regions')->insert(['name'=>'Southwestern Tagalog Region', 'short_name'=>'Mimaropa']);
        DB::table('regions')->insert(['name'=>'Bicol Region', 'short_name'=>'Region V']);
        DB::table('regions')->insert(['name'=>'Western Visayas', 'short_name'=>'Region VI']);
        DB::table('regions')->insert(['name'=>'Central Visayas', 'short_name'=>'Region VII']);
        DB::table('regions')->insert(['name'=>'Eastern Visayas', 'short_name'=>'Region VIII']);
        DB::table('regions')->insert(['name'=>'Zamboanga Peninsula', 'short_name'=>'Region IX']);
        DB::table('regions')->insert(['name'=>'Northern Mindanao', 'short_name'=>'Region X']);
        DB::table('regions')->insert(['name'=>'Davao Region', 'short_name'=>'Region XI']);
        DB::table('regions')->insert(['name'=>'Soccsksargen', 'short_name'=>'Region XII']);
        DB::table('regions')->insert(['name'=>'Caraga Region', 'short_name'=>'Region XIII']);
        DB::table('regions')->insert(['name'=>'Bangsamoro Autonomous Region in Muslim Mindanao', 'short_name'=>'BARMM']);
    }
}
