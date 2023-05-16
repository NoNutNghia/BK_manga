<?php

namespace App\Service;

use App\Service\Repository\ChapterRepository;
use App\Service\Repository\FollowRepository;
use App\Service\Repository\LikeRepository;
use App\Service\Repository\ViewRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ChapterService
{
    private ChapterRepository $chapterRepository;
    private ViewRepository $viewRepository;
    private FollowRepository $followRepository;

    /**
     * @param ChapterRepository $chapterRepository
     * @param ViewRepository $viewRepository
     * @param FollowRepository $followRepository
     */
    public function __construct(
        ChapterRepository $chapterRepository,
        ViewRepository $viewRepository,
        FollowRepository $followRepository
    )
    {
        $this->chapterRepository = $chapterRepository;
        $this->viewRepository = $viewRepository;
        $this->followRepository = $followRepository;
    }

    public function chapterDetail(Request $request)
    {
        $id = $request->id;
        $foundChapter = $this->chapterRepository->getChapterById($id);
        if (!$foundChapter) {
            return redirect()->route('error');
        }
        $parentManga = $foundChapter->parent_manga;

        $follow_check = $this->followRepository->checkExistFollow(Auth::id(), $parentManga->id);

        if ($follow_check) {
            $existFollow = $follow_check;
        } else {
            $existFollow = false;
        }

        $this->viewRepository->makeView($parentManga->manga_id);

        $fileList = Storage::disk('public')->allFiles('manga/' . $parentManga->manga_id . '/chapter/' . $id);
        $imageList = array();

        foreach ($fileList as $file_ele) {
            $fileObject = pathinfo($file_ele);
            array_push($imageList, $fileObject['basename']);
        }

        $chapterObject = array(
            'foundChapter' => $foundChapter,
            'parentManga' => $parentManga,
            'imageList' => $imageList,
            'existFollow' => $existFollow
        );

        return view('pages.user.manga.chapter', compact('chapterObject'));
    }

}
