<?php

namespace App\Service;

use App\Enum\AmountOfComment;
use App\ResponseObject\ResponseObject;
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

        if ($result) {
            $response = new ResponseObject(true, $result, '');
        }

        return response()->json($response->responseObject());
    }

    public function commentChapter(Request $request)
    {
        $chapterId = $request->id;
        $content = $request->content_comment;

        $result = $this->commentRepository->chapterComment($chapterId, Auth::id(), $content);

        if ($result) {
            $response = new ResponseObject(true, $result, '');
        }

        return response()->json($response->responseObject());
    }

    public function getCommentManga(Request $request)
    {
        $limit = AmountOfComment::AMOUNT_OF_COMMENT;
        $offset = (intval($request->page) - 1) * $limit;
        $mangaId = $request->manga_id;

        $commentList = $this->commentRepository->getMangaComment($limit, $offset, $mangaId);

        $html = view('pages.user.component.comment_list', compact('commentList'))->render();

        $response = new ResponseObject(true, $html, '');

        return response()->json($response->responseObject());
    }

    public function getCommentChapter(Request $request)
    {
        $limit = AmountOfComment::AMOUNT_OF_COMMENT;
        $offset = (intval($request->page) - 1) * $limit;
        $chapterId = $request->chapter_id;

        $commentList = $this->commentRepository->getChapterComment($limit, $offset, $chapterId);

        $html = view('pages.user.component.comment_list', compact('commentList'))->render();

        $response = new ResponseObject(true, $html, '');

        return response()->json($response->responseObject());
    }

    public function countCommentChapter(Request $request)
    {
        $chapterId = $request->id;

        $countComment = $this->commentRepository->getCountCommentChapter($chapterId)->count_comment;

        $response = new ResponseObject(true, $countComment, '');

        return response()->json($response->responseObject());
    }

    public function countCommentManga(Request $request)
    {
        $mangaId = $request->id;

        $countComment = $this->commentRepository->getCountCommentManga($mangaId)->count_comment;

        $response = new ResponseObject(true, $countComment, '');

        return response()->json($response->responseObject());
    }
}
