<?php

namespace App\Http\Controllers;

use App\Service\ChapterService;
use Illuminate\Http\Request;

class ChapterController extends Controller
{

    private ChapterService $chapterService;

    /**
     * @param ChapterService $chapterService
     */
    public function __construct(ChapterService $chapterService)
    {
        $this->chapterService = $chapterService;
    }

    public function chapterDetail(Request $request)
    {
        return $this->chapterService->chapterDetail($request);
    }
}
