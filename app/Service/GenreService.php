<?php

namespace App\Service;

use App\ResponseObject\ResponseObject;
use App\Service\Repository\GenreRepository;
use Illuminate\Http\Request;

class GenreService
{
    private GenreRepository $genreRepository;

    /**
     * @param GenreRepository $genreRepository
     */
    public function __construct(GenreRepository $genreRepository)
    {
        $this->genreRepository = $genreRepository;
    }

    public function getGenre(Request $request)
    {
        $genre = $this->genreRepository->getGenre();

        $response = new ResponseObject(true, $genre, '');

        return response()->json($response->responseObject());
    }

}
