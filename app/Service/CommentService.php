<?php

namespace App\Service;

use App\Service\Repository\CommentRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentService
{
    private CommentRepository $commentRepository;

    /**
     * @param CommentRepository $commentRepository
     */
    public function __construct(CommentRepository $commentRepository)
    {
        $this->commentRepository = $commentRepository;
    }

    public function commentManga(Request $request)
    {
        $mangaId = $request->id;
        $content = $request->content_comment;

        $result = $this->commentRepository->mangaComment($mangaId, Auth::id(), $content);

        return $result;
    }

    public function commentChapter(Request $request)
    {
        $chapterId = $request->id;
        $content = $request->content_comment;

        $result = $this->commentRepository->chapterComment($chapterId, Auth::id(), $content);

        return $result;
    }
}
