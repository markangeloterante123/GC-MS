<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;
use Illuminate\Database\QueryException; 

class MemoSeeder extends Seeder
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
        for ($i = 0; $i < 20; $i++){
            \DB::table('memos')->insert([
                'memo_title' => $faker->text,
                'content' => $faker->paragraph,
                'author_by'=>$faker->name(),
            ]);
        }
    }
}
