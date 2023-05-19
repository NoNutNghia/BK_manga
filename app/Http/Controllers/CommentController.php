<?php

namespace App\Http\Controllers;

use App\Service\CommentService;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    private CommentService $commentService;

    /**
     * @param CommentService $commentService
     */
    public function __construct(CommentService $commentService)
    {
        $this->commentService = $commentService;
    }

    public function commentManga(Request $request)
    {
        return $this->commentService->commentManga($request);
    }

    public function commentChapter(Request $request)
    {
        return $this->commentService->commentChapter($request);
    }

    public function getCommentManga(Request $request)
    {
        return $this->commentService->getCommentManga($request);
    }

    public function getCommentChapter(Request $request)
    {
        return $this->commentService->getCommentChapter($request);
    }
}
