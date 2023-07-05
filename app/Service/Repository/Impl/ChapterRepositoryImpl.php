<?php

namespace App\Service\Repository\Impl;

use App\Models\Chapter;
use App\Service\Repository\ChapterRepository;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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

    public function getLatestChapterByMangaID($mangaID)
    {
        try {
            return $this->chapter->
                whereRaw('id = (SELECT MAX(id) FROM chapter WHERE manga_id = ?)', [$mangaID])->first();
        } catch (\Exception $e) {
            return false;
        }
    }

    public function createChapter($data)
    {
        try {
            $chapter = new Chapter();

            $chapter->title = $data->title_chapter;
            $chapter->manga_id = $data->manga_id;
            $chapter->uploaded_by = Auth::id();
            $chapter->updated_by = Auth::id();
            $chapter->uploaded_at = Carbon::now();

            $chapter->save();

            return $chapter->id;

        } catch (\Exception $e) {
            return false;
        }
    }
}
