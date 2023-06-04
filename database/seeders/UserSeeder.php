<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker;
use Hash;

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

        $data[] = [
            'lgu_id' => $lgu->random(),
            'allowed_lgu_admin' => 'yes',
            'name' => 'Sherwin de Jesus',
            'email' => 'sirking1991@gmail.com',
            'password' => Hash::make('password'),
            'created_at' => now()->toDateTimeString(),
            'updated_at' =>now()->toDateTimeString(),                
        ];        

        for ($n=0; $n < 100; $n++) { 
            $data[] = [
                'lgu_id' => $lgu->random(),
                'allowed_lgu_admin' => 'yes',
                'name' => $faker->name(),
                'email' => $faker->safeEmail,
                'password' => Hash::make('password'),
                'created_at' => now()->toDateTimeString(),
                'updated_at' =>now()->toDateTimeString(),                
            ];
        }

        $chunks = array_chunk($data, 50);
        foreach ($chunks as $chunk) {
            \App\User::insert($chunk);
        }
    }
}
