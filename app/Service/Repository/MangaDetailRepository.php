<?php

namespace App\Service\Repository;

interface MangaDetailRepository
{
    public function searchMangaByTitleAndOtherName($key);
}
