<?php

namespace App\Service\Repository;

interface MangaRepository
{
    public function createManga($userUpdate, $userApprove);

    public function updateTimeManga($mangaID);

    public function updateTimeMangaViaMangaDetail($mangaID);
}
