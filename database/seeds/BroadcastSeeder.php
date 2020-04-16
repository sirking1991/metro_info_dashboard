<?php

use Illuminate\Database\Seeder;

class BroadcastSeeder extends Seeder
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

        for ($n=0; $n < 10000; $n++) { 
            $data[] = [
                'lgu_id' => $lgu->random(),
                'posted_by' => $user->random(),
                'broadcast_on' => $faker->dateTimeBetween($startDate = '-30 days', $endDate = '3 days'),
                'message' => $faker->sentence(),
                'status' => 'pending',
                'created_at' => now()->toDateTimeString(),
                'updated_at' =>now()->toDateTimeString(),
            ];
        }

        $chunks = array_chunk($data, 500);
        foreach ($chunks as $chunk) {
            \App\Broadcast::insert($chunk);
        }
    }
}
