<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            RegionSeeder::class,
            LGUSeeder::class,
            UserSeeder::class,
            NewsSeeder::class,
            EventsSeeder::class,
            AppUserSeeder::class,
            BroadcastSeeder::class,
        ]);        
    }
}
