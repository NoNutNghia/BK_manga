<?php

namespace App\Service;

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

        return $result;
    }

    public function commentChapter(Request $request)
    {
        $chapterId = $request->id;
        $content = $request->content_comment;

        $result = $this->commentRepository->chapterComment($chapterId, Auth::id(), $content);

        return $result;
    }

    public function getCommentManga(Request $request)
    {
        $limit = 1;
        $offset = (intval($request->page) - 1) * $limit;
        $mangaId = $request->manga_id;

        $commentList = $this->commentRepository->getMangaComment($limit, $offset, $mangaId);

        $html = view('pages.user.component.comment_list', compact('commentList'))->render();

        $response = new ResponseObject(true, $html, '');

        return response()->json($response->responseObject());
    }

    public function getCommentChapter(Request $request)
    {
        $limit = 1;
        $offset = (intval($request->page) - 1) * $limit;
        $chapterId = $request->chapter_id;

        $commentList = $this->commentRepository->getChapterComment($limit, $offset, $chapterId);

        $html = view('pages.user.component.comment_list', compact('commentList'))->render();

        $response = new ResponseObject(true, $html, '');

        return response()->json($response->responseObject());
    }
}
