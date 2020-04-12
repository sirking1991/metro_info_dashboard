<?php

use Illuminate\Database\Seeder;

class EventsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [];
        $faker = Faker\Factory::create();
        
        $lgu = collect(\App\LGU::all()->modelKeys());
        $user = collect(\App\User::all()->modelKeys());

        for ($n=0; $n < 50000; $n++) { 
            $eventDate = $faker->dateTimeBetween('-30 days','30 days');
            $data[] = [
                'lgu_id' => $lgu->random(),
                'posted_by' => $user->random(),
                'event_from' => $eventDate,
                'event_to' => $eventDate,
                'name' => $faker->sentence(),
                'content' => $faker->paragraph(),
                'broadcast' => $faker->randomElement(['yes','no']),
                'created_at' => now()->toDateTimeString(),
                'updated_at' =>now()->toDateTimeString(),
            ];
        }

        $chunks = array_chunk($data, 500);
        foreach ($chunks as $chunk) {
            \App\Events::insert($chunk);
        }
    }
}
