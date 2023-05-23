<?php

namespace App\Http\Controllers;

use App\Service\GenreService;
use Illuminate\Http\Request;

class GenreController extends Controller
{

    private GenreService $genreService;

    /**
     * @param GenreService $genreService
     */
    public function __construct(GenreService $genreService)
    {
        $this->genreService = $genreService;
    }

    public function getGenre(Request $request)
    {
        return $this->genreService->getGenre($request);
    }

    public function getMangaByGenre(Request $request)
    {
        return $this->genreService->getMangaByGenre($request);
    }
}
