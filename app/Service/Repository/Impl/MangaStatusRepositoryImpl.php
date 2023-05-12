<?php

namespace App\Service\Repository\Impl;

use App\Models\MangaStatus;
use App\Service\Repository\MangaStatusRepository;

class MangaStatusRepositoryImpl implements MangaStatusRepository
{

    private MangaStatus $mangaStatus;

    /**
     */
    public function __construct()
    {
        $this->mangaStatus = new MangaStatus();
    }

    public function getMangaStatus()
    {
        try {
            return $this->mangaStatus->get();
        } catch (\Exception $e) {
            return false;
        }
    }
}
