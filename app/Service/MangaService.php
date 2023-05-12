<?php

namespace App\Service;

use App\Service\Repository\MangaDetailRepository;
use Illuminate\Http\Request;

class MangaService
{
    private MangaDetailRepository $mangaDetailRepository;

    /**
     * @param MangaDetailRepository $mangaDetailRepository
     */
    public function __construct(MangaDetailRepository $mangaDetailRepository)
    {
        $this->mangaDetailRepository = $mangaDetailRepository;
    }

    public function mangaDetail(Request $request)
    {
        $foundManga = $this->mangaDetailRepository->getMangaDetailById($request->id);

        return view('pages.user.manga.detail', compact('foundManga'));
    }

    public function mangaCardList(Request $request)
    {
        $mangaCardList = $this->mangaDetailRepository->getMangaCardList();

        return view('pages.user.manga.main', compact('mangaCardList'));
    }
}
