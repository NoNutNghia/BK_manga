<?php

namespace App\Service\Repository\Impl;

use App\Models\MangaDetail;
use App\Service\Repository\MangaDetailRepository;
use Illuminate\Support\Facades\DB;

class MangaDetailRepositoryImpl implements MangaDetailRepository
{

    private MangaDetail $mangaDetail;

    /**
     * @param MangaDetail $mangaDetail
     */
    public function __construct()
    {
        $this->mangaDetail = new MangaDetail();
    }


    public function searchMangaByTitleAndOtherName($key)
    {
        try {
            return $this->mangaDetail
                ->select(
                    'manga_detail.manga_id as manga_id',
                    'manga_detail.title as title',
                    'manga_detail.other_name as other_name',
                    'chapter_tmp.title as latest_chapter'
                )
                ->join(
                    DB::raw('(SELECT manga_id, title FROM chapter
	                WHERE id IN (SELECT MAX(id) from chapter GROUP BY manga_id)
                    ) chapter_tmp'), 'chapter_tmp.manga_id', '=', 'manga_detail.manga_id')
                ->where(function ($query) use ($key) {
                    $query->where('manga_detail.title', 'LIKE', $key)
                        ->orWhere('manga_detail.other_name', 'LIKE', $key);
                })->get();
        } catch (\Exception $e) {
            return false;
        }
    }
}
