<?php

namespace App\Http\Controllers;

use App\Service\LikeService;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    private LikeService $likeService;

    /**
     * @param LikeService $likeService
     */
    public function __construct(LikeService $likeService)
    {
        $this->likeService = $likeService;
    }

    public function likeManga(Request $request)
    {
        return $this->likeService->likeManga($request);
    }

    public function unlikeManga(Request $request)
    {
        return $this->likeService->unlikeManga($request);
    }
}
