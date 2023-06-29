<?php

namespace App\Service\Admin;

use App\Service\Repository\ChapterRepository;
use App\Service\Repository\GenreMangaRepository;
use App\Service\Repository\GenreRepository;
use App\Service\Repository\MangaDetailRepository;
use Illuminate\Http\Request;

class MangaManageService
{
    private MangaDetailRepository $mangaDetailRepository;
    private GenreRepository $genreRepository;
    private GenreMangaRepository $genreMangaRepository;
    private ChapterRepository $chapterRepository;

    /**
     * @param MangaDetailRepository $mangaDetailRepository
     * @param GenreRepository $genreRepository
     * @param GenreMangaRepository $genreMangaRepository
     * @param ChapterRepository $chapterRepository
     */
    public function __construct(
        MangaDetailRepository $mangaDetailRepository,
        GenreRepository $genreRepository,
        GenreMangaRepository $genreMangaRepository,
        ChapterRepository $chapterRepository
    )
    {
        $this->mangaDetailRepository = $mangaDetailRepository;
        $this->genreRepository = $genreRepository;
        $this->genreMangaRepository = $genreMangaRepository;
        $this->chapterRepository = $chapterRepository;
    }


    public function getMangaList(Request $request)
    {
        $key = '%';
        if (isset($request->key)) {
            $searchKey = str_replace('%', '\%', trim($request->key));
            $key .= $searchKey;
        }

        $key .= '%';

        $mangaList = $this->mangaDetailRepository->getMangaList($key);

        return view('pages.admin.manga.manage', compact('mangaList'));
    }

    public function getMangaDetail(Request $request)
    {
        if (isset($request->id)) {
            $id = $request->id;

            $foundManga = $this->mangaDetailRepository->getMangaDetailById($id);

            if (!$foundManga) {
                return redirect()->route('error');
            }

            $genreList = $this->genreRepository->getGenre();

            $genreMangaList = $this->genreMangaRepository->getGenreMangaListById($id);

            $chapterList = $this->chapterRepository->getListChapterByMangaId($id);

            return view('pages.admin.manga.detail',
                compact('foundManga', 'genreList' , 'genreMangaList', 'chapterList')
            );
        }

        return redirect()->route('error');
    }
}
