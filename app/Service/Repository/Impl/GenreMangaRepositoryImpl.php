<?php

namespace App\Service\Repository\Impl;

use App\Models\GenreManga;
use App\Service\Repository\GenreMangaRepository;

class GenreMangaRepositoryImpl implements GenreMangaRepository
{

    private GenreManga $genreManga;

    /**
     */
    public function __construct()
    {
        $this->genreManga = new GenreManga();
    }

    public function getGenreMangaListById($id)
    {
        try {
            return $this->genreManga->where('manga_id', $id)->orderBy('genre_id', 'ASC')->get();
        } catch (\Exception $e) {
            return false;
        }
    }
}
