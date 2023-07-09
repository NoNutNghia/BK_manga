<?php

namespace App\Service\Repository;

interface ViewRepository
{
    public function makeView($manga_id);

    public function getTopView();

    public function createView($mangaID);
}
