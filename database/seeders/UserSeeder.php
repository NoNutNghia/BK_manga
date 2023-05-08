<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user')->insert(array(
            array(
                'email' => 'nghia.nn260701@gmail.com',
                'nick_name' => 'NoNutNghia',
                'full_name' => 'Nguyen Ngoc Nghia',
                'gender' => 1,
                'user_status' => 1,
                'role' => 1,
                'password' => sha1('admin'),
                'date_of_birth' => Carbon::createFromFormat('d/m/Y','26/07/2001'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ),
            array(
                'email' => 'nghiann@zyyx.jp',
                'nick_name' => 'NoNutAdmin',
                'full_name' => 'Nguyen Ngoc Nghia',
                'gender' => 1,
                'user_status' => 1,
                'role' => 2,
                'password' => sha1('admin'),
                'date_of_birth' => Carbon::createFromFormat('d/m/Y','26/07/2001'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            )
        ));
    }
}
