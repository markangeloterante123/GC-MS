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
        for ($i = 0; $i < 200; $i++){
            \DB::table('file_records')->insert([
                'user_id' =>$current + $i,
                'employee_id'=>$current + $i,
                'first_name' => $faker->name(),
                'last_name' => Str::random(1),
                'middle_name' => '',
                'designation' => $faker->randomElement(["Developer", "Desinger", "HR Admin", "Management", "Project Manager"]),
                'type_of_contract' => $faker->randomElement(["Montly", "Long-term"]),
                'contracts'=>$faker->randomElement(['Interns', 'Probitionary', 'Regular', 'End of Contract', 'AWOL']),
                'notes'=>'No Notes need to updates this notes section informations',
                'date_hired' => \Carbon\Carbon::now(),
                'proby_extension' => \Carbon\Carbon::now(),
                'regular_date' => \Carbon\Carbon::now(),
                'contract_status' => $faker->randomElement(['Active', 'Terminated']),
                'no_of_service' => $faker->randomElement(['1', '2', '3', '4']),
                'sil_entitlement'=>  $faker->randomElement(['1', '2', '3', '4']),
                'birthday' => \Carbon\Carbon::now(), 
                'age'=>random_int(19, 30),
                'gender' =>  $faker->randomElement(["Male", "Female"]),
                'marital_status' => $faker->randomElement(['Single', 'Married', 'Widowed', 'Devorced']),
                'cel_no' => $faker->phoneNumber,
                'work_email' => $faker->safeEmail,
                'personal_email' => $faker->safeEmail,
                'account_number'=>random_int(11111111111,99999999999),
                'TIN'=>random_int(11111111111,99999999999),
                'philhealth'=>random_int(11111111111,99999999999),
                'sss'=>random_int(11111111111,99999999999),
                'pagibig'=>random_int(11111111111,99999999999),
                'hmo'=>'No HMO',
                'address_1' => $faker->address,
                'emergency_name' =>  $faker->name(),
                'emergency_relation' => $faker->randomElement(["Mother", "Father", "Sister", "Brother", "Wife", "Husband","Daughter","Son"]),
                'emergency_contact' => $faker->phoneNumber,
                'emergency_name2' =>  $faker->name(),
                'emergency_relation2' => $faker->randomElement(["Mother", "Father", "Sister", "Brother", "Wife", "Husband","Daughter","Son"]),
                'emergency_contact2' => $faker->phoneNumber,
                'pay_slip_link' => $faker->url,
            ]);
        }
    }
}
