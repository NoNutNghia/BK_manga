<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('author')->insert(array(
            array(
                'author_name' => 'Akira Toriyama'
            ),
            array(
                'author_name' => 'Akutami Gege'
            ),
            array(
                'author_name' => 'Arakawa Naoshi'
            ),
            array(
                'author_name' => 'Eiichiro Oda'
            ),
            array(
                'author_name' => 'Endo Tatsuya'
            ),
            array(
                'author_name' => 'Fujimaki Tadatoshi'
            ),
            array(
                'author_name' => 'Furudate Haruichi'
            ),
            array(
                'author_name' => 'Gotouge Koyoharu'
            ),
            array(
                'author_name' => 'Hajime Isayama'
            ),
            array(
                'author_name' => 'Hara Yasuhisa'
            ),
            array(
                'author_name' => 'Hiro Mashima'
            ),
            array(
                'author_name' => 'Horikoshi Kohei'
            ),
            array(
                'author_name' => 'Masashi Kishimoto'
            ),
            array(
                'author_name' => 'Murata Yuusuke'
            ),
            array(
                'author_name' => 'Nekotofu'
            ),
            array(
                'author_name' => 'Nomura Yuusuke'
            ),
            array(
                'author_name' => 'Rumiko Takahashi'
            ),
            array(
                'author_name' => 'Thiên Tằm Tổ Đậm'
            ),
            array(
                'author_name' => 'Yūichi Katō'
            ),
            array(
                'author_name' => 'Yūji Terajima'
            )
        ));
    }
}
