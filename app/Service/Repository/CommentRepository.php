<?php

namespace App\Service\Repository;

interface CommentRepository
{
    public function mangaComment($mangaId, $userId, $content);

    public function chapterComment($chapterId, $userId, $content);

    public function getMangaComment($limit, $offset, $mangaId);

    public function getChapterComment($limit, $offset, $chapterId);

    public function getCountCommentChapter($chapterId);

    public function getCountCommentManga($mangaId);
}
