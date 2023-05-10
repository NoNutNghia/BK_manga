<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AgeRangeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('age_range')->insert(array(
            array(
                'age_range' => 'All age'
            ),
            array(
                'age_range' => '12+'
            ),
            array(
                'age_range' => '16+'
            ),
            array(
                'age_range' => '18+'
            )
        ));
    }
}
