<?php

namespace App\Service;

use App\Service\Repository\FollowRepository;
use App\Service\Repository\LikeRepository;
use App\Service\Repository\MangaDetailRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MangaService
{
    private MangaDetailRepository $mangaDetailRepository;
    private FollowRepository $followRepository;
    private LikeRepository $likeRepository;

    /**
     * @param MangaDetailRepository $mangaDetailRepository
     * @param FollowRepository $followRepository
     * @param LikeRepository $likeRepository
     */
    public function __construct(
        MangaDetailRepository $mangaDetailRepository,
        FollowRepository $followRepository,
        LikeRepository $likeRepository
    )
    {
        $this->mangaDetailRepository = $mangaDetailRepository;
        $this->followRepository = $followRepository;
        $this->likeRepository = $likeRepository;
    }

    public function mangaDetail(Request $request)
    {
        $foundManga = $this->mangaDetailRepository->getMangaDetailById($request->id);

        $followCheck = $this->followRepository->checkExistFollow(Auth::id(), $request->id);
        $likeCheck = $this->likeRepository->checkExistLike(Auth::id(), $request->id);

        if ($followCheck) {
            $existFollow = $followCheck;
        } else {
            $existFollow = false;
        }

        if ($likeCheck) {
            $existLike = $likeCheck;
        } else {
            $existLike = false;
        }

        return view('pages.user.manga.detail', compact('foundManga', 'existLike', 'existFollow'));
    }

    public function mangaCardList(Request $request)
    {
        $mangaCardList = $this->mangaDetailRepository->getMangaCardList();

        return view('pages.user.manga.main', compact('mangaCardList'));
    }
}
