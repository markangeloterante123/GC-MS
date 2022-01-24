<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;
use Illuminate\Database\QueryException; 

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = \Faker\Factory::create();
        for ($i = 0; $i < 100; $i++){
            \DB::table('client_information')->insert([
                'contact_person' => $faker->name(),
                'acount_name' => $faker->name(),
                'company_name' => $faker->name(),
                'website' => $faker->name(),
                'birthday' => \Carbon\Carbon::now(),
                'address' => $faker->address,
                'address' => $faker->country,
                'email' => $faker->safeEmail,
                'personalities' => '',
                'communication_style' => '',
                'civil_status'=> $faker->randomElement(["Single", "Meried", 'Widow', 'Devource']),
                'kids' => 0,
                'hobbies_sports'=> $faker->randomElement(["Games", "Books", 'Movie', 'Basketball']),
                'notes'=>'',
                'client_status'=> $faker->randomElement(["Active", "In Active", 'Ban']),
                'active_date' => \Carbon\Carbon::now(),
                'last_active_date' => \Carbon\Carbon::now(),
            ]);
        }
    }
}
