<?php

namespace App\Service;

use App\Service\Repository\MangaDetailRepository;
use App\Service\Repository\ViewRepository;
use Illuminate\Http\Request;

class TopMangaService
{
    private MangaDetailRepository $mangaDetailRepository;

    private ViewRepository $viewRepository;

    /**
     * @param MangaDetailRepository $mangaDetailRepository
     * @param ViewRepository $viewRepository
     */
    public function __construct(MangaDetailRepository $mangaDetailRepository, ViewRepository $viewRepository)
    {
        $this->mangaDetailRepository = $mangaDetailRepository;
        $this->viewRepository = $viewRepository;
    }

    public function getTopFollowingManga(Request $request)
    {
        $mangaList = $this->mangaDetailRepository->getTopFollowingManga();

        $topMangaTitle = 'Top Following';

        return view('pages.user.manga.top_ranking', compact('mangaList', 'topMangaTitle'));
    }

    public function getTopViewManga(Request $request)
    {
        $topView = $this->viewRepository->getTopView();
        $mangaList = collect();
        $topMangaTitle = 'Top View';

        foreach ($topView as $top) {
            $mangaList->push($top->mapping_to_manga);
        }

        return view('pages.user.manga.top_ranking', compact('mangaList', 'topMangaTitle'));
    }

    public function getTopLikeManga(Request $request)
    {
        $mangaList = $this->mangaDetailRepository->getTopLikeManga();
        $topMangaTitle = 'Top Like';

        return view('pages.user.manga.top_ranking', compact('mangaList', 'topMangaTitle'));
    }

    public function getNewestManga(Request $request)
    {
        $mangaList = $this->mangaDetailRepository->getNewestManga();
        $topMangaTitle = 'Newest Manga';

        return view('pages.user.manga.top_ranking', compact('mangaList', 'topMangaTitle'));
    }

    public function getCompleteManga(Request $request)
    {
        $mangaList = $this->mangaDetailRepository->getCompleteManga();
        $topMangaTitle = 'Complete Manga';

        return view('pages.user.manga.top_ranking', compact('mangaList', 'topMangaTitle'));
    }
}
