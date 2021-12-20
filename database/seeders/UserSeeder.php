<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;
use Illuminate\Database\QueryException; 
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {  
        $faker = \Faker\Factory::create();
        for ($i = 0; $i < 200; $i++){
            \DB::table('users')->insert([
                'name' => $faker->name(),
                'email' => $faker->safeEmail,
                'position'=> $faker->randomElement(["No Assign Role", "Designer", 'Front-End Developer', 'Back-End Developer','Accountic', 'Admin', 'Full-Stack Developer']),
                'email_verified_at'=> NULL,
                'is_admin'=>0,
                'employement_status'=> $faker->randomElement(['OJT', 'Internship', 'Probitionary','Regular', 'End of Contract', 'Terminated', 'Resign','AWOL' ]),
                'file'=>0,
                'created_at' => '2021-12-14 06:35:30',
                'updated_at' => '2021-12-14 06:35:30',
                'password'=> Hash::make('12345678'),
            ]);
        }
    }
}
