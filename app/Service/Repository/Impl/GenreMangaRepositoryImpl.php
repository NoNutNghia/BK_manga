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

    public function createGenreWithMangaID($genreList, $mangaDetailID)
    {
        try {
            $genreRecord = array();

            foreach ($genreList as $item) {
                $data = array(
                    'genre_id' => $item,
                    'manga_id' => $mangaDetailID
                );
                array_push($genreRecord, $data);
            }

            $this->genreManga->insert($genreRecord);

            return true;
        } catch (\Exception $e) {
            return false;
        }
    }
}
