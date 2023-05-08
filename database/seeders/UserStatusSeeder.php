<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_status')->insert(array(
            array(
                'status_name' => 'active'
            ),
            array(
                'status_name' => 'disable'
            )
        ));
    }
}
