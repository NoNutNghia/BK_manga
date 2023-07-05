<?php

namespace App\Service\Repository;

interface MangaRepository
{
    public function createManga($userUpdate, $userApprove);

    public function updateTimeManga();
}
