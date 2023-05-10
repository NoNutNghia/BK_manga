<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(GenderSeeder::class);
        $this->call(UserRoleSeeder::class);
        $this->call(UserStatusSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(MangaSeeder::class);
        $this->call(ViewSeeder::class);
        $this->call(AgeRangeSeeder::class);
        $this->call(AuthorSeeder::class);
        $this->call(GenreSeeder::class);
        $this->call(GenreMangaSeeder::class);
        $this->call(MangaStatusSeeder::class);
        $this->call(MangaDetailSeeder::class);
        $this->call(ChapterSeeder::class);
    }
}
