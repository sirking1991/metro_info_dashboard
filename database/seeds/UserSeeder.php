<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
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

        for ($n=0; $n < 10000; $n++) { 
            $data[] = [
                'lgu_id' => $lgu->random(),
                'allowed_lgu_admin' => 'yes',
                'name' => $faker->name(),
                'email' => $faker->safeEmail,
                'password' => $faker->shuffle($faker->sentence()),
                'created_at' => now()->toDateTimeString(),
                'updated_at' =>now()->toDateTimeString(),                

            ];
        }

        $chunks = array_chunk($data, 500);
        foreach ($chunks as $chunk) {
            \App\User::insert($chunk);
        }
    }
}
