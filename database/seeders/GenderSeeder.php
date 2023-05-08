<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GenderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('gender')->insert(array(
            array(
                'gender_name' => 'male'
            ),
            array(
                'gender_name' => 'female'
            ),
            array(
                'gender_name' => 'other'
            )
        ));
    }
}
