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
}
