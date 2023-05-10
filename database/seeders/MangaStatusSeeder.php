<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MangaStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('manga_status')->insert(array(
            array(
                'status_name' => 'complete'
            ),
            array(
                'status_name' => 'in progress'
            ),
            array(
                'status_name' => 'dropped'
            )
        ));
    }
}
