<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;
use Illuminate\Database\QueryException; 

class FileUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        $current = 1;
        for ($i = 0; $i < 201; $i++){
            \DB::table('file_records')->insert([
                'user_id' =>$current + $i,
                'first_name' => $faker->name(),
                'last_name' => Str::random(1),
                'middle_name' => '',
                'birthday' => \Carbon\Carbon::now(), 
                'gender' =>  $faker->randomElement(["Male", "Female"]),
                'marital_status' => $faker->randomElement(['Single', 'Married', 'Widowed', 'Devorced']),
                'spouce_name'=> $faker->name(),
                'spouce_work' => $faker->randomElement(['Front-End Developer', 'Back-End Developer', 'Full-Stack Developer', 'Designer','Human Resources']),
                'spouce_birthdate' => \Carbon\Carbon::now(),
                'no_children' => random_int(0, 10),
                'personal_email' => $faker->safeEmail,
                'phone_no' => $faker->phoneNumber,
                'cel_no' => $faker->phoneNumber,
                'address_1' => $faker->address,
                'address_2' => $faker->address,
                'emergency_name' =>  $faker->name(),
                'emergency_relation' => $faker->randomElement(["Mother", "Father", "Sister", "Brother", "Wife", "Husband","Daughter","Son"]),
                'emergency_contact' => $faker->phoneNumber,
                'work_email' => $faker->safeEmail,
                // 'level' => random_int(1, 4),
                // 'team_id' => random_int(0, 200),
                // '404_records_link' => Str::random(10),
                'pay_slip_link' => $faker->url,
                // 'salary' => random_int(550, 1000),
                'date_hired' => \Carbon\Carbon::now(),
                'update_request'=> 0,
                'date_end' => \Carbon\Carbon::now(),
                'contract_status' => $faker->randomElement(['Interns', 'Probitionary', 'Regular', 'End of Contract', 'AWOL']),
            ]);
        }
    }
}
