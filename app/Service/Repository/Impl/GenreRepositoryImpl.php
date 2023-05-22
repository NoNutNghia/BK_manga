<?php

namespace App\Service\Repository\Impl;

use App\Models\Genre;
use App\Service\Repository\GenreRepository;

class GenreRepositoryImpl implements GenreRepository
{

    private Genre $genre;

    /**
     */
    public function __construct()
    {
        $this->genre = new Genre();
    }

    public function getGenre()
    {
        try {
            return $this->genre->get();
        } catch (\Exception $e) {
            return false;
        }
    }

    public function getGenreById($id)
    {
        try {
            return $this->genre->where('id', $id)->first();
        } catch (\Exception $e) {
            return false;
        }
    }
}
