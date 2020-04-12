<?php

use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
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
                'status' => $faker->randomElement(['published','unpublish','draft']),
                'posting_date' => $faker->dateTimeBetween('-30 days','30 days'),
                'subject' => $faker->sentence(),
                'content' => $faker->paragraph(),
                'broadcast' => $faker->randomElement(['yes','no']),
                'created_at' => now()->toDateTimeString(),
                'updated_at' =>now()->toDateTimeString(),
            ];
        }

        $chunks = array_chunk($data, 500);
        foreach ($chunks as $chunk) {
            \App\News::insert($chunk);
        }
    }
}
