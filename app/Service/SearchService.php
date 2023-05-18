<?php

namespace App\Service;

use App\ResponseObject\ResponseObject;
use App\Service\Repository\GenreRepository;
use App\Service\Repository\MangaDetailRepository;
use App\Service\Repository\MangaStatusRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $mangaCardList = $this->mangaDetailRepository->getMangaCardList();

        return view('pages.user.manga.search_manga', compact('mangaCardList'));
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

    public function filterSearch(Request $request)
    {
        $filterObject = array(
            'genre_list' => $request->genre_list,
            'manga_status' => $request->manga_status,
            'chapter_count' => $request->chapter_count,
            'upload_sorting' => $request->upload_sorting
        );

        $filterGenre = $this->getFilterSearchQuery($filterObject);

        $filterMangaList = $this->mangaDetailRepository->getFilterManga($filterObject, $filterGenre);

        $html = '';

        foreach ($filterMangaList as $manga_ele) {
            $html .= view('pages.user.component.manga_card', ['mangaCard' => $manga_ele]);
        }

        $response = new ResponseObject(true, $html, '');

        return response()->json($response->responseObject());
    }

    private function getFilterSearchQuery($filterObject) {

        $queryRaw = '%';

        if ($filterObject['genre_list']) {
            foreach ($filterObject['genre_list'] as $genre_ele) {
                $queryRaw .= '\'' . $genre_ele . '\'' . '%';
            }
        } else {
            $queryRaw .= '%';
        }

        return $queryRaw;
    }
}
