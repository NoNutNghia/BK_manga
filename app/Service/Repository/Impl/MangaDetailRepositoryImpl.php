<?php

namespace App\Service\Repository\Impl;

use App\Enum\MangaStatus;
use App\Helper\DatabaseHelper;
use App\Models\MangaDetail;
use App\Service\Repository\MangaDetailRepository;
use Illuminate\Support\Facades\DB;

class MangaDetailRepositoryImpl implements MangaDetailRepository
{

    private MangaDetail $mangaDetail;

    /**
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

    public function getMangaDetailById($id)
    {
        try {
            return $this->mangaDetail->where('id', $id)->first();
        } catch (\Exception $e) {
            return false;
        }
    }

    public function getMangaCardList()
    {
        try {
            return $this->mangaDetail
                ->select(
                    'manga_detail.*',
                    'chapter_tmp.title as latest_chapter',
                    'chapter_tmp.latest_id as latest_id'
                )
                ->join(
                    DB::raw('(SELECT manga_id, title, id as latest_id FROM chapter
	                WHERE id IN (SELECT MAX(id) from chapter GROUP BY manga_id)
                    ) chapter_tmp'), 'chapter_tmp.manga_id', '=', 'manga_detail.manga_id')
                ->join('manga', 'manga.id', '=', 'manga_detail.manga_id')
                ->join('view', 'manga_detail.manga_id', '=', 'view.manga_id')
                ->orderBy('view.number_of_views', 'desc')
                ->orderBy('manga.updated_at', 'desc')
                ->get();
        } catch (\Exception $e) {
            return false;
        }
    }

    public function getFilterManga($filterObject, $filterGenre)
    {
        try {
            return DatabaseHelper::queryWithoutOnlyFullGroupBy(function () use ($filterGenre, $filterObject) {
                return $this->mangaDetail
                    ->select('manga_detail.*')
                    ->join(
                        DB::raw('(SELECT GROUP_CONCAT("\'" ,genre_id, "\'") as genre_concat, manga_id
                                FROM genre_manga
                                GROUP BY manga_id) genre_manga_tmp'),
                        'genre_manga_tmp.manga_id', '=' ,'manga_detail.manga_id')
                    ->join('chapter', 'chapter.manga_id', '=', 'manga_detail.manga_id')
                    ->join('manga', 'manga.id', '=', 'manga_detail.manga_id')
                    ->where(function ($query) use ($filterObject, $filterGenre) {
                        $query->where('genre_manga_tmp.genre_concat', 'LIKE', $filterGenre)
                            ->where('manga_detail.manga_status', $filterObject['manga_status']);
                    })
                    ->groupBy('manga_detail.manga_id')
                    ->orderBy('manga.updated_at', $filterObject['upload_sorting'])
                    ->having(DB::raw('COUNT(chapter.id)'), '>=', $filterObject['chapter_count'])
                    ->get();
            });
        } catch (\Exception $e) {
            return false;
        }
    }

    public function getTopFollowingManga()
    {
        try {
            return DatabaseHelper::queryWithoutOnlyFullGroupBy(function () {
                return $this->mangaDetail
                    ->select('manga_detail.*')
                    ->leftJoin('follow', 'follow.manga_id', '=', 'manga_detail.manga_id')
                    ->groupBy('manga_detail.manga_id')
                    ->orderBy(DB::raw('COUNT("follow.manga_id")'), 'desc')
                    ->get();
            });
        } catch (\Exception $e) {
            return false;
        }
    }

    public function getTopLikeManga()
    {
        try {
            return DatabaseHelper::queryWithoutOnlyFullGroupBy(function () {
                return $this->mangaDetail
                    ->select('manga_detail.*')
                    ->leftJoin('like', 'like.manga_id', '=', 'manga_detail.manga_id')
                    ->groupBy('manga_detail.manga_id')
                    ->orderBy(DB::raw('COUNT("like.manga_id")'), 'desc')
                    ->get();
            });
        } catch (\Exception $e) {
            return false;
        }
    }

    public function getNewestManga()
    {
        try {
            return $this->mangaDetail->join('manga', 'manga_detail.manga_id', '=', 'manga.id')
                ->orderBy('manga.created_at', 'desc')
                ->get();
        } catch (\Exception $e) {
            return false;
        }
    }

    public function getCompleteManga()
    {
        try {
            return $this->mangaDetail
                ->join('view', 'view.manga_id', '=', 'manga_detail.manga_id')
                ->where('manga_status', MangaStatus::COMPLETE)
                ->orderBy('view.number_of_views', 'desc')
                ->get();
        } catch (\Exception $e) {
            return false;
        }
    }

    public function getMangaList($key)
    {
        try {
            return $this->mangaDetail->where(function ($query) use ($key) {
                $query->where('title', 'LIKE', $key)
                    ->orWhere('other_name', 'LIKE', $key);
            })->orderBy('title')->get();
        } catch (\Exception) {
            return false;
        }
    }

    public function createDetailManga($data, $mangaID)
    {
        try {
            $newMangaDetail = new MangaDetail();

            $newMangaDetail->manga_id = $mangaID;
            $newMangaDetail->manga_status = MangaStatus::IN_PROCESS;
            $newMangaDetail->author_id = $data->author;
            $newMangaDetail->other_name = $data->other_name;
            $newMangaDetail->title = $data->title;
            $newMangaDetail->age_range = $data->age_range;
            $newMangaDetail->description = $data->description;

            $newMangaDetail->save();

            return $newMangaDetail->id;

        } catch (\Exception $e) {
            return false;
        }
    }
}
