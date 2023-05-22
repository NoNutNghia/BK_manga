<?php

namespace App\Service\Repository;

interface GenreRepository
{
    public function getGenre();

    public function getGenreById($id);
}
