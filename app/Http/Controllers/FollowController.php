<?php

namespace App\Http\Controllers;

use App\Service\FollowService;
use Illuminate\Http\Request;

class FollowController extends Controller
{
    private FollowService $followService;

    /**
     * @param FollowService $followService
     */
    public function __construct(FollowService $followService)
    {
        $this->followService = $followService;
    }

    public function followManga(Request $request)
    {
        return $this->followService->followManga($request);
    }

    public function unfollowManga(Request $request)
    {
        return $this->followService->unfollowManga($request);
    }

    public function index(Request $request)
    {
        return $this->followService->index($request);
    }
}
