<?php

use Illuminate\Database\Seeder;

class AppUserSeeder extends Seeder
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

        for ($n=0; $n < 1000; $n++) { 
            $data[] = [
                'device_id' => $faker->uuid,
                'first_name' => $faker->firstName(),
                'last_name' => $faker->lastName,
                'mobile' => $faker->e164PhoneNumber,
                'email' => $faker->safeEmail,
                'dob' => $faker->date,
                'lgu_id' => $lgu->random(),

            ];
        }

        $chunks = array_chunk($data, 100);
        foreach ($chunks as $chunk) {
            \App\AppUser::insert($chunk);
        }
    }
}
