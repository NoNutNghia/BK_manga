<?php

namespace App\Service\Repository\Impl;

use App\Models\Manga;
use App\Service\Repository\MangaRepository;

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
}
