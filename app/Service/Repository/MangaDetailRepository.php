<?php

namespace App\Service\Repository;

interface MangaDetailRepository
{
    public function searchMangaByTitleAndOtherName($key);

    public function getMangaDetailById($id);

    public function getMangaCardList();

    public function getFilterManga($filterObject, $filterQueryRaw);
}
