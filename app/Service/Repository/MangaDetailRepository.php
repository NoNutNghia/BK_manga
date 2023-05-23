<?php

namespace App\Service\Repository;

interface MangaDetailRepository
{
    public function searchMangaByTitleAndOtherName($key);

    public function getMangaDetailById($id);

    public function getMangaCardList();

    public function getFilterManga($filterObject, $filterGenre);

    public function getTopFollowingManga();

    public function getTopLikeManga();

    public function getNewestManga();

    public function getCompleteManga();
}
