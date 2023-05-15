<?php

namespace App\Service;

use App\ResponseObject\ResponseObject;
use App\Service\Repository\LikeRepository;
use Illuminate\Http\Request;

class LikeService
{
    private LikeRepository $likeRepository;

    /**
     * @param LikeRepository $likeRepository
     */
    public function __construct(LikeRepository $likeRepository)
    {
        $this->likeRepository = $likeRepository;
    }

    public function likeManga(Request $request)
    {
        $user_id = $request->user_id;
        $manga_id = $request->manga_id;

        $like_id = $this->likeRepository->likeManga($user_id, $manga_id)->id;

        $response = new ResponseObject(true, $like_id, '');

        return response()->json($response->responseObject());
    }

    public function unlikeManga(Request $request)
    {
        $like_id = $request->like_id;

        $result = $this->likeRepository->unlikeManga($like_id);

        $response = new ResponseObject(true, '', '');

        return response()->json($response->responseObject());
    }

    public function checkExistLike(Request $request)
    {
        $user_id = $request->user_id;
        $manga_id = $request->manga_id;


    }
}
