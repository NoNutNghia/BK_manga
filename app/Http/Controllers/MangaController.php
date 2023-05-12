<?php

namespace App\Http\Controllers;

use App\Service\MangaService;
use Illuminate\Http\Request;

class MangaController extends Controller
{
    private MangaService $mangaService;

    /**
     * @param MangaService $mangaService
     */
    public function __construct(MangaService $mangaService)
    {
        $this->mangaService = $mangaService;
    }

    public function mangaDetail(Request $request)
    {
        return $this->mangaService->mangaDetail($request);
    }

    public function mangaCardList(Request $request)
    {
        return $this->mangaService->mangaCardList($request);
    }
}
