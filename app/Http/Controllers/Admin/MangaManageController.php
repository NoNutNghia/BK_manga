<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Service\Admin\MangaManageService;
use Illuminate\Http\Request;

class MangaManageController extends Controller
{
    private MangaManageService $mangaManageService;

    /**
     * @param MangaManageService $mangaManageService
     */
    public function __construct(MangaManageService $mangaManageService)
    {
        $this->mangaManageService = $mangaManageService;
    }

    public function getMangaList(Request $request)
    {
        return $this->mangaManageService->getMangaList($request);
    }

    public function getMangaDetail(Request $request)
    {
        return $this->mangaManageService->getMangaDetail($request);
    }

    public function getMangaAdd(Request $request)
    {
        return $this->mangaManageService->getMangaAdd($request);
    }

    public function createManga(Request $request)
    {
        return $this->mangaManageService->createManga($request);
    }

    public function getChapterAdd(Request $request)
    {
        return $this->mangaManageService->getChapterAdd($request);
    }

    public function createChapter(Request $request)
    {
        return $this->mangaManageService->createChapter($request);
    }

    public function getMangaEdit(Request $request)
    {
        return $this->mangaManageService->getMangaEdit($request);
    }

    public function editManga(Request $request)
    {
        return $this->mangaManageService->editManga($request);
    }
}
