<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('genre')->insert(array(
            array(
                'genre_name' => 'Action'
            ),
            array(
                'genre_name' => 'Adventure'
            ),
            array(
                'genre_name' => 'Comedy'
            ),
            array(
                'genre_name' => 'Drama'
            ),
            array(
                'genre_name' => 'Fantasy'
            ),
            array(
                'genre_name' => 'Fiction'
            ),
            array(
                'genre_name' => 'Fictional'
            ),
            array(
                'genre_name' => 'Gender Bender'
            ),
            array(
                'genre_name' => 'High-school'
            ),
            array(
                'genre_name' => 'Historical'
            ),
            array(
                'genre_name' => 'Horror'
            ),
            array(
                'genre_name' => 'Musical'
            ),
            array(
                'genre_name' => 'Mystery'
            ),
            array(
                'genre_name' => 'Romance'
            ),
            array(
                'genre_name' => 'School Life'
            ),
            array(
                'genre_name' => 'Shounen'
            ),
            array(
                'genre_name' => 'Slice of Life '
            ),
            array(
                'genre_name' => 'Sports'
            ),
            array(
                'genre_name' => 'Supernatural'
            ),
            array(
                'genre_name' => 'Tragedy'
            )
        ));
    }
}
