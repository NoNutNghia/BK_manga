<?php

namespace App\Service\Repository\Impl;

use App\Models\ChapterComment;
use App\Models\MangaComment;
use App\Service\Repository\CommentRepository;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class CommentRepositoryImpl implements CommentRepository
{

    private ChapterComment $chapterComment;

    private MangaComment $mangaComment;

    /**
     */
    public function __construct()
    {
        $this->chapterComment = new ChapterComment();
        $this->mangaComment = new MangaComment();
    }


    public function mangaComment($mangaId, $userId, $content)
    {
        try {
            return DB::transaction(function () use ($mangaId, $userId, $content){
                return $this->mangaComment->create(array(
                    'manga_id' => $mangaId,
                    'user_id' => $userId,
                    'content' => $content,
                    'created_at' => Carbon::now()
                ));
            });
        } catch (\Exception $e) {
            return false;
        }
    }

    public function chapterComment($chapterId, $userId, $content)
    {
        try {
            return DB::transaction(function () use ($chapterId, $userId, $content){
                return $this->chapterComment->create(array(
                    'chapter_id' => $chapterId,
                    'user_id' => $userId,
                    'content' => $content,
                    'created_at' => Carbon::now()
                ));
            });
        } catch (\Exception $e) {
            return false;
        }
    }

    public function getMangaComment($limit, $offset, $mangaId)
    {
        try {
            return $this->mangaComment->where('manga_id', $mangaId)->skip($offset)->take($limit)->get();
        } catch (\Exception $e) {
            return false;
        }
    }

    public function getChapterComment($limit, $offset, $chapterId)
    {
        try {
            return $this->chapterComment->where('chapter_id', $chapterId)->skip($offset)->take($limit)->get();
        } catch (\Exception $e) {
            return false;
        }
    }
}
