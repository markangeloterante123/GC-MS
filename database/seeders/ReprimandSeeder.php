<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;
use Illuminate\Database\QueryException; 

class ReprimandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        for ($i = 0; $i < 10; $i++){
            \DB::table('reprimand_details')->insert([
                'type_of_offense' => $faker->text,
                'details' => $faker->paragraph,
                'no_of_offense' => $faker->text,
                'author_by'=>$faker->name(),
            ]);
        }
    }
}
