<?php

namespace App\Service\Repository;

interface CommentRepository
{
    public function mangaComment($mangaId, $userId, $content);

    public function chapterComment($chapterId, $userId, $content);
}
