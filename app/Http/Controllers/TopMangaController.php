<?php

namespace App\Http\Controllers;

use App\Service\TopMangaService;
use Illuminate\Http\Request;

class TopMangaController extends Controller
{
    private TopMangaService $topMangaService;

    /**
     * @param TopMangaService $topMangaService
     */
    public function __construct(TopMangaService $topMangaService)
    {
        $this->topMangaService = $topMangaService;
    }

    public function getTopFollowingManga(Request $request)
    {
        return $this->topMangaService->getTopFollowingManga($request);
    }

    public function getTopViewManga(Request $request)
    {
        return $this->topMangaService->getTopViewManga($request);
    }

    public function getTopLikeManga(Request $request)
    {
        return $this->topMangaService->getTopLikeManga($request);
    }

    public function getNewestManga(Request $request)
    {
        return $this->topMangaService->getNewestManga($request);
    }

    public function getCompleteManga(Request $request)
    {
        return $this->topMangaService->getCompleteManga($request);
    }
}
