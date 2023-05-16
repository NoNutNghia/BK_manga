<?php

namespace App\Service;

use App\ResponseObject\ResponseObject;
use App\Service\Repository\FollowRepository;
use Illuminate\Http\Request;

class FollowService
{

    private FollowRepository $followRepository;

    /**
     * @param FollowRepository $followRepository
     */
    public function __construct(FollowRepository $followRepository)
    {
        $this->followRepository = $followRepository;
    }

    public function followManga(Request $request)
    {
        $user_id = $request->user_id;
        $manga_id = $request->manga_id;

        $follow_id = $this->followRepository->followManga($user_id, $manga_id)->id;

        $response = new ResponseObject(true, $follow_id, 'Follow manga successfully!');

        return response()->json($response->responseObject());
    }

    public function unfollowManga(Request $request)
    {
        $follow_id = $request->follow_id;

        $result = $this->followRepository->unfollowManga($follow_id);

        $response = new ResponseObject(true, '', 'Unfollow manga successfully!');

        return response()->json($response->responseObject());
    }

    public function index(Request $request)
    {
        return view('pages.user.manga.following');
    }

}
