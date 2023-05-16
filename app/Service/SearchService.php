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
            'genre_list' => [1],
            'manga_status' => 1,
            'chapter_count' => 10,
            'upload_sorting' => 1
        );

        $filterQueryRaw = $this->getFilterSearchQuery($filterObject);

        return $this->mangaDetailRepository->getFilterManga($filterObject, $filterQueryRaw);
    }

    private function getFilterSearchQuery($filterObject) {

        $queryRaw = '';

        if ($filterObject['genre_list']) {
            $queryRaw .= 'genre_manga.genre_id IN (';
            foreach ($filterObject['genre_list'] as $index => $genre_ele) {
                $queryRaw .= '\'' . $genre_ele . '\'';
                if ($index != array_key_last($filterObject['genre_list'])) {
                    $queryRaw .= ', ';
                } else {
                    $queryRaw .= ') AND ';
                }
            }
        }

        $queryRaw .= 'manga_status = ' . $filterObject['manga_status'];

        return $queryRaw;
    }

}
