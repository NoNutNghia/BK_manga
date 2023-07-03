<?php

namespace App\Service\Repository;

interface MangaDetailRepository
{
    public function searchMangaByTitleAndOtherName($key);

    public function getMangaDetailById($id);

    public function getMangaCardList();

    public function getMangaList($key);

    public function getFilterManga($filterObject, $filterGenre);

    public function getTopFollowingManga();

    public function getTopLikeManga();

    public function getNewestManga();

    public function getCompleteManga();

    public function createDetailManga($data, $mangaID);
}
