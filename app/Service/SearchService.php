<?php

namespace App\Service;

use App\Models\MangaStatus;
use App\ResponseObject\ResponseObject;
use App\Service\Repository\GenreRepository;
use App\Service\Repository\MangaDetailRepository;
use App\Service\Repository\MangaStatusRepository;
use Illuminate\Http\Request;

class SearchService
{
    private GenreRepository $genreRepository;
    private MangaStatusRepository $mangaStatusRepository;
    private MangaDetailRepository $mangaDetailRepository;

    /**
     * @param GenreRepository $genreRepository
     * @param MangaStatusRepository $mangaStatusRepository
     * @param MangaDetailRepository $mangaDetailRepository
     */
    public function __construct(
        GenreRepository $genreRepository,
        MangaStatusRepository $mangaStatusRepository,
        MangaDetailRepository $mangaDetailRepository
    )
    {
        $this->genreRepository = $genreRepository;
        $this->mangaStatusRepository = $mangaStatusRepository;
        $this->mangaDetailRepository = $mangaDetailRepository;
    }


    public function index(Request $request)
    {
        return view('pages.user.manga.search_manga');
    }

    public function advanceSearch(Request $request)
    {
        $genre = $this->genreRepository->getGenre();
        $statusManga = $this->mangaStatusRepository->getMangaStatus();

        $advanceSearch = array(
            'genre' => $genre,
            'status_manga' => $statusManga
        );

        $response = new ResponseObject(true, $advanceSearch, '');

        return response()->json($response->responseObject());
    }

    public function titleManga(Request $request)
    {
        $key = '%' . $request->key . '%';

        $foundManga = $this->mangaDetailRepository->searchMangaByTitleAndOtherName($key);

        $html = view('pages.user.component.search_result', compact('foundManga'))->render();

        $response = new ResponseObject(true, $html, '');

        return response()->json($response->responseObject());
    }

}
