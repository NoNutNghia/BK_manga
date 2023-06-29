<?php

namespace App\Service\Repository\Impl;

use App\Models\Chapter;
use App\Service\Repository\ChapterRepository;

class ChapterRepositoryImpl implements ChapterRepository
{

    private Chapter $chapter;

    /**
     */
    public function __construct()
    {
        $this->chapter = new Chapter();
    }

    public function getChapterById($id)
    {
        try {
            return $this->chapter->where('id', $id)->first();
        } catch (\Exception $e) {
            return false;
        }
    }

    public function getListChapterByMangaId($id)
    {
        try {
            return $this->chapter->where('manga_id', $id)->get();
        } catch (\Exception $e) {
            return false;
        }
    }
}
