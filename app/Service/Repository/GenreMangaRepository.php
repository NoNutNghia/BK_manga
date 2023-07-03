<?php

namespace App\Service\Repository;

interface GenreMangaRepository
{
    public function getGenreMangaListById($id);

    public function createGenreWithMangaID($genreList, $mangaDetailID);
}
