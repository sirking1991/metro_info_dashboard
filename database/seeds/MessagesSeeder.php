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

        for ($n=0; $n < 1000; $n++) { 
            $ap = \App\AppUser::find($appUser->random());
            $lguId = $lgu->random();
            $data[] = [
                'lgu_id' => $lguId,
                'device_id' => $ap->device_id,
                'appuser_id' => $ap->id,
                'message' => $faker->sentence(),
                'read_on' => null,
                'read_by' => null,
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
