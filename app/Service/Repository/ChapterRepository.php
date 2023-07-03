<?php

namespace App\Service\Repository;

interface ChapterRepository
{
    public function getChapterById($id);

    public function getListChapterByMangaId($id);
}
