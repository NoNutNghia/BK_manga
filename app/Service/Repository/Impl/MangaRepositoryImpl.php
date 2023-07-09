<?php

namespace App\Service\Repository\Impl;

use App\Models\Manga;
use App\Service\Repository\MangaRepository;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class MangaRepositoryImpl implements MangaRepository
{
    private Manga $manga;

    /**
     */
    public function __construct()
    {
        $this->manga = new Manga();
    }

    public function createManga($userUpdate, $userApprove)
    {
        try {

            $manga = new Manga();
            $manga->updated_by = $userUpdate;
            $manga->approved_by = $userApprove;
            $manga->save();

            return $manga->id;
        } catch (\Exception $e) {
            return false;
        }
    }

    public function updateTimeManga($mangaID)
    {
        try {
            $this->manga->where('id', $mangaID)->update(array(
                'updated_by' => Auth::id(),
                'approved_by' => Auth::id()
            ));

            return true;
        } catch (\Exception $e) {
            return false;
        }
    }

    public function updateTimeMangaViaMangaDetail($mangaID)
    {
        try {
            $this->manga->join('manga_detail', 'manga_detail.manga_id', '=', 'manga.id')
                ->where('manga.id', $mangaID)
                ->update(array(
                    'updated_by' => Auth::id(),
                    'approved_by' => Auth::id()
                ));

            return true;
        } catch (\Exception $e) {
            return false;
        }
    }
}
