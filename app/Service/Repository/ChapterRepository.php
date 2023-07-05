<?php

namespace App\Service\Repository;

interface ChapterRepository
{
    public function getChapterById($id);

    public function getListChapterByMangaId($id);

    public function getLatestChapterByMangaID($mangaID);

    public function createChapter($data);
}
