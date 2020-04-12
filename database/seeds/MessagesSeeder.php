<?php

use Illuminate\Database\Seeder;

class MessagesSeeder extends Seeder
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
        $appUser = collect(\App\AppUser::all()->modelKeys());

        for ($n=0; $n < 100; $n++) { 
            $ap = \App\AppUser::find($appUser->random());
            $data[] = [
                'lgu_id' => $lgu->random(),
                'device_id' => $ap->uuid,
                'appuser_id' => $appUser->random(),
                'message' => $faker->sentence(),
                'status' => $faker->randomElement([null,$faker->dateTimeBetween($startDate = '-30 days', $endDate = '3 days')]),
                'created_at' => now()->toDateTimeString(),
                'updated_at' =>now()->toDateTimeString(),
            ];
        }

        $chunks = array_chunk($data, 50);
        foreach ($chunks as $chunk) {
            \App\Message::insert($chunk);
        }
    }
}
